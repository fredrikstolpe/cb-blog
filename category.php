<?php get_header(); ?>
<section id="content" role="main">
  <div class="container">
    <header class="header">
    <h1 class="entry-title"><?php single_cat_title(); ?></h1>
    <?php if ( '' != category_description() ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . category_description() . '</div>' ); ?>
    </header>
    <?php get_template_part( 'template-parts/teaser-grid' ); ?>
    <?php get_template_part( 'nav', 'below' ); ?>
  </div>
</section>
<?php get_footer(); ?>
