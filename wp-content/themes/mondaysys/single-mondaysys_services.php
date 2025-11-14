<?php get_header(); ?>

<?php
if ( have_posts() ) {
  while ( have_posts() ) {
    the_post();
    $sections = array(
        'hero_bottom'          => (int) meta('section_order_1'),
        'solutions' => (int) meta('section_order_2'),
        'technology'      => (int) meta('section_order_3'),
        'benifits'    => (int) meta('section_order_4'),
        'capabilities'       => (int) meta('section_order_5'),
        'approach'    => (int) meta('section_order_6'),
        'testimonial'   => (int) meta('section_order_7'),
        'case_study'    => (int) meta('section_order_8'),
        'faqs'    => (int) meta('section_order_9')
    );
    asort($sections); 
    ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <section class="service_page_titlebar">
            <div class="titlebar_head position-relative grid-row" style="--desk-col:8fr 14fr 1.67fr; --tab-col:8fr 16fr; --mob-col:1fr">
                <div>&nbsp;</div>
                <div class="border-left py-2 py-md-3 px-1 px-md-2">
                    <h1 class="mb-0 pb-md-2 pt-lg-2 pb-lg-3"><?php the_title(); ?></h1>
                    <div class="titlebar_description grid-row" style="--desk-col:4fr 8fr; --tab-col:2fr 10fr; --mob-col:1fr">
                        <div>&nbsp;</div>
                        <?php 
                            $content = apply_filters( 'the_content', get_the_content() );
                            if ( preg_match( '/<p>(.*?)<\/p>/i', $content, $matches ) ) {
                                echo $matches[0]; 
                            }
                        ?>
                    </div>
                </div>
            </div> 
            <div class="titbar_bottom position-relative grid-row" style="--desk-col:7.2fr 14fr; --tab-col: 7.4fr 16fr; --mob-col:1fr">
                <a href="<?php echo meta('btn_url'); ?>" class="btn btn-primary radious-0"><?php echo meta('btn_text'); ?></a>
                <?php 
                    if (meta('hero_image')) {
                        echo meta_image('hero_image');
                    } else {
                        echo get_the_post_thumbnail($post->ID, 'full');
                    }
                ?>
                
            </div>
        </section>
<?php foreach ($sections as $key => $order) : 
    switch ($key) :
        case 'hero_bottom':
            if ( empty( meta('section_hide_1') ) ) : ?>
                <section class="border-container">
                        <div class="empty-column"></div>
                        <div class="section-column overflow-hidden">
                            <?php if ( ! empty(meta('tech_logo'))) { ?>
                                <div class="py-2 py-md-3 py-lg-4 overflow-hidden">
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
                                    <div class="swiper mondaysys_carousel marquee_slide"> 
                                        <ul class="swiper-wrapper unorder-list">
                                        <?php 
                                            foreach ( meta('tech_logo') as $attachment_id => $attachment_url ) {
                                                echo '<li class="swiper-slide"><span class="marqee_logo"><img src="'. esc_url( $attachment_url ) .'" alt=""></span></li>';
                                            }
                                        ?>
                                        </ul>
                                    </div>
                                    </mondaysys-carousel> 
                                </div>  
                            <?php } ?>
                            <?php 
                            $hero_bottom_text = meta('hero_bottom_text' ); 
                            if($hero_bottom_text): ?>
                                <div class="px-md-2 border-top px-1 py-3 py-lg-5">
                                    <h5 class="py-1" style="color:#5A0000"><?php the_title(); ?></h5>
                                    <?php 
                                        if ( $hero_bottom_text ) {
                                            $content = wpautop( $hero_bottom_text );

                                            preg_match_all( '/<p[^>]*>(.*?)<\/p>/is', $content, $paragraphs );

                                            if ( ! empty( $paragraphs[0] ) ) {
                                                echo '<p class="h3" style="line-height: 1.5em;">' . wp_kses_post( strip_tags( $paragraphs[1][0], '<a><strong><em><span><br>' ) ) . '</p>';

                                                if ( count( $paragraphs[0] ) > 1 ) {
                                                    echo '<div class="global-grid pt-3" style="--grid-col:2;--mob-grid-col:1; --gap:0">';
                                                    echo '<div></div>';
                                                    for ( $i = 1; $i < count( $paragraphs[0] ); $i++ ) {
                                                        echo wp_kses_post( $paragraphs[0][$i] );
                                                    }
                                                    echo '</div>';
                                                }
                                            }
                                        }
                                        ?>
                                </div>
                            <?php endif; ?>
                        </div>
                </section><?php
            endif; 
         break; 
         case 'solutions':
            if ( empty( meta('section_hide_2') ) ) :?>
                <section class="border-container left-square-bg">
                    <div class="empty-column position-relative"></div>
                    <div class="section-column">
                        <?php
                        $section_title = meta('service_solutions_title' );
                        $service_items = meta('service_solutions_group' );

                        if ( $section_title || $service_items ) : ?>
                            <div class="single_service_items text-light grid-row" style="--desk-col:1fr 1fr; --tab-col:5fr 7fr; --mob-col:1fr; --desk-gap:20px; --tab-gap:10px; background-color:var(--secondary-color)">
                                <?php if ( $section_title ) : ?>
                                    <h2 class="px-1 px-md-0"><?php echo esc_html( $section_title ); ?></h2>
                                <?php endif; ?>

                                <?php if ( $service_items ) : 
                                    echo '<div class="single_service_item_list">';
                                        $i = 0;
                                        foreach ( $service_items as $item ) : 
                                            $active_class = $i === 0 ? ' active' : '';
                                            echo '<div class="service-accorion-item '. $active_class.'">';
                                                echo '<h4 class="single_accordion_head">'.$item['title'].'</h4>';
                                                echo '<div class="single-accordion-content">'.$item['content'].'</div>';
                                            echo '</div>';
                                        $i++;
                                        endforeach; 
                                    echo '</div>';
                                endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </section><?php
            endif;
         break;
         case 'technology':
            if ( empty( meta('section_hide_3') ) ) :?>
                <section class="border-container">
                    <div class="empty-column"></div>
                    <div class="section-column border-top">
                        <div class="grid-row position-relative technologies_use py-3 py-lg-6 px-md-2 px-1" style="--desk-col:1fr 1fr; --tab-col:5fr 7fr; --mob-col:1fr; --desk-gap:5vw; --tab-gap:10px;"> 
                            <div class="technology-left-area position-relative">
                                <div class="stikcy_area">
                                    <?php 
                                    if ( meta('technology_section_title') ) : 
                                        echo '<h2>'.esc_html( meta('technology_section_title') ).'</h2>';
                                    endif;
                                    if ( meta('technology_section_des') ):
                                        echo '<p>'.esc_html( meta('technology_section_des')).'</p>';
                                    endif;
                                    if(meta('technology_section_image')):
                                        echo '<img src="'.meta('technology_section_image').'" alt=""/>';
                                    endif;
                                    ?>
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
                </section><?php
            endif;
         break;
         case 'benifits':
            if ( empty( meta('section_hide_4') ) ) :?>
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
                                                    if(!empty($item['title'])):
                                                        echo '<h4 class="justify-content-between d-flex"><span>'.esc_html( $item['title'] ).'</span><span>'.sprintf('%02d', $counter).'</span></h4>';
                                                    endif;
                                                    if(!empty($item['content'])):
                                                        echo '<div class="service_excerpt fw-200">'.wpautop($item['content']).'</div>';
                                                    endif;
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
         case 'capabilities':
            if ( empty( meta('section_hide_5') ) ) :?>
                <section class="border-container">
                    <div class="empty-column"></div>
                    <div class="section-column border-top">
                        <div class="grid-row section-spacing" style="--desk-col:1fr 1fr;  --mob-col:1fr; --tab-col:1fr;">
                            <?php 
                                if (meta('capability_section_title' )):
                                echo '<h2 class="mb-0">'.meta('capability_section_title' ).'</h2>';
                                endif;
                            ?>
                            <div class="empty"></div>
                        </div>
                        <div class="global-grid personilize_item_wrap" style="--grid-col:2; --gap:0px; --mob-gap:0px; --mob-grid-col:2">
                            <?php 
                            $capability_items  = meta('capability_group' );
                            if ( $capability_items ) : 
                                foreach ( $capability_items as $item ) : 
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
                    </div>
                </section><?php
            endif;
         break;
         case 'approach':
            if ( empty( meta('section_hide_6') ) ) :?>
                <section class="border-container">
                    <div class="empty-column"></div>
                    <div class="section-column overflow-hidden border-top">
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
                    </div>
                </section><?php
            endif;
         break;
         case 'testimonial':
            if ( empty( meta('section_hide_7') ) ) :?>
                <section class="border-container">
                    <div class="empty-column"></div>
                    <div class="section-column overflow-hidden border-top">
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
                            <div class="px-1 px-lg-2 pb-1 pb-lg-2">
                                <div class="pt-2 overflow-hidden service_testimonial position-relative">
                                    <?php echo testimonial_slider(); ?>
                                </div>
                            </div>
                    </div>
                </section><?php
            endif;
         break;
         case 'case_study':
            if ( empty( meta('section_hide_8') ) ) :?>
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
                </section>
                <div class="border-container fw-btn-section position-relative">
                    <div class="empty-column"></div>
                    <div class="section-column px-1 px-lg-2 py-1">
                        <div class="global-grid align-item-center" style="--grid-col: 2; --gap: 0;--mob-grid-col:2;">
                            <h5>All Case Studies</h5>
                            <a class="view_all_casestuday btn btn-tertiary" href="#"></a>
                        </div>
                    </div>
                </div><?php
            endif;
         break;
         case 'faqs':
            if ( empty( meta('section_hide_9') ) ) :?>
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
        <?php 
        if (meta('footer_above_title') || meta('footer_above_desc')): ?>
            <section class="border-container">
                <div class="empty-column"></div>
                <div class="section-column">
                    <div class="grid-row" style="--desk-col: 1fr 1fr; --mob-col:1fr;">
                        <div class="lh-0">
                            <?php 
                                if(meta('footer_above_image')):
                                    echo meta_image('footer_above_image');
                                else:
                                    echo get_the_post_thumbnail($post->ID, 'full');
                                endif;
                            ?>
                            
                        </div>
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
            </section>
        <?php endif; ?>
    </article>
    <?php
  }
}
?>
<?php get_footer(); ?>
