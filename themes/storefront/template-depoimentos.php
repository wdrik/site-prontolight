<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Depoimentos
 *
 * @package storefront
 */

get_header(); ?>

  <h1 class="content-featured-product__main-title text-orange">Depoimentos</h1>

  <div class="big_video">
    <div class="yt-wrapper">
      <iframe src="https://www.youtube.com/embed/LwlipT8OTVE?autoplay=1&amp;controls=1&amp;loop=1&amp;rel=0&amp;showinfo=0&amp;mute=0"
        frameborder="0" 
        id="big-video">
      </iframe>
    </div>
  </div>


  <div class="owl-carousel--videos owl-carousel owl-theme">

    <div class="item">
      <div class="yt-wrapper">
        <iframe src="https://www.youtube.com/embed/Q39aLTXCGMM?autoplay=0&controls=1&loop=1&rel=0&showinfo=0&mute=0"
          frameborder="0">
        </iframe>
      </div>
    </div>

    <div class="item">
      <div class="yt-wrapper">
        <iframe src="https://www.youtube.com/embed/7KiEFWq2emA?autoplay=0&controls=1&loop=1&rel=0&showinfo=0&mute=0"
          frameborder="0">
        </iframe>
      </div>
    </div>
    
    <div class="item">
      <div class="yt-wrapper">
        <iframe src="https://www.youtube.com/embed/nQSpG0wF5bo?autoplay=0&controls=1&loop=1&rel=0&showinfo=0&mute=0"
          frameborder="0">
        </iframe>
      </div>
    </div>

    <div class="item">
      <div class="yt-wrapper">
        <iframe src="https://www.youtube.com/embed/LwlipT8OTVE?autoplay=0&controls=1&loop=1&rel=0&showinfo=0&mute=0"
          frameborder="0">
        </iframe>
      </div>
    </div>

    <div class="item">
      <div class="yt-wrapper">
        <iframe src="https://www.youtube.com/embed/7uCNhlLrjGY?autoplay=0&controls=1&loop=1&rel=0&showinfo=0&mute=0"
          frameborder="0">
        </iframe>
      </div>
    </div>

    <div class="item">
      <div class="yt-wrapper">
        <iframe src="https://www.youtube.com/embed/HD97OCh6jw8?autoplay=0&controls=1&loop=1&rel=0&showinfo=0&mute=0"
          frameborder="0">
        </iframe>
      </div>
    </div>

  </div>

<?php
get_footer();
