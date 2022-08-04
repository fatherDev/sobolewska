<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (! file_exists($composer = __DIR__ . '/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Run The Theme
|--------------------------------------------------------------------------
|
| Once we have the theme booted, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
|
*/

require_once __DIR__ . '/bootstrap/app.php';


// Remove <p> and <br/> tags from Contact Form
// add_filter('wpcf7_autop_or_not', '__return_false');


// Add ACF global option for site
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Opcje strony',
		'menu_title'	=> 'Opcje strony',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}


function load_more_posts(){
    $highlightedQuery = new \WP_Query([
        'post_type' => 'post',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 3,
    ]);

    $highlightedPosts = $highlightedQuery->posts;

    $excludedPostsID = [];
    foreach ($highlightedPosts as $post) {
        array_push($excludedPostsID, $post->ID);
    };

  $next_page = $_POST['current_page'] + 1;
  $query = new WP_Query([
	'post_type' => 'post',
    'posts_per_page' => 6,
    'paged' => $next_page,
    'post__not_in' => $excludedPostsID,
  ]);

  if ($query->have_posts()) :
    ob_start();

  while ($query->have_posts()) : $query->the_post();
    echo '<div data-scroll class="c-blog-posts__item">' . \Roots\view('atoms.blog-card-alt') . '</div>';

  endwhile;
  wp_send_json_success(ob_get_clean());

  else:
    wp_send_json_error('No more posts!');

  endif;
}
add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');
