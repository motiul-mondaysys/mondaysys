<?php 

add_action( 'init', 'register_case_studies_cpt_and_taxonomies' );
function register_case_studies_cpt_and_taxonomies() {

    $labels_case_studies = array(
        'name'               => __( 'Case Studies', 'mondaysys' ),
        'singular_name'      => __( 'Case Study', 'mondaysys' ),
        'add_new_item'       => __( 'Add New Case Study', 'mondaysys' ),
        'edit_item'          => __( 'Edit Case Study', 'mondaysys' ),
        'new_item'           => __( 'New Case Study', 'mondaysys' ),
        'menu_name'          => __( 'Case Studies', 'mondaysys' ),
    );

    $args_case_studies = array(
        'labels'              => $labels_case_studies,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'rewrite'             => array( 'slug' => 'case-studies' ),
        'supports'            => array( 'title', 'thumbnail', 'page-attributes' ),
        'menu_icon'           => 'dashicons-portfolio',
    );
    register_post_type( 'case_studies', $args_case_studies );

    // --- Case Study Categories ---
    $taxonomy_labels_case_studies = array(
        'name'          => __( 'Case Study Categories', 'mondaysys' ),
        'singular_name' => __( 'Case Study Category', 'mondaysys' ),
    );

    $taxonomy_args_case_studies = array(
        'hierarchical'      => true,
        'labels'            => $taxonomy_labels_case_studies,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'show_in_nav_menus' => false,
        'public'              => false, 
        'exclude_from_search' => true,          
        'publicly_queryable'  => false,
        'rewrite'           => array( 'slug' => 'case-study-category' ),
    );
    register_taxonomy( 'case_study_cat', array( 'case_studies' ), $taxonomy_args_case_studies );

    // --- Technologies ---
    $tech_labels = array(
        'name'          => __( 'Technologies', 'mondaysys' ),
        'singular_name' => __( 'Technology', 'mondaysys' ),
    );

    $tech_args = array(
        'hierarchical'      => false,
        'labels'            => $tech_labels,
        'show_ui'           => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => false,
        'public'              => false, 
        'exclude_from_search' => true,          
        'publicly_queryable'  => false, 
        'rewrite'           => array( 'slug' => 'technology' ),
    );
    register_taxonomy( 'case_technology_cat', array( 'case_studies' ), $tech_args );

    // --- Services ---
    $service_labels = array(
        'name'          => __( 'Services', 'mondaysys' ),
        'singular_name' => __( 'Service', 'mondaysys' ),
    );

    $service_args = array(
        'hierarchical'      => false,
        'labels'            => $service_labels,
        'show_ui'           => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => false,
        'public'              => false, 
        'exclude_from_search' => true,          
        'publicly_queryable'  => false,
        'rewrite'           => array( 'slug' => 'services' ),
    );
    register_taxonomy( 'services_cat', array( 'case_studies' ), $service_args );
}



// Featured Case Studies Slider Shortcode
function featured_case_studies_slider() {
    $args = array(
        'post_type'      => 'case_studies',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
        'meta_query'     => array(
            array(
                'key'     => '_cmb2_featured',
                'value'   => 'on',
                'compare' => '=',
            ),
        ),
    );

    $case_query = new WP_Query($args);
    $output = '';

    if ($case_query->have_posts()) :
        $output .= '<casestudy-carousel class="position-relative">';
        $output .= '<div class="swiper casestudy_carousel">';
        $output .= '<div class="swiper-wrapper">';

        while ($case_query->have_posts()) : $case_query->the_post();
            global $post;
            $featured_thumb = get_the_post_thumbnail_url(get_the_ID(), 'large');
            $terms = get_the_terms($post->ID, 'case_study_cat');
            $category = (!empty($terms) && !is_wp_error($terms)) ? $terms[0]->name : '';

            $output .= '<div class="swiper-slide" 
                            data-title="'.esc_attr(get_the_title()).'" 
                            data-description="'.esc_attr(meta('short_description')).'" 
                            data-category="'.esc_attr($category).'" 
                            data-link="'.esc_url(get_permalink()).'">';
            $output .= '<div class="featured_thumb lh-0">
                            <a href="'.get_permalink().'">
                                <img src="'.esc_url($featured_thumb).'" alt="'.esc_attr(get_the_title()).'"/>
                            </a>
                        </div>';
            $output .= '</div>';
        endwhile;
        $output .= '</div>'; //swiper-wrapper
            $output .='<div class="featured_study_bottom grid-row border-top">';
                $output .= '<div class="featured_case_studies_content grid-row py-2 px-1" style="--desk-col:3fr 7fr 2fr; --tab-col:3fr 9fr; --mob-col:1fr; --desk-gap:10px; --mob-gap:10px;">
                                <div class="featured_base">Featured</div>
                                <div class="featured_content_inner_wrap">
                                    <div class="casestudy_cat h5 fw-200"></div>
                                    <h4 class="title my-1"></h4>
                                    <p class="slider_description"></p>
                                    <a class="btn" href="#">View Case Study</a>
                                </div>
                                <div class="custom_slider_arrow">
                                    <div class="swiper-button-prev slider-btn"></div>
                                    <div class="swiper-button-next slider-btn"></div>
                                </div>
                            </div>';
                $output .= '<div class="custom-pagination py-2 px-1"><span id="current-slide-wrapper"><span id="current-slide">01</span></span> / <span id="total-slides">03</span></div>';
            $output .='</div>';//featured_study_bottom

        $output .= '</div>'; // end swiper
        $output .= '</casestudy-carousel>';

        wp_reset_postdata();
    else :
        $output .= '<p>No case studies found.</p>';
    endif;

    return $output;
}
add_shortcode('featured_case_studies', 'featured_case_studies_slider');





// === CASE STUDIES LIST SHORTCODE === //
function display_case_studies_list() {
    ob_start(); ?>
    
    <div class="case_studies_filter_area px-1 py-3 py-lg-3 position-relative">
        <div class="sicky_filter">
            <form id="case-studies-filter-form">
                <?php
                $taxonomies = [
                    'case_study_cat' => 'Industries ',
                    'services_cat'   => 'Services',
                    'case_technology_cat' => 'Technology',
                ];

                foreach ($taxonomies as $taxonomy => $label) :
                    $terms = get_terms([
                        'taxonomy'   => $taxonomy,
                        'hide_empty' => true,
                    ]);
                    if ($terms && !is_wp_error($terms)) :
                        echo '<div class="filter-group pb-2 pb-lg-3">';
                        echo '<div class="filter-header h5">' . esc_html($label) . ' <span class="arrow"></span></div>';
                        echo '<div class="filter-content">';
                        foreach ($terms as $term) {
                            echo '<label><input type="checkbox" name="tax_' . esc_attr($taxonomy) . '[]" value="' . esc_attr($term->slug) . '"> <span>' . esc_html($term->name) . '</span></label>';
                        }
                        echo '</div></div>';
                    endif;
                endforeach;
                ?>
            </form>
        </div>
    </div>

    <div class="case_studies_list_area pb-lg-5 pb-4">
        <div id="case-studies-body">
            <?php echo get_case_studies_list(); ?>
        </div>
        <?php
        $total_posts = wp_count_posts('case_studies')->publish;
        if ($total_posts > 6) :
            echo '<button class="btn py-1 w-100 radious-0 btn-tertiary" id="case-studies-load-more">Load More</button>';
        endif;
        ?>
    </div>

    <script type="text/javascript">
    jQuery(document).ready(function($) {
        let offset = 6;
        let filters = {};

        function collectFilters() {
            filters = {
                'case_study_cat': [],
                'case_technology_cat': [],
                'services_cat': []
            };
            $('input[type=checkbox]:checked').each(function() {
                let tax = $(this).attr('name').replace('tax_', '').replace('[]', '');
                filters[tax].push($(this).val());
            });
        }

        function loadCaseStudies(offset, append = false) {
            collectFilters();
            $.ajax({
                url: '<?php echo admin_url("admin-ajax.php"); ?>',
                type: 'POST',
                data: {
                    action: 'ajax_load_more_case_studies',
                    offset: offset,
                    filters: filters
                },
                success: function(response) {
                    if (append) {
                        $('#case-studies-body').append(response);
                    } else {
                        $('#case-studies-body').html(response);
                        offset = 6;
                    }
                    let postCount = $(response).filter("article").length;
                    if (postCount < 6) {
                        $('#case-studies-load-more').hide();
                    } else {
                        $('#case-studies-load-more').show();
                    }
                }
            });
        }

        $('#case-studies-load-more').on('click', function() {
            loadCaseStudies(offset, true);
            offset += 6;
        });

        $(document).on('change', 'input[type=checkbox]', function() {
            loadCaseStudies(0, false);
        });
    });
    </script>

    <?php
    return ob_get_clean();
}
add_shortcode('case_studies_list', 'display_case_studies_list');


function ajax_load_more_case_studies() {
    $offset  = isset($_POST['offset']) ? intval($_POST['offset']) : 0;
    $filters = isset($_POST['filters']) ? $_POST['filters'] : [];

    echo get_case_studies_list($offset, $filters);
    wp_die();
}
add_action('wp_ajax_ajax_load_more_case_studies', 'ajax_load_more_case_studies');
add_action('wp_ajax_nopriv_ajax_load_more_case_studies', 'ajax_load_more_case_studies');


function get_case_studies_list($offset = 0, $filters = []) {
    $tax_query = ['relation' => 'AND'];

    foreach (['case_study_cat', 'case_technology_cat', 'services_cat'] as $tax) {
        if (!empty($filters[$tax])) {
            $tax_query[] = [
                'taxonomy' => $tax,
                'field'    => 'slug',
                'terms'    => array_map('sanitize_text_field', $filters[$tax]),
            ];
        }
    }

    $args = [
        'post_type'      => 'case_studies',
        'posts_per_page' => 6,
        'offset'         => $offset,
        'post_status'    => 'publish',
    ];

    if (count($tax_query) > 1) {
        $args['tax_query'] = $tax_query;
    }

    $query = new WP_Query($args);

    $output ='';

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            
            $output .='<article class="case_study_item position-relative">';
                $output .='<div class="case_study_filter_head grid-row p-1" style="--desk-col:3fr  6fr 3fr; --tab-col:3fr  6fr 3fr; --mob-col:3fr  6fr 3fr; --desk-gap:20px; --mob-gap:5px; --tab-gap:10px;">';
                    $output .='<div class="industry">';
                        $output .='<p class="mb-1">Industry</p>';
                        $indusrty = wp_get_post_terms(get_the_ID(), 'case_study_cat');
                        if (!empty($indusrty) && !is_wp_error($indusrty)) {
                            $output .='<h5>'.$indusrty[0]->name.'</h5>';
                        }
                    $output .='</div>';

                    $output .='<div class="project_name">';
                        $output .='<p class="mb-1">Project</p>';
                        $output .='<h5><a href="'.get_permalink().'">';
                            if(meta('meta_title')):
                                $output.= meta('meta_title');
                            else:
                                $output.= get_the_title();
                            endif;
                            
                        $output .='</a></h5>';
                    $output .='</div>';

                    $output .='<div class="casestudy_services">';
                    
                        $output .='<p class="mb-1">Services</p>';
                        $services_cat = wp_get_post_terms(get_the_ID(), 'services_cat');
                        if (!empty($services_cat) && !is_wp_error($services_cat)) {
                            $output .='<h5>'.$services_cat[0]->name.'</h5>';
                        }
                    $output .='</div>';
                $output .='</div>';
                $output .='<div class="casestuday_feature_image lh-0 p-1">';
                    $featured_thumb = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    $output .='<a href="'.get_permalink().'"><img src="'.esc_url($featured_thumb).'" alt="'.get_the_title().'"/></a>';
                $output .='</div>';

            $output.='</article>';
        endwhile;
    else :
        echo '<div class="no_case_studies">No case studies found.</div>';
    endif;

    wp_reset_postdata();
    return $output;
}


