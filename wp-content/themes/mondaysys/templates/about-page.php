<?php
/**
 * Template Name: About Page
 */
get_header();
global $post;
$sections = array(
    'hero_bottom'   => (int) meta('section_order_1'),
    'counter'     => (int) meta('section_order_2'),
    'about_ceo'    => (int) meta('section_order_3'),
    'industries_service'      => (int) meta('section_order_4'),
    'technology_partner'  => (int) meta('section_order_5'),
    'delivery_process'      => (int) meta('section_order_6'),
    'benifits'   => (int) meta('section_order_7'),
    'tech_stack'    => (int) meta('section_order_8'),
    'testimonial'    => (int) meta('section_order_9'),
    'map'    => (int) meta('section_order_10'),
    'faq'    => (int) meta('section_order_11')
);
asort($sections); 
    while ( have_posts() ) : the_post();
    $featured_image_url = get_the_post_thumbnail_url( $post->ID, 'full' ); ?>

    <section class="about_page_titlebar position-relative" style="--banner-bg:url(
        <?php if($featured_image_url){ 
            echo $featured_image_url; } 
        else { 
            echo 'var(--body-bg)';
        } ?>);">
        <div class="titbar_bottom py-3 py-md-0">
            <div class="container grid-row" style="--desk-col:7fr 5fr; --mob-col:1fr">
                <h1>
                    <?php 
                    if(meta('custom_title')):
                        echo meta('custom_title');
                    else:
                        the_title();
                    endif;
                    ?>
                </h1>
                <?php 
                    $content = apply_filters( 'the_content', get_the_content() );
                    if ( preg_match( '/<p>(.*?)<\/p>/i', $content, $matches ) ) {
                        $paragraph = preg_replace('/<p>/', '<p class="border-left mb-0">', $matches[0], 1);
                        echo $paragraph;
                    }
                ?>
            </div>
        </div>
        <div class="fw-btn-section position-relative py-1 px-1 px-md-2">
            <div class="container global-grid align-item-center" style="--grid-col: 2; --gap: 0;--mob-grid-col:2;">
                <span class="h4 text-light"><?php echo meta('btn_text'); ?></span>
                <a class="view_all_casestuday btn" href="<?php echo meta('text_url'); ?>"></a>
            </div>
        </div>
    </section>
<?php foreach ($sections as $key => $order) : 
    switch ($key) :
        case 'hero_bottom':
            if ( empty( meta('section_hide_1') ) ) : ?>
                <section class="border-container">
                    <div class="empty-column"></div>
                    <div class="section-column border-top py-3 py-md-4 py-lg-7">
                        <div class="grid-row px-1 px-md-2 align-items-center" style="--desk-col: 5fr 7fr; --mob-col:1fr; --desk-gap:20px; --mob-gap:30px">
                            <div class="order-md-1">
                                <?php 
                                    if(meta('choose_sub_title')):
                                        echo '<h5 style="color:#5A0000">'.meta('choose_sub_title').'</h5>';
                                    endif;
                                    if(meta('why_choose_title')):
                                        echo '<p class="pt-1 h3 mb-1 mb-md-3">'.meta('why_choose_title').'</p>';
                                    endif;
                                    if(meta('why_choose_desc')):
                                        echo '<p class="fw-300 mb-0">'.meta('why_choose_desc').'</p>';
                                    endif;
                                ?>
                            </div>
                            <div class="text-center order-md-0">
                                <?php 
                                    if ( meta('why_choose_image') ) {
                                        echo meta_image('why_choose_image');
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </section><?php
            endif; 
         break; 
         case 'counter':
            if ( empty( meta('section_hide_2') ) ) : ?>
                <section class="border-container">
                    <div class="empty-column"></div>
                    <div class="section-column number_counter_items border-top grid-row" style="--desk-col:repeat(4, 1fr); --mob-col:repeat(2, 1fr);">
                        <?php $experience_group = meta('experience_group'); ?>
                        <?php foreach ( $experience_group as $item ) : 
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
                                    <?php echo $number . $suffix; ?>
                                </span>
                                <?php if ( ! empty( $suffix ) ) : ?>
                                    <span class="counter_suffix"><?php echo $suffix; ?></span>
                                <?php endif; ?>
                                <p class="number_title fw-300 mb-0 mt-1"><?php echo $title; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section><?php
            endif; 
         break; 
         case 'about_ceo':
            if ( empty( meta('section_hide_3') ) ) : ?>
                <section class="border-container">
                    <div class="empty-column"></div>
                    <div class="section-column number_counter_items border-top grid-row py-4  py-lg-7 px-1 px-md-2" style="--desk-col:repeat(2, 1fr); --mob-col:repeat(1, 1fr);">
                        <?php 
                        $ceo_image       = meta('ceo_image' );
                        $ceo_name        = meta('ceo_name' );
                        $ceo_designation = meta('ceo_designation' );
                        $ceo_info        = meta('ceo_info' );
                        if ( $ceo_image ) {
                            $attachment_id = attachment_url_to_postid( $ceo_image );
                            $alt   = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true );
                            $title = get_the_title( $attachment_id );
                            if ( empty( $alt ) ) {
                                $alt = $ceo_name ? $ceo_name : $title;
                            }
                        }
                        ?>

                        <div class="ceo-bio-left">
                            <?php if ( $ceo_image ) : ?>
                                <img class="mb-1" src="<?php echo esc_url( $ceo_image ); ?>" alt="<?php echo esc_attr( $alt ); ?>">
                            <?php endif; ?>

                            <?php if ( $ceo_name ) : ?>
                                <h4 class="mb-0"><?php echo esc_html( $ceo_name ); ?></h4>
                            <?php endif; ?>

                            <?php if ( $ceo_designation ) : ?>
                                <p class="fw-300"><?php echo esc_html( $ceo_designation ); ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="ceo-bio-right">
                            <?php if ( $ceo_info ) : ?>
                                <div class="ceo-info-content">
                                    <?php echo wp_kses_post( wpautop( $ceo_info ) ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </section><?php
            endif; 
         break; 
         case 'industries_service':
            if ( empty( meta('section_hide_4') ) ) : ?>
                <section class="border-container indistrial_service overflow-hidden">
                    <div class="empty-column"></div>
                    <div class="section-column border-top">
                            <h2 class="m-0 section-spacing"><?php echo meta('industry_service_title'); ?></h2>
                            <div class="global-grid indistry-item-grid" style="
                                            --grid-col:4; 
                                            --gap:0;  
                                            --mob-grid-col:2; 
                                            ">
                                <?php echo do_shortcode('[display_industries]'); ?>
                            </div>
                    </div>
                </section><?php
            endif; 
         break; 
         case 'technology_partner':
            if ( empty( meta('section_hide_5') ) ) : ?>
                <section class="border-container">
                    <div class="empty-column"></div>
                    <div class="section-column overflow-hidden <?php  if ( !empty( meta('section_hide_4') ) ): echo 'border-top'; endif; ?>">
                        <div class="grid-row section-spacing" style="--desk-col: 8fr 4fr; --mob-col:1fr; --desk-gap:0;">
                            <div>
                                <h2 class="mb-2"><?php echo meta('technology_partner_title'); ?></h2>
                                <p class="mb-0"><?php echo meta('technology_partner_description'); ?></p>
                            </div>
                        </div>
                        <div class="d-block overflow-hidden px-1 border-top py-3 py-lg-4">
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
                                        $about_logo_id = get_post_meta( get_queried_object_id(), '_cmb2_select_technology_post', true );
                                        echo do_shortcode('[technology_slider post_id="'.$about_logo_id.'"]')
                                    ?>
                                </mondaysys-carousel> 
                        </div>

                        <div class="about-inner-bg">
                            <?php if ( meta('technology_partner_image' ) ) : 
                                    echo meta_image('technology_partner_image');
                                 endif; ?>
                        </div>
                        <?php if ( meta('technology_partner_large_desc' ) ) : ?>
                            <p class="px-1 px-md-2 h3 py-3 py-lg-4">
                                <?php echo esc_html( meta('technology_partner_large_desc' ) ); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </section><?php
            endif; 
         break; 
         case 'delivery_process':
            if ( empty( meta('section_hide_6') ) ) : ?>
                <section class="border-container">
                    <div class="empty-column"></div>
                    <div class="section-column border-top">
                        <div class="grid-row section-spacing" style="--desk-col:1fr 1fr; --mob-col:1fr;">
                            <div></div>
                            <?php if ( meta('process_main_title' ) ) : ?>
                                <h2 class="mb-0"><?php echo esc_html( meta('process_main_title' ) ); ?></h2>
                            <?php endif; ?>
                        </div>

                        <?php 
                        $why_choose_us = meta('why_choose_us' );
                        if ( ! empty( $why_choose_us ) ) : ?>
                            <div class="delivery_process service-accordion">
                                <?php 
                                $count = 1;
                                foreach ( $why_choose_us as $item ) : 
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
         case 'benifits':
            if ( empty( meta('section_hide_7') ) ) : ?>
                <section class="border-container">
                    <div class="empty-column"></div>
                    <div class="section-column border-top">
                        <div class="grid-row section-spacing" style="--desk-col:1fr 1fr; --tab-col:1fr; --mob-col:1fr">
                            <div class="empty"></div>
                            <?php 
                                if (meta('benifits_section_title')):
                                echo '<h2 class="mb-0">'.meta('benifits_section_title').'</h2>';
                                endif;
                            ?>
                            
                        </div>
                        <div class="sections_features_new benifits_sticky position-relative">
                            <div class="stack_header_container"></div>
                            <?php 
                            $benifite_items  = meta('benifits_group');
                            $counter = 0;
                            if ( $benifite_items ) : 
                                foreach ( $benifite_items as $item ) : 
                                    $counter ++;
                                    echo'<div class="stack_card is-' . $counter . '"        style="--item-bg:'.$item['accent_bg'].';
                                            --item-color:'.$item['accent_color'].';
                                            --item-number-color:'.$item['number_color'].';
                                        ">';
                                        echo '<div class="global-grid" style="
                                            --grid-col:2; 
                                            --gap:0; 
                                            --mob-grid-col:1; 
                                            --mob-gap:0px;
                                            ">';
                                                echo '<div class="service_content_area">';
                                                    echo '<h4 class="justify-content-between d-flex"><span>'.esc_html( $item['title'] ).'</span><span>'.sprintf('%02d', $counter).'</span></h4>';
                                                    echo '<div class="service_excerpt fw-200">'.wpautop($item['content']).'</div>';
                                                echo '</div>';
                                                echo '<div class="service_image_area lh-0">';
                                                    if(!empty($item['image'])):
                                                        echo '<img src="' . esc_html( $item['image']) . '" alt="' . esc_html( $item['title'] ). '">';
                                                    endif;
                                                echo '</div>';
                                                
                                        echo '</div>';
                                    echo '</div>'; 
                                endforeach; 
                            endif; ?>
                        </div>
                    </div>
                </section><?php
            endif; 
         break; 
         case 'tech_stack':
            if ( empty( meta('section_hide_8') ) ) : ?>
                <section class="border-container programming-skills">
                    <div class="empty-column"></div>
                    <div class="section-column overflow-hidden border-top">
                        <div class="title_box section-spacing">
                            <?php 
                                if(meta('tech_stack_title')):
                                    echo '<h2>'.meta('tech_stack_title').'</h2>';
                                endif;
                                if(meta('tech_stack_desc')):
                                    echo '<p class="mb-0">'.meta('tech_stack_desc').'</p>';
                                endif;
                            ?>
                        </div>
                        <hr class="m-0">
                        <div class="marquee-container pt-2 pt-md-4">
                            <?php 
                                $about_title_id = get_post_meta( get_queried_object_id(), '_cmb2_select_technology_title', true );
                                echo do_shortcode('[technology_slider post_id="'.$about_title_id.'"]')
                            ?>
                        </div>
                        <div class="marquee-container reverse-marqee pt-1 pb-2 pb-md-4">
                            <?php 
                                echo do_shortcode('[technology_slider post_id="'.$about_title_id.'"]')
                            ?>
                        </div>
                    </div>
                </section><?php
            endif; 
         break; 
         case 'testimonial':
            if ( empty( meta('section_hide_9') ) ) : ?>
                <section class="border-container testimonial-section">
                    <div class="empty-column position-relative">&nbsp;</div>
                    <div class="section-column position-relative overflow-hidden">
                        <div class="testimonial">
                            <?php echo testimonial_slider(); ?>
                        </div>
                    </div>
                </section><?php
            endif; 
         break; 
         case 'map':
            if ( empty( meta('section_hide_10') ) ) : ?>
                <section class="border-container">
                    <div class="empty-column">&nbsp;</div>
                    <div class="section-column pb-0">
                        <div class="grid-row section-spacing" style="--desk-col: 8fr 4fr; --mob-col:1fr;">
                            <h3><?php echo meta('map_title'); ?></h3>
                        </div>
                        <div class="map px-1 px-md-2 pb-2">
                            <iframe src="https://lottie.host/embed/8d707625-999b-4947-9853-d276d9863149/ND2S541JuF.lottie"></iframe>
                        </div>
                        
                    </div>
                </section><?php
            endif; 
         break; 
         case 'faq':
            if ( empty( meta('section_hide_11') ) ) : ?>
                <section class="border-container">
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
                </section><?php 
            endif;
         break;
    endswitch;
endforeach; ?>
    <?php if ( empty( meta('section_hide_12') ) ): ?>
        <section class="border-container">
            <div class="empty-column"></div>
            <div class="section-column">
                <div class="footer_above_business_growth text-light">
                    <h2 class="h1"><?php echo meta('footer_above_title'); ?></h2>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php  endwhile;
get_footer(); 
?>