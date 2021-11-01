<?php
	/* Template Name: Campaign Donometer */
	/*$url1=$_SERVER['REQUEST_URI'];
	header("Refresh: 60; URL=$url1");*/
	get_header(); 	
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
margin-left: -55px;
margin-top: -81px;
z-index: 1000;
width: 150px;
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
<?php 
	global $wpdb;
	/* Campaign Numbers */
	$gf_gifts = do_shortcode('[gravityforms action="entry_count" id="156"]');
	$gf_goal = 300000;
	$donototal = 300000; 
?>
<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<div id="content">
				<div id="thermometer">
					<div class="track">
						<div class="goal">
							<h2 class="amount"><?php echo $gf_goal; ?></h2>
						</div>
						<div class="progress"><img src="https://jfmdorg.s3.us-west-2.amazonaws.com/wp-content/uploads/2021/10/28145933/horse.svg" height="150px" style="">
							<h3 class="amount"><?php echo $donototal; ?></h3>
						</div>
						<div class="stop1">
							<h4 class="amount">$0 </h4>
						</div>
						<div class="stop2">
							<h4 class="amount">$75000 </h4>
						</div>
						<div class="stop3">
							<h4 class="amount">$150000 </h4>
						</div>
						<div class="stop4">
							<h4 class="amount">$225000 </h4>
						</div>
					</div>
				</div>
			</div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
	<script>
		function formatCurrency(n, c, d, t) {
			"use strict";

			var s, i, j;

			c = isNaN(c = Math.abs(c)) ? 2 : c;
			d = d === undefined ? "." : d;
			t = t === undefined ? "," : t;

			s = n < 0 ? "-" : "";
			i = parseInt(n = Math.abs(+n || 0).toFixed(c), 10) + "";
			j = (j = i.length) > 3 ? j % 3 : 0;

			return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
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
			//$goal.find(".amount").text( "$" + formatCurrency( goalAmount ) );
			//$progress.find(".amount").text( "$" + formatCurrency( progressAmount ) );
			//show currency without decimnal places
			$goal.find(".amount").text( "$" + ( goalAmount ) );
			$progress.find(".amount").text( "$" + ( progressAmount ) );
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
			//thermometer( 1000000, 425610, false );

		});
	  </script>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer(); ?>
