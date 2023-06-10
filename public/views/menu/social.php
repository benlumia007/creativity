<?php

if ( has_nav_menu( $data->location ) ) { ?>
	<nav id="site-social" class="site-social">
		<?php
		wp_nav_menu(array(
			'theme_location'    => 'social',
			'container'         => 'nav',
			'container_id'      => 'menu-social',
			'container_class'   => 'menu-social',
			'menu_id'           => 'menu-social-items',
			'menu_class'        => 'menu-items',
			'depth'             => 1,
			'fallback_cb'       => '',
		));
		?>
	</nav>

<?php }
