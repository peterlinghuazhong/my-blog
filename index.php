<?php
    session_start();
    // require the functions file
    require "includes/function.php";
    /*
      Decide what page to load depending on the url the user visit
      localhost:9000/ -> home.php
      localhost:9000/login -> login.php
      localhost:9000/signup -> signup.php
      localhost:9000/logout -> logout.php
    */
    // global variable $_SERVER
    // figure out what path the user is visiting
    $path = $_SERVER["REQUEST_URI"];
    // once you figure out the path, then we need to load relevent content based on the path
    switch ($path) {
      // pages routes
      case '/login':
        require "pages/login.php";
        break;
      case '/signup':
        require "pages/signup.php";
        break;
      case '/post':
        require "includes/auth/post.php";
        break;
      case '/dashboard':
        require "dashboard.php";
        break;
      // actions routes
      case '/auth/login':
        require "includes/auth/do_login.php";
        break;
      case '/auth/signup':
        require "includes/auth/do_signup.php";
        break;
      case '/posts-edit':
        require "manage/manage-posts-edit.php";
        break;
      case '/posts-add':
        require "manage/manage-posts-add.php";
        break;
      case '/manage-posts':
        require "manage/manage-posts.php";
        break;
      case '/manage-users':
        require "manage/manage-users.php";
        break;
      case '/users-add':
        require "manage/manage-users-add.php";
        break;
      case '/users-change':
        require "manage/manage-users-change.php";
        break;
      case '/users-edit':
        require "manage/manage-users-edit.php";
        break;
      default:
        require "pages/home.php";
        break;
    }









