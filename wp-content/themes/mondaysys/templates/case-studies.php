<?php
/**
 * Template Name: Case Studies
 */
get_header();
global $post;

    while ( have_posts() ) : the_post();
    $featured_image_url = get_the_post_thumbnail_url( $post->ID, 'full' ); ?>

    <div class="casestudy_title pt-4">
        <div class="container">
            <h1 class="mb-0"><?php the_title() ?></h1>
            <p class="h1 pb-2">Results that speak for themselves</p>
        </div>
    </div>

    <section class="featured_case_studies overflow-hidden border-top">
             <?php echo do_shortcode('[featured_case_studies]'); ?>
    </section>
    <section class="case_studies_filter border-container border-top">
        <div class="empty-column"></div>
        <div class="section-column">
            <div class="filter_title py-1 px-1 px-lg-2 fw-500">
                <span>
                    <svg width="18" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path fill="var(--body-text-color)" d="M0 3h24v2.5H0zm5 8h14v2.5H5zm4 8h6v2.5H9z"></path>
                    </svg>
                </span>
                <span>Filters</span>
            </div>
            <div class="grid-row border-top" style="--desk-col:4fr 8fr;">
                <?php echo do_shortcode('[case_studies_list]'); ?>
            </div>
        </div>
    </section>


<?php  endwhile; get_footer(); ?>