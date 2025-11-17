<?php
/**
* Output Banner Slideshow
**/
if ( ! function_exists( 'mondaysys_banner_slideshow' ) ) {
    function mondaysys_banner_slideshow() {
        ob_start();
        ?>
        <banner-slideshow class="position-relative">
            <div class="swiper banner-slideshow">
                
                <div class="swiper-wrapper">
                    <?php
                    $args = array(
                        'post_type'      => 'banner_slideshow',
                        'posts_per_page' => -1,
                        'orderby'        => 'menu_order',
                        'order'          => 'ASC'
                    );

                    $banner_query = new WP_Query($args);
                    if ( $banner_query->have_posts() ) :
                        while ( $banner_query->have_posts() ) : $banner_query->the_post();
                            $post_id = get_the_ID();
                            $accent_bg     = get_post_meta($post_id, '_cmb2_slideshow_accent_bg', true);
                            $accent_color  = get_post_meta($post_id, '_cmb2_slideshow_accent_color', true);
                            $btn_text      = get_post_meta($post_id, '_cmb2_btn_text', true);
                            $btn_link      = get_post_meta($post_id, '_cmb2_btn_link', true);
                            $excerpt       = get_post_meta($post_id, '_cmb2_slider_content', true);
                            $title         = get_the_title();
                            $image_url     = get_the_post_thumbnail_url($post_id, 'full');

                            if ( ! $image_url ) {
                                $image_url = get_stylesheet_directory_uri() . '/assets/images/banner-slider-img-1.jpg';
                            }
                            ?>
                            <div class="swiper-slide">
                                <div class="banner-slider-item overflow-hidden" style="--slider-color:<?php echo esc_attr($accent_bg); ?>; --slider-text-color:<?php echo esc_attr($accent_color); ?>">
                                    <div class="slider_title" data-excerpt="<?php echo esc_attr( wp_strip_all_tags( $excerpt ) ); ?>">
                                        <h2 class="m-0 h1"><?php echo esc_html( $title ); ?></h2>
                                    </div>

                                    <div class="slider_content align-items-end">
                                        <div class="slider_excerpt">
                                            <div class="excertp_wrap">
                                                <?php if ( $excerpt ) : ?>
                                                    <p><?php echo esc_html( $excerpt ); ?></p>
                                                <?php endif; ?>

                                                <?php if ( $btn_text && $btn_link ) : ?>
                                                    <a class="btn btn-primary" href="<?php echo esc_url( $btn_link ); ?>">
                                                        <?php echo esc_html( $btn_text ); ?>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="slider_image position-relative lh-0">
                                            <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $title ); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<p>No banner slides found.</p>';
                    endif;
                    ?>
                </div><!-- swiper-wrapper -->
                <div class="swiper-pagination"></div>
            </div><!-- swiper -->
        </banner-slideshow>
        <?php
        return ob_get_clean();
    }
}

/**
* Output Testimonial Carousel
*/
if ( ! function_exists( 'testimonial_slider' ) ) { 
    function testimonial_slider() {
        ob_start();
        ?>
        <mondaysys-carousel 
            data-desktop="1"
            data-tablet="1"
            data-mobile="1"
            data-extra-small="1"
            data-autoplay="true"
            data-autoplay-delay="7000"
            data-deskitemspace="20"
            data-mobitemspace="10"
            data-item-speed="1000"
            data-infinite-loop="true"
            data-center-mode="false"
            data-direction="left"
            class="testimonial-slideshow">

            <div class="swiper mondaysys_carousel">
                <div class="swiper-wrapper">
                    <?php
                    $args = array(
                        'post_type'      => 'testimonials',
                        'posts_per_page' => -1,
                        'orderby'        => 'menu_order',
                        'order'          => 'ASC'
                    );

                    $testimonial_query = new WP_Query( $args );

                    if ( $testimonial_query->have_posts() ) :
                        while ( $testimonial_query->have_posts() ) : $testimonial_query->the_post();
                            $designation  = get_post_meta( get_the_ID(), '_cmb2_designation', true );
                            $author_img   = get_the_post_thumbnail_url( get_the_ID(), 'medium' );

                            if ( ! $author_img ) {
                                $author_img = get_stylesheet_directory_uri() . '/assets/images/demo-author.jpg';
                            }
                            ?>
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="testimonial-author-box">
                                        <div class="author_image pb-1">
                                            <img src="<?php echo esc_url( $author_img ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
                                        </div>
                                        <div class="author_designation">
                                            <h5><?php the_title(); ?></h5>
                                            <?php if ( $designation ) : ?>
                                                <p class="m-0"><?php echo esc_html( $designation ); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="testimonial-content">
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<p>No testimonials found.</p>';
                    endif;
                    ?>
                </div><!-- .swiper-wrapper -->

                <div class="swiper-button-next btn-slider">
                    <svg width="18" viewBox="0 0 18 20" xmlns="http://www.w3.org/2000/svg"><path d="M13.3754 9.07639H0V11.0556L13.239 10.9236L13.6484 11.3194L13.3754 11.5833L6.68772 17.9167L8.32553 19.5C11.4192 16.5532 17.6611 10.6069 17.8794 10.3958C18.0978 10.1847 17.9704 9.78009 17.8794 9.60417L8.46202 0.5L6.82421 2.08333L13.6484 8.68056L13.3754 9.07639Z"/></svg>
                </div>

                <div class="swiper-button-prev btn-slider">
                    <svg width="18" viewBox="0 0 18 20" xmlns="http://www.w3.org/2000/svg"><path d="M4.62455 10.9236L18 10.9236L18 8.94444L4.76104 9.07639L4.35158 8.68055L4.62455 8.41666L11.3123 2.08333L9.67447 0.499999C6.58083 3.44676 0.33895 9.39305 0.120576 9.60416C-0.0977985 9.81528 0.0295857 10.2199 0.120576 10.3958L9.53798 19.5L11.1758 17.9167L4.35158 11.3194L4.62455 10.9236Z"/></svg>
                </div>
            </div><!-- .swiper -->
        </mondaysys-carousel>
        <?php
        return ob_get_clean();
    }
}

/**
* Output Working Process
*/
if ( ! function_exists( 'display_working_process' ) ) {
    function display_working_process() {
        $args = array(
            'post_type'      => 'working_process',
            'posts_per_page' => -1,
            'orderby'        => 'menu_order',
            'order'          => 'ASC'
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) :
            ob_start(); 
            ?>
            <!-- Desktop Process Steps -->
            <div class="process_steps d-none d-md-flex">
                <?php 
                $counter = 1;
                while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="service-accorion-item <?php echo $counter === 1 ? 'active' : ''; ?>">
                        <div class="process_inner_wrap">
                            <span class="number-circle"><?php echo sprintf('%02d', $counter); ?></span>
                            <h4><?php the_title(); ?></h4>
                            <div class="process_content"><?php the_content(); ?></div>
                        </div>
                    </div>
                <?php 
                    $counter++;
                endwhile; 
                ?>
            </div>

            <!-- Mobile Carousel -->
            <mondaysys-carousel 
                data-desktop="4"
                data-tablet="2"
                data-mobile="1"
                data-extra-small="1"
                data-autoplay="true"
                data-autoplay-delay="7000"
                data-deskitemspace="20"
                data-mobitemspace="10"
                data-item-speed="1000"
                data-infinite-loop="true"
                data-center-mode="false"
                data-direction="left"
                class="d-md-none px-1 mobile-process-slider">

                <div class="swiper mondaysys_carousel">
                    <div class="swiper-wrapper">
                        <?php 
                        $counter = 1;
                        $query->rewind_posts();
                        while ($query->have_posts()) : $query->the_post(); ?>
                            <div class="swiper-slide">
                                <span class="number-circle"><?php echo sprintf('%02d', $counter); ?></span>
                                <h4 data-title="<?php the_title(); ?>"></h4>
                                <div class="mob-process-content" data-content="<?php echo esc_attr(strip_tags(get_the_content())); ?>">
                                </div>
                            </div>
                        <?php 
                            $counter++;
                        endwhile; 
                        ?>
                    </div>
                </div>
            </mondaysys-carousel>
            <?php
            wp_reset_postdata();
            return ob_get_clean();
        endif;
    }
}

/**
* Output FAQs
*/
if ( ! function_exists( 'display_faqs_init' ) ) {
    function display_faqs_init( $atts ) {
        $atts = shortcode_atts( array(
            'cat_name' => '', 
        ), $atts );

        $tax_query = array();

        if ( ! empty( $atts['cat_name'] ) ) {
            $tax_query[] = array(
                'taxonomy' => 'faq_cat',
                'field'    => 'term_id',
                'terms'    => array( $atts['cat_name'] ), // FIXED
            );
        }

        $args = array(
            'post_type'      => 'faqs',
            'posts_per_page' => -1,
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
            'tax_query'      => $tax_query,
        );

        $faq_query = new WP_Query($args);

        if ($faq_query->have_posts()) :
            ob_start(); 
            
            while ($faq_query->have_posts()) : $faq_query->the_post(); ?>
                <div class="toggle-item">
                    <div class="toggle-header">
                        <h4><?php the_title(); ?></h4>
                        <button class="toggle-icon"></button>
                    </div>
                    <div class="toggle-content">
                        <?php the_content(); ?>
                    </div>
                </div>
            <?php 
            endwhile; 

            wp_reset_postdata();
            return ob_get_clean();
        endif;
    }
    add_shortcode('display_faqs', 'display_faqs_init');
}



function mondaysys_case_studies_loop() {
    ob_start();

    $args = array(
        'post_type'      => 'case_studies',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
    );

    $case_query = new WP_Query($args);

    if ($case_query->have_posts()) :
        $count = 0;
        while ($case_query->have_posts()) : $case_query->the_post();
            $count++;
            $post_id = get_the_ID();
            $title   = get_the_title();
            $image   = get_the_post_thumbnail_url($post_id, 'large') ?: get_stylesheet_directory_uri() . '/assets/images/service-image.jpg';
            $permalink = get_permalink($post_id);
            $terms = get_the_terms($post_id, 'case_study_cat');
            $logo_url = get_post_meta( $post_id, '_cmb2_logo', true );
            $logo_attachment_id = attachment_url_to_postid( $logo_url );
            $category_name = '';
            if (!empty($terms) && !is_wp_error($terms)) {
                $category_name = $terms[0]->name;
            }
            ?>

            <div class="service-accorion-item case_study_item px-1 px-md-2 grid-row <?php echo $count === 1 ? 'active' : ''; ?>" style="--desk-col:1fr 1fr; --mob-col: 1fr; --desk-gap:0px;">
                
                <?php if ($category_name) : ?>
                    <h5 class="d-none fw-200 d-md-block cat_title"><?php echo esc_html($category_name); ?></h5>
                <?php endif; ?>
                <div class="service-accordion-content">
                    <h4><a href="<?php echo esc_url($permalink); ?>"><?php echo esc_html($title); ?></a></h4>
                    <div class="on-hover-text">
                        <?php if(get_post_meta($post_id, '_cmb2_short_description', true)){
                            echo '<p>'.get_post_meta($post_id, '_cmb2_short_description', true).'</p>';
                        } ?>
                        <span class="position-relative lh-0" data-title="<?php echo esc_attr($title); ?>">
                            <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>">
                                <a class="hover_logo lh-0" href="<?php echo $permalink; ?>">
                                    <?php 
                                        if($logo_url){
                                            echo  wp_get_attachment_image( $logo_attachment_id, 'medium' );
                                        } else {
                                            echo esc_attr($title);
                                        }
                                    ?>
                                </a>
                        </span>
                    </div>
                </div>
                <div class="btn-icon text-end">
                    <a class="accordion_link" href="<?php echo esc_url($permalink); ?>"><svg xmlns="http://www.w3.org/2000/svg" fill="none" width="20" viewBox="0 0 24 24"><path  d="M17 4.632V3.35H0V0h24v24h-3.349V7h-1.283L2.97 23.398.602 21.03z"></path></svg></a>
                </div>
            </div>

            <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo '<p>No case studies found.</p>';
    endif;

    return ob_get_clean();
}
add_shortcode('case_studies_list', 'mondaysys_case_studies_loop');



//Show Technology Slider
add_shortcode( 'technology_slider', 'technology_slider_init' );
function technology_slider_init( $atts ) {
    $selected_post_id = get_post_meta( get_queried_object_id(), '_cmb2_select_technology_post', true );
    $args = shortcode_atts( array(
        'post_id' => $selected_post_id, 
    ), $atts );

    $post_id = $args['post_id'];

    if ( empty( $post_id ) ) {
        return '<p>No technology post selected.</p>';
    }
    $args_technology = array(
        'post_type'      => 'technology',
        'posts_per_page' => 1,
        'p'              => $post_id,
    );

    $query_technology = new WP_Query( $args_technology );

    $output = '';

    if ( $query_technology->have_posts() ) {

        while ( $query_technology->have_posts() ) : $query_technology->the_post();

            $tech_logo  = meta('technology_logo');
            $tech_title = meta('technology_title_group');

            if ( $tech_logo ) {
                $output .= '<div class="swiper mondaysys_carousel marquee_slide">';
                $output .= '<ul class="swiper-wrapper unorder-list">';

                foreach ( $tech_logo as $attachment_id => $attachment_url ) {
                    $output .= '<li class="swiper-slide"><span class="marqee_logo"><img src="'. esc_url( $attachment_url ) .'" alt=""></span></li>';
                }

                $output .= '</ul></div>';

            } else {
                $output .= '<ul class="marquee-list unorder-list">';
                if ( !empty($tech_title) ) {
                    foreach ( $tech_title as $item ) {
                        if ( !empty( $item['title'] ) ) {
                            $output .= '<li><span class="techonology_title">'. $item['title'] .'</span></li>';
                        }
                    }
                }
                $output .= '</ul>';
            }
        endwhile;
    }
    wp_reset_postdata();
    return $output;
}



// Mondaysys Main Services
add_shortcode( 'mondaysys_services', 'mondaysys_services_shortcode' );
function mondaysys_services_shortcode($atts) {	
	$args = array(
		'post_type' => 'mondaysys_services',
		'posts_per_page' => -1, 
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
		'ignore_sticky_posts' => 1		
	);
				
	$query = new WP_Query($args);	
	
	$output = '';
	$counter = 1; 

	if ($query->have_posts()) :  
		while ($query->have_posts()) : $query->the_post(); 
			global $post;
			$title        = get_the_title();
			$image        = get_the_post_thumbnail_url($post->ID, 'full');
            $output .='<div class="stack_card is-' . $counter . '" data-title="'.esc_html($title).'">';
                    $output .='<div class="global-grid" style="
                            --grid-col:2; 
                            --gap:0; 
                            --mob-grid-col:1; 
                            --mob-gap:0px;
                            --bg-color:'.meta('accent_bg').';
                            --text-color:'.meta('accent_color').';
                            ">';
                            $output .='<div class="service_content_area">';
                                $output .='<h3><a href="' . get_permalink() . '">'.esc_html($title).' <svg  viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.2778 4.88889L0.611111 19.5556L2.44444 21.3889L17.7222 6.11111H18.9444V22H22V0H0V3.05556H15.2778V4.88889Z"/></svg></a> <span>'.sprintf('%02d', $counter).'</span></h3>';
                                
                                $output .='<div class="service_excerpt">'.apply_filters('the_content', get_the_content()).'</div>';

                                //$output .='<div class="service_btn_wrap"><a href="' . get_permalink() . '" class="btn btn-tertiary">Learn more</a></div>';
                            $output .='</div>';
                            $output .='<div class="service_image_area lh-0">';
                                $output .='<a href="'.get_permalink().'">';
                                if ( has_post_thumbnail() ):
                                    $output .= get_the_post_thumbnail($post->ID, 'full');
                                endif;
                                $output .='</a>';
                            $output .='</div>';
                        $output .='</div>';
            $output .='</div>';
			$counter++; 
			
		endwhile;
	endif;
	wp_reset_postdata();
	return $output;				 
}//End

//industries Shortocde
add_shortcode( 'display_industries', 'industries_services_shortcode' );
function industries_services_shortcode() {	
	$args = array(
		'post_type' => 'industries',
		'posts_per_page' => -1, 
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
		'ignore_sticky_posts' => 1		
	);
				
	$query = new WP_Query($args);	
	
	$output = '';

	if ($query->have_posts()) :  
		while ($query->have_posts()) : $query->the_post(); 
			global $post;
            $icon_id = get_post_meta($post->ID, '_cmb2_icon', true);
			$icon_url = '';
			if ($icon_id) {
				if (is_numeric($icon_id)) {
					$icon_url = wp_get_attachment_url($icon_id);
				} else {
					$icon_url = esc_url($icon_id);
				}
			}
            $output .='<div class="indistry-service-box">';
                $output .=' <a href="'.get_permalink().'"><img src="'.$icon_url.'" alt="'.get_the_title().'"></a>';
                    $output .='<h5>'.get_the_title().'</h5>';
            $output .='</div>';
			
		endwhile;
	endif;
	wp_reset_postdata();
	return $output;				 
}
