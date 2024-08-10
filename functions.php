<?php 

/* 
* my theme function
*/
//theme title
add_theme_support( 'title-tag');

//theme css and jquery file calling
function my_css_js_file_calling(){
wp_enqueue_style( 'am-style', get_stylesheet_uri(  ) );
//custom file wp ke bujhanor
//jonno age register korte hoy.
//css file 
wp_register_style( 'bootstrap',get_template_directory_uri().'/css/bootstrap.css ', array() , '5.3.3' , 'all');

wp_register_style( 'custom',get_template_directory_uri().'/css/custom.css ', array() , '5.3.3' , 'all');

//enqueue bootstrap file after register it.
wp_enqueue_style( 'bootstrap');
wp_enqueue_style( 'custom');

//jQuery
wp_enqueue_script( 'jquery' );
wp_enqueue_script( 'bootstrap',get_template_directory_uri().'/js/bootstrap.css ',array() , '5.3.3' , 'true' );
wp_enqueue_script( 'main',get_template_directory_uri().'/js/main.css ',array() , '1.0.' , 'true' );


}
//link my_css_js_file_calling function
add_action( 'wp_enqueue_scripts','my_css_js_file_calling' )

?>