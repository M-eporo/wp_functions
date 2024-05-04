<?php 
  function theme_setup(){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus(array(
      'main-menu' => 'メインメニュー',
    ));
  }
  add_action('after_setup_theme', 'theme_setup');
  
  function change_menu_label(){
    global $menu;
    global $submenu;
    $name = 'お知らせ';
    $menu[5][0] = $name;
    $submenu['edit.php'][5][0] = $name.'一覧';
    $submenu['edit.php'][10][0] = '新しい'.$name;
  }  
  add_action('admin-menu', 'change_menu_label');

  function change_object_label(){
    global $wp_post_types;
    $name = 'お知らせ';
    $labels = &$wp_post_types['post']->labels;
    $labels->name = $name;
    $labels->singular_name = $name;
    $labels->add_new = _x('追加', $name);
    $labels->add_new_item = $name.'の新規追加';
    $labels->edit_item = $name.'の編集';
    $labels->new_item = '新規'.$name;
    $labels->view_item = $name.'を表示';
    $labels->search_items = $name.'を検索';
    $labels->not_found = $name.'が見つかりませんでした';
    $labels->not_found_in_trash = 'ゴミ箱に'.$name.'は見つかりませんでした';
  }
  add_action('init', 'change_object_label');
/*
  function add_files(){
    wp_enqueue_style('reset', get_theme_file_uri('/css/reset.css'));
    wp_enqueue_style('main', get_stylesheet_uri());

    wp_enqueue_script('main', get_theme_file_uri('/js/script.js'), arry(), '', true);
  }
  add_action('wp_enqueue_scripts', 'add_files');
  */