<?php
$title = get_field('title');
$content = get_field('content');
$linkText = get_field('link_text');
$linkUrl = get_field('link_url');
$image = get_field('image');

?>

<!-- Our Story Section -->
<section class="our-story-section">
    <div class="container">
        <div class="our-story">
            <div class="story-text">
                <?php if($title): ?>
                    <h2><?php echo esc_html($title); ?></h2>
                <?php endif; ?>
                <?php if($content): ?>
                    <p><?php echo wp_kses_post($content); ?></p>
                <?php endif; ?>
                <?php if($linkText && $linkUrl): ?>
                    <a href="<?php echo esc_url($linkUrl); ?>" class=""><?php echo esc_html($linkText); ?> →</a>
                <?php endif; ?>
            </div>
            <div class="story-image" style="background-image: url('<?php echo esc_url($image); ?>')"></div>
        </div>
    </div>
</section>