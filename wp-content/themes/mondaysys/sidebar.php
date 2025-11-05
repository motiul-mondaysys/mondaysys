<aside id="secondary" class="widget-area" role="complementary">
  <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
  <?php else : ?>
    <section class="widget">
      <h3 class="widget-title"><?php _e( 'Search', 'my-theme' ); ?></h3>
      <?php get_search_form(); ?>
    </section>
  <?php endif; ?>
</aside>
