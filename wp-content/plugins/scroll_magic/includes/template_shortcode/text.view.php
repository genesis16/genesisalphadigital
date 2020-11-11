<?php
    $settings = $sceneSettings->shortcode->text;
    $css = '';
    $href = '';
    $id = uniqid('bb-');
    if(!empty($settings->fontSize)){
        $css .= 'font-size:' . $settings->fontSize .';';
    }
    if(!empty($settings->fontWeight)){
        $css .= 'font-weight:' . $settings->fontWeight .';';
    }
    if(!empty($settings->fontStyle)){
        $css .= 'font-style:' . $settings->fontStyle .';';
    }
    if(!empty($settings->textAlign)){
        $css .= 'text-align:' . $settings->textAlign .';';
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

    $attr = '';
    if(!empty($settings->URL)){
        $attr .= 'href=' . $settings->URL .' ';
    }
    if(!empty($settings->target)){
        $attr .= 'target=' . $settings->target .' ';
    }

    if(!empty($settings->cstFontFamily)) {
        $css .= "font-family:".$settings->cstFontFamily.";";
    }elseif(!empty($settings->fontFamily)){
        $css .= "font-family:".$settings->fontFamily.";";
        $href = 'https://fonts.googleapis.com/css?family='.$settings->fontFamily;

        $local_fonts = explode('|', 'Arial|Helvetica Neue|Courier New|Times New Roman|Comic Sans MS|Impact');
		if (in_array( $settings->fontFamily, $local_fonts)) {
            $settings->fontFamily = '';
            echo 'hello';
		}
    } 

?>
<div id="<?php echo esc_html($id) ?>" class="bb-vcvs-element-shortcode bb-text <?php echo esc_html($classScroll.' '.$settings->classCSS)?>">
    <style type="text/css">
        #<?php echo esc_html($id) ?> p{
            <?php echo esc_html($css) ?>
        }
    </style>
    <?php if(empty($settings->cstFontFamily) && !empty($settings->fontFamily)): ?>
        <link rel="stylesheet" href="<?php echo esc_html( $href) ?>">
    <?php endif; ?>

    <?php if(!empty($settings->URL)): ?>
        <a <?php echo esc_attr($attr) ?> >
    <?php endif; ?>    
            <p><?php esc_html_e($settings->content); ?></p>
    <?php if(!empty($settings->URL)): ?>
        </a>
    <?php endif; ?> 
</div>