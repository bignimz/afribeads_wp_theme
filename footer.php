<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package afribeads
 */

?>

		<footer id="colophon" class="site-footer">
			<div class="container">
				<div class="footer-content">
					<?php
					// Column One
					$footerOne = get_field('footer_column_one', 'option');
					$aboutTitle = $footerOne['about_title'] ?? '';
					$aboutText = $footerOne['about_text'] ?? '';
					$socialLinks = $footerOne['social_links'] ?? [];

					// Column Two
					$footerTwo = get_field('footer_column_two', 'option');
					$servicesTitle = $footerTwo['column_two_title'] ?? '';
					$services = $footerTwo['services'] ?? [];

					// Column Three
					$footerThree = get_field('footer_column_three', 'option');
					$contactTitle = $footerThree['footer_three_title'] ?? '';
					$address1 = $footerThree['address_line_1'] ?? '';
					$address2 = $footerThree['address_line_2'] ?? '';
					$phone = $footerThree['phone'] ?? '';
					$email = $footerThree['email'] ?? '';
					$availability = $footerThree['availability'] ?? '';

					// Footer bottom
					$copyright = get_field('copyright_text', 'option');
					?>

					<!-- Column 1: About -->
					<div class="footer-col">
						<?php if ($aboutTitle): ?>
							<h4 class="footer-logo"><?php echo esc_html($aboutTitle); ?></h4>
						<?php endif; ?>

						<?php if ($aboutText): ?>
							<p class="footer-about"><?php echo esc_html($aboutText); ?></p>
						<?php endif; ?>

						<?php if (!empty($socialLinks)): ?>
							<div class="social-links">
								<?php foreach ($socialLinks as $social): ?>
									<a class="social-icon" href="<?php echo esc_url($social['link_url']); ?>" target="_blank">
										<i class="<?php echo esc_attr($social['icon_class']); ?>"></i>
									</a>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					</div>

					<!-- Column 2: Services -->
					<div class="footer-links">
						<?php if ($servicesTitle): ?>
							<h3><?php echo esc_html($servicesTitle); ?></h3>
						<?php endif; ?>

						<?php if (!empty($services)): ?>
							<ul>
								<?php foreach ($services as $service): ?>
									<li>
										<a href="<?php echo esc_url($service['service_link']); ?>">
											<?php echo esc_html($service['service_name']); ?>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</div>

					<!-- Column 3: Contact -->
					<div class="footer-links">
						<?php if ($contactTitle): ?>
							<h3><?php echo esc_html($contactTitle); ?></h3>
						<?php endif; ?>

						<ul>
							<?php if ($address1): ?><li><?php echo esc_html($address1); ?></li><?php endif; ?>
							<?php if ($address2): ?><li><?php echo esc_html($address2); ?></li><?php endif; ?>
							<?php if ($phone): ?><li>Phone: <?php echo esc_html($phone); ?></li><?php endif; ?>
							<?php if ($email): ?>
								<li>Email: <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></li>
							<?php endif; ?>
							<?php if ($availability): ?><li><?php echo esc_html($availability); ?></li><?php endif; ?>
						</ul>
					</div>
				</div>

				<!-- Footer bottom -->
				<div class="footer-bottom">
					<p class="copyright">&copy; <?php echo date("Y"); ?> <?php echo esc_html($copyright); ?></p>
				</div>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->

		<!-- <a href="#" class="back-to-top">↑</a> -->
	</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
