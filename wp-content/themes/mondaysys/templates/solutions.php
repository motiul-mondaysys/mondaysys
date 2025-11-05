<?php
/**
 * Template Name: Solutions
 */
get_header();
global $post;
    while ( have_posts() ) : the_post();
    $featured_image_url = get_the_post_thumbnail_url( $post->ID, 'full' );
    ?>
        <section class="inner_page_hero position-relative" style="--banner-bg:url(
            <?php echo $featured_image_url; ?>);">
            <div class="titbar_bottom">
                <div class="container text-light">
                        <h1 class="h2 mb-2">
                        <?php 
                            if(meta('page_title')):
                                echo meta('page_title');
                            else:
                                the_title();
                            endif;
                        ?>
                        </h1>
                    <?php 
                        $content = apply_filters( 'the_content', get_the_content() );
                        if ( preg_match( '/<p>(.*?)<\/p>/i', $content, $matches ) ) {
                            $paragraph = preg_replace('/<p>/', '<p class="mb-0">', $matches[0], 1);
                            echo $paragraph;
                        }
                    ?>
                </div>
            </div>
            <div class="fw-btn-section position-relative py-1 px-1 px-md-2">
                <div class="container global-grid align-item-center" style="--grid-col: 2; --gap: 0;--mob-grid-col:2;">
                    <span class="h4 text-light">Book a Discovery Call</span>
                    <a class="view_all_casestuday btn" href="#"></a>
                </div>
            </div>
        </section>
        <section class="border-container">
            <div class="empty-column"></div>
            <div class="section-column">
                <div class="service_capabilities">
                    <div class="grid-row section-spacing" style="--desk-col:1fr 1fr;  --mob-col:1fr; --tab-col:1fr;">
                        <div class="empty"></div>
                        <div>
                        <?php 
                            if (meta('business_goal_title' )):
                            echo '<h2>'.meta('business_goal_title').'</h2>';
                            endif;

                            if (meta('business_goal_desc')):
                            echo '<p>'.meta('business_goal_desc').'</p>';
                            endif;
                        ?>
                        </div>
                    </div>
                    <div class="global-grid personilize_item_wrap" style="--grid-col:2; --gap:0px; --mob-gap:0px; --mob-grid-col:2">
                        <?php 
                        $business_goal  = meta('benifits_group');
                        if ( $business_goal ) : 
                            foreach ( $business_goal as $item ) : 
                                echo '<div class="personilize_item">';
                                    if ( ! empty( $item['title'] ) ) {
                                        echo '<h4>'. esc_html( $item['title'] ) .'</h4>';
                                    }
                                    if ( ! empty( $item['content'] ) ) {
                                        echo '<p>'. esc_html( $item['content'] ) .'</p>';
                                    }
                                echo '</div>'; 
                            endforeach; 
                        endif; ?>
                    </div>
                </div><!--End business goal-->

                <div class="border-top mondaysys_main_service benifits_sticky service_sticky" style="background-color: var(--secondary-color);">
                    <div class="sections_features_new position-relative">
                        <div class="stack_header_container text-light">
                            <div class="global-grid pb-0" style="
                                --grid-col:2; 
                                --gap:0; 
                                --mob-grid-col:1; 
                                ">
                                <div>&nbsp;</div>
                                <h2 class="m-0 px-1 px-md-0"><?php echo meta('innovative_solution_title'); ?></h2>
                            </div>
                        </div>
                        <?php 
                        $innovative_solution_group  = meta('innovative_solution_group');
                        $counter = 0;
                        if ( $innovative_solution_group ) :
                            foreach ( $innovative_solution_group as $item ) : 
                                $counter ++;
                                $formatted_counter = ($counter < 10) ? '0' . $counter : $counter;
                                echo'<div class="stack_card text-light is-' . $counter . '">';
                                    echo '<div class="global-grid" style="
                                        --grid-col:2; 
                                        --gap:0; 
                                        --mob-grid-col:1; 
                                        --mob-gap:0px;
                                        ">';
                                            echo '<div class="service_image_area lh-0">';
                                                echo '<img src="' . esc_html( $item['image']) . '" alt="' . esc_html( $item['title'] ). '">';
                                            echo '</div>';
                                            echo '<div class="service_content_area">';
                                                echo '<h4><span>'.esc_html( $item['title'] ).'</span><span>'.$formatted_counter.'</span></h4>';
                                                echo '<div class="service_excerpt fw-200">'.wpautop($item['content']).'</div>';
                                            echo '</div>';
                                    echo '</div>';
                                echo '</div>'; 
                            endforeach; 
                        endif;
                        ?>
                    </div>
                </div><!--End innovative solution-->

                <div class="fintech_solution">
                    <div class="grid-row section-spacing" style="--desk-col: 6fr 6fr; --mob-col: 1fr;">
                        <div></div>
                        <div>
                            <h2><?php echo meta('fintech_solution_title'); ?></h2>
                            <?php if(meta('fintech_solution_desc')):
                                echo '<p>'.meta('fintech_solution_desc').'</p>';
                            endif ?>
                        </div>
                    </div>
                    <?php 
                        $fintech_solution = meta('fintech_solution_group');
                        if ($fintech_solution):
                            foreach ($fintech_solution as $item): 
                                $title = isset($item['title']) ? $item['title'] : '';
                                $description = isset($item['description']) ? $item['description'] : '';
                                ?>
                                <div class="grid-row why_choose_item px-1 px-lg-2 py-2 py-lg-2 border-top" style="--desk-col:6fr 6fr; --tab-col:4fr 8fr; --mob-col: 4fr 8fr; --mob-gap:10px">
                                    <h5 class="m-0"><?php echo esc_html($title); ?></h5>
                                    <div class="why_choose_item_content">
                                        <?php echo wpautop($description); ?>
                                    </div>
                                </div>
                                <?php 
                            endforeach; 
                        endif;
                    ?>
                </div><!--End fintech_solution-->

                <div class="our_process border-top">
                    <div class="grid-row section-spacing" style="--desk-col:1fr 1fr; --mob-col:1fr;">
                        <div></div>
                        <?php if ( meta('process_main_title' ) ) : ?>
                            <h2 class="mb-0"><?php echo esc_html( meta('process_main_title') ); ?></h2>
                        <?php endif; ?>
                    </div>

                    <?php 
                    $solution_process_group = meta('solution_process_group');
                    if ( ! empty( $solution_process_group ) ) : ?>
                        <div class="delivery_process service-accordion">
                            <?php 
                            $count = 1;
                            foreach ( $solution_process_group as $item ) : 
                                $active_class = ( $count === 1 ) ? 'active' : ''; 
                            ?>
                                <div class="service-accorion-item px-1 px-md-2 grid-row <?php echo esc_attr( $active_class ); ?>" 
                                    style="--desk-col:repeat(2, 1fr); --mob-col: 3fr 9fr; --mob-gap:10px">

                                    <span class="process_number_count">
                                        <?php echo sprintf('%02d', $count); ?>
                                    </span>

                                    <div class="service-accordion-content">
                                        <?php if ( $item['title'] ) : ?>
                                            <h4><?php echo $item['title']; ?></h4>
                                        <?php endif; ?>

                                        <?php if ( $item['description']) : ?>
                                            <div class="on-hover-text">
                                               <?php  echo wp_kses_post($item['description']); ?> 
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php 
                                $count++;
                            endforeach; 
                            ?>
                        </div>
                    <?php endif; ?>
                </div><!--End solution Process-->
            </div><!--End .section-column-->
        </section>
        
        <section class="border-container">
            <div class="empty-column"></div>
            <div class="section-column">
                <?php 
                    if (meta('key_benefits_title' )):
                        echo '<h2 class="mb-0 section-spacing border-top">'.meta('key_benefits_title' ).'</h2>';
                    endif;
                ?>
                <div class="service_benifites position-relative border-top pt-2 px-1 px-lg-2">
                    <?php 
                    $key_benifits_group  = meta('key_benifits_group');
                    if ( $key_benifits_group ) : 
                        foreach ( $key_benifits_group as $item ) : 
                            echo '<div class="benefits_item">';
                                echo '<div class="circle"><span>&nbsp;</span></div>';
                                echo '<div class="benefits_content">';
                                    if ( ! empty( $item['title'] ) ) {
                                        echo '<h4>'. esc_html( $item['title'] ) .'</h4>';
                                    }
                                echo '</div>';
                            echo '</div>'; 
                        endforeach; 
                    endif; ?>
                </div>
            </div>
        </section>

        <section class="border-container">
            <div class="empty-column"></div>
            <div class="section-column overflow-hidden">
                <div class="client_approach border-top">
                    <?php 
                        if (meta('approach_section_title')):
                        echo '<h2 class="mb-0 section-spacing">'.meta('approach_section_title').'</h2>';
                        endif;
                    ?>
                    <div class="our_approach_slider border-top overflow-hidden">
                        <mondaysys-carousel 
                            data-desktop="3"
                            data-tablet="2"
                            data-mobile="1"
                            data-extra-small="1"
                            data-autoplay="false"
                            data-autoplay-delay="50000"
                            data-deskitemspace="0"
                            data-mobitemspace="0"
                            data-item-speed="500"
                            data-infinite-loop="true"
                            data-center-mode="false">
                            <div class="swiper mondaysys_carousel">
                                <ul class="swiper-wrapper unorder-list">
                                    <?php 
                                    $approach_items  = meta('approach_group');
                                    if ( $approach_items ) : 
                                        foreach ( $approach_items as $item ) : 
                                            echo '<li class="swiper-slide">';
                                                if ( ! empty( $item['title'] ) ) {
                                                    echo '<h4>'. esc_html( $item['title'] ) .'</h4>';
                                                }
                                                if ( ! empty( $item['content'] ) ) {
                                                    echo '<p>'. esc_html( $item['content'] ) .'</p>';
                                                }
                                            echo '</li>'; 
                                        endforeach; 
                                    endif; ?>
                                </ul>
                                <div class="swiper-button-next btn-slider">
                                    <svg width="18" viewBox="0 0 18 20" xmlns="http://www.w3.org/2000/svg"><path d="M13.3754 9.07639H0V11.0556L13.239 10.9236L13.6484 11.3194L13.3754 11.5833L6.68772 17.9167L8.32553 19.5C11.4192 16.5532 17.6611 10.6069 17.8794 10.3958C18.0978 10.1847 17.9704 9.78009 17.8794 9.60417L8.46202 0.5L6.82421 2.08333L13.6484 8.68056L13.3754 9.07639Z"/></svg>
                                </div>

                                <div class="swiper-button-prev btn-slider">
                                    <svg width="18" viewBox="0 0 18 20" xmlns="http://www.w3.org/2000/svg"><path d="M4.62455 10.9236L18 10.9236L18 8.94444L4.76104 9.07639L4.35158 8.68055L4.62455 8.41666L11.3123 2.08333L9.67447 0.499999C6.58083 3.44676 0.33895 9.39305 0.120576 9.60416C-0.0977985 9.81528 0.0295857 10.2199 0.120576 10.3958L9.53798 19.5L11.1758 17.9167L4.35158 11.3194L4.62455 10.9236Z"/></svg>
                                </div>
                            </div>
                        </mondaysys-carousel>
                    </div>
                </div>
            </div>
        </section>
        <section class="border-container md-px-0 left-square-bg">
                <div class="empty-column position-relative"></div>
                <div class="section-column position-relative  overflow-hidden">
                    <?php if (meta('testimonial_title')): ?>
                        <div class="grid-row border-top section-spacing" style="--desk-col: 1fr 1fr; --mob-col:1fr;">
                            <div></div>
                            <h2><?php echo meta('testimonial_title'); ?></h2>
                        </div>
                    <?php endif; ?>
                    <div class="testimonial">
                        <?php echo testimonial_slider(); ?>
                    </div>
                </div>
            </section>
        
        <?php if (meta('title_case_studies')): ?>
            <section class="border-container">
                <div class="empty-column"></div>
                <div class="section-column border-top">
                    <div class="our-services pb-1">
                        <div class="grid-row section-spacing" style="--desk-col:1fr 1fr; --mob-col:1fr;">
                            <div></div>
                            <h2 class="mb-0"><?php echo meta('title_case_studies'); ?></h2>
                            <div></div>
                        </div>
                        <div class="service-accordion">
                            <?php echo mondaysys_case_studies_loop(); ?>
                        </div>
                    </div>
                    <div class="fw-btn-section position-relative px-1 px-lg-2 py-1">
                        <div class="global-grid align-item-center" style="--grid-col: 2; --gap: 0;--mob-grid-col:2;">
                            <h5>All Case Studies</h5>
                            <a class="view_all_casestuday btn btn-tertiary" href="#"></a>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>


        <?php $experience_group = get_post_meta( get_the_ID(), '_cmb2_experience_group', true );
        if ( ! empty( $experience_group ) ) : ?>
            <section class="border-container">
                <div class="empty-column"></div>
                <div class="section-column">
                    <div class="grid-row section-spacing" style="--desk-col: 1fr 1fr; --mob-col: 1fr;">
                        <div></div>
                        <?php 
                            if(get_post_meta($post->ID, '_cmb2_experience_section_title', true)):
                                    echo '<h2>'.get_post_meta($post->ID, '_cmb2_experience_section_title', true).'</h2>';
                            endif;
                        ?>
                    </div>
                    <div class="number_counter_items border-top grid-row" style="--desk-col:repeat(4, 1fr); --mob-col:repeat(2, 1fr);">
                        <?php foreach ( $experience_group as $item ) : 
                            $number = isset( $item['counter_number'] ) ? esc_html( $item['counter_number'] ) : '';
                            $suffix = isset( $item['suffix'] ) ? esc_html( $item['suffix'] ) : '';
                            $title  = isset( $item['title'] ) ? esc_html( $item['title'] ) : '';
                            $animation_speed = rand(1000, 3000);
                        ?>
                            <div class="counter">
                                <span class="counter_number" 
                                    ending-number="<?php echo $number; ?>" 
                                    counter-animation="<?php echo $animation_speed; ?>">
                                    <?php echo $number ; ?>
                                </span>
                                <?php if ( ! empty( $suffix ) ) : ?>
                                    <span class="counter_suffix"><?php echo $suffix; ?></span>
                                <?php endif; ?>
                                <p class="number_title fw-300 mb-0 mt-1"><?php echo $title; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php if (meta('title_faqs')): ?>
            <section class="border-container section-faq">
                <div class="empty-column"></div>
                <div class="section-column border-top">
                    <h2 class="mb-0 section-spacing"><?php echo meta('title_faqs'); ?></h2>
                    <?php echo display_faqs_init(); ?>
                </div>
            </section>
        <?php endif ; ?>

        <?php 
            $footer_above_title = meta('footer_above_title');
            $footer_above_desc = meta('footer_above_desc');
            $small_feature_img = meta('footer_above_image');
            
        if ($footer_above_title || $footer_above_desc): ?>
            <section class="border-container">
                <div class="empty-column"></div>
                <div class="section-column">
                    <div class="grid-row" style="--desk-col: 1fr 1fr; --mob-col:1fr;">
                        <div class="lh-0 text-end"><img src="<?php echo esc_url( $small_feature_img ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>"></div>
                        <div class="footer_above_right text-light px-1 px-lg-3 py-4 d-flex flex-wrap flex-column justify-content-center">
                            <?php 
                                if($footer_above_title):
                                    echo '<h2>'.$footer_above_title.'</h2>';
                                endif;
                                if($footer_above_desc):
                                    echo '<p class="mb-0">'.$footer_above_desc.'</p>';
                                endif;
                            ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

<?php endwhile; get_footer(); ?>
