<?php
$headline = get_field('headline');
$desc = get_field('description');
$form_shortcode = get_field('form_shortcode');
?>

<section class="cta" id="contact">
  <div class="container">
    <div class="cta-content">
      <?php if ($headline): ?>
        <h2><?php echo esc_html($headline); ?></h2>
      <?php endif; ?>
      <?php if ($desc): ?>
        <p><?php echo esc_html($desc); ?></p>
      <?php endif; ?>

      <?php if ($form_shortcode): ?>
        <div class="cta-form">
          <?php echo do_shortcode($form_shortcode); ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>
