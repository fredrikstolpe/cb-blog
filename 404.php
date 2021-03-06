<?php get_header(); ?>
<section id="content" role="main">
  <div class="container">
    <article id="post-0" class="post not-found">
      <header class="header">
        <h1 class="entry-title"><?php _e( 'Not Found', 'cb_blog' ); ?></h1>
      </header>
      <section class="entry-content">
        <p><?php _e( 'Nothing found for the requested page. Try a search instead?', 'cb_blog' ); ?></p>
        <?php get_search_form(); ?>
      </section>
    </article>
  </div>
</section>
<?php get_footer(); ?>
