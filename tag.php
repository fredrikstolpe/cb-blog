<?php get_header(); ?>
<section id="content" role="main">
  <div class="container">
    <header class="header">
    <h1 class="entry-title"><?php single_tag_title(); ?></h1>
    </header>
    <?php get_template_part( 'template-parts/teaser-grid' ); ?>
    <?php get_template_part( 'nav', 'below' ); ?>
  </div>
</section>
<?php get_footer(); ?>
