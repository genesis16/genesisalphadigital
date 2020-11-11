<?php
    $settings = $sceneSettings->shortcode->button;
    $attr ="";
    $id = uniqid('bb-');

    if(!empty($settings->URL)){
        $attr .= 'href=' . $settings->URL .' ';
    }
    if(!empty($settings->target)){
        $attr .= 'target=' . $settings->target .' ';
    }
    $css = '';
    if(!empty($settings->fontSize)){
        $css .= 'font-size:' . $settings->fontSize .';';
    }
    if(!empty($settings->fontFamily)){
        $css .= 'font-family:' . $settings->fontFamily .';';
    }elseif(!empty($settings->cstFontFamily)) {
        $css .= "font-family:".$settings->cstFontFamily.";";
    }

    if(!empty($settings->fontWeight)){
        $css .= 'font-weight:' . $settings->fontWeight .';';
    }
    if(!empty($settings->fontStyle)){
        $css .= 'font-style:' . $settings->fontStyle .';';
    }
    if(!empty($settings->textTransform)){
        $css .= 'text-transform:' . $settings->textTransform .';';
    }
    if(!empty($settings->letterSpacing)){
        $css .= 'letter-spacing:' . $settings->letterSpacing .';';
    }
    if(!empty($settings->lineHeight)){
        $css .= 'line-height:' . $settings->lineHeight .';';
    }
    if(!empty($settings->textDecoration)){
        $css .= 'text-decoration:' . $settings->textDecoration .';';
    }

?>

<div id="<?php echo esc_html($id ) ?>"class="bb-vcvs-element-shortcode bb-button <?php echo esc_html($classScroll.' '.$settings->classCSS)?>">
    <style type="text/css">
        #<?php echo esc_html($id) ?> span{
            <?php echo esc_html($css) ?>
        }
        #<?php echo esc_html($id) ?> i{
            font-size: <?php echo esc_html( $settings->iconFontSize)?>;
        }
    </style>

    <?php if(!empty($settings->fontFamily)): ?>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=<?php echo esc_html($settings->fontFamily)?>">
    <?php endif; ?>

    <a <?php echo esc_attr( $attr ) ?> >
        <i class="<?php echo esc_html($settings->iconButton); ?>"></i>
        <span><?php esc_html_e($settings->title); ?></span>
    </a>
</div>