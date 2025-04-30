<?php
$heading = get_field('section_heading');
$desc = get_field('section_description');
$services = get_field('services');;

?>

<!-- Services Section -->
<section class="services" id="services">
    <div class="container">
        <?php if($heading || $desc): ?>
            <div class="section-header">
                <?php if($heading); ?>
                    <h2><?php echo esc_html($heading); ?></h2>
                <?php endif; ?>
                <?php if($desc): ?>
                    <p><?php echo esc_html($desc); ?></p>
                <?php endif; ?>
            </div>
        <?php if($services): ?>
            <div class="service-cards">
                <?php foreach($services as $service): ?>
                    <?php 
                    $image = $service['service_image'];    
                    $title = $service['service_title'];    
                    $description = $service['service_description'];    
                    $linkText = $service['link_text'];    
                    $link = $service['link_url'];    
                        
                    ?>
                    <div class="service-card">
                        <img
                            src="<?php echo esc_url($image['url']) ?>"
                            alt="<?php echo esc_attr($image['alt']) ?>"
                        />
                        <?php if($title || $description): ?>
                            <div class="service-content">
                                <?php if($title): ?>
                                    <h3><?php echo esc_html($title); ?></h3>
                                <?php endif; ?>
                                <?php if($description): ?>
                                    <p><?php echo esc_html($description); ?></p>
                                <?php endif; ?>

                                <?php if($linkText): ?>
                                    <a href="<?php echo esc_url($link); ?>" class="btn"><?php echo esc_html($linkText); ?></a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

