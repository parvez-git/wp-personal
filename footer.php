
  <footer class="footer-section">

    <?php if( is_active_sidebar('footer-widget-1') || is_active_sidebar('footer-widget-2') || is_active_sidebar('footer-widget-3') || is_active_sidebar('footer-widget-4') ) : ?>

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-md-3">
            <?php dynamic_sidebar( 'footer-widget-1' ); ?>
          </div> <!-- end .col-md-3 -->

          <div class="col-md-3">
            <?php dynamic_sidebar( 'footer-widget-2' ); ?>
          </div> <!-- end .col-md-3 -->

          <div class="col-md-3">
            <?php dynamic_sidebar( 'footer-widget-3' ); ?>
          </div> <!-- end .col-md-3 -->

          <div class="col-md-3">
            <?php dynamic_sidebar( 'footer-widget-4' ); ?>
          </div> <!-- end .col-md-3 -->

        </div> <!-- end .row -->
      </div> <!-- end .container -->
    </div> <!-- end .footer-top-section -->

    <?php endif; ?>


    <div class="footer-bottom">
      <div class="container">
        <p id="copyright-info"><?php echo get_theme_mod('copyright_text','&copy;2017 - All right reserved'); ?></p>
      </div> <!-- end .container -->
    </div> <!-- end .footer-bottom -->

  </footer> <!-- end .footer-section -->

<?php wp_footer() ?>

</body>
</html>
