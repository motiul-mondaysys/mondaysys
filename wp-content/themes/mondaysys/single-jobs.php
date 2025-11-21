<?php get_header(); 
global $post;
if ( have_posts() ) {
  while ( have_posts() ) {
    the_post();
    $job_cat = get_the_terms( get_the_ID(), 'job-category' );
    $location = get_the_terms( get_the_ID(), 'city' );
    $level = get_the_terms( get_the_ID(), 'label' );
    ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <section class="single_jobs_head">
            <div class="container">
                <div class="grid-row align-items-end" style="--desk-col: 15fr 9fr; --tab-col: 15fr 9fr; --mob-col:1fr;">
                    <h1 class="pb-md-2 pt-5 pt-md-0"><?php the_title(); ?></h1>
                    <ul class="unorder-list border-left job-specification grid-row px-0 px-md-2 py-2 py-md-4" style="--desk-col:repeat(2, 1fr); --mob-col:repeat(2, 1fr); --desk-gap:4vw; --tab-gap:3rem; --mob-gap: 2rem;">
                        <li><span>Job Category</span><strong><?php if(!empty($job_cat)): echo $job_cat[0]->name; endif; ?></strong></li>
                        <li><span>Location</span><strong><?php if(!empty($location)): echo $location[0]->name; endif; ?></strong></li>
                        <li><span>Level</span><strong><?php if(!empty($level)): echo $level[0]->name; endif; ?></strong></li>
                        <li>
                            <span>Job nature</span>
                            <strong>On site</strong>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="position-relative py-1" style="background-color: var(--tertiary-color);">
              <div class="container d-flex justify-content-between align-item-center">
                  <h4 class="mb-0 fw-500">Apply</h4>
                  <span class="btn btn-tertiary"></span>
              </div>
          </div>
        </section>
        <section class="job_details_wrap">
          <div class="container">
              <div class="grid-row position-relative" style="--desk-col: 15fr 9fr; --tab-col: 15fr 9fr; --mob-col:1fr;">
                <div class="job_details py-2 py-lg-4">
                  <h3>Job description</h3>
                  <?php the_content(); ?>
                </div>
                <div class="job_sidebar position-relative border-left">
                    <h3 class="pt-2 px-1 px-lg-2 pt-lg-4">Apply Now</h3>
                    <?php echo do_shortcode('[contact-form-7 id="eeb0742" title="Jobs Form"]') ?>
                </div>
              </div>
          </div>
        </section>
        <section class="jobs_footer_above">
          <div class="container text-light grid-row py-4 py-lg-7" style="--desk-col: 4fr 3fr 5fr; --tab-col: 1fr 1fr; --mob-gap:1rem;">
              <h2>Interested in working with us?</h2>
              <div></div>
              <p>Combine the flexibility of headless commerce with the power of AI-driven personalization. We’ll help you design a store your customers will love. Combine the flexibility of headless commerce with the power of AI-driven personalization.</p>
          </div>
        </section>
    </article>
    <?php
  }
}
get_footer(); ?>