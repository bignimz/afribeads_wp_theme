<?php 
$title = get_field('title') ? get_field('title') : 'Authentic African Beadwork';
$desc = get_field('description') ? get_field('description') : 'Celebrating tradition, creativity, and culture through timeless craftsmanship.';
$buttons = get_field('cta_buttons');
$default_btn_text = 'Explore Collection';
$default_btn_link = '#';

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

<!-- Hero Section -->
<section class="hero">
  <div class="hero-content">
    <h1><?php echo esc_html($title); ?></h1>
    <p><?php echo esc_html($desc); ?></p>
    
    <?php if($buttons && count($buttons) > 0): ?>
      <div class="buttons">
        <?php foreach($buttons as $button): 
          $btnText = $button['button_text'];
          $btnLink = $button['button_link'];
          $btnClass = $button['button_class'] ? $button['button_class'] : 'btn';
        ?>
          <a href="<?php echo esc_url($btnLink); ?>" class="<?php echo esc_attr($btnClass); ?>">
            <?php echo esc_html($btnText); ?>
          </a>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <!-- Default button if no custom buttons are set -->
      <a href="<?php echo esc_url($default_btn_link); ?>" class="btn">
        <?php echo esc_html($default_btn_text); ?>
      </a>
    <?php endif; ?>
  </div>
</section>