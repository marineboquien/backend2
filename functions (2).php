<?php
/*This file is part of childtheme, futurio child theme.

All functions of this file will be loaded before of parent theme functions.
Learn more at https://codex.wordpress.org/Child_Themes.

Note: this function loads the parent stylesheet before, then child theme stylesheet
(leave it in place unless you know what you are doing.)
*/

function childtheme_enqueue_child_styles() {
$parent_style = 'parent-style'; 
	wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 
		'child-style', 
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style ),
		wp_get_theme()->get('Version') );
	}
add_action( 'wp_enqueue_scripts', 'childtheme_enqueue_child_styles' );

/*Write here your own functions */

// ma première action
function dire_bonjour(){
	echo '<p class="hello"> Hello World !!</p>';
}
add_action( 'mb', 'dire_bonjour');

function email_friends($post_ID) {
    $friends = 'jean@example.org,marie@example.org';
    mail($friends, "Mise à jour du blog Girodmedical", 
      'Je viens de mettre quelque chose sur mon blog: http://blog.example.com');
    return $post_ID;
    
}
//Ajout d'une action sur 'delete_post' qui appellera mon_plugin_post_delete_mail()
add_action('delete_post', 'mon_plugin_post_delete_mail');

function my_the_content_filter( $content){

if (is_single()) {

// ajouter une image au début de chaque article 
$img= ' <img class="medical" src="https://www.dictionnaires.com/images/categories/medical.jpg" alt="medical" > ';

// retourner le contenu 
return $img . $content ;}


function email_friends($post_ID) {
    $friends = 'jean@example.org,marie@example.org';
    mail($friends, "Mise à jour du blog Girodmedical", 
      'Je viens de mettre quelque chose sur mon blog: http://blog.girodmedical.com');
    return $post_ID;
}
?>
