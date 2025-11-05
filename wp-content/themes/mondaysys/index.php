<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
  <div class="posts-loop">
    <?php
    while ( have_posts() ) :
      the_post();
      // Use a template part for content
      get_template_part( 'template-parts/content', get_post_type() );
    endwhile;
    ?>
  </div>

  <div class="pagination">
    <?php the_posts_pagination( array(
      'mid_size' => 2,
      'prev_text' => __( '‹ Prev', 'my-theme' ),
      'next_text' => __( 'Next ›', 'my-theme' ),
    ) ); ?>
  </div>

<?php else : ?>
  <section class="no-results not-found">
    <h2><?php _e( 'Nothing Found', 'my-theme' ); ?></h2>
    <p><?php _e( 'It seems we can’t find what you’re looking for.', 'my-theme' ); ?></p>
    <?php get_search_form(); ?>
  </section>
<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
