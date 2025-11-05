<?php get_header(); ?>

<?php
if ( have_posts() ) {
  while ( have_posts() ) {
    the_post();
    $terms = get_the_terms( get_the_ID(), 'case_study_cat' );
    ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <section class="single_case_study_hero">
            <div class="container grid-row align-items-center" style="--desk-col: 1fr 1fr; --mob-col:1fr;">
                <div class="title_area pt-5 pt-md-0">
                    <h1><?php the_title(); ?></h1>
                </div>
                <div class="service_list_area">
                    <ul class="unorder-list">
                        <li><span>Industry</span><strong><?php echo $terms[0]->name; ?></strong></li>
                        <li><span>Client Name</span><strong>John doe</strong></li>
                        <li><span>Services</span><strong>Web development</strong></li>
                        <li><span>Category</span><strong>Website</strong></li>
                    </ul>
                </div>
            </div>
            <hr class="m-0">
            <div class="single_casestudy_featured_area overflow-hidden grid-row" style="--desk-col:1fr 1fr; --mob-col: 1fr;">
                <div class="featured_image lh-0">
                    <?php 
                        if ( has_post_thumbnail() ) {
                            echo get_the_post_thumbnail( $post->ID, 'large' ); 
                        }
                    ?>
                </div>
                <div class="single_excerpt">
                    <p class="mb-0"><?php echo meta('short_description'); ?></p>
                </div>
            </div>
        </section>
        <section class="border-container border-top single_casestudy_escription">
            <div class="empty-column"></div>
            <div class="section-column">
                <?php if(meta('project_des')): ?>
                    <div class="grid-row  px-1 px-lg-2 py-lg-5 py-3" style="--desk-col:4.8fr 6fr; --desk-gap:35px; --tab-gap:25px; --mob-gap:0; --mob-col:1fr;">
                        <h3>Project Description</h3>
                        <div class="single_project_des">
                            <?php echo wpautop( meta('project_des'));?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if(meta('project_challenge')): ?>
                    <div class="grid-row border-top  px-1 px-lg-2 pt-lg-5 pt-3" style="--desk-col:4.8fr 6fr; --desk-gap:35px; --tab-gap:25px; --mob-gap:0; --mob-col:1fr;">
                        <h3>The Challenge</h3>
                        <div class="single_project_challenge h4">
                            <?php echo wpautop( meta('project_challenge'));?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if(meta('project_mockup')): ?>
                    <img class="mt-3" src="<?php echo meta('project_mockup'); ?>" alt=""/>
                <?php endif; ?>

                <?php
                if ( meta('deploying_process') ):
                    if ( preg_match('/<h3.*?>(.*?)<\/h3>/', meta('deploying_process'), $matches) ) {
                        $heading = $matches[0]; 
                        $content = str_replace($matches[0], '', meta('deploying_process'));
                    } else {
                        $heading = '<h3>Deploying Process</h3>';
                        $content = meta('deploying_process');
                    }
                    ?>
                    <div class="grid-row px-1 px-lg-2 py-lg-5 py-3" style="--desk-col:4.8fr 6fr; --desk-gap:35px; --tab-gap:25px; --mob-gap:0; --mob-col:1fr;">
                        <?php echo $heading; ?>
                        <div class="deploying_process">
                            <?php echo wpautop( $content ); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div><!--section-column-->
        </section>
        <section class="border-container">
            <div class="empty-column"></div>
            <div class="section-column border-top">
                <div class="grid-row position-relative technologies_use py-3 py-lg-6 px-md-2 px-1" style="--desk-col:4.8fr 6fr; --tab-col:4fr 8fr; --desk-gap:35px; --tab-col:25px; --mob-gap:0; --mob-col:1fr;">   
                    <div class="technology-left-area position-relative">
                        <div class="stikcy_area">
                            <?php if (meta('technology_section_title') ) : ?>
                                <h2><?php echo meta('technology_section_title'); ?></h2>
                            <?php endif; ?>  
                        </div>
                    </div>

                    <div class="technology-right-area">
                        <?php 
                        $technology_items  = meta('technology_group');
                        if ( $technology_items ) : 
                            foreach ( $technology_items as $item ) : 
                                echo '<div class="technology-lists">';
                                
                                    if ( ! empty( $item['title'] ) ) {
                                        echo '<h4 class="mt-3">'. esc_html( $item['title'] ) .'</h4>';
                                    }

                                    if ( ! empty( $item['content'] ) ) {
                                        echo '<p class="mb-3">'. esc_html( $item['content'] ) .'</p>';
                                    }

                                    if ( ! empty( $item['tech_logo'] ) && is_array( $item['tech_logo'] ) ) {
                                        echo '<div class="technology_logo_grid grid-row align-item-center" style="--desk-col: repeat(5, 1fr); --mob-col: repeat(4, 1fr); --desk-gap:10px; --mob-gap:10px;">';
                                        foreach ( $item['tech_logo'] as $attachment_id => $attachment_url ) {
                                            echo '<span><img src="'. esc_url( $attachment_url ) .'" alt=""></span>';
                                        }
                                        echo '</div>';
                                    }
                                echo '</div>'; 
                            endforeach; 
                        endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="border-container">
            <div class="empty-column"></div>
            <div class="section-column">
                <?php
                if ( meta('project_efficiency') ):
                    if ( preg_match('/<h3.*?>(.*?)<\/h3>/', meta('project_efficiency'), $matches) ) {
                        $heading = $matches[0]; 
                        $content = str_replace($matches[0], '', meta('project_efficiency'));
                    } else {
                        $heading = '<h3>Deploying Process</h3>';
                        $content = meta('project_efficiency');
                    }
                    ?>
                    <div class="grid-row border-top px-1 px-lg-2 py-lg-5 py-3" style="--desk-col:4.8fr 6fr; --desk-gap:35px; --tab-gap:25px; --mob-gap:0; --mob-col:1fr;">
                        <?php echo $heading; ?>
                        <div class="project_efficiency">
                            <?php echo wpautop( $content ); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php $project_status = meta('experience_group');
                    if ( ! empty( $project_status ) ) : ?>
                            <div class="number_counter_items grid-row border-top" style="--desk-col:4.8fr 6fr; --desk-gap:35px; --tab-gap:25px; --mob-gap:0; --mob-col:repeat(1, 1fr);">
                                <h4 class="p-1 p-mb-2"><?php echo meta('status_title'); ?></h4>
                                <div class="project_status_right border-left">
                                     <?php foreach ( $project_status as $item ) : 
                                        $number = isset( $item['counter_number'] ) ? esc_html( $item['counter_number'] ) : '';
                                        $suffix = isset( $item['suffix'] ) ? esc_html( $item['suffix'] ) : '';
                                        $title  = isset( $item['title'] ) ? esc_html( $item['title'] ) : '';
                                        $animation_speed = rand(1000, 2000);
                                      ?>
                                        <div class="counter grid-row align-item-center" style="--desk-col:repeat(2, 1fr); --tab-col:1fr 1fr; --mob-col:repeat(2, 1fr); --mob-gap:10px;">
                                            <div>
                                                <span class="counter_number" 
                                                    ending-number="<?php echo $number; ?>" 
                                                    counter-animation="<?php echo $animation_speed; ?>">
                                                    <?php echo $number . $suffix; ?>
                                                </span>
                                                <?php if ( ! empty( $suffix ) ) : ?>
                                                    <span class="counter_suffix"><?php echo $suffix; ?></span>
                                                <?php endif; ?>
                                            </div>
                                            <p class="number_title fw-300 mb-0 mt-1 mt-md-0"><?php echo $title; ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                    <?php endif; ?>
                <div class="client_comment border-top py-3 py-lg-6 px-md-2 px-1">
                    <div class="grid-row" style="--desk-col:11fr 1fr; --mob-col:1fr;">
                        <div>
                            <?php 
                                $client_comment = meta('client_comment');
                                if(meta('testimonial_title')):
                                    echo '<h5 class="mb-1" style="color:#5A0000">'.meta('testimonial_title').'</h5>';
                                endif;
                                if ( $client_comment ) {
                                    $content = wpautop( $client_comment );
                                    preg_match_all( '/<p[^>]*>(.*?)<\/p>/', $content, $paragraphs );
                                    if ( ! empty( $paragraphs[0] ) ):
                                        echo '<p class="h3" style="line-height: 1.5em;">' . wp_kses_post( $paragraphs[1][0] ) . '</p>';
                                    endif;

                                }
                            ?>                     
                        </div>
                        <div class="empty"></div>
                    </div>
                    <div class="grid-row pt-3" style="--desk-col:4.8fr 6fr; --desk-gap:35px; --tab-gap:0; --mob-gap:0; --tab-col:1fr; --mob-col:1fr">
                        <div class="empty"></div>
                        <div class="client_comment_text">
                            <div class="client_image_box grid-row align-items-end" style="--desk-col: 3fr 9fr; --desk-gap:20px; --mob-gap:10px;">
                                <?php
                                    if(meta('client_image')):
                                        echo '<span class="lh-0"><img src="'.meta('client_image').'" alt="" /></span>';
                                    endif; 
                                    echo '<div class="author_box">';
                                        echo '<h5>'.meta('client_name').'</h5>';
                                        if(meta('client_designation')):
                                            echo '<p class="m-0">'.meta('client_designation').'</p>';
                                        endif;
                                    echo '</div>';
                                ?>
                            </div>

                            <?php
                             if ( $client_comment ) {
                                if ( count( $paragraphs[0] ) > 1 ) {
                                    echo '<div class="mt-2">';
                                    for ( $i = 1; $i < count( $paragraphs[0] ); $i++ ) {
                                        echo wp_kses_post( $paragraphs[0][$i] );
                                    }
                                    echo '</div>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div><!--.client_comment-->

            </div><!--section-column-->
        </section>
    </article>
    <?php
  }
}
?>
<?php get_footer(); ?>