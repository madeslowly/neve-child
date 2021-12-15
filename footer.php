    <?php
    // Do not allow direct access to the file.
    if (! defined('ABSPATH')) {
        exit;
    }
     ?>

     </div><!-- Off-Canvas Wrapper End -->
</div>

<!-- Footer -->
<footer class="site-footer">
  <!--
  <div class="site-footer-head">
    <div class="row">
      <div class="sponsors">
        <h1>Our Friends</h1>
        <p>This is where we can put logos and links to our friends etc</p>
        <?php slow_wheels_sponsor_logos(); ?></div>
      </div>
    </div>
  </div>
-->
  <div class="site-footer-body">

    <div class="col">
      <img class="site-footer-logo" src="/wp-content/uploads/2021/12/oxpalogosm.png">
      <ul>
        <li><h4>Oxford Pedestrians Association</h4></li>
        <li>12 Stable Close</li>
        <li>Rewley Park</li>
        <li>Oxford OX1 2RF</li>
        <li><a href="mailto:hello@oxpa.org.uk">hello@oxpa.org.uk</a></li>
      </ul>
    </div>

    <div class="col">
      <h4>Useful Links</h4>
      <?php if (shortcode_exists('menu')) {
        echo do_shortcode('  [menu name="useful-links"]');
      } ?>

    </div>

    <div class="col"> <!-- style="width:25% !important">-->

      <h4>Connect with us<h4>
      <ul class="list-inline">
        <li class="list-item px-1">
          <a class="text-gray-dark" href="https://twitter.com/OxfdPedestrians/"><i class="fab fa-2x fa-twitter-square"></i></a>
        </li>
        <li class="list-item px-1">
          <a class="text-gray-dark" href="https://www.facebook.com/OxfordPedestriansAssociation/"><i class="fab fa-2x fa-facebook-square"></i></a>
        </li>
        <li class="list-item px-1">
          <a class="text-gray-dark" href="https://www.youtube.com/channel/UCYPHxPqP3KH05E4oKOinaog/"><i class="fab fa-2x fa-youtube-square"></i></a>
        </li>

      </ul>
    </div>
  </div>


  <div class="site-footer-base">
    <div class="col">
      <p class="footer-copyright ">
        &copy; <?php echo date("Y") . ' ' . get_bloginfo( 'name' ); ?>
      </p>
    </div>

    <div class="col">
      <p class="footer-copyright text-align-right">
        Another site  <a href="https://www.madeslowly.co.uk">made slowly</a>
      </p>
    </div>

  </div>

</footer>
    <!-- Footer End -->


    <?php wp_footer(); ?>

  </body>
</html>
