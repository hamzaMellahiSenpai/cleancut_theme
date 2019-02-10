<?php 
// Register Custom Nav Walker
require_once('wp_bootstrap_navwalker.php');
// THEME SUPPORT
function cleancut_theme_support(){
	// Include Images support
    add_theme_support("post-thumbnails");
	// Nav Menus
	register_nav_menus(array(
		"primary" => __('Primary Menu'),
		"Footer"  => __('Footer Menu')
 	));

  // POST FORMAT SUPPORT
  add_theme_support('post-formats', array('aside', 'gallery'));
}

// WIDGETS LOCATION
function init_widgets($id){
	  register_sidebar(array(
       "name"          => "sidebar",
       "id"            => "sidebar",
       "before_widget" => "<div class='well sidebar-widget animated FadeInRight'>",
       "after_widget"  => "</div>",
       "before_title"  => "<h3>",
       "after_title"   => "</h3>",

    ));
    register_sidebar(array(
       "name"          => "subnav",
       "id"            => "subnav",
       "before_widget" => "<div class='sub-nav'>",
       "after_widget"  => "</div>",
       "before_title"  => "<div class='hide'>",
       "after_title"   => "</div>",
    ));
     register_sidebar(array(
       "name"          => "bottom",
       "id"            => "bottom",
       "before_widget" => "<div class='section-a animated fadeInUp'><div class='container'",
       "after_widget"  => "</div></div>",
       "before_title"  => "<div class='hide'>",
       "after_title"   => "</div>",
    ));
}

// GET TOP PARENT PAGE
function get_top_parent(){
	global $post;
	if($post->post_parent){
		$ancestors = array_reverse(get_post_ancestors($post->ID));
		return $ancestors[0];
	}
	return $post->ID;
}
require get_template_directory() . '/inc/customizer.php';


add_action('after_setup_theme', "cleancut_theme_support");
add_action("widgets_init","init_widgets");
