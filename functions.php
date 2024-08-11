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
add_action( 'wp_enqueue_scripts','my_css_js_file_calling' );

// theme function
function my_logo_customizar_register($wp_customize){
 
  //header area function
  //object oparetor (->) for collecting properties of object
  $wp_customize->add_section('my_header_area',array('title'=>__('Header Area','amhimeltech'),'description'=>'If u interested to update your header area, you can do it here.'
));// => for collecting properties of array

$wp_customize->add_setting('my_logo',array(
'default'=>get_bloginfo('templete_directory').'/img/logo.png',
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'my_logo',array(
  'label'=> 'logo upload',
  'description'=> 'If you interested to change or update your logo.you can do it.',
  'setting'=> 'my_logo',
  'section'=> 'my_header_area',
)));

//menu position function
$wp_customize->add_section('my_menu_option',array(
  'title'=> __('Menu Possition Option','amhimeltech'),
    'description'=> 'If you interested to change your menu position.you can do it.',

));
$wp_customize->add_setting('my_menu_position',array(
'default'=>  'right_menu',
));
$wp_customize->add_control('my_menu_position',array(
  'label'=> 'Menu Position',
  'description'=> 'Select your menu position.',
  'setting'=> 'my_menu_position',
  'section'=> 'my_menu_option',
  'type'=> 'radio',
  'choices'=> array(
    'left_menu'=>'Left Menu',
    'right_menu'=>'Right Menu',
    'center_menu'=>'Center Menu',
  ),
));
}

//google font enqueue
function my_add_google_fonts(){
  wp_enqueue_style('my_google_fonts','https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap',false);

}
add_action( 'wp_enqueue_scripts','my_add_google_fonts' );

add_action('customize_register','my_logo_customizar_register');

//menu register
register_nav_menu( 'main_menu', __('Main Menu','amhimeltech') );

?>