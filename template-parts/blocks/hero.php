<?php
$title = get_field('title');
$desc = get_field('description');
$buttons = get_field('cta_buttons');
?>

<!-- Background Slider (hidden behind hero) -->
<?php if(have_rows('hero_slides')): ?>
  <div class="bg-slider owl-carousel">
    <?php while(have_rows('hero_slides')): the_row(); 
      $bg = get_sub_field('hero_background');
    ?>
      <div class="bg-slide" style="background-image: url('<?php echo esc_url($bg['url']); ?>');"></div>
    <?php endwhile; ?>
  </div>
<?php endif; ?>

<!-- Hero Section with Static Content -->
<section class="hero">
  <div class="container">
    <?php if($title): ?>
      <div class="hero-content">
        <h1><?php echo esc_html($title); ?></h1>
        <?php if($desc): ?>
          <p><?php echo esc_html($desc); ?></p>
        <?php endif; ?>
        <?php if($buttons): ?>
          <div class="hero-btns">
            <?php foreach($buttons as $button): 
              $btnText = $button['button_text'];
              $btnLink = $button['button_link'];
              $btnClass = $button['button_class'];
            ?>
              <a href="<?php echo esc_url($btnLink); ?>" class="btn <?php echo esc_attr($btnClass); ?>">
                <?php echo esc_html($btnText); ?>
              </a>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </div>
</section>
