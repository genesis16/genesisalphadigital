<?php
    $settings = $sceneSettings->shortcode->img;
    $attr = '';
    if(!empty($settings->URL)){
        $attr .= 'href=' . $settings->URL .' ';
    }
    if(!empty($settings->target)){
        $attr .= 'target=' . $settings->target .' ';
    }
?>
<div  class="bb-vcvs-element-shortcode bb-img <?php echo esc_html($classScroll.' '.$settings->classCSS)?>">
    <a <?php echo esc_attr($attr) ?> >
        <img src="<?php echo esc_html($settings->image)?>" alt="<?php echo esc_html( $settings->alt ) ?>">
    </a>
</div>