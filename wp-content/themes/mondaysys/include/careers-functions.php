<?php
// ============================================================
// Register Custom Post Type "Jobs" + 3 Taxonomies
// Taxonomies: Technology, Job Category, Label
// ============================================================
function mondaysys_register_jobs_and_taxonomies() {
    $labels = array(
        'name'                  => _x( 'Jobs', 'Post type general name', 'mondaysys' ),
        'singular_name'         => _x( 'Job', 'Post type singular name', 'mondaysys' ),
        'menu_name'             => _x( 'Jobs', 'Admin Menu text', 'mondaysys' ),
        'name_admin_bar'        => _x( 'Job', 'Add New on Toolbar', 'mondaysys' ),
        'add_new'               => __( 'Add New Job', 'mondaysys' ),
        'add_new_item'          => __( 'Add New Job', 'mondaysys' ),
        'new_item'              => __( 'New Job', 'mondaysys' ),
        'edit_item'             => __( 'Edit Job', 'mondaysys' ),
        'view_item'             => __( 'View Job', 'mondaysys' ),
        'all_items'             => __( 'All Jobs', 'mondaysys' ),
        'search_items'          => __( 'Search Jobs', 'mondaysys' ),
        'not_found'             => __( 'No jobs found.', 'mondaysys' ),
        'not_found_in_trash'    => __( 'No jobs found in Trash.', 'mondaysys' ),
        'archives'              => __( 'Job Archives', 'mondaysys' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'show_in_menu'       => true,
        'supports'           => array( 'title', 'editor', 'thumbnail'),
        'rewrite'            => array( 'slug' => 'jobs' ),
        'show_in_rest'       => false,
        'show_in_nav_menus' => false,
    );

    register_post_type( 'jobs', $args );

    $cat_labels = array(
        'name'              => _x( 'Job Categories', 'taxonomy general name', 'mondaysys' ),
        'singular_name'     => _x( 'Job Category', 'taxonomy singular name', 'mondaysys' ),
        'search_items'      => __( 'Search Categories', 'mondaysys' ),
        'all_items'         => __( 'All Categories', 'mondaysys' ),
        'edit_item'         => __( 'Edit Category', 'mondaysys' ),
        'update_item'       => __( 'Update Category', 'mondaysys' ),
        'add_new_item'      => __( 'Add New Category', 'mondaysys' ),
        'new_item_name'     => __( 'New Category Name', 'mondaysys' ),
        'menu_name'         => __( 'Job Categories', 'mondaysys' ),
    );

    $cat_args = array(
        'hierarchical'      => true,
        'labels'            => $cat_labels,
        'show_ui'           => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => false,
        'public'            => false, 
        'publicly_queryable'=> false,
        'exclude_from_search'=> false,
        'rewrite'           => array( 'slug' => 'job-category' ),
    );

    register_taxonomy( 'job-category', array( 'jobs' ), $cat_args );

    $city_labels = array(
        'name'              => _x( 'Cities', 'taxonomy general name', 'mondaysys' ),
        'singular_name'     => _x( 'City', 'taxonomy singular name', 'mondaysys' ),
        'search_items'      => __( 'Search Cities', 'mondaysys' ),
        'all_items'         => __( 'All Cities', 'mondaysys' ),
        'edit_item'         => __( 'Edit City', 'mondaysys' ),
        'update_item'       => __( 'Update City', 'mondaysys' ),
        'add_new_item'      => __( 'Add New City', 'mondaysys' ),
        'new_item_name'     => __( 'New City Name', 'mondaysys' ),
        'menu_name'         => __( 'Cities', 'mondaysys' ),
    );

    $city_args = array(
        'hierarchical'      => true, 
        'labels'            => $city_labels,
        'show_ui'           => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'rewrite'           => array( 'slug' => 'city' ),
        'show_in_nav_menus' => false,
        'public'            => false, 
        'publicly_queryable'=> false,
        'exclude_from_search'=> false,
    );

    register_taxonomy( 'city', array( 'jobs' ), $city_args );

    $tech_labels = array(
        'name'              => _x( 'Technologies', 'taxonomy general name', 'mondaysys' ),
        'singular_name'     => _x( 'Technology', 'taxonomy singular name', 'mondaysys' ),
        'search_items'      => __( 'Search Technologies', 'mondaysys' ),
        'all_items'         => __( 'All Technologies', 'mondaysys' ),
        'edit_item'         => __( 'Edit Technology', 'mondaysys' ),
        'update_item'       => __( 'Update Technology', 'mondaysys' ),
        'add_new_item'      => __( 'Add New Technology', 'mondaysys' ),
        'new_item_name'     => __( 'New Technology Name', 'mondaysys' ),
        'menu_name'         => __( 'Technologies', 'mondaysys' ),
    );

    $tech_args = array(
        'hierarchical'      => false, 
        'labels'            => $tech_labels,
        'show_ui'           => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => false,
        'public'            => false, 
        'publicly_queryable'=> false,
        'exclude_from_search'=> false,
        'rewrite'           => array( 'slug' => 'technology' ),
    );

    register_taxonomy( 'technology', array( 'jobs' ), $tech_args );

    $label_labels = array(
        'name'              => _x( 'Labels', 'taxonomy general name', 'mondaysys' ),
        'singular_name'     => _x( 'Label', 'taxonomy singular name', 'mondaysys' ),
        'search_items'      => __( 'Search Labels', 'mondaysys' ),
        'all_items'         => __( 'All Labels', 'mondaysys' ),
        'edit_item'         => __( 'Edit Label', 'mondaysys' ),
        'update_item'       => __( 'Update Label', 'mondaysys' ),
        'add_new_item'      => __( 'Add New Label', 'mondaysys' ),
        'new_item_name'     => __( 'New Label Name', 'mondaysys' ),
        'menu_name'         => __( 'Labels', 'mondaysys' ),
    );

    $label_args = array(
        'hierarchical'      => false,
        'labels'            => $label_labels,
        'show_ui'           => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => false,
        'public'            => false, 
        'publicly_queryable'=> false,
        'exclude_from_search'=> false,
        'rewrite'           => array( 'slug' => 'label' ),
    );

    register_taxonomy( 'label', array( 'jobs' ), $label_args );
}
add_action( 'init', 'mondaysys_register_jobs_and_taxonomies' );


function display_jobs_list() {
    ob_start(); ?>
            <div class="jobs_filter_area position-relative">
                <div class="sicky_filter">
                    <div class="filter_title fw-500">
                        <span><svg width="18" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><path fill="var(--body-text-color)" d="M0 3h24v2.5H0zm5 8h14v2.5H5zm4 8h6v2.5H9z"></path></svg></span>
                        <span>Filters</span>
                    </div>
                    <form id="jobs-filter-form">
                        <?php
                        $taxonomies = [
                            'city'         => 'City',
                            'job-category' => 'Category',
                            'label'        => 'Label',
                            'technology'   => 'Technology',
                        ];

                        foreach ($taxonomies as $taxonomy => $label) :
                            $terms = get_terms(['taxonomy' => $taxonomy, 'hide_empty' => true]);
                            if ($terms && !is_wp_error($terms)) :
                                echo '<div class="filter-group">';
                                echo '<div class="filter-header">' . esc_html($label) . ' <span class="arrow"></span></div>';
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

            <div class="jobs_list_area">
                <div id="jobs-body">
                    <?php echo get_jobs_list(); ?>
                </div>
                <?php
                    $total_jobs = wp_count_posts('jobs')->publish;
                    if ($total_jobs > 10) :
                        echo '<button style="border-bottom:1px solid var(--border-color)" class="btn py-1 w-100 radious-0 btn-tertiary" id="jobs-load-more">Load More</button>';
                    endif;
                    ?>
            </div>

    <script type="text/javascript">
    jQuery(document).ready(function($) {
        let offset = 10;
        let filters = {};

        // Accordion toggle
        $(document).on('click', '.filter-header', function() {
            $(this).parent().toggleClass('active');
            //$(this).next('.filter-content').slideToggle(200);
        });

        function collectFilters() {
            filters = {
                'job-category': [],
                'label': [],
                'technology': [],
                'city': []
            };
            $('input[type=checkbox]:checked').each(function() {
                let tax = $(this).attr('name').replace('tax_', '').replace('[]', '');
                filters[tax].push($(this).val());
            });
        }

        function loadJobs(offset, append = false) {
            collectFilters();
            $.ajax({
                url: '<?php echo admin_url("admin-ajax.php"); ?>',
                type: 'POST',
                data: {
                    action: 'ajax_load_more_jobs',
                    offset: offset,
                    filters: filters
                },
                success: function(response) {
                    if (append) {
                        $('#jobs-body').append(response);
                    } else {
                        $('#jobs-body').html(response);
                        offset = 10;
                    }

                    // Hide Load More if fewer than 10 posts loaded
                    let jobCount = $(response).filter("article").length;
                    if (jobCount < 10) {
                        $('#jobs-load-more').hide();
                    } else {
                        $('#jobs-load-more').show();
                    }
                }
            });
        }

        $('#jobs-load-more').on('click', function() {
            loadJobs(offset, true);
            offset += 10;
        });

        $(document).on('change', 'input[type=checkbox]', function() {
            loadJobs(0, false);
        });
    });
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode('jobs_list', 'display_jobs_list');


// AJAX Handler
function ajax_load_more_jobs() {
    $offset  = isset($_POST['offset']) ? intval($_POST['offset']) : 0;
    $filters = isset($_POST['filters']) ? $_POST['filters'] : [];

    echo get_jobs_list($offset, $filters);
    wp_die();
}
add_action('wp_ajax_ajax_load_more_jobs', 'ajax_load_more_jobs');
add_action('wp_ajax_nopriv_ajax_load_more_jobs', 'ajax_load_more_jobs');


// Query Builder
function get_jobs_list($offset = 0, $filters = []) {
    $tax_query = ['relation' => 'AND'];

    foreach (['job-category', 'label', 'technology', 'city'] as $tax) {
        if (!empty($filters[$tax])) {
            $tax_query[] = [
                'taxonomy' => $tax,
                'field'    => 'slug',
                'terms'    => array_map('sanitize_text_field', $filters[$tax]),
            ];
        }
    }

    $args = [
        'post_type'      => 'jobs',
        'posts_per_page' => 10,
        'offset'         => $offset,
        'post_status'    => 'publish',
    ];

    if (count($tax_query) > 1) {
        $args['tax_query'] = $tax_query;
    }

    $query = new WP_Query($args);
    ob_start();

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            $job_city = get_the_terms(get_the_ID(), 'city');
            echo '<article class="job_item position-relative">';
                echo '<h4 class="mb-0">' . get_the_title() . '</h4>';
                if (!empty($job_city)) {
                    echo '<p class="job_city mb-0">' . $job_city[0]->name . '</p>';
                }
                echo '<a href="' . get_permalink() . '" class="view_job"><svg width="25" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14"><path fill="#000" fill-rule="evenodd" d="M10.665 1.953H0V0h14v14h-1.953V3.335L1.733 13.649.35 12.268z" clip-rule="evenodd"></path></svg></a>';
            echo '</article>';
        endwhile;
    else :
        echo '<div class="no_jobs">No jobs found.</div>';
    endif;

    wp_reset_postdata();
    return ob_get_clean();
}




