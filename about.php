<?php
/**
* Template Name: About Us
 * 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

<section class="about-page">
    
    <iframe src="https://player.vimeo.com/video/360833714" class="mt2 mb2" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>

    <h1 class="about-page--title center blue">Here for Good</h1>
    <p class="about-page--copy center bold">The Jewish Federation of Metropolitan Detroit is the cornerstone of our Jewish Community. We are committed to taking care of the needs of the Jewish people and building a vibrant Jewish future, in Detroit, in Israel and around the world.” </p>
</section>
    
<section class="about-page--section section-one grid">
    <div class="about-page--section--copy">
        <h2 class="about-page--section--heading">Taking Care of the Needs of the Jewish People</h2>
        <p class="bold">Providing for the well-being of the most vulnerable members of our community is a key aspect of our Jewish heritage and one of the fundamental aspects of the Federation's mission to serve the Jewish community. Whether it be in Detroit, in Israel or anywhere around the world, Federation is committed to supporting those in need.</p>
    </div>
 <picture class="about-page--section--img" alt="">
    <source srcset="<?php echo wp_get_attachment_image_srcset( 42523) ?>">
        <img src="<?php echo wp_get_attachment_image_url( 42523, 'large' ) ?>">
    </picture>

    </section>
</section>

<section class="about-page--section section-two grid">
    <div class="about-page--section--copy ">
        <h2 class="about-page--section--headinfg">Building a Vibrant Jewish Future</h2>
        <p class="bold">Jewish education and identity are the foundation of a strong Jewish community. Our Jewish values and culture are shaped through a variety of educational and identity-building outlets that emphasize not only personal growth and learning but also the central role of community in our Jewish tradition.</p>
    </div>
    <div class="about-page--section--img" alt="">
        <img srcset="<?php echo wp_get_attachment_image_srcset( 42576) ?>">
       
</div>
</section>

<section class="about-page--section section-three grid">
    <div class="about-page--section--copy ">
        <h2 class="about-page--section--heading center">Providing For Our Partner Agencies</h2>
        <p class="bold">As the principal engine of Jewish philanthropy and planning in the Detroit area, the Jewish Federation of Metropolitan Detroit works in partnership with its network of agencies to reach and serve the needs of people at every age and stage of life in the Jewish community of Metropolitan Detroit, in Israel and around the world.</p>

       
    </div>
    <div class="about-page--section--img" alt="">
        <img srcset="<?php echo wp_get_attachment_image_srcset( 41318) ?>">
       
</div>
</section>

<section class="about-page--section section-four grid">
    <div class="about-page--section--copy ">
        
        <p class="bold">Locally, Federation supports a family of 17 social service agencies, community organizations and day schools across Metro Detroit. Working with its national and global partners, Federation positively impacts the lives of thousands of Jews throughout Israel, in the Former Soviet Union and in 60 countries around the world.</p>

        <p class="bold">Through the Annual Campaign, Federation raises and allocates funds to its partner agencies to provide critical assistance to those in need, including individuals and families, seniors, people with disabilities, and the unemployed. Federation builds and sustains a vibrant Jewish community, creating avenues for Jewish education and identity, fostering close ties to Israel and engaging the next generation of Jewish Detroiters.</p>
    </div>
    <div class="about-page--section--img" alt="">
        <img srcset="<?php echo wp_get_attachment_image_srcset( 41797) ?>">
       
</div>
</section>

<?php
get_footer();
