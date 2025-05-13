<?php 
$title = get_field('cta_title');
$desc = get_field('cta_description');
$linkText = get_field('link_text');
$linkUrl = get_field('link_url');
$bgImage = get_field('background_image');
$bgColor = get_field('background_color');


$inlineStyle = "";

if(!empty($bgColor)) {
    $inlineStyle = "background-color: " . esc_attr($bgColor) . "; background-image: none !important;";
} 

elseif(!empty($bgImage)) {
    $inlineStyle = "background-image: url('" . esc_url($bgImage) . "');";
}
?>

<!-- Pattern Banner -->
<section class="pattern-banner" style="<?php echo $inlineStyle; ?>">
    <div class="container">
        <?php if($title): ?>
            <h2><?php echo esc_html($title); ?></h2>
        <?php endif; ?>

        <?php if($desc): ?>
            <p><?php echo esc_html($desc); ?></p>
        <?php endif; ?>

        <?php if($linkText): ?>
            <a href="<?php echo esc_url($linkUrl); ?>" class="afri-btn afri-btn-primary"><?php echo esc_html($linkText); ?></a>
        <?php endif; ?>
    </div>
</section>