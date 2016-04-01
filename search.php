<?php get_header(); ?>
<section id="content" role="main">
  <div class="container">
    <?php if ( have_posts() ) : ?>
      <header class="header">
        <h1 class="entry-title"><?php printf( __( 'Search Results for: %s', 'cb_blog' ), get_search_query() ); ?></h1>
      </header>
      <?php get_template_part( 'template-parts/teaser-grid' ); ?>
      <?php get_template_part( 'nav', 'below' ); ?>
    <?php else : ?>
      <article id="post-0" class="post no-results not-found">
      <header class="header">
        <h2 class="entry-title"><?php _e( 'Nothing Found', 'cb_blog' ); ?></h2>
      </header>
      <section class="entry-content">
        <p><?php _e( 'Sorry, nothing matched your search. Please try again.', 'cb_blog' ); ?></p>
        <?php get_search_form(); ?>
      </section>
      </article>
    <?php endif; ?>
  </div>
</section>
<?php get_footer(); ?>
