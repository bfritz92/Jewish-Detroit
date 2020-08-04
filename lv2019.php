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

get_header('lv-14');
?>
<section id="splash" class="lv-splash">
    <div class="lv-splash--info">
    <h1 class="lv-splash--info--date rumble">November 30 | 8pm | Garden Theatre, Detroit</h1>
    <h2 class="lv-splash--info--copy rumble">21+ and something about dietary restrictions</h2>
    <div class="lv-splash--info--options">
        <h2 class="white">Tickets</h2>
        <h2 class="white">Directions</h2>
    </div>
    </div>
</section>

<section id="intro" class="lv-intro">
    <div class="lv-intro--copy">
        <h2 class="white rumble">Lorem Ipsum Dolor Sit Amet</h2>
        <p class="white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mollis lectus ut lacus scelerisque, in varius enim blandit. Maecenas viverra bibendum ex non volutpat. Etiam at blandit urna. Suspendisse auctor, nibh ornare malesuada mattis, ligula nibh aliquet sapien, nec tincidunt lacus justo quis justo. Cras imperdiet tortor a sapien ullamcorper, suscipit mollis urna tempus. Nulla nec vulputate lacus. Phasellus in leo sed nisi placerat pellentesque. </p>
    </div>
    <picture class="lv-intro--img" alt="The Garden Theater, Detroit, MI">
    <source srcset="https://jewishdetroit.org/wp-content/uploads/2019/10/garden-theater-300x200.jpg 300w, https://jewishdetroit.org/wp-content/uploads/2019/10/garden-theater-768x512.jpg 768w, https://jewishdetroit.org/wp-content/uploads/2019/10/garden-theater-1024x683.jpg 1024w, https://jewishdetroit.org/wp-content/uploads/2019/10/garden-theater-1568x1045.jpg 1568w, https://jewishdetroit.org/wp-content/uploads/2019/10/garden-theater-1600x1067.jpg 1600w, https://jewishdetroit.org/wp-content/uploads/2019/10/garden-theater-1300x867.jpg 1300w, https://jewishdetroit.org/wp-content/uploads/2019/10/garden-theater-920x613.jpg 920w, https://jewishdetroit.org/wp-content/uploads/2019/10/garden-theater-700x467.jpg 700w">
        <img data-src="https://jewishdetroit.org/wp-content/uploads/2019/10/garden-theater-1024x683.jpg" class=" ls-is-cached lazyloaded" src="https://2019.jewishdetroit.org/wp-content/uploads/2019/10/garden-theater-1024x683.jpg"><noscript><img src="https://jewishdetroit.org/wp-content/uploads/2019/10/garden-theater-1024x683.jpg"></noscript>
    </picture>
</section>

<section id="information" class="lv-information">
    <div class="tinted lv-information-heading">
        <h2 class="white rumble">Lorem Ipsum Dolor Sit Amet</h2>
    </div>
    <div class="lv-information--copy tinted">
        <p class="white">General stuff about how this event raises money for good causes
And that diagram with the dollar thing that I haven’t come
Up with a decent idea for yet.</p>
    </div>
</section>

<section id="parking" class="lv-parking">
    <div class="lv-parking--heading">
    <h2 class="white rumble">Where do I Park?</h2>
    </div>
    <div class="lv-parking--map">
    </div>
</section>

<section id="registration" class="lv-registration grid">
    <div class="lv-registration--form">
        <?php echo do_shortcode( '[gravityform id=404 title=false description=false ajax=true]
' ); ?>
    </div>
</section>

<section id="leadership" class="lv-leadership">
    <div class="lv-leadership--board tinted">
        <h2 class="rumble white">Leadership</h2>
        <h3 class="white">Lorem Ipsum Dolor Sit Amet</h3>
        <ul>
        <li>Name One</li>
        <li>Name Two</li>
        </ul>

        <h3 class="white">Lorem Ipsum Dolor Sit Amet</h3>
        <ul>
        <li>Name One</li>
        <li>Name Two</li>
        </ul>

        <h3 class="white">Lorem Ipsum Dolor Sit Amet</h3>
        <ul>
        <li>Name One</li>
        <li>Name Two</li>
        <li>Name Three</li>
        <li>Name Four</li>
        <li>And so on</li>
        </ul>
    </div>
</section>

<section id="sponsors" class="lv-sponsors">
    <div class="lv-sponsors--inner">
        <h2 class="white rumble">Sponsors</h2>
        <h3 class="white rumble">Tier 1</h3>
        <div class="lv-sponsors--tier-1">
        </div>
        <h3 class="white rumble">Tier 2</h3>
        <div class="lv-sponsors--tier-2">
        </div>
        <h3 class="white rumble">Tier 3</h3>
        <div class="lv-sponsors--tier-3">
        </div>
    </div>
</section>

<footer id="footer" class="lv-footer">
    <div class="footer--left">
        <h2 class="rumble white">November 30th, 8pm</h2>
        <h2 class="rumble white">Garden Theatre, Detroit</h2>
        <br/>
        <h3 class="rumble-white">$XX adv, $XXX doors</h3>
        <h3 class="rumble-white">21+ and other stuff</h3>
    </div>
    <div class="footer-right">
        <img class="footer-right--logo">
    </div>
</footer>


<?php
get_footer();
?>