<?php
    $settings = $sceneSettings->shortcode->sequence;
    if (empty($settings->images) ) {
       return;
    }
    $attr = '';
    if(!empty($settings->URL)){
        $attr .= 'href=' . $settings->URL .' ';
    }
    if(!empty($settings->target)){
        $attr .= 'target=' . $settings->target .' ';
    }
?>
<div  class="bb-vcvs-element-shortcode bb-sequence <?php echo esc_html($classScroll.' '.$settings->classCSS)?>">
    <div class="bbsm-imagesequence" data-bbsm-imagesequence='["<?php echo esc_html(implode('","',$settings->images))?>"]'>
        <a <?php echo esc_attr($attr) ?> >
            <img src="<?php echo esc_html($settings->images[0])?>" alt="<?php echo esc_html( $settings->alt ) ?>">
        </a>
    </div>
</div>