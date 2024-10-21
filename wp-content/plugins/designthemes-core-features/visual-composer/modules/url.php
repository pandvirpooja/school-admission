<?php add_action( 'vc_before_init', 'dt_sc_url_vc_map' );
function dt_sc_url_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Link", 'designthemes-core' ),
		"base" => "dt_sc_url",
		"icon" => "dt_sc_url",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			# Email id
			array(
				'type' => 'vc_link',
				'param_name' => 'link',
				'heading' => esc_html__( 'Link', 'designthemes-core' ),
			),

			# Class
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Icon Class", 'designthemes-core' ),
      			"param_name" => "class",
      			"value" => 'icon icon-linked'
      		),
			
			# Extra class name
			array(
			  'type' => 'textfield',
			  'heading' => esc_html__( 'Extra class name', 'designthemes-core' ),
			  'param_name' => 'el_class',
			  'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'designthemes-core' )
			)
		)
	) );	
}?>