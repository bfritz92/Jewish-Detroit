<?php
	/* Template Name: Campaign Donometer */
	/*$url1=$_SERVER['REQUEST_URI'];
	header("Refresh: 60; URL=$url1");*/
	get_header(); 
	global $wpdb;
	$updated_donototal = $wpdb->get_var( "SELECT meta_value FROM ".$wpdb->prefix."gf_entry_meta WHERE form_id = 967 AND meta_key = 1 ORDER BY entry_id DESC LIMIT 1;" );	
	$gf_goal = 3000;
?>

<style>
#content {
    width:300px;
    margin:30px auto;
}

#thermometer {
    width:70px;
    height:800px;
    position: relative;
    
}

#thermometer .track {
    height:780px;
    top:10px;
    width:40px;
 
}

#thermometer .progress {
    height:0%;
    width:100%;
    position: absolute;
    bottom:0;
    left:0;
}

#thermometer .progress img {
    max-width: 300px;
    position: absolute;
    margin-left: -82px;
    margin-top: -65px;
    z-index: 1000;
    width: 200px;
}

	
#thermometer .goal {
    position:absolute;
    top:0;
}

#thermometer .stop1 {
    position:absolute;
    top:100%;
}

#thermometer .stop2 {
    position:absolute;
    top:75%;
}

#thermometer .stop3 {
    position:absolute;
    top:50%;
}

#thermometer .stop4 {
    position:absolute;
    top:25%;
}

#thermometer .amount {
    display: inline-block;
    padding:0 5px 0 100px;
    border-top:3px solid #fff;
    font-weight: bold;
}

#thermometer .progress .amount {
    padding:0 100px 0 5px;
    position: absolute;
    border-top:3px solid #fff;
    right:0;
}

</style>
<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<div id="content">
				<div id="thermometer">
					<div class="track">
						<div class="goal">
							<h2 class="amount gold"><?php echo $gf_goal; ?></h2>
						</div>
						<div class="progress"><img src="https://jfmdorg.s3.us-west-2.amazonaws.com/wp-content/uploads/2021/11/02093404/carousel-horse-cutout.png" height="150px" style="">
							<h3 class="amount"><span style="display:none;"><?php echo $updated_donototal; ?></span></h3>
						</div>
						<div class="stop1">
							<h4 class="amount">$0 </h4>
						</div>
						<div class="stop2">
							<h4 class="amount">$750 </h4>
						</div>
						<div class="stop3">
							<h4 class="amount">$1,500 </h4>
						</div>
						<div class="stop4">
							<h4 class="amount">$2,250 </h4>
						</div>
					</div>
				</div>
			</div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
	<script>
		function formatCurrency(nStr)
{
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
}

		/**
		 * Thermometer Progress meter.
		 * This function will update the progress element in the "thermometer"
		 * to the updated percentage.
		 * If no parameters are passed in it will read them from the DOM
		 *
		 * @param {Number} goalAmount The Goal amount, this represents the 100% mark
		 * @param {Number} progressAmount The progress amount is the current amount
		 * @param {Boolean} animate Whether to animate the height or not
		 *
		 */
		function thermometer(goalAmount, progressAmount, animate) {
			"use strict";

			var $thermo = $("#thermometer"),
				$progress = $(".progress", $thermo),
				$goal = $(".goal", $thermo),
				percentageAmount;

			goalAmount = goalAmount || parseFloat( $goal.text() ),
			progressAmount = progressAmount || parseFloat( $progress.text() ),
			percentageAmount =  Math.min( Math.round(progressAmount / goalAmount * 1000) / 10, 100); //make sure we have 1 decimal point

			//let's format the numbers and put them back in the DOM
			//show currency with decimal places
			$goal.find(".amount").text( "$" + formatCurrency( goalAmount ) );
			$progress.find(".amount").text( "$" + formatCurrency( progressAmount ) );
			//show currency without decimnal places
			//$goal.find(".amount").text( "$" + ( goalAmount ) );
			//$progress.find(".amount").text( "$" + ( progressAmount ) );
			//show not as curency
			//$goal.find(".amount").text( goalAmount  );
			//$progress.find(".amount").text( progressAmount  );


			//let's set the progress indicator
			$progress.find(".amount").hide();
			if (animate !== false) {
				$progress.animate({
					"height": percentageAmount + "%"
				}, 1200, function(){
					$(this).find(".amount").fadeIn(500);
				});
			}
			else {
				$progress.css({
					"height": percentageAmount + "%"
				});
				$progress.find(".amount").fadeIn(500);
			}
		}

		$(document).ready(function(){

			//call without the parameters to have it read from the DOM
			thermometer();
			// or with parameters if you want to update it using JavaScript.
			// you can update it live, and choose whether to show the animation
			// (which you might not if the updates are relatively small)
			//thermometer( 300000, 250000, false );

		});
	  </script>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer(); ?>
