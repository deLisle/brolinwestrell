<header class="banner">
	<div class="container">
		<nav class="nav-primary" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="brand" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
		</div>
		<div class="collapse navbar-collapse" id="header-navbar-collapse">	
		<?php
		if (has_nav_menu('primary_navigation')) :
			wp_nav_menu( array(
				'theme_location'    => 'primary_navigation',
				'depth'             => 1,
				'menu_class'        => 'nav navbar-nav navbar-center',
				'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
				'items_wrap'      	=> '<ul id="%1$s" class="%2$s clearfix">%3$s</ul>',
				'walker'            => new wp_bootstrap_navwalker())
			);
		endif;
		if (has_nav_menu('primary_navigation_2')) :
			wp_nav_menu( array(
				'theme_location'    => 'primary_navigation_2',
				'depth'             => 1,
				'menu_class'        => 'nav navbar-nav navbar-center',
				'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
				'items_wrap'      	=> '<ul id="%1$s" class="%2$s clearfix">%3$s</ul>',
				'walker'            => new wp_bootstrap_navwalker())
			);
		endif; ?>
		<?php if ( $_SERVER["REQUEST_URI"] == '/en/' ) { ?>
			<a href="/"><img src="/wp-content/themes/brolinwestrell/assets/images/sv.png" width="30" class="english-flag" alt="Swedish" /></a>
		<?php } else {?>
			<a href="/en/"><img src="/wp-content/themes/brolinwestrell/assets/images/eng.png" width="30" class="english-flag" alt="English" /></a>
		<?php }?>
		</div>
		</nav>
		
		
	</div>
</header>