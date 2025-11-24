<?php get_header(); ?>

<?php
if ( have_posts() ) {
  while ( have_posts() ) {
    the_post();
    ?>
    <div class="container">
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
          <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        </header>

        <div class="entry-content">
          <?php the_content(); ?>
        </div>

        <footer class="entry-footer">
          <?php the_tags( '<div class="tags">', ', ', '</div>' ); ?>
        </footer>

        <?php
        // If comments are open or we have comments, load the comment template.
        if ( comments_open() || get_comments_number() ) {
          comments_template();
        }
        ?>
      </article>
    </div>
    <?php
  }
}
?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
