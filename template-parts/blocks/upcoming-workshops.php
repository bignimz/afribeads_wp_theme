<?php 
$sectionTitle = get_field('section_title');
$sectionDesc = get_field('section_description');
$workshops = get_field('workshops');
$sectionLinkText =get_field('section_link_text');  
$sectionLinkUrl =get_field('section_link_url');  
?>


<!-- Workshops Section -->
<section class="workshops">
    <div class="container">
        <?php if($sectionTitle || $sectionDesc): ?>
            <div class="workshops-header">
                <?php if($sectionTitle): ?>
                    <h2 class="section-title"><?php echo esc_html($sectionTitle); ?></h2>
                <?php endif; ?>

                <?php if($sectionDesc): ?>
                    <p class="section-subtitle"><?php echo esc_html($sectionDesc); ?></p>
                <?php endif; ?>
            </div>
        <?php endif;  ?>

        <?php if($workshops): ?>
            <div class="workshops-grid">
                <?php foreach($workshops as $workshop): ?>
                    <div class="workshop-card">
                        <?php if($workshop['workshop_image']): ?>
                            <div class="workshop-image" style="background-image: url('<?php echo esc_url($workshop['workshop_image']); ?>')"></div>
                        <?php endif; ?>
                        <div class="workshop-info">
                            <?php if($workshop['workshop_title']): ?>
                                <h3><?php echo esc_html($workshop['workshop_title']); ?></h3>
                            <?php endif; ?>

                            <div class="workshop-details">
                                <?php if($workshop['date']): ?>
                                    <div class="detail-group">
                                        <div class="detail-label">Date:</div>
                                        <div class="detail-value"><?php echo esc_html($workshop['date']); ?></div>
                                    </div>
                                <?php endif; ?>

                                <?php if($workshop['duration']): ?>
                                    <div class="detail-group">
                                        <div class="detail-label">Duration:</div>
                                        <div class="detail-value"><?php echo esc_html($workshop['duration']); ?></div>
                                    </div>
                                <?php endif; ?>

                                <?php if($workshop['price']): ?>
                                    <div class="detail-group">
                                        <div class="detail-label">Price:</div>
                                        <div class="detail-value"><?php echo esc_html($workshop['price']); ?></div>
                                    </div>
                                <?php endif; ?>

                                <?php if($workshop['skill_level']): ?>
                                    <div class="detail-group">
                                        <div class="detail-label">Skill Level:</div>
                                        <div class="detail-value"><?php echo esc_html($workshop['skill_level']); ?></div>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <?php if($workshop['button_text'] && $workshop['button_link']): ?>
                                <a href="<?php echo esc_url($workshop['button_link']) ;?>">
                                    <button class="afri-btn afri-btn-primary"><?php echo esc_html($workshop['button_text']); ?></button>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if($sectionLinkText && $sectionLinkUrl): ?>
            <div class="text-center" style="text-align: center">
                <a href="<?php echo esc_url($sectionLinkUrl); ?>" class="afri-btn afri-btn-primary"><?php echo esc_html($sectionLinkText); ?></a>
            </div>
        <?php endif; ?>
    </div>
</section>