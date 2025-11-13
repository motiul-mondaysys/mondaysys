<?php
/**
 * Template Name: Home Page
 */
get_header();
global $post;

    while ( have_posts() ) : the_post();
        ?>
            <!--<section class="banner-slider">
                <div class="container">
                    <?php //echo mondaysys_banner_slideshow(); ?>
                </div>
            </section>-->
            <section class="home-hero overflow-hidden">
                <div class="container">
                    <div class="grid-row pt-lg-5 pt-5" style="--desk-col:7fr 5fr; --tab-col:9fr 3fr; --mob-col:1fr;">
                        <div>
                            <?php 
                                if(meta('main_title')):
                                    echo '<h1>';
                                        echo '<span>'.meta('main_title').'</span>'; 
                                        $word_slider = meta('ward_slider_text');
                                        if ( !empty($word_slider) ) :
                                            $first_item = reset($word_slider);
                                            $word_slider[] = $first_item;
                                            $total = count($word_slider);
                                            $step = 100 / ($total - 1);
                                            ?>
                                                <style>
                                                    @keyframes word-slider {
                                                        <?php
                                                        for ( $i = 0; $i < $total; $i++ ) {
                                                            $percent = round($i * $step, 3);
                                                            $move = $i * 100;
                                                            echo "{$percent}% { transform: translateY(-{$move}%); }\n";
                                                        }
                                                        ?>
                                                    }
                                                </style>
                                                <span class="word-slider">
                                                    <?php foreach ( $word_slider as $item ) : ?>
                                                        <span><?php echo esc_html( $item['title'] ); ?></span>
                                                    <?php endforeach; ?>
                                                </span>
                                            <?php 
                                        endif; 
                                    echo '</h1>';
                                endif;
                                if(meta('title_pragraph')):
                                    echo '<p>'.meta('title_pragraph').'</p>';
                                endif;
                            ?>
                        </div>
                        <div></div>
                    </div>
                    <div class="home-hero-bottom py-2 py-lg-3">
                        <div><a class="btn btn-primary" href="<?php echo meta('btn_url'); ?>"><?php echo meta('btn_text'); ?></a></div>
                        <div class="border-col"></div>
                        <p class="mb-0 position-relative">Available for new Projects</p>
                    </div>
                </div>
            </section>
            <section class="border-container border-top">
                    <div class="empty-column"></div>
                    <div class="section-column overflow-hidden">
                        <?php 
                            $images = meta('case_studay_image'); 
                            if (!empty($images) && is_array($images)): ?>
                            <mondaysys-carousel 
                                data-desktop="5"
                                data-tablet="3"
                                data-mobile="2"
                                data-extra-small="2"
                                data-autoplay="true"
                                data-autoplay-delay="1"
                                data-deskitemspace="0"
                                data-mobitemspace="0"
                                data-item-speed="4000"
                                data-infinite-loop="true"
                                data-center-mode="false" class="lh-0">
                                <div class="swiper mondaysys_carousel marquee_slide"> 
                                    <ul class="swiper-wrapper unorder-list">
                                        <?php foreach($images as $image_id => $image_url): ?>
                                            <li class="swiper-slide">
                                                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div> 
                            </mondaysys-carousel>
                        <?php endif; ?>
                        <?php 
                            $content = apply_filters('the_content', get_the_content());
                            if ( preg_match('/<p>(.*?)<\/p>/s', $content, $matches) ) {
                                echo '<p class="h3 section-spacing">'.$matches[1].'</p>'; 
                            }
                        ?>
                        <div class="grid-row pt-3" style="--desk-col:1fr 1fr; --mob-col: 1fr;">
                            <div></div>
                            <div class="home-entry-content">
                                <?php
                                    if (preg_match_all('/<p>(.*?)<\/p>/s', $content, $matches)) {
                                        if (count($matches[1]) > 1) {
                                            for ($i = 1; $i < count($matches[1]); $i++) {
                                                echo '<p>' . $matches[1][$i] . '</p>';
                                            }
                                        }
                                    }
                                    ?>
                            </div>
                        </div>
                    </div>
            </section>
            
            <?php if(meta('mondaysys_service_title')): ?>
                <section class="border-container mondaysys_main_service">
                    <div class="empty-column"></div>
                    <div class="section-column border-top">
                        <div class="global-grid section-spacing" style="
                            --grid-col:2; 
                            --gap:0; 
                            --mob-grid-col:1; 
                            ">
                            <div>&nbsp;</div>
                            <h2 class="m-0 px-1 px-md-0"><?php echo meta('mondaysys_service_title'); ?></h2>
                        </div>
                        <div class="sections_features_new position-relative">
                            <div class="stack_header_container"></div>
                                <?php echo do_shortcode('[mondaysys_services]')?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
        
            <?php if(meta('industry_service_title')): ?>
                <section class="border-container indistrial_service overflow-hidden">
                    <div class="empty-column"></div>
                    <div class="section-column">
                            <h2 class="m-0 section-spacing"><?php echo meta('industry_service_title'); ?></h2>
                            <div class="global-grid indistry-item-grid" style="
                                            --grid-col:4; 
                                            --gap:0;  
                                            --mob-grid-col:2; 
                                            ">
                                <?php echo do_shortcode('[display_industries]'); ?>
                            </div>
                    </div>
                </section>
            <?php endif; ?>

            <?php if (meta('technology_partner_title')): ?>
                <section class="border-container">
                    <div class="empty-column"></div>
                        <div class="section-column  overflow-hidden">
                            <div class="our-client-title section-spacing">
                            <h2 class="mb-2"><?php echo meta('technology_partner_title'); ?></h2>
                            <p class="mb-0"><?php echo meta('technology_partner_description'); ?></p>
                        </div>
                        <div class="border-top py-2 py-md-3 py-lg-4 overflow-hidden">
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
                                    echo do_shortcode('[technology_slider cat_slug="technology-partner"]');
                                ?>
                            </mondaysys-carousel> 
                        </div>       
                    </div>
                </section>
            <?php endif ?>

            <?php if(meta('process_main_title') || meta('process_inner_title')): ?>
                <section class="border-container">
                    <div class="empty-column">&nbsp;</div>
                    <div class="section-column overflow-hidden border-top">
                        <div class="how_itwork_title" style="--section-bg:url(<?php echo meta('process_bg')?>)">
                            <div></div>
                            <?php if(meta('process_main_title')):
                                echo '<h2 class="m-0">'.meta('process_inner_title').'</h2>';
                                endif; ?>
                            <div class="angle_corner position-relative">&nbsp;</div>
                            <div>&nbsp;</div>
                        </div>
                        <?php echo display_working_process(); ?>
                    </div>
                </section>
            <?php endif; ?>


            <section class="border-container why_choose_us">
                <div class="empty-column"></div>
                <!--start .section-column-->
                <div class="section-column border-top">
                    <div class="grid-row section-spacing" style="--desk-col:6fr 5fr 1fr; --tab-col:1fr; --mob-col: 1fr; --mob-gap:10px">
                        <div></div> 
                        <?php 
                            
                            if(meta('section_title_20')){
                                echo '<h2 class="m-0">'.meta('section_title_20').'</h2>';
                            }
                        ?>
                        <div></div>
                    </div>
                    <?php 
                        $why_choose_us = meta('why_choose_us');
                        if ($why_choose_us):
                            foreach ($why_choose_us as $item): 
                                $title = isset($item['title']) ? $item['title'] : '';
                                $sub_title = isset($item['sub_title']) ? $item['sub_title'] : '';
                                $description = isset($item['description']) ? $item['description'] : '';
                                ?>
                                <div class="grid-row why_choose_item px-1 px-lg-2 py-2 py-lg-4 border-top" style="--desk-col:6fr 6fr; --tab-col:4fr 8fr; --mob-col: 4fr 8fr; --mob-gap:10px">
                                    <div class="icon-with-title position-relative">
                                        <h4 class="m-0"><?php echo esc_html($title); ?></h4>
                                    </div>
                                    <div class="why_choose_item_content">
                                        <h5><?php echo esc_html($sub_title); ?></h5>
                                        <p class="mb-0"><?php echo wp_kses_post($description); ?></p>
                                    </div>
                                </div>
                                <?php 
                            endforeach; 
                        endif;
                    ?>
                </div>
            </section>

            <section class="border-container md-px-0 testimonial-section">
                <div class="empty-column position-relative">&nbsp;</div>
                <div class="section-column position-relative overflow-hidden">
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
                                </div>
                                <div class="service-accordion">
                                    <?php echo mondaysys_case_studies_loop(); ?>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="border-container fw-btn-section position-relative">
                        <div class="empty-column"></div>
                        <div class="section-column px-1 px-lg-2 py-1">
                            <div class="global-grid align-item-center" style="--grid-col: 2; --gap: 0;--mob-grid-col:2;">
                                <h5>All Case Studies</h5>
                                <a class="view_all_casestuday btn btn-tertiary" href="#"></a>
                            </div>
                        </div>
                    </section>
            <?php endif; ?>
       
            <section class="border-container programming-skills">
                <div class="empty-column"></div>
                <div class="section-column overflow-hidden border-top">
                    <div class="title_box section-spacing">
                        <?php 
                            if(meta('section_title_25')):
                                echo '<h2>'.meta('section_title_25').'</h2>';
                            endif;
                        ?>
                        <?php 
                            if(meta('section_title_description_25')):
                                echo '<p class="mb-0">'.meta('section_title_description_25').'</p>';
                            endif;
                        ?>
                    </div>
                    <hr class="m-0">

                    <div class="marquee-container pt-2 pt-md-4">
                        <?php 
                            echo do_shortcode('[technology_slider cat_slug="technology-expertise"]');
                        ?>
                    </div>
                    
                    <div class="marquee-container reverse-marqee pt-1 pb-2 pb-md-4">
                        <?php 
                            echo do_shortcode('[technology_slider cat_slug="technology-expertise"]');
                        ?>
                    </div>
                </div>
            </section>

            <?php if (meta('title_faqs')): ?>
            <section class="border-container section-faq">
                <div class="empty-column"></div>
                <div class="section-column border-top">
                    <h2 class="mb-0 section-spacing"><?php echo meta('title_faqs'); ?></h2>
                    <?php echo display_faqs_init(); ?>
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

