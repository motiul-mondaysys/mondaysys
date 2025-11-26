<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
<h1 class="mb-0 py-2 py-lg-2 px-1 px-lg-2">
  <?php 
    if (is_home()):
      echo get_the_title( get_queried_object_id() ); 
    else:
        the_archive_title();
    endif;
  ?>
</h1>

<?php if ( is_home() && !is_paged() ) : ?>
  <section class="border-top">
    <?php echo do_shortcode('[latest_blogs]'); ?>
  </section>
<?php endif; ?>


<section class="border-container border-top">
    <div class="empty-column"></div>
    <div class="section-column">
      <?php if ( is_home() && !is_paged() ) : 
            echo '<h2 class="mb-0 section-spacing">All Articles</h2>';
        endif; 
      ?>
      <div class="article_card_container grid-row <?php if ( is_home() && !is_paged() ){ echo 'border-top'; }?>" style="--desk-col: 3fr 9fr; --tab-col:1fr; --mob-col:1fr;">
        <?php echo do_shortcode('[blog_list]') ?>
      </div>
      
    </div>
</section>
  

<?php else : ?>
  <section class="no-results not-found"><div class="container">
    <h2><?php _e( 'Nothing Found', 'mondaysys' ); ?></h2>
    <p><?php _e( 'It seems we can’t find what you’re looking for.', 'mondaysys' ); ?></p>
    <?php get_search_form(); ?>
  </div></section>
<?php endif; ?>

<?php get_footer(); ?>
