<?php
    $settings = $sceneSettings->shortcode->audio;
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

<div  class="bb-vcvs-element-shortcode bb-audio <?php echo esc_html($classScroll.' '.$settings->classCSS)?>">
    <audio <?php echo esc_attr($attrs)?> >
        <source src="<?php echo esc_url($settings->audio)?>" type="audio/ogg">
        <source src="<?php echo esc_url($settings->audio)?>" type="audio/mpeg">
        <source src="<?php echo esc_url($settings->audio)?>" type="audio/wav">
        Your browser does not support the audio element.
    </audio>
</div>