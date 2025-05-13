<?php 
$sectionTitle = get_field('section_title');
$sectionDesc = get_field('section_description');
$products = get_field('featured_products');
$moreBtnText =get_field('more_button_text');
$moreBtnLink = get_field('more_button_link');  
?>



    <section class="featured-products">
        <?php if($sectionTitle): ?>
            <h2 class="section-title"><?php echo esc_html($sectionTitle); ?></h2>
        <?php endif; ?>

        <?php if($sectionDesc): ?>
            <p><?php echo esc_html($sectionDesc); ?></p>
        <?php endif; ?>
        
        <?php if($products): ?>
            <div class="product-grid">
                <?php foreach($products as $product): ?>
                    <?php 
                    $image = $product['image'];
                    $productTitle = $product['product_title'];
                    $excerpt = $product['product_excerpt'];
                    $price = $product['price'];
                    $linkText = $product['link_text'];
                    $linkUrl = $product['link_url'];   
                    ?>
                    <div class="product-card">
                        <?php if($image): ?>
                            <img
                                src="<?php echo esc_url($image['url']); ?>"
                                alt="<?php echo esc_attr($image['alt']); ?>"
                            />
                        <?php endif; ?>

                        <div class="product-info">
                            <?php if($productTitle): ?>
                                <h3><?php echo esc_html($productTitle); ?></h3>
                            <?php endif; ?>

                            <?php if($excerpt): ?>
                                <p><?php echo esc_html($excerpt); ?></p>
                            <?php endif; ?>

                            <?php if($linkText && $linkUrl): ?>
                                <div class="price-link">
                                    <span class="price"><?php echo esc_html($price); ?></span>
                                    <a href="<?php echo esc_url($linkUrl); ?>"><?php echo esc_html($linkText); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <a href="<?php echo esc_url($moreBtnLink); ?>" class="afri-btn afri-btn-outline"><?php echo esc_html($moreBtnText); ?></a>
    </section>