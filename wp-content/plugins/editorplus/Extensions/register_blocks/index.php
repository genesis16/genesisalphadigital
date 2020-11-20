<?php

class edpl_Blocks
{

    const post_type = 'ghub_blocks';
    const taxonomy_slug = 'ghub_blockcat';

    public function __construct()
    {
        $this->register(); // registering blocks post type
    }

    public static function get_blocks(): array
    {

        $args = array(
            'post_type' => self::post_type
        );

        $posts = get_posts($args);
        $active_blocks = [];

        foreach ($posts as $post => $block) :

            $is_active = get_post_meta($block->ID, 'ep-block-status', true) === 'active' ? true : false;

            if ($is_active) :

                $ID = $block->ID;
                $terms = get_the_terms($ID, 'ghub_blockcat');
                $categories = wp_list_pluck($terms, 'name');


                $active_blocks[] = [
                    'title' => $block->post_title,
                    'slug'  => get_post_meta($ID, 'ep-block-slug', true),
                    'template' => get_post_meta($ID, 'ep-block-template', true),
                    'screenshot' => get_post_meta($ID, 'ep-block-screenshot', true),
                    'source'    => get_post_meta($ID, 'ep-block-source', true),
                    'categories' => $categories
                ];


            endif;

        endforeach;

        return $active_blocks;
    }

    public static function get_available_categories(): array
    {

        $terms = get_terms(
            self::taxonomy_slug,
            array(
                'hide_empty' => 0,
            )
        );

        $categories = array();

        if (count($terms) > 0) {
            foreach ($terms as $term) {
                $categories[] = [
                    'name' => $term->name,
                    'id'   => $term->term_id,
                ];
            }
        }

        return $categories;
    }

    public static function get_block(string $url)
    {

        try {

            $response = wp_remote_get($url, array(
                'timeout' => 5000
            ));

            $body = wp_remote_retrieve_body($response);
            $decodedData = json_decode($body); // {std Classes}

            $categories = [];
            $post_categories = $decodedData->post_categories;

            if (!empty($post_categories) and is_array($post_categories)) {

                foreach ($post_categories as $key => $category) :


                    $categories[] = $category->name;

                endforeach;
            }


            $block =  [
                'title'         => $decodedData->title->rendered,
                'slug'          => $decodedData->slug,
                'template'      => $decodedData->post_template,
                'screenshot'    => $decodedData->screenshot,
                'source'        => $url,
                'category'      => $categories
            ];

            return $block;
        } catch (\Exception $e) {

            return false;
        }
    }

    public function ajax_support()
    {

        add_action('wp_ajax_ep_activate_block',  function () {
            $post_id = $_POST['id'];

            $current_status = get_post_meta($post_id, 'ep-block-status', true);

            if ($current_status === 'active') :
                update_post_meta($post_id, 'ep-block-status', '');
            else :
                update_post_meta($post_id, 'ep-block-status', 'active');
            endif;
        });

        add_action('wp_ajax_ep_delete_block', function () {

            $post_id = $_POST['id'];

            wp_delete_post($post_id, true);

            die;
        });

        add_action('wp_ajax_ep_add_block', function () {

            try {

                $filters = array(
                    'fields'        => 'ids',
                    'post_type'     => self::post_type,
                    'meta_query'    => array(
                        array(
                            'key'   => 'ep-block-source',
                            'value' => $_POST['block']['id'],
                        )
                    )
                );

                $query = new WP_Query($filters);

                if (!empty($query->have_posts())) {

                    echo json_encode([
                        'error' => 'Block Already Exists'
                    ]);
                } else {

                    $block = $_POST['block'];

                    $args = array(
                        'post_title' => $block['title'],
                        'post_type' => self::post_type,
                        'post_status' => 'publish',
                        'meta_input' => [
                            'ep-block-status' => 'active',
                            'ep-block-template' => $block['post_template'],
                            'ep-block-screenshot' => $block['screenshot'],
                            'ep-block-slug' => 'ghub/' . $block['slug'],
                            'ep-block-source' => $block['id']
                        ],
                        'tax_input' => array(
                            'ghub_blockcat' => $block['post_categories']
                        )
                    );

                    $inserted_post_id = wp_insert_post($args);
                    $new_post = get_post($inserted_post_id);

                    $inserted_post = array(
                        'id'    => $new_post->ID,
                        'title' => array(
                            'rendered' => $block['title']
                        ),
                        'meta'  => array(
                            'ep-block-status' => 'active',
                            'ep-block-template' => $block['post_template'],
                            'ep-block-screenshot' => $block['screenshot'],
                            'ep-block-slug'        => 'ghub/' . $block['slug'],
                            'ep-block-source'       => $block['source']
                        ),
                        'categories' => $block['post_categories']
                    );

                    echo json_encode($inserted_post);
                }
            } catch (\Exception $e) {

                return json_encode(
                    [
                        'message' => 'Failed to obtain the block'
                    ]
                );
            }


            die;
        });
    }


    public function register()
    {

        // ajax
        $this->ajax_support();

        add_filter('block_categories', function ($categories, $post) {
            return array_merge(
                $categories,
                array(
                    array(
                        'slug'  => 'ep-custom-category',
                        'title' => 'My Custom Blocks',
                    ),
                )
            );
        }, 10, 2);

        add_action('init', function () {

            register_post_type(
                self::post_type,
                array(
                    'labels' => array(
                        'name' => _x('Blocks', 'post type general name', 'namespace'),
                        'singular_name' => _x('Block', 'post type singular name', 'namespace'),
                        'add_new' => __('Add a New Block', 'namespace'),
                        'add_new_item' => __('Add a New Block', 'namespace'),
                        'edit_item' => __('Edit Block', 'namespace'),
                        'new_item' => __('New Block', 'namespace'),
                        'view_item' => __('View Block', 'namespace'),
                        'search_items' => __('Search Block', 'namespace'),
                        'not_found' => __('Nothing Found', 'namespace'),
                        'not_found_in_trash' => __('Nothing found in Trash', 'namespace'),
                        'parent_item_colon' => ''
                    ),
                    'show_in_rest' => true,
                    'description' => "All the gutenberg hub blocks",
                    'public' => true, // All the relevant settings below inherit from this setting
                    'exclude_from_search' => false, // When a search is conducted through search.php, should it be excluded?
                    'publicly_queryable' => true, // When a parse_request() search is conducted, should it be included?
                    'show_ui' => false, // Should the primary admin menu be displayed?
                    'show_in_nav_menus' => false, // Should it show up in Appearance > Menus?
                    'show_in_menu' => false, // This inherits from show_ui, and determines *where* it should be displayed in the admin
                    'show_in_admin_bar' => false, // Should it show up in the toolbar when a user is logged in?
                    'has_archive' => 'blocks',
                    'supports' => array('title', 'excerpt', 'revisions', 'custom-fields'),
                )
            );

            $labels = array(
                'name'              => _x('Block Categories', 'taxonomy general name', 'textdomain'),
                'singular_name'     => _x('Block Category', 'taxonomy singular name', 'textdomain'),
                'search_items'      => __('Search Block Categories', 'textdomain'),
                'all_items'         => __('All Block Categories', 'textdomain'),
                'parent_item'       => __('Parent Block Category', 'textdomain'),
                'parent_item_colon' => __('Parent Block Category:', 'textdomain'),
                'edit_item'         => __('Edit Block Category', 'textdomain'),
                'update_item'       => __('Update Block Category', 'textdomain'),
                'add_new_item'      => __('Add New Block Category', 'textdomain'),
                'new_item_name'     => __('New Block Category Name', 'textdomain'),
                'menu_name'         => __('Block Category', 'textdomain'),
            );
            $args = array(
                'labels' => $labels,
                'description' => __('', 'textdomain'),
                'hierarchical' => false,
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'show_in_nav_menus' => true,
                'show_tagcloud' => true,
                'show_in_quick_edit' => true,
                'show_admin_column' => true,
                'show_in_rest' => true,
            );

            register_taxonomy('ghub_blockcat', array('ghub_blocks'), $args);

            register_meta(
                'post',
                'ep-block-screenshot',
                array(
                    'show_in_rest' => true,
                    'single'       => true,
                    'type'         => 'string',
                    'default'       => ''
                )
            );

            register_meta(
                'post',
                'ep-block-template',
                array(
                    'show_in_rest' => true,
                    'single'       => true,
                    'type'         => 'string',
                    'default'       => '{}'
                )
            );

            register_meta(
                'post',
                'ep-block-status',
                array(
                    'show_in_rest' => true,
                    'single'       => true,
                    'type'         => 'string',
                    'default'       => 'active'
                )
            );

            register_meta(
                'post',
                'ep-block-slug',
                array(
                    'show_in_rest' => true,
                    'single'       => true,
                    'type'         => 'string',
                    'default'       => ''
                )
            );

            register_meta(
                'post',
                'ep-block-source',
                array(
                    'show_in_rest' => true,
                    'single'       => true,
                    'type'         => 'string',
                    'default'       => ''
                )
            );
        });

        add_action('rest_api_init', 'create_api_posts_category_field');

        function create_api_posts_category_field()
        {

            register_rest_field(
                array(
                    'post',
                    "ghub_blocks"
                ),

                'categories',
                array(
                    'get_callback'    => 'get_post_category',
                    'schema'          => null,
                )
            );
        }

        function get_post_category($object)
        {
            //get the id of the post object array
            $post_id = $object['id'];

            $categories = get_the_terms($post_id, 'ghub_blockcat');

            if (!$categories) return [];

            return $categories;
        }
    }
}

new edpl_Blocks();
