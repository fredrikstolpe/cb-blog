<?php
add_action( 'after_setup_theme', 'cb_blog_setup' );
function cb_blog_setup()
{
  load_theme_textdomain( 'cb_blog', get_template_directory() . '/languages' );
  add_theme_support( 'title-tag' );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 767, 450, array('center', 'center'));
  add_image_size( 'top-image', 940, 300, true );
  add_image_size( 'article-image', 620, 416, true );
  global $content_width;
  if ( ! isset( $content_width ) ) $content_width = 1117;
  register_nav_menus(
    array( 'main-menu' => __( 'Main Menu', 'cb_blog' ) )
  );
  disableUglyWPStuff();
}

function disableUglyWPStuff(){
  show_admin_bar(false);
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
  remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
  remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
  remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
  remove_action( 'wp_head', 'index_rel_link' ); // index link
  remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
  remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
  remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.
  remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version
  remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
  remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
}

add_filter('nav_menu_css_class','special_nav_class', 10, 2);
function special_nav_class($classes, $item){
    if (in_array('current-menu-item', $classes)){
      $classes[] = 'active';
    }
    return $classes;
}

add_filter('image_size_names_choose','my_custom_sizes');
function my_custom_sizes($sizes){
    return array_merge($sizes, array(
      'article-image' => __('Article image')
    ));
}

add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function custom_excerpt_length( $length ) {
  return 30;
}

add_action( 'wp_enqueue_scripts', 'cb_blog_load_scripts' );
function cb_blog_load_scripts()
{
  wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/js/html5shiv.js' );
  wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
  wp_enqueue_script( 'respond', get_template_directory_uri() . '/js/respond.min.js' );
  wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );
  wp_enqueue_script( 'jquery-1.11.1', get_template_directory_uri() . '/js/jquery.min.js', array(), null, true );
  wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
  wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), null, true );
  wp_enqueue_script( 'cb-blog', get_template_directory_uri() . '/js/cb-blog.js', array(), null, true );
  wp_enqueue_style( 'dosis', 'https://fonts.googleapis.com/css?family=Dosis:500,400' );
  wp_enqueue_style( 'open-sans', 'https://fonts.googleapis.com/css?family=Open+Sans:400,300italic' );
  wp_enqueue_style( 'prism', get_template_directory_uri() . '/css/prism.css' );
  wp_enqueue_script( 'prism', get_template_directory_uri() . '/js/prism.js', array(), null, true );
  wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css' );
  wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array(), null, true );
}

add_action( 'comment_form_before', 'cb_blog_enqueue_comment_reply_script' );
function cb_blog_enqueue_comment_reply_script()
{
  if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}

add_filter( 'the_title', 'cb_blog_title' );
function cb_blog_title( $title ) {
  if ( $title == '' ) {
    return '&rarr;';
  } else {
    return $title;
  }
}

add_filter( 'wp_title', 'cb_blog_filter_wp_title' );
function cb_blog_filter_wp_title( $title )
{
  return $title . esc_attr( get_bloginfo( 'name' ) );
}

add_action( 'widgets_init', 'cb_blog_widgets_init' );
function cb_blog_widgets_init()
{
  register_sidebar( array (
  'name' => __( 'Sidebar Widget Area', 'cb_blog' ),
  'id' => 'primary-widget-area',
  'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
  'after_widget' => "</li>",
  'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>',
  ) );
}

function cb_blog_custom_pings( $comment )
{
  $GLOBALS['comment'] = $comment;
  ?>
  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
  <?php
}
add_filter( 'get_comments_number', 'cb_blog_comments_number' );
function cb_blog_comments_number( $count )
{
  if ( !is_admin() ) {
  global $id;
  $comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
  return count( $comments_by_type['comment'] );
  } else {
  return $count;
  }
}
