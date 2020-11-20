<?php



class edpl_Information
{
    public static function emit()
    {

        wp_localize_script(
            'editor_plus-plugin-script',
            'editor_plus',
            array(

                'blocks' => json_decode(get_option('editor_plus_blocks'), JSON_PRETTY_PRINT)

            )
        );
    }
}
