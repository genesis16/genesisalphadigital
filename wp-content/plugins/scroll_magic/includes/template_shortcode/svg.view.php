<?php
    $settings = $sceneSettings->shortcode->svg;
?>
<div  class="bb-vcvs-element-shortcode bb-svg <?php echo esc_html($classScroll.' '.$settings->classCSS)?>">
    <?php  echo file_get_contents( $settings->svg ) ?>
</div>