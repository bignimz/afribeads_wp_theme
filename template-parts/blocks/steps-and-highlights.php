<?php 
$title = get_field('section_title');
$steps = get_field('steps');
$footerTitle = get_field('footer_section_title');
$footerLists = get_field('perfect_for_items');
?>



<div class="process">
    <div class="container">
        <div class="process-highlights-row">
            <div class="process-highlights-content">
                <?php if($title): ?>
                    <h2><?php echo esc_html($title); ?></h2>
                <?php endif; ?>

                <?php if($steps): ?>
                    <?php foreach($steps as $index => $step): ?>
                        <div class="step">
                            <span class="step-number"><?php echo esc_html($index + 1); ?></span>
                            <p><span><?php echo esc_html($step['step_title']); ?></span><br>
                            <?php echo esc_html($step['step_description']); ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            
                <?php if($footerLists): ?>
        
                    <div class="perfect-for">
                        <?php if($footerTitle): ?>
                            <h4><?php echo esc_html($footerTitle); ?></h4>
                        <?php endif; ?>

                        <ul>
                        <?php foreach($footerLists as $list):  ?>
                            <li><?php echo esc_html($list['item']) ?></li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
            <!-- Right Side: Custom Order Form -->
            <div class="form-section">
                <h2>Request a Custom Order</h2>
                <?php echo do_shortcode( ' '. the_field('order_form') .' ' ); ?>
                <!-- <form>
                    <div class="form-row">
                        <div><input type="text" placeholder="Your Name" required /></div>
                        <div><input type="email" placeholder="Email Address" required /></div>
                    </div>
                    <input type="text" placeholder="Phone Number" />
                    <textarea placeholder="Order Description" required></textarea>
                    <div class="form-row">
                        <div><input type="text" placeholder="Budget (Optional)" /></div>
                        <div><input type="date" placeholder="Deadline (Optional)" /></div>
                    </div>
                    <div class="checkbox">
                        <input type="checkbox" id="subscribe" />
                        <label for="subscribe"
                            >Subscribe to newsletter<br /><small
                            >Receive updates about new products, workshops, and exclusive offers.</small
                            ></label
                        >
                    </div>
                    <button type="submit">Submit Request</button>
                </form> -->
            </div>
        </div>
    </div>
</div>