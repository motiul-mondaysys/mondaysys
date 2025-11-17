<?php
/**
 * Template Name: Service Page
 */
get_header();

    while ( have_posts() ) : the_post();
        ?>
            <section class="all_service_hero">
                <div class="container">
                    <div class="grid-row" style="--desk-col:1fr 1fr; --mob-col: 1fr;">
                        <h1 class="pt-5 pt-lg-4"><?php the_title(); ?></h1>
                        <div class="border-left pt-2 pt-lg-8 px-0 px-md-2 pb-2">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
                <div class="lh-0 service_feature_bg position-relative">
                    <?php 
                        if ( has_post_thumbnail() ) {
                            echo get_the_post_thumbnail( $post->ID, 'full' ); 
                        }
                    ?>
                </div>
                <div class="fw-btn-section position-relative py-1 px-1 px-md-2" style="background:var(--primary-color);">
                    <div class="container grid-row align-item-center" style="--desk-col:1fr 1fr; --mob-col: 8fr 4fr;">
                        <span class="h4 text-light">Book a Discovery Call</span>
                        <a class="view_all_casestuday btn" href="#"></a>
                    </div>
                </div>
            </section>
            <section class="border-container">
                <div class="empty-column"></div>
                <div class="section-column">
                    <?php /*
                        for ($i = 1; $i <= 5; $i++):
                            $cat_name = meta('service_cat_name_' . $i);
                            $service_items = meta('service_box_items_' . $i);

                            if ($cat_name):
                                echo '<h2 class="section-spacing">' . esc_html($cat_name) . '</h2>';
                            endif;

                            if (!empty($service_items)):
                                echo '<div class="service_item_grid">';
                                $counter = 0;
                                foreach ($service_items as $item):
                                    $counter++;
                                    echo '<div class="service_list_item">';
                                        echo '<span class="h2 pb-lg-4 pb-3 d-block">' . sprintf('%02d', $counter) . '</span>';
                                        echo '<h4><a href="' . esc_url($item['link']) . '">' . esc_html($item['title']) . '</a></h4>';
                                        echo '<p class="mb-0">' . esc_html($item['content']) . '</p>';
                                    echo '</div>';
                                endforeach;
                                echo '</div>';
                            endif;
                        endfor;*/
                        ?>
                        <h2 class="section-spacing"><?php echo meta('all_service_title') ?></h2>
                        <div class="service_item_grid">
                            <?php 
                            $args = array(
                                'post_type'      => 'mondaysys_services',
                                'posts_per_page' => -1,
                                'post_status'    => 'publish',
                                'orderby'        => 'menu_order',
                                'order'          => 'ASC'
                            );

                            $services_query = new WP_Query($args);
                            $counter = 0;

                            if ( $services_query->have_posts() ) :
                                while ( $services_query->have_posts() ) : $services_query->the_post();
                                    $counter++;
                                    ?>
                                    <div class="service_list_item position-relative">
                                        <span class="h2 pb-lg-4 pb-3 d-block">
                                            <?php echo sprintf('%02d', $counter); ?>
                                        </span>
                                        <h4>
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </h4>
                                        <p class="mb-0">
                                            <?php 
                                                $content = apply_filters( 'the_content', get_the_content() );
                                                if ( preg_match( '/<p>(.*?)<\/p>/i', $content, $matches ) ) {
                                                    echo $matches[0]; 
                                                }
                                             ?>
                                        </p>
                                    </div>
                                <?php 
                                endwhile; 
                                wp_reset_postdata();
                            else :
                                echo '<p>No services found.</p>';
                            endif;
                            ?>
                    </div>
                </div>
            </section>
            <section class="border-container">
                <div class="empty-column"></div>
                <div class="section-column">
                    <div class="grid-row position-relative technologies_use py-3 py-lg-7 px-md-2 px-1 border-top" style="--desk-col:1fr 1fr; --tab-col:5fr 7fr; --mob-col:1fr; --desk-gap:5vw; --tab-gap:10px;">
                        
                        <div class="technology-left-area position-relative">
                            <div class="stikcy_area">
                                <?php if (meta('technology_section_title' ) ) : ?>
                                    <h2><?php echo esc_html( meta('technology_section_title' ) ); ?></h2>
                                <?php endif; ?>

                                <?php if ( meta('technology_section_des') ) : ?>
                                    <p><?php echo esc_html( meta('technology_section_des') ); ?></p>
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
                                            echo '<div class="technology_logo_grid grid-row align-item-center" style="--desk-col: repeat(5, 1fr); --mob-col: repeat(3, 1fr); --desk-gap:10px;">';
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
                <div class="section-column overflow-hidden">
                    <div class="client_approach border-top">
                        <?php 
                            if (meta('approach_section_title' )):
                            echo '<h2 class="mb-0 section-spacing">'.meta('approach_section_title').'</h2>';
                            endif;
                        ?>
                        <div class="our_approach_slider border-top overflow-hidden">
                            <mondaysys-carousel 
                                data-desktop="3"
                                data-tablet="2"
                                data-mobile="1"
                                data-extra-small="1"
                                data-autoplay="true"
                                data-autoplay-delay="5000"
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
                    </div><!--End Section Client Approach-->
                    <div class="border-top pb-3 pb-lg-2">
                        <div class="grid-row section-spacing" style="--desk-col:11fr 1fr; --mob-col:1fr;">
                            <div>
                                <?php
                                    if(meta('testimonial_section_title')):
                                        echo '<h5 style="color:#5A0000">'.meta('testimonial_section_title').'</h5>';
                                    endif;
                                    if(meta('testimonial_section_desc')):
                                        echo '<p class="h3 pt-1 pb-2" style="line-height: 1.4em;">'.meta('testimonial_section_desc').'</p>';
                                    endif;
                                ?>
                            </div>
                            <div class="empty"></div>
                        </div>
                        <div class="px-1 px-lg-2">
                            <div class="pt-2 overflow-hidden service_testimonial position-relative">
                                <?php echo testimonial_slider(); ?>
                            </div>
                        </div>
                    </div><!--End Testimonials--->
                </div><!--End .section-column-->
            </section>
            <?php if (meta('title_faqs')): ?>
                <section class="border-container section-faq">
                    <div class="empty-column"></div>
                    <div class="section-column border-top">
                        <h2 class="mb-0 section-spacing"><?php echo meta('title_faqs'); ?></h2>
                        <?php 
                            $faq_cat = wp_get_post_terms( get_the_ID(), 'faq_cat' );
                            if ( ! empty( $faq_cat ) ) {
                                $cat_id = $faq_cat[0]->term_id;
                                echo do_shortcode('[display_faqs cat_name="'.$cat_id.'"]');
                            } else {
                                echo do_shortcode('[display_faqs]');
                            }
                        ?>
                    </div>
                </section>
            <?php endif ; ?>
            <?php if (meta('footer_above_title')): ?>
                <section class="border-container">
                    <div class="empty-column"></div>
                    <div class="section-column">
                        <div class="footer_above_business_growth text-light">
                            <h2 class="h1"><?php echo meta('footer_above_title'); ?></h2>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
        <?php
    endwhile; 

 get_footer(); 
 ?>

