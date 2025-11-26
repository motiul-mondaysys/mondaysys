<?php

add_action( 'admin_footer', function() {
    ?>
    <script>
    jQuery(document).ready(function($){
        function updateGroupTitles() {
            $('.cmb-repeatable-group').each(function(){
                $(this).find('.cmb-repeatable-grouping').each(function(index){
                    var titleField = $(this).find('input[id$="_title"]'); 
                    var groupHeading = $(this).find('.cmb-group-title'); 
                    if(titleField.length && groupHeading.length){
                        var val = titleField.val();
                        if(val) {
                            groupHeading.text((index+1) + ' - ' + val);
                        } else {
                            groupHeading.text((index+1));
                        }
                    }
                });
            });
        }
        updateGroupTitles();
        $(document).on('input', 'input[id$="_title"]', function(){
            updateGroupTitles();
        });
        $(document).on('cmb2_add_row', function(){
            updateGroupTitles();
        });
    });
    </script>
    <?php
});

function get_technology_posts_list() {
    $posts = get_posts( array(
        'post_type'      => 'technology',
        'posts_per_page' => -1,
        'orderby'        => 'title',
        'order'          => 'ASC',
    ) );

    $options = array(
        '' => '— None —'
    );

    if ( $posts ) {
        foreach ( $posts as $post ) {
            $options[$post->ID] = $post->post_title;
        }
    }

    return $options;
}

add_action( 'cmb2_admin_init', 'mondaysys_metaboxes' );
function mondaysys_metaboxes() {

$prefix = '_cmb2_';
$banner_slideshow = new_cmb2_box( array(
	'id'            => $prefix . 'banner_slider_metabox',
	'title'         => __( 'Settings', 'cmb2' ),
	'object_types'  => array( 'banner_slideshow' ),
	) );
	$banner_slideshow->add_field( array(
		'name'    => esc_html__( 'Slider Content', 'cmb2' ),
		'id'      => $prefix . 'slider_content',
		'type'    => 'textarea_small',
	) );
	$banner_slideshow->add_field( array(
		'name'    => esc_html__( 'Slider Accent Background', 'cmb2' ),
		'id'      => $prefix . 'slideshow_accent_bg',
		'type'    => 'colorpicker',
		'default' => '#D60001',
	) );
	$banner_slideshow->add_field( array(
		'name'    => esc_html__( 'Slider Accent Color', 'cmb2' ),
		'id'      => $prefix . 'slideshow_accent_color',
		'type'    => 'colorpicker',
		'default' => '#ffffff',
	) );
	$banner_slideshow->add_field( array(
		'name'    => esc_html__( 'Button Text', 'cmb2' ),
		'id'      => $prefix . 'btn_text',
		'type'    => 'text',
	) );
	$banner_slideshow->add_field( array(
		'name'    => esc_html__( 'Button Link', 'cmb2' ),
		'id'      => $prefix . 'btn_link',
		'type'    => 'text_url',
	) );
$meta_testimonial = new_cmb2_box( array(
		'id'            => $prefix . 'testimonials_metabox',
		'title'         => __( 'Testimonials Specification', 'cmb2' ),
		'object_types'  => array( 'testimonials' ),
	) );
	$meta_testimonial->add_field( array(
		'name'    => esc_html__( 'Designation', 'cmb2' ),
		'id'      => $prefix . 'designation',
		'type'    => 'text',
	) );
$meta_case_study = new_cmb2_box( array(
		'id'            => $prefix . 'case_studies_metabox',
		'title'         => __( 'Case Study Specification', 'cmb2' ),
		'object_types'  => array( 'case_studies' ),
	) );
	$meta_case_study->add_field( array(
        'name' => __( 'Set as Featured Case Studies?', 'mondaysys' ),
        'id'   => $prefix . 'featured',
        'type' => 'checkbox',
    ) );
	$meta_case_study->add_field( array(
        'name' => __( 'Meta Title', 'mondaysys' ),
        'id'   => $prefix . 'meta_title',
        'type' => 'text',
    ) );
	$meta_case_study->add_field( array(
		'name'    => esc_html__( 'Short Description', 'cmb2' ),
		'id'      => $prefix . 'short_description',
		'type'    => 'textarea_small',
	) );
	$meta_case_study->add_field( array(
		'name'         => esc_html__( 'Upload Logo', 'cmb2' ),
		'id'           => $prefix . 'logo',
		'type'         => 'file',
		'query_args' => array(
			'type' => array(
				'image/png',
				'image/svg+xml'
			),
        ),
	) );
	$meta_case_study->add_field( array(
		'name'    => esc_html__( 'Case Studies Single Page Content', 'cmb2' ),
		'id'      => $prefix . 'title_1',
		'type'    => 'title',
	) );
	$meta_case_study->add_field( array(
		'name'    => esc_html__( 'Project Description', 'cmb2' ),
		'id'      => $prefix . 'project_des',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 5,
		),
	) );
	$meta_case_study->add_field( array(
		'name'    => esc_html__( 'Project Challenge', 'cmb2' ),
		'id'      => $prefix . 'project_challenge',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 5,
		),
	) );
	$meta_case_study->add_field( array(
		'name'    => esc_html__( 'Project Mockup', 'cmb2' ),
		'id'      => $prefix . 'project_mockup',
		'type'    => 'file',
	) );
	$meta_case_study->add_field( array(
		'name'    => esc_html__( 'Project Deploying Process', 'cmb2' ),
		'id'      => $prefix . 'deploying_process',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 5,
		),
	) );
	//Tools & Technology
	$meta_case_study->add_field( array(
		'name'    => esc_html__( 'Tools & Technology', 'cmb2' ),
		'id'      => $prefix . 'title_4',
		'type'    => 'title',
	) );
	$meta_case_study->add_field( array(
        'name' => __( 'Section Title', 'mondaysys' ),
        'id'   => $prefix . 'technology_section_title',
        'type' => 'text',
    ) );
    $group_field_technology = $meta_case_study->add_field( array(
        'id'          => $prefix . 'technology_group',
        'type'        => 'group',
        'options'     => array(
            'group_title'   => __( '{#}', 'mondaysys' ),
            'add_button'    => __( 'Add Another', 'mondaysys' ),
            'remove_button' => __( 'Remove', 'mondaysys' ),
            'sortable'      => true,
			'closed'      => true,
        ),
    ) );
    $meta_case_study->add_group_field( $group_field_technology, array(
        'name' => __( 'Title', 'mondaysys' ),
        'id'   => 'title',
        'type' => 'text',
    ) );
    $meta_case_study->add_group_field( $group_field_technology, array(
        'name' => __( 'Content', 'mondaysys' ),
        'id'   => 'content',
        'type' => 'textarea_small',
    ) );
	$meta_case_study->add_group_field( $group_field_technology, array(
        'name' => __( 'Technology Logo', 'mondaysys' ),
        'id'   => 'tech_logo',
        'type'         => 'file_list',
		'preview_size' => array( 50, 50 ),
    ) );
	//Efficiency
	$meta_case_study->add_field( array(
		'name'    => esc_html__( 'Project Efficiency', 'cmb2' ),
		'id'      => $prefix . 'project_efficiency',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 5,
		),
	) );
	// Project Status
	$meta_case_study->add_field( array(
		'name'    => esc_html__( 'Project Status', 'cmb2' ),
		'id'      => $prefix . 'title_3',
		'type'    => 'title',
	) );
	$meta_case_study->add_field( array(
		'name'    => esc_html__( 'Title', 'cmb2' ),
		'id'      => $prefix . 'status_title',
		'type'    => 'text',
	) );
    $group_field_experience = $meta_case_study->add_field( array(
        'id'          => $prefix . 'experience_group',
        'type'        => 'group',
        'options'     => array(
            'group_title'   => __( '{#}', 'mondaysys' ),
            'add_button'    => __( 'Add Another', 'mondaysys' ),
            'remove_button' => __( 'Remove', 'mondaysys' ),
            'sortable'      => true,
			'closed'      => true,
        ),
    ) );
    $meta_case_study->add_group_field( $group_field_experience, array(
        'name' => __( 'Counter Number', 'mondaysys' ),
        'id'   => 'counter_number',
        'type'       => 'text_small', 
		'attributes' => array(
			'type'  => 'number', 
			'step'  => '1',     
			'min'   => '0',      
			'pattern' => '\d*',  
			'inputmode' => 'numeric', 
		),
    ) );
	$meta_case_study->add_group_field( $group_field_experience, array(
        'name' => __( 'Suffix', 'mondaysys' ),
        'id'   => 'suffix',
        'type' => 'text_small',
    ) );
	$meta_case_study->add_group_field( $group_field_experience, array(
        'name' => __( 'Title', 'mondaysys' ),
        'id'   => 'title',
        'type' => 'text',
    ) );
	// Testimonial
	$meta_case_study->add_field( array(
		'name'    => esc_html__( 'Project Testimonial', 'cmb2' ),
		'id'      => $prefix . 'title_5',
		'type'    => 'title',
	) );
	$meta_case_study->add_field( array(
		'name'    => esc_html__( 'Section Title', 'cmb2' ),
		'id'      => $prefix . 'testimonial_title',
		'type'    => 'text',
	) );
	$meta_case_study->add_field( array(
		'name'    => esc_html__( 'Project Image', 'cmb2' ),
		'id'      => $prefix . 'client_image',
		'type'    => 'file',
		'preview_size' => array( 70, 70 ),
	) );
	$meta_case_study->add_field( array(
		'name'    => esc_html__( 'Client Name', 'cmb2' ),
		'id'      => $prefix . 'client_name',
		'type'    => 'text',
	) );
	$meta_case_study->add_field( array(
		'name'    => esc_html__( 'Client Designation', 'cmb2' ),
		'id'      => $prefix . 'client_designation',
		'type'    => 'text',
	) );
	$meta_case_study->add_field( array(
		'name'    => esc_html__( 'Client Comment', 'cmb2' ),
		'id'      => $prefix . 'client_comment',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 5,
		),
	) );
	
	
$service_meta = new_cmb2_box( array(
	'id'            => $prefix . 'mondaysys_services_meta',
	'title'         => __( 'Settings', 'cmb2' ),
	'object_types'  => array( 'mondaysys_services' ),
	) );
	$service_meta->add_field( array(
		'name'    => esc_html__( 'Sevice Page Home Settings', 'cmb2' ),
		'id'      => $prefix . 'title_1',
		'type'    => 'title',
	) );
	$service_meta->add_field( array(
		'name'    => esc_html__( 'Home Page Accent Background', 'cmb2' ),
		'id'      => $prefix . 'accent_bg',
		'type'    => 'colorpicker',
		'default' => '#0171E3',
	) );
	$service_meta->add_field( array(
		'name'    => esc_html__( 'Home Page Accent Color', 'cmb2' ),
		'id'      => $prefix . 'accent_color',
		'type'    => 'colorpicker',
		'default' => '#ffffff',
	) );
	$service_meta->add_field( array(
		'name'    => esc_html__( 'Sevice Details Page Settings', 'cmb2' ),
		'id'      => $prefix . 'title_15',
		'type'    => 'title',
	) );
	$service_meta->add_field( array(
		'name'    => esc_html__( 'Hero Settings', 'cmb2' ),
		'id'      => $prefix . 'title_16',
		'type'    => 'title',
	) );
	$service_meta->add_field( array(
		'name'    => esc_html__( 'Button Text', 'cmb2' ),
		'id'      => $prefix . 'btn_text',
		'type'    => 'text',
		'default' => 'Book a Discovery Call'
	) );
	$service_meta->add_field( array(
		'name'    => esc_html__( 'Button Link', 'cmb2' ),
		'id'      => $prefix . 'btn_url',
		'type'    => 'text_url',
		'default'    => '#',
	) );
	$service_meta->add_field( array(
		'name'    => esc_html__( 'Hero Image', 'cmb2' ),
		'id'      => $prefix . 'hero_image',
		'type'    => 'file',
		'preview_size' => array( 200, 200 )
	) );
	$service_meta->add_field( array(
		'id'      => $prefix . 'title_2',
		'type'       => 'text',
		'default' => 'Hero Bottom Text',
		'attributes' => array(
			'class'       => 'custom-section-title',
			'placeholder' => esc_html__( 'Enter section title', 'cmb2' ),
		)
	) );
	
	$service_meta->add_field( array(
		'name'    => esc_html__( 'Section Order', 'cmb2' ),
		'id'      => $prefix . 'section_order_1',
		'type'       => 'text_small', 
		'attributes' => array(
			'type'  => 'number', 
			'step'  => '1',     
			'min'   => '0',      
			'pattern' => '\d*',  
			'inputmode' => 'numeric', 
		),
		'default' => '1'
	) );
	$service_meta->add_field( array(
		'name'    => esc_html__( 'Do you want to hide this section?', 'cmb2' ),
		'id'      => $prefix . 'section_hide_1',
		'type'    => 'checkbox',
	) );
	//$service_meta->add_field( array(
        //'name' => __( 'Technology Logo', 'mondaysys' ),
        //'id'   => $prefix .'tech_logo',
        //'type'         => 'file_list',
		//'preview_size' => array( 100, 100 ),
    //) );
	$service_meta->add_field( array(
		'name'    => 'Select Technology Post',
		'id'      => $prefix . 'select_technology_post',
		'type'    => 'select',
		'options' => get_technology_posts_list(),
	) );
	$service_meta->add_field( array(
		'name'    => esc_html__( 'Heo Bottom Text', 'cmb2' ),
		'id'      => $prefix . 'hero_bottom_text',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 5,
		),
	) );
	//Service Solutions
	$service_meta->add_field( array(
		'id'      => $prefix . 'title_3',
		'type'       => 'text',
		'default' => 'Service Solutions',
		'attributes' => array(
			'class'       => 'custom-section-title',
			'placeholder' => esc_html__( 'Enter section title', 'cmb2' ),
		)
	) );
	$service_meta->add_field( array(
		'name'    => esc_html__( 'Section Order', 'cmb2' ),
		'id'      => $prefix . 'section_order_2',
		'type'    => 'text_small',
		'type'       => 'text_small', 
		'attributes' => array(
			'type'  => 'number', 
			'step'  => '1',     
			'min'   => '0',      
			'pattern' => '\d*',  
			'inputmode' => 'numeric', 
		),
		'default' => '2'
	) );
	$service_meta->add_field( array(
		'name'    => esc_html__( 'Do you want to hide this section?', 'cmb2' ),
		'id'      => $prefix . 'section_hide_2',
		'type'    => 'checkbox',
	) );
	$service_meta->add_field( array(
        'name' => __( 'Section Title', 'mondaysys' ),
        'id'   => $prefix . 'service_solutions_title',
        'type' => 'text',
    ) );
    $group_field_solution = $service_meta->add_field( array(
        'id'          => $prefix . 'service_solutions_group',
        'type'        => 'group',
        'options'     => array(
            'group_title'   => __( 'Solution Item {#}', 'mondaysys' ),
            'add_button'    => __( 'Add Another', 'mondaysys' ),
            'remove_button' => __( 'Remove', 'mondaysys' ),
            'sortable'      => true,
			'closed'      => true,
        ),
    ) );
    $service_meta->add_group_field( $group_field_solution, array(
        'name' => __( 'Title', 'mondaysys' ),
        'id'   => 'title',
        'type' => 'text',
    ) );
    $service_meta->add_group_field( $group_field_solution, array(
        'name' => __( 'Content', 'mondaysys' ),
        'id'   => 'content',
        'type' => 'textarea_small',
    ) );
	//Tools & Technology
	$service_meta->add_field( array(
		'id'      => $prefix . 'title_4',
		'type' => 'text',
		'default' => 'Tools & Technology',
		'attributes' => array(
			'class'       => 'custom-section-title',
			'placeholder' => esc_html__( 'Enter section title', 'cmb2' ),
		)
	) );
	$service_meta->add_field( array(
		'name'    => esc_html__( 'Section Order', 'cmb2' ),
		'id'      => $prefix . 'section_order_3',
		'type'       => 'text_small', 
		'attributes' => array(
			'type'  => 'number', 
			'step'  => '1',     
			'min'   => '0',      
			'pattern' => '\d*',  
			'inputmode' => 'numeric', 
		),
		'default' => '3'
	) );
	$service_meta->add_field( array(
		'name'    => esc_html__( 'Do you want to hide this section?', 'cmb2' ),
		'id'      => $prefix . 'section_hide_3',
		'type'    => 'checkbox',
	) );
	$service_meta->add_field( array(
        'name' => __( 'Section Title', 'mondaysys' ),
        'id'   => $prefix . 'technology_section_title',
        'type' => 'text',
    ) );
	$service_meta->add_field( array(
        'name' => __( 'Section Description', 'mondaysys' ),
        'id'   => $prefix . 'technology_section_des',
        'type' => 'textarea_small',
    ) );
	$service_meta->add_field( array(
        'name' => __( 'Section Image', 'mondaysys' ),
        'id'   => $prefix . 'technology_section_image',
        'type' => 'file',
    ) );
    $group_field_technology = $service_meta->add_field( array(
        'id'          => $prefix . 'technology_group',
        'type'        => 'group',
        'options'     => array(
            'group_title'   => __( '{#}', 'mondaysys' ),
            'add_button'    => __( 'Add Another', 'mondaysys' ),
            'remove_button' => __( 'Remove', 'mondaysys' ),
            'sortable'      => true,
			'closed'      => true,
        ),
    ) );
    $service_meta->add_group_field( $group_field_technology, array(
        'name' => __( 'Title', 'mondaysys' ),
        'id'   => 'title',
        'type' => 'text',
    ) );
    $service_meta->add_group_field( $group_field_technology, array(
        'name' => __( 'Content', 'mondaysys' ),
        'id'   => 'content',
        'type' => 'textarea_small',
    ) );
	$service_meta->add_group_field( $group_field_technology, array(
        'name' => __( 'Technology Logo', 'mondaysys' ),
        'id'   => 'tech_logo',
        'type'         => 'file_list',
		'preview_size' => array( 100, 100 ),
    ) );

	//Service Benifits
	$service_meta->add_field( array(
		'id'      => $prefix . 'title_5',
		'type' => 'text',
		'default' => 'Service Benifits',
		'attributes' => array(
			'class'       => 'custom-section-title',
			'placeholder' => esc_html__( 'Enter section title', 'cmb2' ),
		)
	) );
	$service_meta->add_field( array(
		'name'    => esc_html__( 'Section Order', 'cmb2' ),
		'id'      => $prefix . 'section_order_4',
		'type'    => 'text_small',
		'default' => '4',
		'attributes' => array(
			'type'  => 'number', 
			'step'  => '1',     
			'min'   => '0',      
			'pattern' => '\d*',  
			'inputmode' => 'numeric', 
		),
	) );
	$service_meta->add_field( array(
		'name'    => esc_html__( 'Do you want to hide this section?', 'cmb2' ),
		'id'      => $prefix . 'section_hide_4',
		'type'    => 'checkbox',
	) );
	$service_meta->add_field( array(
        'name' => __( 'Section Title', 'mondaysys' ),
        'id'   => $prefix . 'benifits_section_title',
        'type' => 'text',
    ) );
    $group_field_benifits = $service_meta->add_field( array(
        'id'          => $prefix . 'benifits_group',
        'type'        => 'group',
        'options'     => array(
            'group_title'   => __( '{#}', 'mondaysys' ),
            'add_button'    => __( 'Add Another', 'mondaysys' ),
            'remove_button' => __( 'Remove', 'mondaysys' ),
            'sortable'      => true,
			'closed'      => true,
        ),
    ) );
	$service_meta->add_group_field( $group_field_benifits, array(
		'name'    => esc_html__( 'Accent Background', 'cmb2' ),
		'id'      => 'accent_bg',
		'type'    => 'colorpicker',
		'default' => '#002F5F',
	) );
	$service_meta->add_group_field( $group_field_benifits, array(
		'name'    => esc_html__( 'Font Color', 'cmb2' ),
		'id'      => 'accent_color',
		'type'    => 'colorpicker',
		'default' => '#ffffff',
	) );
	$service_meta->add_group_field( $group_field_benifits, array(
		'name'    => esc_html__( 'Number Color', 'cmb2' ),
		'id'      => 'number_color',
		'type'    => 'colorpicker',
		'default' => '#AEFF2C',
	) );
	$service_meta->add_group_field( $group_field_benifits, array(
        'name' => __( 'Image', 'mondaysys' ),
        'id'   => 'image',
        'type' => 'file',
		'preview_size' => array( 100, 100 )
    ) );
    $service_meta->add_group_field( $group_field_benifits, array(
        'name' => __( 'Title', 'mondaysys' ),
        'id'   => 'title',
        'type' => 'text',
    ) );
    $service_meta->add_group_field( $group_field_benifits, array(
        'name' => __( 'Content', 'mondaysys' ),
        'id'   => 'content',
        'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 4,
		),
    ) );

	//Service Capabilities
	$service_meta->add_field( array(
		'id'      => $prefix . 'title_6',
		'type' => 'text',
		'default' => 'Service Capabilities',
		'attributes' => array(
			'class'       => 'custom-section-title',
			'placeholder' => esc_html__( 'Enter section title', 'cmb2' ),
		)
	) );
	$service_meta->add_field( array(
		'name'    => esc_html__( 'Section Order', 'cmb2' ),
		'id'      => $prefix . 'section_order_5',
		'type'    => 'text_small',
		'default' => '5',
		'attributes' => array(
			'type'  => 'number', 
			'step'  => '1',     
			'min'   => '0',      
			'pattern' => '\d*',  
			'inputmode' => 'numeric', 
		),
	) );
	$service_meta->add_field( array(
		'name'    => esc_html__( 'Do you want to hide this section?', 'cmb2' ),
		'id'      => $prefix . 'section_hide_5',
		'type'    => 'checkbox',
	) );
	$service_meta->add_field( array(
        'name' => __( 'Section Title', 'mondaysys' ),
        'id'   => $prefix . 'capability_section_title',
        'type' => 'text',
    ) );
    $group_field_benifits = $service_meta->add_field( array(
        'id'          => $prefix . 'capability_group',
        'type'        => 'group',
        'options'     => array(
            'group_title'   => __( '{#}', 'mondaysys' ),
            'add_button'    => __( 'Add Another', 'mondaysys' ),
            'remove_button' => __( 'Remove', 'mondaysys' ),
            'sortable'      => true,
			'closed'      => true,
        ),
    ) );
    $service_meta->add_group_field( $group_field_benifits, array(
        'name' => __( 'Title', 'mondaysys' ),
        'id'   => 'title',
        'type' => 'text',
    ) );
    $service_meta->add_group_field( $group_field_benifits, array(
        'name' => __( 'Content', 'mondaysys' ),
        'id'   => 'content',
        'type' => 'textarea_small',
    ) );

	//Our Approach
	$service_meta->add_field( array(
		'id'      => $prefix . 'title_7',
		'type' => 'text',
		'default' => 'Service Approach',
		'attributes' => array(
			'class'       => 'custom-section-title',
			'placeholder' => esc_html__( 'Enter section title', 'cmb2' ),
		)
	) );
	$service_meta->add_field( array(
		'name'    => esc_html__( 'Section Order', 'cmb2' ),
		'id'      => $prefix . 'section_order_6',
		'type'    => 'text_small',
		'default' => '6',
		'attributes' => array(
			'type'  => 'number', 
			'step'  => '1',     
			'min'   => '0',      
			'pattern' => '\d*',  
			'inputmode' => 'numeric', 
		),
	) );
	$service_meta->add_field( array(
		'name'    => esc_html__( 'Do you want to hide this section?', 'cmb2' ),
		'id'      => $prefix . 'section_hide_6',
		'type'    => 'checkbox',
	) );
	$service_meta->add_field( array(
        'name' => __( 'Section Title', 'mondaysys' ),
        'id'   => $prefix . 'approach_section_title',
        'type' => 'text',
    ) );
    $group_field_benifits = $service_meta->add_field( array(
        'id'          => $prefix . 'approach_group',
        'type'        => 'group',
        'options'     => array(
            'group_title'   => __( '{#}', 'mondaysys' ),
            'add_button'    => __( 'Add Another', 'mondaysys' ),
            'remove_button' => __( 'Remove', 'mondaysys' ),
            'sortable'      => true,
			'closed'      => true,
        ),
    ) );
    $service_meta->add_group_field( $group_field_benifits, array(
        'name' => __( 'Title', 'mondaysys' ),
        'id'   => 'title',
        'type' => 'text',
    ) );
    $service_meta->add_group_field( $group_field_benifits, array(
        'name' => __( 'Content', 'mondaysys' ),
        'id'   => 'content',
        'type' => 'textarea_small',
    ) );
	// Testimonial
	$service_meta->add_field( array(
		'id'      => $prefix . 'title_8',
		'type'       => 'text',
		'default' => 'Testimonials',
		'attributes' => array(
			'class'       => 'custom-section-title',
			'placeholder' => esc_html__( 'Enter section title', 'cmb2' ),
		)
	) );
	$service_meta->add_field( array(
		'name'    => esc_html__( 'Section Order', 'cmb2' ),
		'id'      => $prefix . 'section_order_7',
		'type'    => 'text_small',
		'default' => '7',
		'attributes' => array(
			'type'  => 'number', 
			'step'  => '1',     
			'min'   => '0',      
			'pattern' => '\d*',  
			'inputmode' => 'numeric', 
		),
	) );
	$service_meta->add_field( array(
		'name'    => esc_html__( 'Do you want to hide this section?', 'cmb2' ),
		'id'      => $prefix . 'section_hide_7',
		'type'    => 'checkbox',
	) );
	$service_meta->add_field( array(
        'name' => __( 'Section Title', 'mondaysys' ),
        'id'   => $prefix . 'testimonial_section_title',
        'type' => 'text',
    ) );
	$service_meta->add_field( array(
        'name' => __( 'Section Description', 'mondaysys' ),
        'id'   => $prefix . 'testimonial_section_desc',
        'type' => 'textarea_small',
    ) );
	//Case Study
	$service_meta->add_field( array(
		'id'      => $prefix . 'title_9',
		'type'       => 'text',
		'default' => 'Case Studies',
		'attributes' => array(
			'class'       => 'custom-section-title',
			'placeholder' => esc_html__( 'Enter section title', 'cmb2' ),
		)
	) );
	$service_meta->add_field( array(
		'name'    => esc_html__( 'Section Order', 'cmb2' ),
		'id'      => $prefix . 'section_order_8',
		'type'    => 'text_small',
		'default' => '8',
		'attributes' => array(
			'type'  => 'number', 
			'step'  => '1',     
			'min'   => '0',      
			'pattern' => '\d*',  
			'inputmode' => 'numeric', 
		),
	) );
	$service_meta->add_field( array(
		'name'    => esc_html__( 'Do you want to hide this section?', 'cmb2' ),
		'id'      => $prefix . 'section_hide_8',
		'type'    => 'checkbox',
	) );
	$service_meta->add_field( array(
        'name' => __( 'Section Title', 'mondaysys' ),
        'id'   => $prefix . 'title_case_studies',
        'type' => 'text',
    ) );
	//FAQ
	$service_meta->add_field( array(
		'id'      => $prefix . 'title_10',
		'type'       => 'text',
		'default' => 'FAQs',
		'attributes' => array(
			'class'       => 'custom-section-title',
			'placeholder' => esc_html__( 'Enter section title', 'cmb2' ),
		)
	) );
	$service_meta->add_field( array(
		'name'    => esc_html__( 'Section Order', 'cmb2' ),
		'id'      => $prefix . 'section_order_9',
		'type'    => 'text_small',
		'default' => '9',
		'attributes' => array(
			'type'  => 'number', 
			'step'  => '1',     
			'min'   => '0',      
			'pattern' => '\d*',  
			'inputmode' => 'numeric', 
		),
	) );
	$service_meta->add_field( array(
		'name'    => esc_html__( 'Do you want to hide this section?', 'cmb2' ),
		'id'      => $prefix . 'section_hide_9',
		'type'    => 'checkbox',
	) );
	$service_meta->add_field( array(
        'name' => __( 'Section Title', 'mondaysys' ),
        'id'   => $prefix . 'title_faqs',
        'type' => 'text',
    ) );
	$service_meta->add_field( array(
		'name'       => 'Select FAQ Category',
		'id'         => $prefix .'faq_category',
		'taxonomy'   => 'faq_cat', 
		'type'       => 'taxonomy_select',
		'query_args'       => array(
			'hide_empty' => true, 
		),
	) );
    //Footer Above
	$service_meta->add_field( array(
		'id'      => $prefix . 'title_11',
		'type'       => 'text',
		'default' => 'Footer Above',
		'attributes' => array(
			'class'       => 'custom-section-title',
			'placeholder' => esc_html__( 'Enter section title', 'cmb2' ),
		)
	) );
	$service_meta->add_field( array(
		'name'    => esc_html__( 'Section Image', 'cmb2' ),
		'id'      => $prefix . 'footer_above_image',
		'type'    => 'file',
		'preview_size' => array( 200, 200 )
	) );
	$service_meta->add_field( array(
        'name' => __( 'Section Title', 'mondaysys' ),
        'id'   => $prefix . 'footer_above_title',
        'type' => 'text',
    ) );
	$service_meta->add_field( array(
        'name' => __( 'Section Description', 'mondaysys' ),
        'id'   => $prefix . 'footer_above_desc',
        'type' => 'textarea_small',
    ) );

	

$industry_meta = new_cmb2_box( array(
	'id'            => $prefix . 'industry_services_meta',
	'title'         => __( 'Settings', 'cmb2' ),
	'object_types'  => array( 'industries' ),
	) );
	$industry_meta->add_field( array(
		'name'         => esc_html__( 'Icon', 'cmb2' ),
		'id'           => $prefix . 'icon',
		'type'         => 'file',
		'query_args' => array(
			'type' => array(
				'image/png',
				'image/svg+xml'
			),
        ),
	) );
	$industry_meta->add_field( array(
		'name'    => esc_html__( 'Single Page Title', 'cmb2' ),
		'id'      => $prefix . 'page_title',
		'type'    => 'text',
	) );
	$industry_meta->add_field( array(
		'name'    => esc_html__( 'Hero Title Description', 'cmb2' ),
		'id'      => $prefix . 'title_description',
		'type'    => 'textarea_small',
	) );
	//Service Industy Benefites 1
	$industry_meta->add_field( array(
		'name'    => esc_html__( 'Service Benifits', 'cmb2' ),
		'id'      => $prefix . 'title_1',
		'type'    => 'title',
	) );
	$industry_meta->add_field( array(
        'name' => __( 'Section Title', 'mondaysys' ),
        'id'   => $prefix . 'benifits_section_title',
        'type' => 'text',
    ) );
	$industry_meta->add_field( array(
        'name' => __( 'Title Description', 'mondaysys' ),
        'id'   => $prefix . 'benifits_section_description',
        'type' => 'textarea_small',
    ) );
    $group_field_benifits = $industry_meta->add_field( array(
        'id'          => $prefix . 'benifits_group',
        'type'        => 'group',
        'options'     => array(
            'group_title'   => __( '{#}', 'mondaysys' ),
            'add_button'    => __( 'Add Another', 'mondaysys' ),
            'remove_button' => __( 'Remove', 'mondaysys' ),
            'sortable'      => true,
			'closed'      => true,
        ),
    ) );
    $industry_meta->add_group_field( $group_field_benifits, array(
        'name' => __( 'Title', 'mondaysys' ),
        'id'   => 'title',
        'type' => 'text',
    ) );
    $industry_meta->add_group_field( $group_field_benifits, array(
        'name' => __( 'Content', 'mondaysys' ),
        'id'   => 'content',
        'type' => 'textarea_small',
    ) );

	//Service Industy Benefites 2
	$industry_meta->add_field( array(
		'name'    => esc_html__( 'Service Benifits 2', 'cmb2' ),
		'id'      => $prefix . 'title_3',
		'type'    => 'title',
	) );
	$industry_meta->add_field( array(
        'name' => __( 'Section Title', 'mondaysys' ),
        'id'   => $prefix . 'benifits_section_title_2',
        'type' => 'text',
    ) );
    $group_field_benifits_2 = $industry_meta->add_field( array(
        'id'          => $prefix . 'benifits_group_2',
        'type'        => 'group',
        'options'     => array(
            'group_title'   => __( '{#}', 'mondaysys' ),
            'add_button'    => __( 'Add Another', 'mondaysys' ),
            'remove_button' => __( 'Remove', 'mondaysys' ),
            'sortable'      => true,
			'closed'      => true,
        ),
    ) );
    $industry_meta->add_group_field( $group_field_benifits_2, array(
        'name' => __( 'Image', 'mondaysys' ),
        'id'   => 'image',
        'type' => 'file',
    ) );
	$industry_meta->add_group_field( $group_field_benifits_2, array(
        'name' => __( 'Title', 'mondaysys' ),
        'id'   => 'title',
        'type' => 'text',
    ) );
    $industry_meta->add_group_field( $group_field_benifits_2, array(
        'name' => __( 'Content', 'mondaysys' ),
        'id'   => 'content',
        'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 4,
		),
    ) );
	//Benifites 3
	$industry_meta->add_field( array(
		'name'    => esc_html__( 'Service Benifits 3', 'cmb2' ),
		'id'      => $prefix . 'title_4',
		'type'    => 'title',
	) );
	$industry_meta->add_field( array(
		'name'    => esc_html__( 'Section Title', 'cmb2' ),
		'id'      => $prefix . 'benifits_3_title',
		'type'    => 'text',
	) );
	$industry_meta->add_field( array(
		'name'    => esc_html__( 'Section Description', 'cmb2' ),
		'id'      => $prefix . 'benifits_3_description',
		'type'    => 'textarea_small',
	) );
	$why_choose_us = $industry_meta->add_field( array(
        'id'          => $prefix . 'why_choose_us',
        'type'        => 'group',
        //'description' => __( 'Why Choose Mondaysys', 'cmb2' ),
        'options'     => array(
            'group_title'   => __( 'Why Choose Item {#}', 'cmb2' ),
            'add_button'    => __( 'Add Another', 'cmb2' ),
            'remove_button' => __( 'Remove', 'cmb2' ),
            'sortable'      => true,
			'closed'      => true,
        ),
    ) );
	$industry_meta->add_group_field( $why_choose_us, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
    ) );
    $industry_meta->add_group_field( $why_choose_us, array(
        'name' => 'Description',
        'id'   => 'description',
        'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 4,
		),
    ) );
	//Tools & Technology
	$industry_meta->add_field( array(
		'name'    => esc_html__( 'Tools & Technology', 'cmb2' ),
		'id'      => $prefix . 'title_6',
		'type'    => 'title',
	) );
	$industry_meta->add_field( array(
        'name' => __( 'Section Title', 'mondaysys' ),
        'id'   => $prefix . 'technology_section_title',
        'type' => 'text',
    ) );
	$industry_meta->add_field( array(
        'name' => __( 'Section Description', 'mondaysys' ),
        'id'   => $prefix . 'technology_section_des',
        'type' => 'textarea_small',
    ) );
    $group_field_technology = $industry_meta->add_field( array(
        'id'          => $prefix . 'technology_group',
        'type'        => 'group',
        'options'     => array(
            'group_title'   => __( '{#}', 'mondaysys' ),
            'add_button'    => __( 'Add Another', 'mondaysys' ),
            'remove_button' => __( 'Remove', 'mondaysys' ),
            'sortable'      => true,
			'closed'      => true,
        ),
    ) );
    $industry_meta->add_group_field( $group_field_technology, array(
        'name' => __( 'Title', 'mondaysys' ),
        'id'   => 'title',
        'type' => 'text',
    ) );
    $industry_meta->add_group_field( $group_field_technology, array(
        'name' => __( 'Content', 'mondaysys' ),
        'id'   => 'content',
        'type' => 'textarea_small',
    ) );
	$industry_meta->add_group_field( $group_field_technology, array(
        'name' => __( 'Technology Logo', 'mondaysys' ),
        'id'   => 'tech_logo',
        'type'         => 'file_list',
		'preview_size' => array( 100, 100 ),
    ) );

	//Our Process
	$industry_meta->add_field( array(
		'name'    => esc_html__( 'Our Process', 'cmb2' ),
		'id'      => $prefix . 'title_9',
		'type'    => 'title',
	) );
	$industry_meta->add_field( array(
		'name'    => esc_html__( 'Section Main Title', 'cmb2' ),
		'id'      => $prefix . 'process_main_title',
		'type'    => 'text',
	) );
	$our_process_group = $industry_meta->add_field( array(
        'id'          => $prefix . 'our_process_group',
        'type'        => 'group',
        'options'     => array(
            'group_title'   => __( 'Why Choose Item {#}', 'cmb2' ),
            'add_button'    => __( 'Add Another', 'cmb2' ),
            'remove_button' => __( 'Remove', 'cmb2' ),
            'sortable'      => true,
			'closed'      => true,
        ),
    ) );
	$industry_meta->add_group_field( $our_process_group, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
    ) );
    $industry_meta->add_group_field( $our_process_group, array(
        'name' => 'Description',
        'id'   => 'description',
        'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 4,
		),
    ) );
	//Our Approach
	$industry_meta->add_field( array(
		'name'    => esc_html__( 'Service Approach', 'cmb2' ),
		'id'      => $prefix . 'title_10',
		'type'    => 'title',
	) );
	$industry_meta->add_field( array(
        'name' => __( 'Section Title', 'mondaysys' ),
        'id'   => $prefix . 'approach_section_title',
        'type' => 'text',
    ) );
    $our_approach_group = $industry_meta->add_field( array(
        'id'          => $prefix . 'approach_group',
        'type'        => 'group',
        'options'     => array(
            'group_title'   => __( '{#}', 'mondaysys' ),
            'add_button'    => __( 'Add Another', 'mondaysys' ),
            'remove_button' => __( 'Remove', 'mondaysys' ),
            'sortable'      => true,
			'closed'      => true,
        ),
    ) );
    $industry_meta->add_group_field( $our_approach_group, array(
        'name' => __( 'Title', 'mondaysys' ),
        'id'   => 'title',
        'type' => 'text',
    ) );
    $industry_meta->add_group_field( $our_approach_group, array(
        'name' => __( 'Content', 'mondaysys' ),
        'id'   => 'content',
        'type' => 'textarea_small',
    ) );
	// Testimonial
	$industry_meta->add_field( array(
		'name'    => esc_html__( 'Testimonials', 'cmb2' ),
		'id'      => $prefix . 'title_11',
		'type'    => 'title',
	) );
	$industry_meta->add_field( array(
        'name' => __( 'Section Title', 'mondaysys' ),
        'id'   => $prefix . 'testimonial_section_title',
        'type' => 'text',
    ) );
	$industry_meta->add_field( array(
        'name' => __( 'Section Title', 'mondaysys' ),
        'id'   => $prefix . 'testimonial_section_desc',
        'type' => 'textarea_small',
    ) );
	//Case Studies
	$industry_meta->add_field( array(
		'name'    => esc_html__( 'Case Studies', 'cmb2' ),
		'id'      => $prefix . 'title_12',
		'type'    => 'title',
	) );
	$industry_meta->add_field( array(
        'name' => __( 'Section Title', 'mondaysys' ),
        'id'   => $prefix . 'title_case_studies',
        'type' => 'text',
    ) );

	// Experience
	$industry_meta->add_field( array(
		'name'    => esc_html__( 'Experience', 'cmb2' ),
		'id'      => $prefix . 'title_13',
		'type'    => 'title',
	) );
	$industry_meta->add_field( array(
		'name'    => esc_html__( 'Section Title', 'cmb2' ),
		'id'      => $prefix . 'experience_section_title',
		'type'    => 'text',
	) );
    $group_field_experience = $industry_meta->add_field( array(
        'id'          => $prefix . 'experience_group',
        'type'        => 'group',
        'options'     => array(
            'group_title'   => __( '{#}', 'mondaysys' ),
            'add_button'    => __( 'Add Another', 'mondaysys' ),
            'remove_button' => __( 'Remove', 'mondaysys' ),
            'sortable'      => true,
			'closed'      => true,
        ),
    ) );
    $industry_meta->add_group_field( $group_field_experience, array(
        'name' => __( 'Counter Number', 'mondaysys' ),
        'id'   => 'counter_number',
        'type'       => 'text_small', 
		'attributes' => array(
			'type'  => 'number', 
			'step'  => '1',     
			'min'   => '0',      
			'pattern' => '\d*',  
			'inputmode' => 'numeric', 
		),
    ) );
	$industry_meta->add_group_field( $group_field_experience, array(
        'name' => __( 'Suffix', 'mondaysys' ),
        'id'   => 'suffix',
        'type' => 'text_small',
    ) );
	$industry_meta->add_group_field( $group_field_experience, array(
        'name' => __( 'Title', 'mondaysys' ),
        'id'   => 'title',
        'type' => 'text',
    ) );

	//FAQs
	$industry_meta->add_field( array(
		'name'    => esc_html__( 'FAQs', 'cmb2' ),
		'id'      => $prefix . 'title_14',
		'type'    => 'title',
	) );
	$industry_meta->add_field( array(
        'name' => __( 'Section Title', 'mondaysys' ),
        'id'   => $prefix . 'title_faqs',
        'type' => 'text',
    ) );
	$industry_meta->add_field( array(
		'name'       => 'Select FAQ Category',
		'id'         => $prefix .'faq_category',
		'taxonomy'   => 'faq_cat', 
		'type'       => 'taxonomy_select',
		'query_args'       => array(
			'hide_empty' => true, 
		),
	) );
	//Footer Above
	$industry_meta->add_field( array(
		'name'    => esc_html__( 'Footer Above', 'cmb2' ),
		'id'      => $prefix . 'title_15',
		'type'    => 'title',
	) );
	$industry_meta->add_field( array(
        'name' => __( 'Section Image', 'mondaysys' ),
        'id'   => $prefix . 'footer_above_image',
        'type' => 'file',
    ) );
	$industry_meta->add_field( array(
        'name' => __( 'Section Title', 'mondaysys' ),
        'id'   => $prefix . 'footer_above_title',
        'type' => 'text',
    ) );
	$industry_meta->add_field( array(
        'name' => __( 'Section Description', 'mondaysys' ),
        'id'   => $prefix . 'footer_above_desc',
        'type' => 'textarea_small',
    ) );
$cmb_about = new_cmb2_box( array(
        'id'            => $prefix . 'about_page_meta',
        'title'         => __( 'About Page Content', 'cmb2' ),
        'object_types'  => array( 'page' ),
        'show_on'       => array( 'key' => 'page-template', 'value' => 'templates/about-page.php' ),
    ) );
	$cmb_about->add_field( array(
		'id'      => $prefix . 'title_15',
		'type'       => 'text',
		'default' => 'Hero Section',
		'attributes' => array(
			'class'       => 'custom-section-title',
			'placeholder' => esc_html__( 'Enter section title', 'cmb2' ),
		)
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Custom Title', 'cmb2' ),
		'id'      => $prefix . 'custom_title',
		'type'    => 'text',
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Button Text', 'cmb2' ),
		'id'      => $prefix . 'btn_text',
		'type'    => 'text',
		'default' => 'Book a Discovery Call'
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Button Link', 'cmb2' ),
		'id'      => $prefix . 'btn_url',
		'type'    => 'text_url',
		'default'    => '#',
	) );
	$cmb_about->add_field( array(
		'id'      => $prefix . 'title_1',
		'type'       => 'text',
		'default' => 'Why Choose Mondaysys',
		'attributes' => array(
			'class'       => 'custom-section-title',
			'placeholder' => esc_html__( 'Enter section title', 'cmb2' ),
		)
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Section Order', 'cmb2' ),
		'id'      => $prefix . 'section_order_1',
		'type'    => 'text_small',
		'default' => '1',
		'attributes' => array(
			'type'  => 'number', 
			'step'  => '1',     
			'min'   => '0',      
			'pattern' => '\d*',  
			'inputmode' => 'numeric', 
		),
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Do you want to hide this section?', 'cmb2' ),
		'id'      => $prefix . 'section_hide_1',
		'type'    => 'checkbox',
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Sub Title', 'cmb2' ),
		'id'      => $prefix . 'why_choose_sub_title',
		'type'    => 'text',
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Title', 'cmb2' ),
		'id'      => $prefix . 'why_choose_title',
		'type'    => 'text',
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Description', 'cmb2' ),
		'id'      => $prefix . 'why_choose_desc',
		'type'    => 'textarea_small',
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Image', 'cmb2' ),
		'id'      => $prefix . 'why_choose_image',
		'type'    => 'file',
	) );
	// Experience
	$cmb_about->add_field( array(
		'id'      => $prefix . 'title_2',
		'type'       => 'text',
		'default' => 'Experience',
		'attributes' => array(
			'class'       => 'custom-section-title',
			'placeholder' => esc_html__( 'Enter section title', 'cmb2' ),
		)
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Section Order', 'cmb2' ),
		'id'      => $prefix . 'section_order_2',
		'type'    => 'text_small',
		'default' => '2',
		'attributes' => array(
			'type'  => 'number', 
			'step'  => '1',     
			'min'   => '0',      
			'pattern' => '\d*',  
			'inputmode' => 'numeric', 
		),
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Do you want to hide this section?', 'cmb2' ),
		'id'      => $prefix . 'section_hide_2',
		'type'    => 'checkbox',
	) );
    $group_field_experience = $cmb_about->add_field( array(
        'id'          => $prefix . 'experience_group',
        'type'        => 'group',
        'options'     => array(
            'group_title'   => __( '{#}', 'mondaysys' ),
            'add_button'    => __( 'Add Another', 'mondaysys' ),
            'remove_button' => __( 'Remove', 'mondaysys' ),
            'sortable'      => true,
			'closed'      => true,
        ),
    ) );
    $cmb_about->add_group_field( $group_field_experience, array(
        'name' => __( 'Counter Number', 'mondaysys' ),
        'id'   => 'counter_number',
        'type'       => 'text_small', 
		'attributes' => array(
			'type'  => 'number', 
			'step'  => '1',     
			'min'   => '0',      
			'pattern' => '\d*',  
			'inputmode' => 'numeric', 
		),
    ) );
	$cmb_about->add_group_field( $group_field_experience, array(
        'name' => __( 'Prefix', 'mondaysys' ),
        'id'   => 'prefix',
        'type' => 'text_small',
    ) );
	$cmb_about->add_group_field( $group_field_experience, array(
        'name' => __( 'Suffix', 'mondaysys' ),
        'id'   => 'prefix',
        'type' => 'text_small',
    ) );
	$cmb_about->add_group_field( $group_field_experience, array(
        'name' => __( 'Suffix', 'mondaysys' ),
        'id'   => 'suffix',
        'type' => 'text_small',
    ) );
	$cmb_about->add_group_field( $group_field_experience, array(
        'name' => __( 'Title', 'mondaysys' ),
        'id'   => 'title',
        'type' => 'text',
    ) );
	//About CEO
	$cmb_about->add_field( array(
		'id'      => $prefix . 'title_3',
		'type'       => 'text',
		'default' => 'About CEO',
		'attributes' => array(
			'class'       => 'custom-section-title',
			'placeholder' => esc_html__( 'Enter section title', 'cmb2' ),
		)
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Section Order', 'cmb2' ),
		'id'      => $prefix . 'section_order_3',
		'type'    => 'text_small',
		'default' => '3',
		'attributes' => array(
			'type'  => 'number', 
			'step'  => '1',     
			'min'   => '0',      
			'pattern' => '\d*',  
			'inputmode' => 'numeric', 
		),
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Do you want to hide this section?', 'cmb2' ),
		'id'      => $prefix . 'section_hide_3',
		'type'    => 'checkbox',
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'CEO Image', 'cmb2' ),
		'id'      => $prefix . 'ceo_image',
		'type'    => 'file',
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'CEO Name', 'cmb2' ),
		'id'      => $prefix . 'ceo_name',
		'type'    => 'text',
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Designation', 'cmb2' ),
		'id'      => $prefix . 'ceo_designation',
		'type'    => 'text',
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'CEO Bio Details', 'cmb2' ),
		'id'      => $prefix . 'ceo_info',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 4,
		),
	) );
	//Industrial Service
	$cmb_about->add_field( array(
		'id'      => $prefix . 'title_4',
		'type'       => 'text',
		'default' => 'Industrial Service',
		'attributes' => array(
			'class'       => 'custom-section-title',
			'placeholder' => esc_html__( 'Enter section title', 'cmb2' ),
		)
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Section Order', 'cmb2' ),
		'id'      => $prefix . 'section_order_4',
		'type'    => 'text_small',
		'default' => '4',
		'attributes' => array(
			'type'  => 'number', 
			'step'  => '1',     
			'min'   => '0',      
			'pattern' => '\d*',  
			'inputmode' => 'numeric', 
		),
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Do you want to hide this section?', 'cmb2' ),
		'id'      => $prefix . 'section_hide_4',
		'type'    => 'checkbox',
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Title', 'cmb2' ),
		'id'      => $prefix . 'industry_service_title',
		'type'    => 'text',
	) );
	//Technology Partner
	$cmb_about->add_field( array(
		'id'      => $prefix . 'title_5',
		'type'       => 'text',
		'default' => 'Section Technology Partner',
		'attributes' => array(
			'class'       => 'custom-section-title',
			'placeholder' => esc_html__( 'Enter section title', 'cmb2' ),
		)
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Section Order', 'cmb2' ),
		'id'      => $prefix . 'section_order_5',
		'type'    => 'text_small',
		'default' => '5',
		'attributes' => array(
			'type'  => 'number', 
			'step'  => '1',     
			'min'   => '0',      
			'pattern' => '\d*',  
			'inputmode' => 'numeric', 
		),
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Do you want to hide this section?', 'cmb2' ),
		'id'      => $prefix . 'section_hide_5',
		'type'    => 'checkbox',
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Title', 'cmb2' ),
		'id'      => $prefix . 'technology_partner_title',
		'type'    => 'text',
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Description', 'cmb2' ),
		'id'      => $prefix . 'technology_partner_description',
		'type'    => 'textarea_small',
	) );
	$cmb_about->add_field( array(
		'name'    => 'Select Technology Post',
		'id'      => $prefix . 'select_technology_post',
		'type'    => 'select',
		'options' => get_technology_posts_list(),
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Technology Partner Image', 'cmb2' ),
		'id'      => $prefix . 'technology_partner_image',
		'type'    => 'file',
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Image Bottom Text', 'cmb2' ),
		'id'      => $prefix . 'technology_partner_large_desc',
		'type'    => 'textarea_small',
	) );
	//Delivery Process
	$cmb_about->add_field( array(
		'id'      => $prefix . 'title_6',
		'type'       => 'text',
		'default' => 'Delivery Process',
		'attributes' => array(
			'class'       => 'custom-section-title',
			'placeholder' => esc_html__( 'Enter section title', 'cmb2' ),
		)
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Section Order', 'cmb2' ),
		'id'      => $prefix . 'section_order_6',
		'type'    => 'text_small',
		'default' => '6',
		'attributes' => array(
			'type'  => 'number', 
			'step'  => '1',     
			'min'   => '0',      
			'pattern' => '\d*',  
			'inputmode' => 'numeric', 
		),
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Do you want to hide this section?', 'cmb2' ),
		'id'      => $prefix . 'section_hide_6',
		'type'    => 'checkbox',
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Section Main Title', 'cmb2' ),
		'id'      => $prefix . 'process_main_title',
		'type'    => 'text',
	) );
	$why_choose_us = $cmb_about->add_field( array(
        'id'          => $prefix . 'why_choose_us',
        'type'        => 'group',
        'options'     => array(
            'group_title'   => __( 'Why Choose Item {#}', 'cmb2' ),
            'add_button'    => __( 'Add Another', 'cmb2' ),
            'remove_button' => __( 'Remove', 'cmb2' ),
            'sortable'      => true,
			'closed'      => true,
        ),
    ) );
	$cmb_about->add_group_field( $why_choose_us, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
    ) );
    $cmb_about->add_group_field( $why_choose_us, array(
        'name' => 'Description',
        'id'   => 'description',
        'type'    => 'textarea_small',
    ) );

	//Service Benifits
	$cmb_about->add_field( array(
		'id'      => $prefix . 'title_7',
		'type'       => 'text',
		'default' => 'Service Benifits',
		'attributes' => array(
			'class'       => 'custom-section-title',
			'placeholder' => esc_html__( 'Enter section title', 'cmb2' ),
		)
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Section Order', 'cmb2' ),
		'id'      => $prefix . 'section_order_7',
		'type'    => 'text_small',
		'default' => '7',
		'attributes' => array(
			'type'  => 'number', 
			'step'  => '1',     
			'min'   => '0',      
			'pattern' => '\d*',  
			'inputmode' => 'numeric', 
		),
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Do you want to hide this section?', 'cmb2' ),
		'id'      => $prefix . 'section_hide_7',
		'type'    => 'checkbox',
	) );
	$cmb_about->add_field( array(
        'name' => __( 'Section Title', 'mondaysys' ),
        'id'   => $prefix . 'benifits_section_title',
        'type' => 'text',
    ) );
    $group_field_benifits = $cmb_about->add_field( array(
        'id'          => $prefix . 'benifits_group',
        'type'        => 'group',
        'options'     => array(
            'group_title'   => __( '{#}', 'mondaysys' ),
            'add_button'    => __( 'Add Another', 'mondaysys' ),
            'remove_button' => __( 'Remove', 'mondaysys' ),
            'sortable'      => true,
			'closed'      => true,
        ),
    ) );
    $cmb_about->add_group_field( $group_field_benifits, array(
		'name'    => esc_html__( 'Accent Background', 'cmb2' ),
		'id'      => 'accent_bg',
		'type'    => 'colorpicker',
		'default' => '#002F5F',
	) );
	$cmb_about->add_group_field( $group_field_benifits, array(
		'name'    => esc_html__( 'Font Color', 'cmb2' ),
		'id'      => 'accent_color',
		'type'    => 'colorpicker',
		'default' => '#ffffff',
	) );
	$cmb_about->add_group_field( $group_field_benifits, array(
		'name'    => esc_html__( 'Number Color', 'cmb2' ),
		'id'      => 'number_color',
		'type'    => 'colorpicker',
		'default' => '#AEFF2C',
	) );
	$cmb_about->add_group_field( $group_field_benifits, array(
        'name' => __( 'Image', 'mondaysys' ),
        'id'   => 'image',
        'type' => 'file',
		'preview_size' => array( 100, 100 )
    ) );
    $cmb_about->add_group_field( $group_field_benifits, array(
        'name' => __( 'Title', 'mondaysys' ),
        'id'   => 'title',
        'type' => 'text',
    ) );
    $cmb_about->add_group_field( $group_field_benifits, array(
        'name' => __( 'Content', 'mondaysys' ),
        'id'   => 'content',
        'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 4,
		),
    ) );
	//Tech Stack
	$cmb_about->add_field( array(
		'id'      => $prefix . 'title_8',
		'type'       => 'text',
		'default' => 'Section Tech Stack',
		'attributes' => array(
			'class'       => 'custom-section-title',
			'placeholder' => esc_html__( 'Enter section title', 'cmb2' ),
		)
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Section Order', 'cmb2' ),
		'id'      => $prefix . 'section_order_8',
		'type'    => 'text_small',
		'default' => '8',
		'attributes' => array(
			'type'  => 'number', 
			'step'  => '1',     
			'min'   => '0',      
			'pattern' => '\d*',  
			'inputmode' => 'numeric', 
		),
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Do you want to hide this section?', 'cmb2' ),
		'id'      => $prefix . 'section_hide_8',
		'type'    => 'checkbox',
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Title', 'cmb2' ),
		'id'      => $prefix . 'tech_stack_title',
		'type'    => 'text',
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Description', 'cmb2' ),
		'id'      => $prefix . 'tech_stack_desc',
		'type'    => 'textarea_small',
	) );
	$cmb_about->add_field( array(
		'name'    => 'Select Technology Post',
		'id'      => $prefix . 'select_technology_title',
		'type'    => 'select',
		'options' => get_technology_posts_list(),
	) );
	//Testimonials
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Testimonials', 'cmb2' ),
		'id'      => $prefix . 'title_9',
		'type'       => 'title',
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Section Order', 'cmb2' ),
		'id'      => $prefix . 'section_order_9',
		'type'    => 'text_small',
		'default' => '9',
		'attributes' => array(
			'type'  => 'number', 
			'step'  => '1',     
			'min'   => '0',      
			'pattern' => '\d*',  
			'inputmode' => 'numeric', 
		),
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Do you want to hide this section?', 'cmb2' ),
		'id'      => $prefix . 'section_hide_9',
		'type'    => 'checkbox',
	) );
	//Map
	$cmb_about->add_field( array(
		'id'      => $prefix . 'title_10',
		'type'       => 'text',
		'default' => 'Map',
		'attributes' => array(
			'class'       => 'custom-section-title',
			'placeholder' => esc_html__( 'Enter section title', 'cmb2' ),
		)
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Section Order', 'cmb2' ),
		'id'      => $prefix . 'section_order_10',
		'type'    => 'text_small',
		'default' => '10',
		'attributes' => array(
			'type'  => 'number', 
			'step'  => '1',     
			'min'   => '0',      
			'pattern' => '\d*',  
			'inputmode' => 'numeric', 
		),
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Do you want to hide this section?', 'cmb2' ),
		'id'      => $prefix . 'section_hide_10',
		'type'    => 'checkbox',
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Title', 'cmb2' ),
		'id'      => $prefix . 'map_title',
		'type'    => 'text',
	) );
	//FAQs
	$cmb_about->add_field( array(
		'id'      => $prefix . 'title_11',
		'type'       => 'text',
		'default' => 'FAQs',
		'attributes' => array(
			'class'       => 'custom-section-title',
			'placeholder' => esc_html__( 'Enter section title', 'cmb2' ),
		)
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Section Order', 'cmb2' ),
		'id'      => $prefix . 'section_order_11',
		'type'    => 'text_small',
		'default' => '11',
		'attributes' => array(
			'type'  => 'number', 
			'step'  => '1',     
			'min'   => '0',      
			'pattern' => '\d*',  
			'inputmode' => 'numeric', 
		),
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Do you want to hide this section?', 'cmb2' ),
		'id'      => $prefix . 'section_hide_11',
		'type'    => 'checkbox',
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Title', 'cmb2' ),
		'id'      => $prefix . 'title_faqs',
		'type'    => 'text',
	) );
	$cmb_about->add_field( array(
		'name'       => 'Select FAQ Category',
		'id'         => $prefix .'faq_category',
		'taxonomy'   => 'faq_cat', 
		'type'       => 'taxonomy_select',
		'query_args'       => array(
			'hide_empty' => true, 
		),
	) );
	//About Footer Above
	$cmb_about->add_field( array(
		'id'      => $prefix . 'title_12',
		'type'       => 'text',
		'default' => 'Section Footer Above',
		'attributes' => array(
			'class'       => 'custom-section-title',
			'placeholder' => esc_html__( 'Enter section title', 'cmb2' ),
		)
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Do you want to hide this section?', 'cmb2' ),
		'id'      => $prefix . 'section_hide_11',
		'type'    => 'checkbox',
	) );
	$cmb_about->add_field( array(
		'name'    => esc_html__( 'Title', 'cmb2' ),
		'id'      => $prefix . 'footer_above_title',
		'type'    => 'text',
	) );
$cmb_home = new_cmb2_box( array(
        'id'            => $prefix . 'home_pag_meta',
        'title'         => __( 'Home Page Content', 'cmb2' ),
        'object_types'  => array( 'page' ),
        'show_on'       => array( 'key' => 'page-template', 'value' => 'templates/front-page.php' ),
    ) );

	$cmb_home->add_field( array(
		'name'    => esc_html__( 'Home page Hero', 'cmb2' ),
		'id'      => $prefix . 'title_1',
		'type'    => 'title',
	) );
	$cmb_home->add_field( array(
		'name'    => esc_html__( 'Title', 'cmb2' ),
		'id'      => $prefix . 'main_title',
		'type'    => 'text',
	) );
	$cmb_home->add_field( array(
		'name'    => esc_html__( 'Pragraph Text', 'cmb2' ),
		'id'      => $prefix . 'title_pragraph',
		'type'    => 'textarea_small',
	) );
	$cmb_home->add_field( array(
		'name'    => esc_html__( 'Button Text', 'cmb2' ),
		'id'      => $prefix . 'btn_text',
		'type'    => 'text',
	) );
	$cmb_home->add_field( array(
		'name'    => esc_html__( 'Button Link', 'cmb2' ),
		'id'      => $prefix . 'btn_url',
		'type'    => 'text_url',
	) );
	$word_slider = $cmb_home->add_field( array(
        'id'          => $prefix . 'ward_slider_text',
        'type'        => 'group',
        'options'     => array(
            'group_title'   => __( 'Word Slider Text {#}', 'cmb2' ),
            'add_button'    => __( 'Add Another', 'cmb2' ),
            'remove_button' => __( 'Remove', 'cmb2' ),
            'sortable'      => true,
			'closed'      => true,
        ),
    ) );
	$cmb_home->add_group_field( $word_slider, array(
        'name' => 'Word Slider Text',
        'id'   => 'title',
        'type' => 'text',
    ) );
	$cmb_home->add_field( array(
		'name'    => esc_html__( 'Casestuday images', 'cmb2' ),
		'id'      => $prefix . 'case_studay_image',
		'type'         => 'file_list',
		'preview_size' => array( 100, 100 ),
	) );

	$cmb_home->add_field( array(
		'name'    => esc_html__( 'Section Technology Partner', 'cmb2' ),
		'id'      => $prefix . 'home_section_20',
		'type'    => 'title',
	) );
	$cmb_home->add_field( array(
		'name'    => esc_html__( 'Title', 'cmb2' ),
		'id'      => $prefix . 'technology_partner_title',
		'type'    => 'text',
	) );
	$cmb_home->add_field( array(
		'name'    => esc_html__( 'Description', 'cmb2' ),
		'id'      => $prefix . 'technology_partner_description',
		'type'    => 'textarea_small',
	) );
	$cmb_home->add_field( array(
		'name'    => 'Select Technology',
		'id'      => $prefix . 'select_technology_post',
		'type'    => 'select',
		'options' => get_technology_posts_list(),
	) );

	$cmb_home->add_field( array(
		'name'    => esc_html__( 'Section Mondaysys Main Services', 'cmb2' ),
		'id'      => $prefix . 'home_section_21',
		'type'    => 'title',
	) );
	$cmb_home->add_field( array(
		'name'    => esc_html__( 'Title', 'cmb2' ),
		'id'      => $prefix . 'mondaysys_service_title',
		'type'    => 'text',
	) );

	$cmb_home->add_field( array(
		'name'    => esc_html__( 'Section Industries We Serve', 'cmb2' ),
		'id'      => $prefix . 'home_section_22',
		'type'    => 'title',
	) );
	$cmb_home->add_field( array(
		'name'    => esc_html__( 'Title', 'cmb2' ),
		'id'      => $prefix . 'industry_service_title',
		'type'    => 'text',
	) );
	//Working Process
	$cmb_home->add_field( array(
		'name'    => esc_html__( 'Section Working Process', 'cmb2' ),
		'id'      => $prefix . 'home_section_23',
		'type'    => 'title',
	) );
	$cmb_home->add_field( array(
		'name'    => esc_html__( 'Background Image', 'cmb2' ),
		'id'      => $prefix . 'process_bg',
		'type'    => 'file',
	) );
	$cmb_home->add_field( array(
		'name'    => esc_html__( 'Section Title', 'cmb2' ),
		'id'      => $prefix . 'process_inner_title',
		'type'    => 'text',
	) );
	$working_process_group = $cmb_home->add_field( array(
        'id'          => $prefix . 'working_process_group',
        'type'        => 'group',
        'options'     => array(
            'group_title'   => __( '{#}', 'cmb2' ),
            'add_button'    => __( 'Add Another', 'cmb2' ),
            'remove_button' => __( 'Remove', 'cmb2' ),
            'sortable'      => true,
			'closed'      => true,
        ),
    ) );
	$cmb_home->add_group_field( $working_process_group, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
    ) );
	$cmb_home->add_group_field( $working_process_group, array(
        'name' => 'Title',
        'id'   => 'content',
        'type'    => 'textarea_small',
    ) );

	$cmb_home->add_field( array(
		'name'    => esc_html__( 'Section Why Choose Mondaysys', 'cmb2' ),
		'id'      => $prefix . 'home_section_1',
		'type'    => 'title',
	) );
	$cmb_home->add_field( array(
		'name'    => esc_html__( 'Section Title', 'cmb2' ),
		'id'      => $prefix . 'section_title_20',
		'type'    => 'text',
	) );
	$why_choose_us = $cmb_home->add_field( array(
        'id'          => $prefix . 'why_choose_us',
        'type'        => 'group',
        //'description' => __( 'Why Choose Mondaysys', 'cmb2' ),
        'options'     => array(
            'group_title'   => __( 'Why Choose Item {#}', 'cmb2' ),
            'add_button'    => __( 'Add Another', 'cmb2' ),
            'remove_button' => __( 'Remove', 'cmb2' ),
            'sortable'      => true,
			'closed'      => true,
        ),
    ) );
	$cmb_home->add_group_field( $why_choose_us, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
    ) );
	
    $cmb_home->add_group_field( $why_choose_us, array(
        'name' => 'Sub Title',
        'id'   => 'sub_title',
        'type' => 'text',
    ) );

    $cmb_home->add_group_field( $why_choose_us, array(
        'name' => 'Description',
        'id'   => 'description',
        'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 4,
		),
    ) );

	$cmb_home->add_field( array(
		'name'    => esc_html__( 'Section Case studies', 'cmb2' ),
		'id'      => $prefix . 'home_section_24',
		'type'    => 'title',
	) );
	$cmb_home->add_field( array(
		'name'    => esc_html__( 'Section Title', 'cmb2' ),
		'id'      => $prefix . 'title_case_studies',
		'type'    => 'text',
	) );
	$cmb_home->add_field( array(
		'name'    => esc_html__( 'Section Tech Stack', 'cmb2' ),
		'id'      => $prefix . 'home_section_25',
		'type'    => 'title',
	) );
	$cmb_home->add_field( array(
		'name'    => 'Select Technology',
		'id'      => $prefix . 'select_technology_title',
		'type'    => 'select',
		'options' => get_technology_posts_list(),
	) );
	$cmb_home->add_field( array(
		'name'    => esc_html__( 'Section Title', 'cmb2' ),
		'id'      => $prefix . 'section_title_25',
		'type'    => 'text',
	) );
	$cmb_home->add_field( array(
		'name'    => esc_html__( 'Title Description', 'cmb2' ),
		'id'      => $prefix . 'section_title_description_25',
		'type'    => 'textarea_small',
	) );

	$cmb_home->add_field( array(
		'name'    => esc_html__( 'Section FAQs', 'cmb2' ),
		'id'      => $prefix . 'home_section_28',
		'type'    => 'title',
	) );
	$cmb_home->add_field( array(
		'name'    => esc_html__( 'Title', 'cmb2' ),
		'id'      => $prefix . 'title_faqs',
		'type'    => 'text',
	) );
	$cmb_home->add_field( array(
		'name'       => 'Select FAQ Category',
		'id'         => $prefix .'faq_category',
		'taxonomy'   => 'faq_cat', 
		'type'       => 'taxonomy_select',
		'query_args'       => array(
			'hide_empty' => true, 
		),
	) );

	$cmb_home->add_field( array(
		'name'    => esc_html__( 'Section Footer Above', 'cmb2' ),
		'id'      => $prefix . 'home_section_30',
		'type'    => 'title',
	) );
	$cmb_home->add_field( array(
		'name'    => esc_html__( 'Title', 'cmb2' ),
		'id'      => $prefix . 'footer_above_title',
		'type'    => 'text',
	) );
//Start Contact Page Meta
$contact_meta = new_cmb2_box( array(
        'id'            => $prefix . 'contact_page_meta',
        'title'         => __( 'Contact Page Content', 'cmb2' ),
        'object_types'  => array( 'page' ),
        'show_on'       => array( 'key' => 'page-template', 'value' => 'templates/contact-page.php' ),
    ) );
	$contact_meta->add_field( array(
		'name'    => esc_html__( 'Form Left area content', 'cmb2' ),
		'id'      => $prefix . 'title_1',
		'type'    => 'title',
	) );
	$contact_meta->add_field( array(
		'name'    => esc_html__( 'Contact Left content', 'cmb2' ),
		'id'      => $prefix . 'contact_left_content',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 5,
		),
	) );
	//Map
	$contact_meta->add_field( array(
		'name'    => esc_html__( 'Map', 'cmb2' ),
		'id'      => $prefix . 'title_2',
		'type'    => 'title',
	) );
	$contact_meta->add_field( array(
		'name'    => esc_html__( 'Title', 'cmb2' ),
		'id'      => $prefix . 'map_title',
		'type'    => 'text',
	) );
	//Address
	$contact_meta->add_field( array(
		'name'    => esc_html__( 'Address', 'cmb2' ),
		'id'      => $prefix . 'title_3',
		'type'    => 'title',
	) );
	$address = $contact_meta->add_field( array(
        'id'          => $prefix . 'address',
        'type'        => 'group',
        'options'     => array(
            'group_title'   => __( 'Address {#}', 'cmb2' ),
            'add_button'    => __( 'Add Another', 'cmb2' ),
            'remove_button' => __( 'Remove', 'cmb2' ),
            'sortable'      => true,
			'closed'      => true,
        ),
    ) );
	$contact_meta->add_group_field( $address, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
    ) );
	$contact_meta->add_group_field( $address, array(
        'name' => 'Email',
        'id'   => 'email',
        'type' => 'text_email',
    ) );
	$contact_meta->add_group_field( $address, array(
        'name' => 'Phone Number',
        'id'   => 'phone',
        'type' => 'text',
    ) );
	$contact_meta->add_group_field( $address, array(
        'name' => 'Address',
        'id'   => 'address',
        'type' => 'textarea_small',
    ) );
$career_meta = new_cmb2_box( array(
        'id'            => $prefix . 'career_paag_meta',
        'title'         => __( 'Career Page Content', 'cmb2' ),
        'object_types'  => array( 'page' ),
        'show_on'       => array( 'key' => 'page-template', 'value' => 'templates/careers.php' ),
    ) );
	$career_meta->add_field( array(
		'name'    => esc_html__( 'Title', 'cmb2' ),
		'id'      => $prefix . 'page_title',
		'type'    => 'text',
	) );

	$career_meta->add_field( array(
		'id'      => $prefix . 'title_25',
		'type' => 'text',
		'default' => 'Job Post Bottom Text',
		'attributes' => array(
			'class'       => 'custom-section-title',
			'placeholder' => esc_html__( 'Enter section title', 'cmb2' ),
		)
	) );
	$career_meta->add_field( array(
		'name' => __( 'Content', 'mondaysys' ),
		'id'      => $prefix . 'career_post_bottom_text',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 5,
		),
	) );
	
	//Counter
	$career_meta->add_field( array(
		'id'      => $prefix . 'title_1',
		'type' => 'text',
		'default' => 'Experience',
		'attributes' => array(
			'class'       => 'custom-section-title',
			'placeholder' => esc_html__( 'Enter section title', 'cmb2' ),
		)
	) );
	$group_field_experience = $career_meta->add_field( array(
        'id'          => $prefix . 'experience_group',
        'type'        => 'group',
        'options'     => array(
            'group_title'   => __( '{#}', 'mondaysys' ),
            'add_button'    => __( 'Add Another', 'mondaysys' ),
            'remove_button' => __( 'Remove', 'mondaysys' ),
            'sortable'      => true,
			'closed'      => true,
        ),
    ) );
	$career_meta->add_group_field( $group_field_experience, array(
        'name' => __( 'Counter Number', 'mondaysys' ),
        'id'   => 'counter_number',
        'type'       => 'text_small', 
		'attributes' => array(
			'type'  => 'number', 
			'step'  => '1',     
			'min'   => '0',      
			'pattern' => '\d*',  
			'inputmode' => 'numeric', 
		),
    ) );
	$career_meta->add_group_field( $group_field_experience, array(
        'name' => __( 'Prefix', 'mondaysys' ),
        'id'   => 'prefix',
        'type' => 'text_small',
    ) );
	$career_meta->add_group_field( $group_field_experience, array(
        'name' => __( 'Suffix', 'mondaysys' ),
        'id'   => 'suffix',
        'type' => 'text_small',
    ) );
	$career_meta->add_group_field( $group_field_experience, array(
        'name' => __( 'Title', 'mondaysys' ),
        'id'   => 'title',
        'type' => 'text',
    ) );
	//Trusted Featured
	$career_meta->add_field( array(
		'id'      => $prefix . 'title_2',
		'type' => 'text',
		'default' => 'Trusted Featured',
		'attributes' => array(
			'class'       => 'custom-section-title',
			'placeholder' => esc_html__( 'Enter section title', 'cmb2' ),
		)
	) );
	$career_meta->add_field( array(
		'name'    => esc_html__( 'Section Title', 'cmb2' ),
		'id'      => $prefix . 'trusted_title',
		'type'    => 'text',
	) );
	$trust_gruop = $career_meta->add_field( array(
        'id'          => $prefix . 'trusted_featured',
        'type'        => 'group',
        'options'     => array(
            'group_title'   => __( '{#}', 'cmb2' ),
            'add_button'    => __( 'Add Another', 'cmb2' ),
            'remove_button' => __( 'Remove', 'cmb2' ),
            'sortable'      => true,
			'closed'      => true,
        ),
    ) );
	$career_meta->add_group_field( $trust_gruop, array(
        'name' => 'Icon',
        'id'   => 'icon',
        'type' => 'file',
		'preview_size' => array( 50, 50 ),
    ) );
	$career_meta->add_group_field( $trust_gruop, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
    ) );
    $career_meta->add_group_field( $trust_gruop, array(
        'name' => 'Description',
        'id'   => 'description',
        'type'    => 'textarea_small',
    ) );
	//Mondaysys Culture
	$career_meta->add_field( array(
		'id'      => $prefix . 'title_3',
		'type' => 'text',
		'default' => 'Mondaysys Culture',
		'attributes' => array(
			'class'       => 'custom-section-title',
			'placeholder' => esc_html__( 'Enter section title', 'cmb2' ),
		)
	) );
	$career_meta->add_field( array(
		'name'    => esc_html__( 'Section Title', 'cmb2' ),
		'id'      => $prefix . 'culture_title',
		'type'    => 'text',
	) );
	$career_meta->add_field( array(
		'name'    => esc_html__( 'Title Description', 'cmb2' ),
		'id'      => $prefix . 'culture_title_desc',
		'type'    => 'textarea_small',
	) );
	$culture_group = $career_meta->add_field( array(
        'id'          => $prefix . 'culture_group',
        'type'        => 'group',
        'options'     => array(
            'group_title'   => __( '{#}', 'cmb2' ),
            'add_button'    => __( 'Add Another', 'cmb2' ),
            'remove_button' => __( 'Remove', 'cmb2' ),
            'sortable'      => true,
			'closed'      => true,
        ),
    ) );
	$career_meta->add_group_field( $culture_group, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
    ) );
    $career_meta->add_group_field( $culture_group, array(
        'name' => 'Description',
        'id'   => 'description',
        'type'    => 'textarea_small',
    ) );
	//Technology Partner
	$career_meta->add_field( array(
		'id'      => $prefix . 'title_4',
		'type' => 'text',
		'default' => 'Technology Partner',
		'attributes' => array(
			'class'       => 'custom-section-title',
			'placeholder' => esc_html__( 'Enter section title', 'cmb2' ),
		)
	) );
	$career_meta->add_field( array(
		'name'    => esc_html__( 'Title', 'cmb2' ),
		'id'      => $prefix . 'technology_partner_title',
		'type'    => 'text',
	) );
	$career_meta->add_field( array(
		'name'    => esc_html__( 'Description', 'cmb2' ),
		'id'      => $prefix . 'technology_partner_description',
		'type'    => 'textarea_small',
	) );
	$career_meta->add_field( array(
		'name'    => 'Select Technology Post',
		'id'      => $prefix . 'select_technology_post',
		'type'    => 'select',
		'options' => get_technology_posts_list(),
	) );
	//Expect from Mondysys
	$career_meta->add_field( array(
		'id'      => $prefix . 'title_5',
		'type' => 'text',
		'default' => 'Expect from Mondysys',
		'attributes' => array(
			'class'       => 'custom-section-title',
			'placeholder' => esc_html__( 'Enter section title', 'cmb2' ),
		)
	) );
	$career_meta->add_field( array(
		'name'    => esc_html__( 'Section Title', 'cmb2' ),
		'id'      => $prefix . 'expect_title',
		'type'    => 'text',
	) );
	$career_meta->add_field( array(
		'name'    => esc_html__( 'Title Description', 'cmb2' ),
		'id'      => $prefix . 'expect_title_desc',
		'type'    => 'textarea_small',
	) );
	$career_meta->add_field( array(
		'name'    => esc_html__( 'Section Image', 'cmb2' ),
		'id'      => $prefix . 'expect_section_image',
		'type'    => 'file',
	) );
	$expect_group = $career_meta->add_field( array(
        'id'          => $prefix . 'expect_group',
        'type'        => 'group',
        'options'     => array(
            'group_title'   => __( '{#}', 'cmb2' ),
            'add_button'    => __( 'Add Another', 'cmb2' ),
            'remove_button' => __( 'Remove', 'cmb2' ),
            'sortable'      => true,
			'closed'      => true,
        ),
    ) );
	$career_meta->add_group_field( $expect_group, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
    ) );
    $career_meta->add_group_field( $expect_group, array(
        'name' => 'Description',
        'id'   => 'description',
        'type'    => 'textarea_small',
    ) );
	//Hiring Process
	$career_meta->add_field( array(
		'id'      => $prefix . 'title_6',
		'type' => 'text',
		'default' => 'Hiring Process',
		'attributes' => array(
			'class'       => 'custom-section-title',
			'placeholder' => esc_html__( 'Enter section title', 'cmb2' ),
		)
	) );
	$career_meta->add_field( array(
		'name'    => esc_html__( 'Section Title', 'cmb2' ),
		'id'      => $prefix . 'hiring_process_title',
		'type'    => 'text',
	) );
	$hiring_process_group = $career_meta->add_field( array(
        'id'          => $prefix . 'hiring_process_group',
        'type'        => 'group',
        'options'     => array(
            'group_title'   => __( '{#}', 'cmb2' ),
            'add_button'    => __( 'Add Another', 'cmb2' ),
            'remove_button' => __( 'Remove', 'cmb2' ),
            'sortable'      => true,
			'closed'      => true,
        ),
    ) );
	$career_meta->add_group_field( $hiring_process_group, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
    ) );
    $career_meta->add_group_field( $hiring_process_group, array(
        'name' => 'Description',
        'id'   => 'description',
        'type'    => 'textarea_small',
    ) );

	//Employee Testimonial
	$career_meta->add_field( array(
		'id'      => $prefix . 'title_7',
		'type' => 'text',
		'default' => 'Employee Testimonial',
		'attributes' => array(
			'class'       => 'custom-section-title',
			'placeholder' => esc_html__( 'Enter section title', 'cmb2' ),
		)
	) );
	$career_meta->add_field( array(
        'name' => __( 'Section Title', 'mondaysys' ),
        'id'   => $prefix . 'testimonial_title',
        'type' => 'text',
    ) );
	$career_meta->add_field( array(
        'name' => __( 'Section Description', 'mondaysys' ),
        'id'   => $prefix . 'testimonial_description',
        'type' => 'textarea_small',
    ) );
    $testimonial_group = $career_meta->add_field( array(
        'id'          => $prefix . 'testimonial_group',
        'type'        => 'group',
        'options'     => array(
            'group_title'   => __( '{#}', 'mondaysys' ),
            'add_button'    => __( 'Add Another', 'mondaysys' ),
            'remove_button' => __( 'Remove', 'mondaysys' ),
            'sortable'      => true,
			'closed'      => true,
        ),
    ) );
	$career_meta->add_group_field( $testimonial_group, array(
        'name' => __( 'Image', 'mondaysys' ),
        'id'   => 'image',
        'type' => 'file',
		'preview_size' => array( 50, 50 ),
    ) );
    $career_meta->add_group_field( $testimonial_group, array(
        'name' => __( 'Name', 'mondaysys' ),
        'id'   => 'title',
        'type' => 'text',
    ) );
	$career_meta->add_group_field( $testimonial_group, array(
        'name' => __( 'Designation', 'mondaysys' ),
        'id'   => 'designation',
        'type' => 'text',
    ) );
    $career_meta->add_group_field( $testimonial_group, array(
        'name' => __( 'Content', 'mondaysys' ),
        'id'   => 'content',
        'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 5,
		),
    ) );
	//Employee Testimonial
	$career_meta->add_field( array(
		'id'      => $prefix . 'title_8',
		'type' => 'text',
		'default' => 'Case Studies',
		'attributes' => array(
			'class'       => 'custom-section-title',
			'placeholder' => esc_html__( 'Enter section title', 'cmb2' ),
		)
	) );
	$career_meta->add_field( array(
        'name' => __( 'Section Title', 'mondaysys' ),
        'id'   => $prefix . 'title_case_studies',
        'type' => 'text',
    ) );
	//Footer Above
	$career_meta->add_field( array(
		'id'      => $prefix . 'title_9',
		'type' => 'text',
		'default' => 'Footer Above',
		'attributes' => array(
			'class'       => 'custom-section-title',
			'placeholder' => esc_html__( 'Enter section title', 'cmb2' ),
		)
	) );
	$career_meta->add_field( array(
        'name' => __( 'Section Image', 'mondaysys' ),
        'id'   => $prefix . 'footer_above_image',
        'type' => 'file',
    ) );
	$career_meta->add_field( array(
        'name' => __( 'Section Title', 'mondaysys' ),
        'id'   => $prefix . 'footer_above_title',
        'type' => 'text',
    ) );
	$career_meta->add_field( array(
        'name' => __( 'Section Description', 'mondaysys' ),
        'id'   => $prefix . 'footer_above_desc',
        'type' => 'textarea_small',
    ) );
$solution_meta = new_cmb2_box( array(
        'id'            => $prefix . 'solutions_paag_meta',
        'title'         => __( 'Solutions Page Content', 'cmb2' ),
        'object_types'  => array( 'page' ),
        'show_on'       => array( 'key' => 'page-template', 'value' => 'templates/solutions.php' ),
    ) );
	$solution_meta->add_field( array(
		'name'    => esc_html__( 'Title', 'cmb2' ),
		'id'      => $prefix . 'page_title',
		'type'    => 'text',
	));
	//Businesses Achieve Goals
	$solution_meta->add_field( array(
		'name'    => esc_html__( 'Businesses Achieve Goals', 'cmb2' ),
		'id'      => $prefix . 'title_1',
		'type'    => 'title',
	) );
	$solution_meta->add_field( array(
        'name' => __( 'Section Title', 'mondaysys' ),
        'id'   => $prefix . 'business_goal_title',
        'type' => 'text',
    ) );
	$solution_meta->add_field( array(
        'name' => __( 'Title Description', 'mondaysys' ),
        'id'   => $prefix . 'business_goal_desc',
        'type' => 'textarea_small',
    ) );
    $group_field_benifits = $solution_meta->add_field( array(
        'id'          => $prefix . 'benifits_group',
        'type'        => 'group',
        'options'     => array(
            'group_title'   => __( '{#}', 'mondaysys' ),
            'add_button'    => __( 'Add Another', 'mondaysys' ),
            'remove_button' => __( 'Remove', 'mondaysys' ),
            'sortable'      => true,
			'closed'      => true,
        ),
    ) );
    $solution_meta->add_group_field( $group_field_benifits, array(
        'name' => __( 'Title', 'mondaysys' ),
        'id'   => 'title',
        'type' => 'text',
    ) );
    $solution_meta->add_group_field( $group_field_benifits, array(
        'name' => __( 'Content', 'mondaysys' ),
        'id'   => 'content',
        'type' => 'textarea_small',
    ) );
	//Innovative Tech Solutions
	$solution_meta->add_field( array(
		'name'    => esc_html__( 'Innovative Tech Solutions', 'cmb2' ),
		'id'      => $prefix . 'title_3',
		'type'    => 'title',
	) );
	$solution_meta->add_field( array(
        'name' => __( 'Section Title', 'mondaysys' ),
        'id'   => $prefix . 'innovative_solution_title',
        'type' => 'text',
    ) );
    $innovative_solution_group = $solution_meta->add_field( array(
        'id'          => $prefix . 'innovative_solution_group',
        'type'        => 'group',
        'options'     => array(
            'group_title'   => __( '{#}', 'mondaysys' ),
            'add_button'    => __( 'Add Another', 'mondaysys' ),
            'remove_button' => __( 'Remove', 'mondaysys' ),
            'sortable'      => true,
			'closed'      => true,
        ),
    ) );
    $solution_meta->add_group_field( $innovative_solution_group, array(
        'name' => __( 'Image', 'mondaysys' ),
        'id'   => 'image',
        'type' => 'file',
		'options' => array(
        	'url' => false, 
		),
		'query_args' => array(
			'type' => array( 'image/webp', 'image/jpeg' ), // Only allow WebP and JPG/JPEG
		),
		'text' => array(
			'add_upload_file_text' => __( 'Add Image (WEBP or JPG only)', 'mondaysys' ),
		),
    ) );
	$solution_meta->add_group_field( $innovative_solution_group, array(
        'name' => __( 'Title', 'mondaysys' ),
        'id'   => 'title',
        'type' => 'text',
    ) );
    $solution_meta->add_group_field( $innovative_solution_group, array(
        'name' => __( 'Content', 'mondaysys' ),
        'id'   => 'content',
        'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 4,
		),
    ) );
	//Fintech solutions
	$solution_meta->add_field( array(
		'name'    => esc_html__( 'Fintech Solutions', 'cmb2' ),
		'id'      => $prefix . 'title_4',
		'type'    => 'title',
	) );
	$solution_meta->add_field( array(
		'name'    => esc_html__( 'Section Title', 'cmb2' ),
		'id'      => $prefix . 'fintech_solution_title',
		'type'    => 'text',
	) );
	$solution_meta->add_field( array(
		'name'    => esc_html__( 'Section Description', 'cmb2' ),
		'id'      => $prefix . 'fintech_solution_desc',
		'type'    => 'textarea_small',
	) );
	$fintech_solution = $solution_meta->add_field( array(
        'id'          => $prefix . 'fintech_solution_group',
        'type'        => 'group',
        'options'     => array(
            'group_title'   => __( '{#}', 'cmb2' ),
            'add_button'    => __( 'Add Another', 'cmb2' ),
            'remove_button' => __( 'Remove', 'cmb2' ),
            'sortable'      => true,
			'closed'      => true,
        ),
    ) );
	$solution_meta->add_group_field( $fintech_solution, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
    ) );
    $solution_meta->add_group_field( $fintech_solution, array(
        'name' => 'Description',
        'id'   => 'description',
        'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 4,
		),
    ) );
	//Solution Process
	$solution_meta->add_field( array(
		'name'    => esc_html__( 'Solution Process', 'cmb2' ),
		'id'      => $prefix . 'title_5',
		'type'    => 'title',
	) );
	$solution_meta->add_field( array(
		'name'    => esc_html__( 'Section Main Title', 'cmb2' ),
		'id'      => $prefix . 'process_main_title',
		'type'    => 'text',
	) );
	$solution_process_group = $solution_meta->add_field( array(
        'id'          => $prefix . 'solution_process_group',
        'type'        => 'group',
        'options'     => array(
            'group_title'   => __( '{#}', 'cmb2' ),
            'add_button'    => __( 'Add Another', 'cmb2' ),
            'remove_button' => __( 'Remove', 'cmb2' ),
            'sortable'      => true,
			'closed'      => true,
        ),
    ) );
	$solution_meta->add_group_field( $solution_process_group, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
    ) );
    $solution_meta->add_group_field( $solution_process_group, array(
        'name' => 'Description',
        'id'   => 'description',
        'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 4,
		),
    ) );
	//Our Approach
	$solution_meta->add_field( array(
		'name'    => esc_html__( 'Our Approach', 'cmb2' ),
		'id'      => $prefix . 'title_7',
		'type'    => 'title',
	) );
	$solution_meta->add_field( array(
        'name' => __( 'Section Title', 'mondaysys' ),
        'id'   => $prefix . 'approach_section_title',
        'type' => 'text',
    ) );
    $our_approach_group = $solution_meta->add_field( array(
        'id'          => $prefix . 'approach_group',
        'type'        => 'group',
        'options'     => array(
            'group_title'   => __( '{#}', 'mondaysys' ),
            'add_button'    => __( 'Add Another', 'mondaysys' ),
            'remove_button' => __( 'Remove', 'mondaysys' ),
            'sortable'      => true,
			'closed'      => true,
        ),
    ) );
    $solution_meta->add_group_field( $our_approach_group, array(
        'name' => __( 'Title', 'mondaysys' ),
        'id'   => 'title',
        'type' => 'text',
    ) );
    $solution_meta->add_group_field( $our_approach_group, array(
        'name' => __( 'Content', 'mondaysys' ),
        'id'   => 'content',
        'type' => 'textarea_small',
    ) );
	//Testimonials
	$solution_meta->add_field( array(
		'name'    => esc_html__( 'Testimonials', 'cmb2' ),
		'id'      => $prefix . 'title_8',
		'type'    => 'title',
	) );
	$solution_meta->add_field( array(
        'name' => __( 'Section Title', 'mondaysys' ),
        'id'   => $prefix . 'testimonial_title',
        'type' => 'text',
    ) );
	//Case Studies
	$solution_meta->add_field( array(
		'name'    => esc_html__( 'Case Studies', 'cmb2' ),
		'id'      => $prefix . 'title_9',
		'type'    => 'title',
	) );
	$solution_meta->add_field( array(
        'name' => __( 'Section Title', 'mondaysys' ),
        'id'   => $prefix . 'title_case_studies',
        'type' => 'text',
    ) );

	// Success Rate
	$solution_meta->add_field( array(
		'name'    => esc_html__( 'Sucess Rate', 'cmb2' ),
		'id'      => $prefix . 'title_13',
		'type'    => 'title',
	) );
	$solution_meta->add_field( array(
		'name'    => esc_html__( 'Section Title', 'cmb2' ),
		'id'      => $prefix . 'experience_section_title',
		'type'    => 'text',
	) );
    $group_field_experience = $solution_meta->add_field( array(
        'id'          => $prefix . 'experience_group',
        'type'        => 'group',
        'options'     => array(
            'group_title'   => __( '{#}', 'mondaysys' ),
            'add_button'    => __( 'Add Another', 'mondaysys' ),
            'remove_button' => __( 'Remove', 'mondaysys' ),
            'sortable'      => true,
			'closed'      => true,
        ),
    ) );
    $solution_meta->add_group_field( $group_field_experience, array(
        'name' => __( 'Counter Number', 'mondaysys' ),
        'id'   => 'counter_number',
        'type'       => 'text_small', 
		'attributes' => array(
			'type'  => 'number', 
			'step'  => '1',     
			'min'   => '0',      
			'pattern' => '\d*',  
			'inputmode' => 'numeric', 
		),
    ) );
	$solution_meta->add_group_field( $group_field_experience, array(
        'name' => __( 'Prefix', 'mondaysys' ),
        'id'   => 'prefix',
        'type' => 'text_small',
    ) );
	$solution_meta->add_group_field( $group_field_experience, array(
        'name' => __( 'Suffix', 'mondaysys' ),
        'id'   => 'suffix',
        'type' => 'text_small',
    ) );
	$solution_meta->add_group_field( $group_field_experience, array(
        'name' => __( 'Title', 'mondaysys' ),
        'id'   => 'title',
        'type' => 'text',
    ) );
	//FAQs
	$solution_meta->add_field( array(
		'name'    => esc_html__( 'FAQs', 'cmb2' ),
		'id'      => $prefix . 'title_14',
		'type'    => 'title',
	) );
	$solution_meta->add_field( array(
        'name' => __( 'Section Title', 'mondaysys' ),
        'id'   => $prefix . 'title_faqs',
        'type' => 'text',
    ) );
	$solution_meta->add_field( array(
		'name'       => 'Select FAQ Category',
		'id'         => $prefix .'faq_category',
		'taxonomy'   => 'faq_cat', 
		'type'       => 'taxonomy_select',
		'query_args'       => array(
			'hide_empty' => true, 
		),
	) );
	//Footer Above
	$solution_meta->add_field( array(
		'name'    => esc_html__( 'Footer Above', 'cmb2' ),
		'id'      => $prefix . 'title_15',
		'type'    => 'title',
	) );
	$solution_meta->add_field( array(
        'name' => __( 'Section Image', 'mondaysys' ),
        'id'   => $prefix . 'footer_above_image',
        'type' => 'file',
    ) );
	$solution_meta->add_field( array(
        'name' => __( 'Section Title', 'mondaysys' ),
        'id'   => $prefix . 'footer_above_title',
        'type' => 'text',
    ) );
	$solution_meta->add_field( array(
        'name' => __( 'Section Description', 'mondaysys' ),
        'id'   => $prefix . 'footer_above_desc',
        'type' => 'textarea_small',
    ) );
$all_service_meta = new_cmb2_box( array(
        'id'            => $prefix . 'all_service_page_meta',
        'title'         => __( 'All Service Page Content', 'cmb2' ),
        'object_types'  => array( 'page' ),
        'show_on'       => array( 'key' => 'page-template', 'value' => 'templates/services.php' ),
    ) );
	$all_service_meta->add_field( array(
        'name' => __( 'All Service Title', 'mondaysys' ),
        'id'   => $prefix . 'all_service_title',
        'type' => 'text',
    ) );
	//Tools & Technology
	$all_service_meta->add_field( array(
		'id'      => $prefix . 'title_2',
		'type'       => 'text',
		'default' => 'Tools & Technology',
		'attributes' => array(
			'class'       => 'custom-section-title',
			'placeholder' => esc_html__( 'Enter section title', 'cmb2' ),
		)
	) );
	$all_service_meta->add_field( array(
        'name' => __( 'Section Title', 'mondaysys' ),
        'id'   => $prefix . 'technology_section_title',
        'type' => 'text',
    ) );
	$all_service_meta->add_field( array(
        'name' => __( 'Section Description', 'mondaysys' ),
        'id'   => $prefix . 'technology_section_des',
        'type' => 'textarea_small',
    ) );
    $group_field_technology = $all_service_meta->add_field( array(
        'id'          => $prefix . 'technology_group',
        'type'        => 'group',
        'options'     => array(
            'group_title'   => __( '{#}', 'mondaysys' ),
            'add_button'    => __( 'Add Another', 'mondaysys' ),
            'remove_button' => __( 'Remove', 'mondaysys' ),
            'sortable'      => true,
			'closed'      => true,
        ),
    ) );
    $all_service_meta->add_group_field( $group_field_technology, array(
        'name' => __( 'Title', 'mondaysys' ),
        'id'   => 'title',
        'type' => 'text',
    ) );
    $all_service_meta->add_group_field( $group_field_technology, array(
        'name' => __( 'Content', 'mondaysys' ),
        'id'   => 'content',
        'type' => 'textarea_small',
    ) );
	$all_service_meta->add_group_field( $group_field_technology, array(
        'name' => __( 'Technology Logo', 'mondaysys' ),
        'id'   => 'tech_logo',
        'type'         => 'file_list',
		'preview_size' => array( 100, 100 ),
    ) );

	//Our Approach
	$all_service_meta->add_field( array(
		'id'      => $prefix . 'title_3',
		'type'       => 'text',
		'default' => 'Our Approach',
		'attributes' => array(
			'class'       => 'custom-section-title',
			'placeholder' => esc_html__( 'Enter section title', 'cmb2' ),
		)
	) );
	$all_service_meta->add_field( array(
        'name' => __( 'Section Title', 'mondaysys' ),
        'id'   => $prefix . 'approach_section_title',
        'type' => 'text',
    ) );
    $our_approach_group = $all_service_meta->add_field( array(
        'id'          => $prefix . 'approach_group',
        'type'        => 'group',
        'options'     => array(
            'group_title'   => __( '{#}', 'mondaysys' ),
            'add_button'    => __( 'Add Another', 'mondaysys' ),
            'remove_button' => __( 'Remove', 'mondaysys' ),
            'sortable'      => true,
			'closed'      => true,
        ),
    ) );
	$all_service_meta->add_group_field( $our_approach_group, array(
        'name' => __( 'Title', 'mondaysys' ),
        'id'   => 'title',
        'type' => 'text',
    ) );
    $all_service_meta->add_group_field( $our_approach_group, array(
        'name' => __( 'Content', 'mondaysys' ),
        'id'   => 'content',
        'type' => 'textarea_small',
    ) );
	// Testimonial
	$all_service_meta->add_field( array(
		'id'      => $prefix . 'title_4',
		'type'       => 'text',
		'default' => 'Testimonials',
		'attributes' => array(
			'class'       => 'custom-section-title',
			'placeholder' => esc_html__( 'Enter section title', 'cmb2' ),
		)
	) );
	$all_service_meta->add_field( array(
        'name' => __( 'Section Title', 'mondaysys' ),
        'id'   => $prefix . 'testimonial_section_title',
        'type' => 'text',
    ) );
	$all_service_meta->add_field( array(
        'name' => __( 'Section Description', 'mondaysys' ),
        'id'   => $prefix . 'testimonial_section_desc',
        'type' => 'textarea_small',
    ) );
	//FAQs
	$all_service_meta->add_field( array(
		'name'    => esc_html__( 'FAQs', 'cmb2' ),
		'id'      => $prefix . 'title_14',
		'type'    => 'title',
	) );
	$all_service_meta->add_field( array(
        'name' => __( 'Section Title', 'mondaysys' ),
        'id'   => $prefix . 'title_faqs',
        'type' => 'text',
    ) );
	$all_service_meta->add_field( array(
		'name'       => 'Select FAQ Category',
		'id'         => $prefix .'faq_category',
		'taxonomy'   => 'faq_cat', 
		'type'       => 'taxonomy_select',
		'query_args'       => array(
			'hide_empty' => true, 
		),
	) );

	// Footer Above
	$all_service_meta->add_field( array(
		'id'      => $prefix . 'title_5',
		'type'       => 'text',
		'default' => 'Section Footer Above',
		'attributes' => array(
			'class'       => 'custom-section-title',
			'placeholder' => esc_html__( 'Enter section title', 'cmb2' ),
		)
	) );
	$all_service_meta->add_field( array(
		'name'    => esc_html__( 'Title', 'cmb2' ),
		'id'      => $prefix . 'footer_above_title',
		'type'    => 'text',
	) );
$technology_meta = new_cmb2_box( array(
        'id'            => $prefix . 'technology_meta',
        'title'         => __( 'Technology Settings', 'cmb2' ),
        'object_types'  => array( 'technology' ),
    ) );
	$technology_meta->add_field( array(
        'name' => __( 'Technology Logo Section', 'mondaysys' ),
        'id'   => $prefix . 'title_1',
        'type' => 'title',
    ) );
	$technology_meta->add_field( array(
        'name' => __( 'Technology Logos', 'mondaysys' ),
        'id'   => $prefix . 'technology_logo',
        'type' => 'file_list',
		'preview_size' => array( 100, 100 ),
    ) );
	$technology_meta->add_field( array(
        'name' => __( 'Technology Title Section', 'mondaysys' ),
        'id'   => $prefix . 'title_2',
        'type' => 'title',
    ) );
	$technology_title = $technology_meta->add_field( array(
        'id'          => $prefix . 'technology_title_group',
        'type'        => 'group',
        'options'     => array(
            'group_title'   => __( 'Technology Title {#}', 'mondaysys' ),
            'add_button'    => __( 'Add Another', 'mondaysys' ),
            'remove_button' => __( 'Remove', 'mondaysys' ),
            'sortable'      => true,
			'closed'      => true,
        ),
    ) );
	$technology_meta->add_group_field( $technology_title, array(
        'name' => __( 'Title', 'mondaysys' ),
        'id'   => 'title',
        'type' => 'text',
    ) );


}