<?php
    $settings = $sceneSettings->shortcode->video;
    $attrs = '';
    if ($settings->controls!='false') {
        $attrs .= 'controls=controls ';
    }
    if ($settings->autoplay!='false') {
        $attrs .= 'autoplay=autoplay ';
    }
    if ($settings->loop!='false') {
        $attrs .= 'loop=loop ';
    }
    if ($settings->muted!='false') {
        $attrs .= 'muted=muted ';
    }
?>

<div  class="bb-vcvs-element-shortcode bb-video <?php echo esc_html($classScroll.' '.$settings->classCSS)?>">
    <video <?php echo esc_attr($attrs)?> >
        <source src="<?php echo esc_url($settings->video)?>" type="video/mp4">
        <source src="<?php echo esc_url($settings->video)?>" type="video/ogg">
        <source src="<?php echo esc_url($settings->video)?>" type="video/webm">
        Your browser does not support HTML5 video.
    </video>
</div>