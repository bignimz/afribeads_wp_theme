<?php 
    $sectionTitle = get_field('section_title');
    $contacts = get_field('contacts');
    $form = get_field('contact_form_shortcode');
?>


<section class="contact-section">
    <div class="container">
        <div class="contact-information-wrapper">
            <?php if($sectionTitle): ?>
                <div class="contact-information">
                    <h2 class="contact-title"><?php echo esc_html($sectionTitle); ?></h2>

                    <?php if($contacts): ?>
                        <?php foreach($contacts as $contact): ?>
                            <?php 
                             $icon = $contact['contact_icon'];
                             $groupTitle = $contact['group_title'];
                             $fields = $contact['group_fields'];
                               
                            ?>
                            <div class="contact-group">
                                <?php if($icon): ?>
                                    <span class="contact-icon"><i class="<?php echo esc_html($icon); ?>"></i></span>
                                <?php endif; ?>
                                <div class="contact-details">
                                    <h3><?php echo esc_html($groupTitle) ?></h3>
                                    <?php if($fields): ?>
                                        <?php foreach($fields as $field):  ?>
                                            <p><?php echo esc_html($field['contact_field']); ?></p>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>
            <?php endif; ?>
            <?php if($form): ?>
                <div class="contact-form-section">
                    <h3>Send Us a Message</h3>
                    <?php echo do_shortcode( ' '. the_field('contact_form_shortcode') .' ' ); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>