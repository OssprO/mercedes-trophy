<?php
/**
 * @package WordPress
 * @subpackage Mercedes Trophy
 * @since Mercedes Trophy 1.0
 */
?>

  <div class="container-fluid mt-sponsors-list">
    <div class="container">
      <div class="row text-center">
        <div class="col-xs-14 col-md-offset-2 col-md-10">
          <?php 
            $sponsorsPost = array( 'post_type' => 'mt_sponsors', );
            $sponsorsLoop = new WP_Query( $sponsorsPost ); 
          ?>
          <?php while ( $sponsorsLoop->have_posts() ) : $sponsorsLoop->the_post();?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                  <?php the_post_thumbnail( array( 120, 100 ) ); ?>
            </article>
          <?php endwhile;  ?>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid mt-disclaimer">
    <div class="container">
      <div class="row">
        <div class="col-xs-14 col-md-12 col-md-offset-1">
          <p class="text-justify">
            <span class="anotation">01 800 0024 365.</span> La fotografía que aquí aparece es usada como referencia y puede ser modificada sin previo aviso. Mercedes-Benz México, S. de R.L. de C.V. se reserva el derecho de cambiar las especificaciones, equipos, términos y condiciones antes mencionadas en cualquier momento sin necesidad de previo aviso. “Mercedes-Benz” es una marca de Daimler. 
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid mt-footer">
    <div class="container">
      <div class="row">
    		<footer id="footer" class="source-org vcard copyright" role="contentinfo">
          <div class="col-xs-14 col-md-7">
            <a href="http://www.mercedes-benz.com.mx" target="_blank"><small>www.mercedes-benz.com.mx</small></a>
          </div>
          <div class="col-xs-14 col-md-7 text-right">
            <small>Siguenos en:</small>

            <?php echo do_shortcode('[aps-social id="1"]')?>
            
          </div>
    			<!--<small>&copy;<?php echo date("Y"); echo " "; bloginfo('name'); ?></small>-->
    		</footer>
      </div>
    </div>
	</div>

	<?php wp_footer(); ?>


<!-- here comes the javascript -->

<!-- jQuery is called via the WordPress-friendly way via functions.php -->

<!-- this is where we put our custom functions: This is in the enqueue function currently -->
<!-- <script src="<?php bloginfo('template_directory'); ?>/static/js/footer.js"></script> -->

<!-- Asynchronous google analytics; this is the official snippet.
         Replace UA-XXXXXX-XX with your site's ID and domainname.com with your domain, then uncomment to enable.

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-XXXXXX-XX', 'domainname.com');
  ga('send', 'pageview');

</script>
-->
	
</body>

</html>
