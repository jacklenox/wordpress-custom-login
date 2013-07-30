<?php

// Login redirects
 
function custom_login() {
    echo header("Location: " . get_bloginfo( 'url' ) . "/login");
}
 
add_action('login_head', 'custom_login');
 
function login_link_url( $url ) {
   $url = get_bloginfo( 'url' ) . "/login";
   return $url;
   }
add_filter( 'login_url', 'login_link_url', 10, 2 );


// Register redirects

function register_link_url( $url ) {
      if ( ! is_user_logged_in() ) {
        if ( get_option('users_can_register') )
            $url = '<li><a href="' . get_bloginfo( 'url' ) . "/register" . '">' . __('Register') . '</a></li>';
        else
            $url = '';
    } else {
        $url = '<li><a href="' . admin_url() . '">' . __('Site Admin') . '</a></li>';
    }
 
   return $url;
   }
add_filter( 'register', 'register_link_url', 10, 2 );