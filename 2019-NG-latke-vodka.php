<?php
/**


 * Template Name: Latke Vodka 2019
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
<section id="splash" class="lv-splash">
    <picture class="lv-splash--img" alt="Latke Vodka">
    <source srcset="<?php echo wp_get_attachment_image_srcset( 42094) ?>">
        <img src="<?php echo wp_get_attachment_image_url( 42094, 'large' ) ?>">
    </picture>
    <div class="lv-splash--info">
    <h2 class="lv-splash--info--date white rumble">November 30 | 10 pm</h2>
    <h1 class="lv-splash--info--location white rumble">Garden Theatre, Detroit</h1>
    <h2 class="lv-splash--info--copy white rumble">Ca$h bar. Late night food. DJ spinning all the jams.</h2>
    <h2 class="lv-splash--info--copy white rumble">21+ only. Dietary laws observed.</h2>
    <div class="lv-splash--info--options">
        <h2 class="white rumble"><a href="#registration">Tickets</a></h2>
        <h2 class="white rumble"><a href="#parking">Directions</a></h2>
    </div>
    </div>
</section>

<section id="intro" class="lv-intro">
    <div class="lv-intro--copy">
        <h2 class="white rumble">Not your mama’s garden party…</h2>
        <p class="white">Latke Vodka is making another move down Woodward and popping up at the Garden Theater this year. </p>
        <p class="white">Don’t miss Jewish Detroit’s 15-year long tradition of meeting up with 1000 of your closest friends the Saturday night after Thanksgiving at the biggest holiday party of the season.</p>
</p>
    </div>
    <picture class="lv-intro--img" alt="The Garden Theater, Detroit, MI">
    <source srcset="<?php echo wp_get_attachment_image_srcset( 42087) ?>">
        <img src="<?php echo wp_get_attachment_image_url( 42087, 'large' ) ?>">
    </picture>
</section>

<section id="information" class="lv-information">
    <div class="lv-information--copy">
        <h2 class="white rumble">Do good. Party hard.</h2>
        <p class="white">Did you know that $18 of every ticket sold goes towards taking care of the needs of the Jewish people and building a vibrant Jewish future in Detroit, in Israel and around the world? It’s true.</p>
</p>
    </div>
    <div class="lv-information--img" alt="Breakdown of Funds">
    
</div>
</section>
<section id="parking" class="lv-parking">
    <div class="lv-parking--heading">
    <h2 class="white rumble">Where do I Park?</h2>
    <p class="lv-parking--copy tinted white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam convallis commodo turpis, nec rutrum nisl tincidunt eget. Pellentesque eu accumsan metus, rhoncus efficitur dolor.</p>
    </div>
    <div class="lv-parking--map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2948.643945852182!2d-83.06257668454403!3d42.350113979187626!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8824d2b77640696b%3A0x95db80882c175261!2s25%20W%20Alexandrine%20St%2C%20Detroit%2C%20MI%2048201!5e0!3m2!1sen!2sus!4v1571849268202!5m2!1sen!2sus"  height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>
</section>

<section id="registration" class="lv-registration">
    <div class="lv-registration--title">
        <h2 class="white rumble">Registration</h2>
    </div>
    <div class="lv-registration--form tinted">
        <?php gravity_form( 16, $display_title = false, $display_description = true, $display_inactive = false, $field_values = null, $ajax = false, $tabindex, $echo = true ); ?>
    </div>
</section>

<section id="leadership" class="lv-leadership">
    <div class="lv-leadership--board tinted">
        <div class="lv-leadership--board--title">
            <h2 class="rumble white">Leadership</h2>
        </div>
        
        <h3 class="rumble white">Chairs</h3>
        <ul>
        <li>Abigail Epstein and Warren Frenkel</li>
        </ul>

        <h3 class="rumble white">Committee</h3>
        <ul class="lv-leadership--board--committee">
        <li>Jason Barnett</li>
        <li>Eriel Emmer</li>
        <li>Veronica Gordon</li>
        <li>Rob Hirschberg</li>
        <li>Maddi Ishbia</li>
        <li>Cammy Krigel</li>
        <li>Jessica Lusky</li>
        <li>Mollie Megdall</li>
        <li>Rachel Morof</li>
        <li>Rachel Moss</li>
        <li>Lauren Sallen</li>
        <li>Josh Sklar</li>
        <li>Emily Stillman</li>
        <li>Sarah Gordon Thomas</li>
        </ul>
    </div>
</section>

<section id="sponsors" class="lv-sponsors">
    <div class="lv-sponsors--title">
        <h2 class="white rumble">Sponsors</h2>
    </div>
    <div class="lv-sponsors--inner">
        <div class="lv-sponsors--tier-1">
        <h3 class="white bold pb2 center">The Prentis Family Foundation</h3>
        </div>
    </div>
</section>

<footer id="lv-footer" class="lv-footer">
    <div class="footer--left center">
        <h2 class="rumble white">November 30th, 10 pm</h2>
        <h2 class="rumble white">Garden Theater, Detroit</h2>
        <br/>
        <h3 class="lv-footer--info--copy white">Ca$h bar. Late night food. DJ spinning all the jams.</h3>
        <h3 class="lv-footer--info--copy white">21+ only. Dietary laws observed.</h3>
    </div>
</footer>
<?php
get_footer();
