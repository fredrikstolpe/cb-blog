<?php global $wp_query; if ( $wp_query->max_num_pages > 1 ) { ?>
<nav id="nav-below" class="navigation" role="navigation">
  <div class="container">
    <div class="row">
      <div class="col-sm-6"><?php next_posts_link(sprintf( __( '%s older', 'cb_blog' ), '<span class="meta-nav">&larr;</span>' ) ) ?></div>
      <div class="col-sm-6 text-right"><?php previous_posts_link(sprintf( __( 'newer %s', 'cb_blog' ), '<span class="meta-nav">&rarr;</span>' ) ) ?></div>
    </div>
  </div>
</nav>
<?php } ?>
