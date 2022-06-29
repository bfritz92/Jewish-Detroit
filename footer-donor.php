<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

	<footer class="row expanded">
      <div class="row expanded">
        <div class="large-4 medium-4 small-6 large-centered medium-centered small-centered columns logo"> 
          <img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/FoundationPress/assets/images/jfmd-logo.svg" />
        </div>
      </div>      
		<?php do_action( 'foundationpress_before_footer' ); ?>
		<?php // dynamic_sidebar( 'footer-widgets' ); ?>
		<?php do_action( 'foundationpress_after_footer' ); ?>
        	 <div class="copyright">	 &copy;<?php echo date("Y"); echo " "; ?>

            <?php bloginfo('name'); ?>, 

			
			6735 Telegraph Road, 

				Bloomfield Hills, 

				MI

				48301, 
			
888-902-4673<br /><a href="<?php bloginfo('siteurl'); ?>/privacy-policy/">Privacy Policy</a> | <a href="<?php bloginfo('siteurl'); ?>/code-of-ethics/">Ethics Policy</a> | <a href="<?php bloginfo('siteurl'); ?>/annual-reports-and-financial-statements/">Audited Financial Statements and Form 990 Reporting</a></div>
    </footer>
				
	
		<?php do_action( 'foundationpress_layout_end' ); ?>

		</div><!-- Close off-canvas wrapper inner -->
	</div><!-- Close off-canvas wrapper -->
</div><!-- Close off-canvas content wrapper -->



<?php wp_footer(); ?>
<?php do_action( 'foundationpress_before_closing_body' ); ?>
<script type="text/javascript" src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/FoundationPress/assets/javascript/app.js"></script>
</body>
</html>
