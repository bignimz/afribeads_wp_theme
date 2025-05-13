<?php 
$heading = get_field('title');
$desc = get_field('description');
$pillars = get_field('mission_pillars');

?>

 <section id="mission" class="missions">
    <div class="container mission-container">
        <?php if($heading): ?>
            <h2 class="section-title centered-title"><?php echo esc_html($heading); ?></h2>
        <?php endif; ?>

        <?php  if($desc): ?>
            <p><?php echo wp_kses_post($desc); ?></p>
        <?php endif; ?>
        
        <?php if($pillars): ?>
            <div class="mission-pillars">
                <?php foreach($pillars as $pillar): ?>
                    <?php 
                    $number = $pillar['pillar_number'];    
                    $pillarTitle = $pillar['pillar_title'];
                    $pillarContent = $pillar['pillar_content']
                    ?>
                    <div class="pillar">
                        <?php if($number): ?>
                            <div class="pillar-number"><?php echo esc_html($number); ?></div>
                        <?php endif; ?>

                        <?php if($pillarTitle): ?>
                            <h3><?php echo esc_html($pillarTitle); ?></h3>
                        <?php endif; ?>

                        <?php if($pillarContent): ?>
                            <p><?php echo esc_html($pillarContent); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>