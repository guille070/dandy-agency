	
	</article> <!-- .innerWrapper -->
	
	<div id="menuWrapper">
		<div class="menuInnerWrapper">
			<?php
				$defaults = array(
					'theme_location'  => 'header-menu',
					'menu'            => 'main',
					'container'       => false,
					'menu_class'      => 'menu',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>'
				);
				
				wp_nav_menu( $defaults );
			?>
		</div>
	</div>
	
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-60543825-1', 'auto');
	  ga('send', 'pageview');
	
	</script>
	
	<?php wp_footer(); ?>
	</body>
</html>