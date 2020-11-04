<?php
	global $post;
	$id 							=  $post->ID;
	$external_url_btn_text 			= wpb_fp_get_option( 'wpb_fp_view_portfolio_btn_text_', 'wpb_fp_advanced', 'View Portfolio' );
	$view_portfolio_btn_target 		= wpb_fp_get_option( 'wpb_fp_view_portfolio_btn_target', 'wpb_quickview_settings', 'new' );

	$btn_target = '';
	if( $view_portfolio_btn_target && $view_portfolio_btn_target == 'new' ){
		$btn_target = 'target="_blank"';
	}

	$quickview_content_type 		= get_post_meta( $id, 'wpb_fp_quickview_content_type', true );
	$video_iframe 					= get_post_meta( $id, 'wpb_fp_quickview_video_iframe', true );
	$feature_image 					= apply_filters( 'wpb_fp_quickview_feature_image', get_the_post_thumbnail( $id, 'full' ), $id );
	$images 						= get_post_meta( $id, 'wpb_fp_gallery', true );
	$gallery_feature_image 			= wpb_fp_get_option( 'wpb_fp_gallery_feature_image', 'wpb_fp_gallery', 'on' );

	if( $quickview_content_type && $quickview_content_type == 'video'){
		$quickview_content = $video_iframe;
	}else{
		$quickview_content = $feature_image;
	}
	$quickview_layout 				= wpb_fp_get_option( 'wpb_fp_quickview_layout', 'wpb_quickview_settings', 'left_right' );
	$quickview_content_settings	    = wpb_fp_get_option( 'wpb_fp_quickview_content', 'wpb_quickview_settings', array('image' => 'image', 'content' => 'content', 'title' => 'title', 'info' => 'info', 'button' => 'button'));
	$details_btn_type 				= wpb_fp_get_option( 'wpb_fp_details_btn_type', 'wpb_quickview_settings', 'external_link' );
	$qv_content_type 				= wpb_fp_get_option( 'wpb_fp_qv_content_type', 'wpb_quickview_settings', 'full_content' );
	$wpb_fp_portfolio_ex_link 		= get_post_meta( $id, 'wpb_fp_portfolio_ex_link', true );
	$short_description 				= get_post_meta( $id, 'wpb_fp_portfolio_short_description', true );

	if( $details_btn_type == 'external_link' && $wpb_fp_portfolio_ex_link ){
		$wpb_fp_details_link = $wpb_fp_portfolio_ex_link;
	}else{
		$wpb_fp_details_link = get_the_permalink( $id  );
	}
?> 

<div class="wpb_fp_quick_view_area wpb_fp_quick_view_<?php echo esc_attr( $quickview_layout ); ?>">
	<div class="wpb_fp_row">
		<?php if(array_key_exists('image', $quickview_content_settings)): ?>
			<div class="wpb_fp_quick_view_img <?php echo esc_attr( $images ? 'wpb_fp_has_gallery' : 'wpb_fp_no_gallery' );?> <?php echo ( $gallery_feature_image == 'on' ? 'wpb_fp_gallery_has_feature_image' : 'wpb_fp_gallery_disable_feature_image' );?> <?php echo esc_attr(apply_filters( 'wpb_fp_quick_view_img_column', 'col-lg-6' )); ?> col-sm-12">
				<?php echo $quickview_content; ?>
			</div>
		<?php endif; ?>
		<?php if( array_key_exists('title', $quickview_content_settings) || array_key_exists('content', $quickview_content_settings) || array_key_exists('button', $quickview_content_settings) ): ?>
			<div class="wpb_fp_quick_view_content <?php echo esc_attr(apply_filters( 'wpb_fp_quick_view_content_column', 'col-lg-6' )); ?> col-sm-12">

				<?php do_action( 'wpb_fp_before_quick_view_content' ); ?>

				<?php if(array_key_exists('title', $quickview_content_settings)): ?>
					<h2><?php echo esc_html( get_the_title( $id ) ); ?></h2>
				<?php endif; ?>

				<?php do_action( 'wpb_fp_after_qv_title', $id ); ?>

				<?php wpb_fp_portfolio_informations( $id ); ?>

				<?php do_action( 'wpb_fp_after_qv_informations', $id ); ?>

				<?php
					if(class_exists('WPBMap') && method_exists('WPBMap', 'addAllMappedShortcodes')) { // 1.17c. FIxes issues with ajax hopefully.
						WPBMap::addAllMappedShortcodes(); // this is needed to ensure wc shortocdes come out right.
					}
					$content_post 	= get_post($id);
					$content 		= $content_post->post_content;
					$content 		= apply_filters( 'the_content', $content );
					$content 		= str_replace(']]>', ']]&gt;', $content);
					$content 		= apply_filters( 'the_content', $content );

					if( array_key_exists('content', $quickview_content_settings) ){
						if( $qv_content_type == 'full_content' ){
							echo sprintf('<div class="entry-content">%s</div>',  $content );
						}else{
							echo sprintf('<div class="entry-content">%s</div>',  wpautop( $short_description ) );
						}
					}
					
					if( array_key_exists('button', $quickview_content_settings) ) {
						echo '<a class="wpb_fp_btn" '.$btn_target.' href="'. apply_filters( 'wpb_fp_view_details_btn_url', esc_url( $wpb_fp_details_link ) ) .'">'. apply_filters( 'wpb_fp_view_details_btn_text', esc_html( $external_url_btn_text ) ) .'</a>';
					}

					do_action( 'wpb_fp_after_quick_view_content' );
				?>
			</div>
		<?php endif; ?>
	</div>
</div>