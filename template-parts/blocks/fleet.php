<?php
$heading = get_field('section_title');
$desc = get_field('section_subtitle');
$fleet_tabs = get_field('fleet_tabs');
?>

<!-- Fleet Section -->
<section class="fleet" id="fleet">
    <div class="container">
        <?php if ($heading || $desc): ?>
            <div class="section-header">
                <?php if ($heading): ?>
                    <h2><?php echo esc_html($heading); ?></h2>
                <?php endif; ?>
                <?php if ($desc): ?>
                    <p><?php echo esc_html($desc); ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($fleet_tabs) && is_array($fleet_tabs)): ?>
            <div class="fleet-tabs">
                <?php foreach ($fleet_tabs as $index => $tab): ?>
                    <button class="tab-btn<?php echo $index === 0 ? ' active' : ''; ?>" data-target="fleet-tab-<?php echo $index; ?>">
                        <?php echo esc_html($tab['tab_title']); ?>
                    </button>
                <?php endforeach; ?>
            </div>

            <?php foreach ($fleet_tabs as $index => $tab): ?>
                <div class="tab-content<?php echo $index === 0 ? ' active' : ''; ?>" id="fleet-tab-<?php echo $index; ?>">
                    <div class="fleet-grid">
                        <?php foreach ($tab['tab_items'] as $item): ?>
                            <div class="fleet-item">
                                <div class="fleet-image">
                                    <img
                                        src="<?php echo esc_url($item['image']['url']); ?>"
                                        alt="<?php echo esc_attr($item['image']['alt']); ?>"
                                    />
                                </div>
                                <div class="fleet-details">
                                    <h4><?php echo esc_html($item['title']); ?></h4>
                                    <p><?php echo esc_html($item['description']); ?></p>
                                    <div class="fleet-meta">
                                        <span><?php echo esc_html($item['seats']); ?></span>
                                        <span><?php echo esc_html($item['price']); ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>
