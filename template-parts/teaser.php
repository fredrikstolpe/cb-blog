<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="col-sm-4">
  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
  <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
  <header>
  <?php if ( is_singular() ) { echo '<h1 class="entry-title">'; } else { echo '<h2 class="entry-title">'; } ?><?php the_title(); ?><?php if ( is_singular() ) { echo '</h1>'; } else { echo '</h2>'; } ?>
  </header>
  <?php get_template_part( 'entry', 'summary' ); ?>
  </a>
</div>
</article>
