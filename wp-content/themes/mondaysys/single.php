<?php get_header(); ?>

<?php
if ( have_posts() ) {
  while ( have_posts() ) {
    the_post();
    ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="single-post-hero text-center position-relative lh-0">
            <?php echo get_the_post_thumbnail($post->ID, 'full'); ?>
        </div>
        <header class="single-entry-header border-top grid-row" style="--desk-col: 4fr 8fr; --tab-col:4fr 8fr;">
          <div class="post-author-box-wrap py-2 px-1 px-lg-2 py-lg-4 border-left">
              <h6 class="fw-300" style="margin-bottom: 0.5rem;">Topics</h6>
              <?php 
                $term = get_the_category();
                  if ( ! empty( $term ) ) {
                      $cat_link = get_category_link( $term[0]->term_id );
                      echo '<div class="post_cat_name h5 mb-1 mb-md-2">' . esc_html( $term[0]->name ) . '</div>';
                  }
              ?>
              <?php
                $author_id = get_the_author_meta('ID');
                $author_name = get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name');
              ?>
              <div class="post-author-box">
                  <img src="<?php echo esc_url( get_avatar_url($author_id, ['size' => 50]) ); ?>" alt="<?php echo $author_name; ?>">
                  <h5><span class="fw-300">By</span> <?php echo $author_name; ?></h5>
              </div>

          </div>
          <?php the_title( '<h1 class="entry-title h2 border-left py-2 py-lg-4 px-1 px-lg-2">', '</h1>' ); ?>
        </header>

        <div class="single-entry-content border-top grid-row" style="--desk-col: 4fr 8fr; --tab-col:4fr 8fr;">
          <div class="related-post-area py-lg-4 py-2 border-left">
                <?php echo do_shortcode('[related_posts]') ?>
          </div>
          <div class="entry-content py-2 py-lg-4 px-1 px-lg-2 border-left">
                 <?php the_content(); ?>
          </div>
        </div>

        <div class="single-entry-footer border-top grid-row" style="--desk-col: 4fr 8fr; --tab-col:1fr;">
                <div class="border-left"></div>
                <div class="post-share grid-row align-item-center px-1 px-lg-2 py-2 py-lg-2" style="--desk-col: 1fr 1fr; --tab-col: 1fr 1fr; --mob-col: 1fr 1fr;">
                    <?php 
                      echo do_shortcode('[social_share]');
                      $updated_time = get_the_modified_time( 'M d, Y' );
                      echo '<div class="modified_data text-center text-md-end">Last updated: '.$updated_time.'</div>' 
                    ?>
                </div>
        </div>
      </article>
    <?php
  }
}
?>
<?php get_footer(); ?>
