<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="col-sm-4">
  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
  <?php
  if (has_post_thumbnail()){
    the_post_thumbnail();
  }
  else{
      echo('<img src="' . get_template_directory_uri() . '/img/stripes.png" class="wp-post-image" width="293" height="172" />');
  }
  ?>
  <header>
  <?php if ( is_singular() ) { echo '<h1 class="entry-title">'; } else { echo '<h2 class="entry-title">'; } ?><span><?php the_title(); ?></span><?php if ( is_singular() ) { echo '</h1>'; } else { echo '</h2>'; } ?>
  </header>
  <?php get_template_part( 'entry', ( is_home() || is_archive() || is_search() ? 'summary' : 'content' ) ); ?>
  </a>
</div>
</article>
