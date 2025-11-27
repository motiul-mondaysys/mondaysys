<?php
/**
 * Template Name: Careers
 */
get_header();
global $post;
$sections = array(
    'job_post_bottom'   => (int) meta('section_order_1'),
    'expertise'     => (int) meta('section_order_2'),
    'trusted_featured'    => (int) meta('section_order_3'),
    'mondaysys_culture'      => (int) meta('section_order_4'),
    'technology_partner'  => (int) meta('section_order_5'),
    'emmplyee_benifits'      => (int) meta('section_order_6'),
    'hiring_process'   => (int) meta('section_order_7'),
    'employee_testimonial'    => (int) meta('section_order_8'),
    'case_studies'    => (int) meta('section_order_9'),
    'footer_above'    => (int) meta('section_order_10')
);
asort($sections); 
    while ( have_posts() ) : the_post();
    $featured_image_url = get_the_post_thumbnail_url( $post->ID, 'full' ); ?>

    <section class="inner_page_hero position-relative" style="--banner-bg:url(
        <?php if($featured_image_url){ 
            echo $featured_image_url; } 
        else { 
            echo 'var(--body-bg)';
        } ?>);">
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
        <div class="position-relative py-1" style="background-color: var(--tertiary-color);">
            <div class="container" >
                <h4 class="mb-0 fw-500">Job Openings</h4>
            </div>
        </div>
    </section>
    <section class="border-container">
        <div class="empty-column"></div>
        <div class="section-column">
            <div class="jobs_container grid-row" style="--desk-col: 4fr 8fr; --mob-col:1fr;">
                <?php echo do_shortcode('[jobs_list]') ?>
            </div>
        </div>
    </section>
<?php foreach ($sections as $key => $order) : 
    switch ($key) :
        case 'job_post_bottom':
            if ( empty( meta('section_hide_1') ) ) : ?>
                <section class="border-container">
                    <div class="empty-column"></div>
                    <div class="section-column px-md-2 px-1 py-3 py-lg-7">
                        <?php
                            $content_custom = wpautop( meta('career_post_bottom_text'));
                            preg_match_all( '/<h5[^>]*>(.*?)<\/h5>/', $content_custom, $h5_matches );
                            preg_match_all( '/<p[^>]*>(.*?)<\/p>/', $content_custom, $paragraphs );
                                if ( ! empty( $h5_matches[1] ) ) {
                                    echo '<h5 class="py-1" style="color:#002F5F">' . wp_kses_post( $h5_matches[1][0] ) . '</h5>';
                                }
                                if ( ! empty( $paragraphs[1] ) ) {
                                    echo '<p class="h3" style="line-height: 1.5em;">' . wp_kses_post( $paragraphs[1][0] ) . '</p>';
                                }

                                if ( count( $paragraphs[1] ) > 1 ) {
                                    echo '<div class="global-grid pt-3" style="--grid-col:2;--mob-grid-col:1; --gap:0">';
                                    echo '<div></div>';
                                    for ( $i = 1; $i < count( $paragraphs[1] ); $i++ ) {
                                        echo '<p>' . wp_kses_post( $paragraphs[1][$i] ) . '</p>';
                                    }
                                    echo '</div>';
                                }
                            ?>
                    </div>
                </section><?php
            endif; 
         break; 
         case 'expertise':
            if ( empty( meta('section_hide_2') ) ) : ?>
                <section class="border-container">
                    <div class="empty-column"></div>
                    <div class="section-column border-top">
                        <div class="number_counter_items grid-row" style="--desk-col:repeat(4, 1fr); --tab-col:repeat(4, 1fr); --mob-col:repeat(2, 1fr);">
                            <?php 
                            $experience_group = meta('experience_group');
                            foreach ( $experience_group as $item ) : 
                                $number = isset( $item['counter_number'] ) ? esc_html( $item['counter_number'] ) : '';
                                $prefix = isset( $item['prefix'] ) ? esc_html( $item['prefix'] ) : '';
                                $suffix = isset( $item['suffix'] ) ? esc_html( $item['suffix'] ) : '';
                                $title  = isset( $item['title'] ) ? esc_html( $item['title'] ) : '';
                                $animation_speed = rand(1000, 3000);
                            ?>
                                <div class="counter">
                                    <?php if ( ! empty( $prefix ) ) : ?>
                                        <span class="counter_prefix"><?php echo $prefix; ?></span>
                                    <?php endif; ?>
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
                </section><?php
            endif; 
         break; 
         case 'trusted_featured':
            if ( empty( meta('section_hide_3') ) ) : ?>
                <section class="border-container">
                    <div class="empty-column"></div>
                    <div class="section-column border-top">
                        <div class="service_capabilities">
                            <div class="grid-row section-spacing" style="--desk-col:1fr 1fr;  --mob-col:1fr; --tab-col:1fr;">
                                <div class="empty"></div>
                                <div>
                                <?php 
                                    if (meta('trusted_title')):
                                    echo '<h2>'.meta('trusted_title').'</h2>';
                                    endif;
                                ?>
                                </div>
                            </div>
                            <div class="global-grid personilize_item_wrap" style="--grid-col:2; --gap:0px; --mob-gap:0px; --mob-grid-col:2">
                                <?php 
                                $trusted_featured_items  = meta('trusted_featured');
                                if ( $trusted_featured_items ) : 
                                    foreach ( $trusted_featured_items as $item ) : 
                                        echo '<div class="personilize_item">';
                                            if ( ! empty( $item['icon'] ) ) {
                                                echo '<img class="mb-1" src="'. esc_html( $item['icon'] ) .'"/>';
                                            }
                                            if ( ! empty( $item['title'] ) ) {
                                                echo '<h4 class="mb-1">'. esc_html( $item['title'] ) .'</h4>';
                                            }
                                            if ( ! empty( $item['description'] ) ) {
                                                echo '<p>'. esc_html( $item['description'] ) .'</p>';
                                            }
                                        echo '</div>'; 
                                    endforeach; 
                                endif; ?>
                            </div>
                        </div>
                    </div>
                </section><?php
            endif; 
         break; 
         case 'mondaysys_culture':
            if ( empty( meta('section_hide_4') ) ) : ?>
                <section class="border-container left-square-bg">
                    <div class="empty-column position-relative"></div>
                    <div class="section-column">
                        <div class="mondaysys_culture text-light" style="background-color: var(--secondary-color);">
                            <div class="grid-row" style="--desk-col:8fr 4fr; --tab-col:1fr; --mob-col:1fr;">
                                <div class="section-spacing">
                                    <?php 
                                    if (meta('culture_title')):
                                        echo '<h2>'.meta('culture_title').'</h2>';
                                    endif;
                                    if (meta('culture_title_desc')):
                                        echo '<p class="mb-0">'.meta('culture_title_desc').'</p>';
                                    endif;
                                    ?>
                                </div>
                            </div>
                            <div class="culture_items">
                                <?php 
                                $trusted_featured_items  = meta('culture_group');
                                if ( $trusted_featured_items ) : 
                                    foreach ( $trusted_featured_items as $item ) : 
                                        echo '<div class="culture_item grid-row px-1 px-lg-2 py-lg-2 py-2" style="--desk-col: 1fr 1fr; --mob-col:1fr; ">';
                                            if ( ! empty( $item['title'] ) ) {
                                                echo '<h4 class="mb-1 mb-lg-0">'. esc_html( $item['title'] ) .'</h4>';
                                            }
                                            if ( ! empty( $item['description'] ) ) {
                                                echo '<p class="mb-0 fw-200">'. esc_html( $item['description'] ) .'</p>';
                                            }
                                        echo '</div>'; 
                                    endforeach; 
                                endif; ?>
                            </div>
                        </div>
                    </div>
                </section><?php
            endif; 
         break; 
         case 'technology_partner':
            if ( empty( meta('section_hide_5') ) ) : ?>
                <section class="border-container">
                    <div class="empty-column"></div>
                        <div class="section-column  overflow-hidden border-top">
                            <div class="our-client-title section-spacing">
                                <?php 
                                    if(meta('technology_partner_title')):
                                        echo '<h2 class="mb-2">'.meta('technology_partner_title').'</h2>';
                                    endif;
                                    if(meta('technology_partner_description')):
                                        echo '<p class="mb-0">'.meta('technology_partner_description').'</p>';
                                    endif;
                                ?>
                            </div>
                            <div class="border-top py-2 py-md-2 overflow-hidden">
                                <mondaysys-carousel 
                                data-desktop="6"
                                data-tablet="5"
                                data-mobile="3"
                                data-extra-small="2"
                                data-autoplay="true"
                                data-autoplay-delay="1"
                                data-deskitemspace="0"
                                data-mobitemspace="0"
                                data-item-speed="4000"
                                data-infinite-loop="true"
                                data-center-mode="false">
                                    <?php 
                                        $career_tech_id = get_post_meta( get_queried_object_id(), '_cmb2_select_technology_post', true );
                                        echo do_shortcode('[technology_slider post_id="'.$career_tech_id.'"]')
                                    ?>
                                </mondaysys-carousel> 
                            </div>       
                    </div>
                </section><?php
            endif; 
         break; 
         case 'emmplyee_benifits':
            if ( empty( meta('section_hide_6') ) ) : ?>
                <section class="border-container">
                    <div class="empty-column"></div>
                    <div class="section-column border-top">
                        <div class="grid-row section-spacing" style="--desk-col:11fr 13fr; --mob-col:1fr;">
                            <div></div>
                            <?php
                                echo '<div>'; 
                                    if(meta('expect_title')):
                                        echo '<h2 class="mb-2">'.meta('expect_title').'</h2>';
                                    endif;
                                    if(meta('expect_title_desc')):
                                        echo '<p class="mb-0">'.meta('expect_title_desc').'</p>';
                                    endif;
                                echo '</div>';
                            ?>
                        </div>
                        <div class="grid-row border-top" style="--desk-col:11fr 13fr; --mob-col:1fr;">
                            <div class="expect_image_area lh-0">
                                <?php
                                    if(meta('expect_section_image')):
                                        echo '<img src="'.meta('expect_section_image').'" alt="'.meta('expect_title').'" />';
                                    endif;
                                ?>
                            </div>
                            <div class="expect_grid_area grid-row" style="--desk-col: repeat(2, 1fr); --mob-col:repeat(2, 1fr); ">
                                <?php 
                                $expect_group_items  = meta('expect_group');
                                if ( $expect_group_items ) : 
                                    foreach ( $expect_group_items as $item ) : 
                                        echo '<div class="expect_item">';
                                            if ( ! empty( $item['title'] ) ) {
                                                echo '<div class="icon-with-title position-relative"><h4 class="mb-0">'. esc_html( $item['title'] ) .'</h4></div>';
                                            }
                                            if ( ! empty( $item['description'] ) ) {
                                                echo '<p class="pt-1 mb-0 fw-200">'. esc_html( $item['description'] ) .'</p>';
                                            }
                                        echo '</div>';
                                    endforeach; 
                                endif; ?> 
                            </div>
                        </div>       
                    </div>
                </section><?php
            endif; 
         break; 
         case 'hiring_process':
            if ( empty( meta('section_hide_7') ) ) : ?>
                <section class="border-container">
                    <div class="empty-column"></div>
                    <div class="section-column">
                        <div class="grid-row section-spacing" style="--desk-col:1fr 1fr; --tab-col:1fr; --mob-col:1fr;">
                            <?php if ( meta('hiring_process_title') ) : ?>
                                <h2 class="mb-0"><?php echo esc_html( meta('hiring_process_title') ); ?></h2>
                            <?php endif; ?>
                        </div>

                        <?php 
                        $hiring_process = meta('hiring_process_group');
                        if ( ! empty( $hiring_process ) ) : ?>
                            <div class="hiring_process service-accordion">
                                <?php 
                                $count = 1;
                                foreach ( $hiring_process as $item ) : 
                                    $title = isset( $item['title'] ) ? esc_html( $item['title'] ) : '';
                                    $desc  = isset( $item['description'] ) ? esc_html( $item['description'] ) : '';
                                    $active_class = ( $count === 1 ) ? 'active' : ''; 
                                ?>
                                    <div class="service-accorion-item px-1 px-md-2 grid-row <?php echo esc_attr( $active_class ); ?>" 
                                        style="--desk-col:repeat(2, 1fr); --mob-col: 3fr 9fr; --mob-gap:10px">

                                        <span class="process_number_count">
                                            <?php echo sprintf('%02d', $count); ?>
                                        </span>

                                        <div class="service-accordion-content">
                                            <?php if ( $title ) : ?>
                                                <h4><?php echo $title; ?></h4>
                                            <?php endif; ?>

                                            <?php if ( $desc ) : ?>
                                                <div class="on-hover-text">
                                                    <p class="mb-0"><?php echo $desc; ?></p>   
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
                    </div>
                </section><?php
            endif; 
         break; 
         case 'employee_testimonial':
            if ( empty( meta('section_hide_8') ) ) : ?>
                <section class="border-container">
                        <div class="empty-column"></div>
                        <div class="section-column overflow-hidden">
                            <div class="section-spacing border-top">
                                <?php 
                                    if (meta('testimonial_title')):
                                    echo '<h5 class="mb-1 fw-500" style="color:#002F5F">'.meta('testimonial_title').'</h5>';
                                    endif;
                                    if (meta('testimonial_description')):
                                    echo '<p class="h3">'.meta('testimonial_description').'</p>';
                                    endif;
                                ?>
                            </div>
                            <div class="our_approach_slider border-top overflow-hidden">
                                <mondaysys-carousel 
                                    data-desktop="2"
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
                                            $testimonial_group  = meta('testimonial_group');
                                            if ( $testimonial_group ) : 
                                                foreach ( $testimonial_group as $item ) : 
                                                    echo '<li class="swiper-slide">';
                                                        echo '<div class="testimonial_author">';
                                                            echo '<span><img src="'.$item['image'].'" alt="'.$item['title'].'"/></span>';
                                                            echo '<div>';
                                                                echo '<h4 class="mb-0">'. esc_html( $item['title'] ) .'</h4>';
                                                                echo '<p class="mb-0">'.$item['designation'].'</p>';
                                                            echo '</div>';
                                                        echo '</div>';
                                                        if ( ! empty( $item['content'] ) ) {
                                                            echo '<div>'. wpautop( $item['content'] ) .'</div>';
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
                </section><?php
            endif; 
         break; 
         case 'case_studies':
            if ( empty( meta('section_hide_9') ) ) : ?>
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
                    </div>
                </section><?php
            endif; 
         break; 
         case 'footer_above':
            if ( empty( meta('section_hide_10') ) ) : ?>
                <section class="border-container">
                    <div class="empty-column"></div>
                    <div class="section-column">
                        <div class="grid-row" style="--desk-col: 1fr 1fr; --mob-col:1fr;">
                            <div class="lh-0 text-end"><?php echo meta_image('footer_above_image'); ?></div>
                            <div class="footer_above_right text-light px-1 px-lg-3 py-4 d-flex flex-wrap flex-column justify-content-center">
                                <?php 
                                    if(meta('footer_above_title')):
                                        echo '<h2>'.meta('footer_above_title').'</h2>';
                                    endif;
                                    if(meta('footer_above_desc')):
                                        echo '<p class="mb-0">'.meta('footer_above_desc').'</p>';
                                    endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </section><?php 
            endif;
         break;
    endswitch;
endforeach; ?>

<?php  endwhile;
get_footer(); 
?>