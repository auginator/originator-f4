<div class="footer-wrap">
	<footer>
		<div class="widget-area-wrapper">
			<?php get_sidebar('sidebar2'); // Footer Sidebar ?>
		</div>

	<!-- 	<div class="footer-nav">		
		</div> -->
	</footer>
</div>
  <!--
  TODO: Currently not using Zepto. How to do this in WP, and have it registered as JQuery?
  <script>
  document.write('<script src=' +
  ('__proto__' in {} ? '<?php bloginfo("stylesheet_directory"); ?>/js/vendor/zepto' : '<?php bloginfo("stylesheet_directory"); ?>/js/vendor/jquery') +
  '.js><\/script>')
  </script>
	-->  
  
  <?php wp_footer(); ?>

  <script>
    $(document).foundation();
  </script>

</body>
</html>