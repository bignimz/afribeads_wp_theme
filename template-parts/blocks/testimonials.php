<?php
$heading = get_field('section_title') ?: 'Client Experiences';
$subheading = get_field('section_subtitle') ?: 'What our distinguished clients have to say';
$bgImage = get_field('background_image');
$testimonials = get_field('testimonials');
?>

<section class="testimonials" id="testimonials" style="background-image: url('<?php echo esc_url($bgImage); ?>')">
    <div class="container">
        <div class="section-header">
            <h2><?php echo esc_html($heading); ?></h2>
            <p><?php echo esc_html($subheading); ?></p>
        </div>

        <?php if ($testimonials): ?>
            <div class="owl-carousel testimonial-slider">
                <?php foreach ($testimonials as $testimonial): ?>
                    <div class="testimonial">
                        <div class="testimonial-text">
                            "<?php echo esc_html($testimonial['testimonial_text']); ?>"
                        </div>
                        <div class="testimonial-author"><?php echo esc_html($testimonial['author_name']); ?></div>
                        <div class="testimonial-company"><?php echo esc_html($testimonial['author_title']); ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
