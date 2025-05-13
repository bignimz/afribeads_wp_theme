<?php 
$heading = get_field('section_heading');
$description = get_field('section_content');
$processes = get_field('processes');
?>


<!-- Process Section -->
<section id="process" class="process-section">
    <div class="container process-container">
        <?php if($heading || $description): ?>
            <div class="process-header">
                <?php if($heading): ?>
                    <h2 class="section-title"><?php echo esc_html($heading); ?></h2>
                <?php endif; ?>
        
                <?php if($description): ?>
                    <p><?php echo esc_html($description); ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        
        <?php if($processes): ?>
            <div class="process-steps">
                <?php foreach($processes as $index => $process): ?>
                    <?php 
                        $image = $process['image'];
                        $title = $process['title'];
                        $content = $process['content']; 
                        $counter = $index + 1;   
                    ?>
                    <div class="process-step">
                        <?php if($image): ?>
                            <div class="step-img">
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                            </div>
                        <?php endif; ?>

                        <?php if($title || $content): ?>
                            <div class="step-content">
                                <?php if($title): ?>
                                    <h3><span class="step-number"><?php echo esc_html($counter); ?>.</span> <?php echo esc_html($title); ?></h3>
                                <?php endif; ?>

                                <?php if($content): ?>
                                    <p><?php echo esc_html($content); ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
                
            </div>
        <?php endif; ?>
    </div>
</section>