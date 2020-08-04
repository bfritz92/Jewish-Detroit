<?php
/*
Template Name: Coupon Insert
*/
get_header(); ?>

<?php 
$hostname  = 'localhost';
$username  = 'jewish20_19playe';
$password  = '4ll!YnoCi1}W';
$database  = 'jewish20_19db';
$link = new mysqli($hostname, $username, $password, $database);
if (!$link) {
  die('Could not connect: ' . mysql_error());
}


for($i = 1, $t = 5; $i<11, $t<15; $i++, $t++ ) {
	$sql="UPDATE wp_gf_addon_feed SET meta = '{\"gravityForm\":\"404\",\"couponName\":\"Latke Vodka Test Coupon\",\"couponCode\":\"LVTEST".$i."\",\"couponAmountType\":\"flat\",\"couponAmount\":26,\"startDate\":\"\",\"endDate\":\"12/01/2019\",\"usageLimit\":\"1\",\"isStackable\":\"1\",\"usageCount\":\"\"}' WHERE wp_gf_addon_feed.id = ".$t.";";
    $result = mysqli_query($link, $sql);
    if (!$result) {
     die('Invalid query: ' . mysql_error());
    }
}
?>

<?php get_footer(); ?>
