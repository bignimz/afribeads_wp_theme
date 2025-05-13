<?php 
$heading = get_field('heading');
$subHeading = get_field('subheading');
$members = get_field('members');

?>


<!-- Team Section -->
<section id="team" class="team-section">
    <div class="container team-container">
        <?php if($heading): ?>
            <h2 class="section-title centered-title"><?php echo esc_html($heading); ?></h2>
        <?php endif; ?>

        <?php if($subHeading): ?>
            <p><?php echo esc_html($subHeading); ?></p>
        <?php endif; ?>
        
        <?php if($members): ?>
            <div class="team-members">
                <?php foreach($members as $member): ?>
                    <?php 
                    $memberImage = $member['image'];    
                    $memberTitle = $member['title'];    
                    $memberName = $member['name'];    
                    $memberDesc = $member['description'];    
                    ?>
                    <div class="team-member">
                        <?php if($memberImage): ?>
                            <img src="<?php echo esc_html($memberImage['url']); ?>" alt="<?php echo esc_html($memberImage['alt']); ?>" class="member-img">
                        <?php endif; ?>

                        <?php if($memberName): ?>
                            <h3 class="member-name"><?php echo esc_html($memberName); ?></h3>
                        <?php endif; ?>

                        <?php if($memberTitle): ?>
                            <p class="member-title"><?php echo esc_html($memberTitle); ?></p>
                        <?php endif; ?>

                        <?php if($memberDesc): ?>
                            <p><?php echo esc_html($memberDesc); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>