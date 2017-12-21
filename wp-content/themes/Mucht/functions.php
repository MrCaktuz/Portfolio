<?php
    // ******** Custom post type ********
    add_action('init', 'register_projet');
    function register_projet()
    {
        $labels = array(
            'name' => _x('Mes projets', 'post type general name'),
            'singular_name' => _x('Projet', 'post type singular name'),
            'add_new' => _x('Ajouter un projet', 'Projet'),
            'add_new_item' => __('Ajouter un projet'),
            'edit_item' => __('Editer'),
            'new_item' => __('Nouveau projet'),
            'view_item' => __('Voir le contenu'),
            'search_items' => __('Rechercher un projet'),
            'not_found' =>  __('Pas de projet'),
            'not_found_in_trash' => __('Pas de contenu dans la corbeille'),
            'parent_item_colon' => '',
            'menu_name' => 'Projets'
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => true,
            // 'capability_type' => 'page',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => 4,
            'menu_icon' => 'dashicons-editor-paste-word',
            'supports' => array('title','thumbnail')
        );
        register_post_type('projet',$args);
    }

    add_action('init', 'register_experience');
    function register_experience()
    {
        $labels = array(
            'name' => _x('Mes expériences', 'post type general name'),
            'singular_name' => _x('Expérience', 'post type singular name'),
            'add_new' => _x('Ajouter une expérience', 'Expériences'),
            'add_new_item' => __('Ajouter une expérience'),
            'edit_item' => __('Editer'),
            'new_item' => __('Nouvelle expérience'),
            'view_item' => __('Voir le contenu'),
            'search_items' => __('Rechercher une expérience'),
            'not_found' =>  __('Pas d\'expérience'),
            'not_found_in_trash' => __('Pas de contenu dans la corbeille'),
            'parent_item_colon' => '',
            'menu_name' => 'Expériences'
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => true,
            // 'capability_type' => 'page',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-welcome-learn-more',
            'supports' => array('title')
        );
      register_post_type('experience',$args);
    }

    add_theme_support('post-thumbnails');

    // ******** ACF Option Page ********
    if(function_exists('acf_add_options_page')) {
        acf_add_options_page(array(
            'page_title'    => 'Options',
            'menu_title'    => 'Options',
            'redirect'      => false,
            'icon_url'      => 'dashicons-id-alt',
        ));
    }

    // ******** Custom the admin menu ********
    function remove_menus(){
      // remove_menu_page('index.php');               //Dashboard
      remove_menu_page('jetpack');                    //Jetpack* 
      remove_menu_page('edit.php');                   //Posts
      // remove_menu_page('upload.php');              //Media
      remove_menu_page('edit.php?post_type=page');    //Pages
      remove_menu_page('edit-comments.php');          //Comments
      // remove_menu_page('themes.php');              //Appearance
      // remove_menu_page('plugins.php');             //Plugins
      remove_menu_page('users.php');                  //Users
      // remove_menu_page('tools.php');               //Tools
      // remove_menu_page('options-general.php');     //Settings
    }
    add_action('admin_menu', 'remove_menus');

    // ******** Images sizes for responsive images ********
    // add_image_size('name', width, height, crop(true or false));
    add_image_size('project_lg', 600, 150, true);
    add_image_size('project_md', 440, 150, true);
    add_image_size('project_sm', 320, 150, true);
?>