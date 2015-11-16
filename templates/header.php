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
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu( array(
          'theme_location'    => 'primary_navigation',
          'depth'             => 2,
          'container'         => 'div',
          'container_class'   => 'collapse navbar-collapse',
          'container_id'      => 'header-navbar-collapse',
          'menu_class'        => 'nav navbar-nav',
          'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
          'walker'            => new wp_bootstrap_navwalker())
        );
      endif;
      ?>
    </nav>
  </div>
</header>
