<?php get_header(); 
global $post;
if ( have_posts() ) {
  while ( have_posts() ) {
    the_post();
    $featured_image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' ); 
    ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <section>
            <div class="container">
                <div class="grid-row" style="--desk-col: 8fr 4fr; --mob-col:1fr;">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
        </section>
    </article>
    <?php
  }
}
get_footer(); ?>