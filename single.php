<?php get_header(); ?>
<div class="container">
  <?php if ( has_post_thumbnail() ) { the_post_thumbnail('top-image'); } ?>
  <div class="row">
    <div class="col-sm-8">
      <section id="content" role="main">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="post-content">
              <header>
              <?php if ( is_singular() ) { echo '<h1 class="entry-title">'; } else { echo '<h2 class="entry-title">'; } ?><span><?php the_title(); ?></span><?php if ( is_singular() ) { echo '</h1>'; } else { echo '</h2>'; } ?>
              </header>
              <div class="post-date">Posted <?php the_date(); ?> by <?php the_author(); ?><?php the_tags('<div class="tags"><span class="tag">','</span><span class="tag">','</span></div>');?></div>
              <?php get_template_part( 'entry', ( is_home() || is_archive() || is_search() ? 'summary' : 'content' ) ); ?>
            </div>
          </article>
          <?php if ( ! post_password_required() ) comments_template( '', true ); ?>
        <?php endwhile; endif; ?>
      </section>
    </div>
    <div class="col-sm-4"><?php get_sidebar(); ?></div>
  </div>
</div>
<?php get_footer(); ?>
