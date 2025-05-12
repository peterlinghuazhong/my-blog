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
    
    // remove all the query string from the url
    $path = parse_url( $path, PHP_URL_PATH );
    // once you figure out the path, then we need to load relevent content based on the path
    switch ($path) {
     // pages routes
     case '/login':
      require "pages/login.php";
      break;
    case '/signup':
      require "pages/signup.php";
      break;
    case '/logout':
      require "pages/logout.php";
      break;
    case "/post":
      require "pages/post.php";
      break;
    case "/dashboard":
      require "pages/dashboard.php";
      break;
    case "/manage-users":
      require "pages/manage-users.php";
      break;
    case "/manage-users-add":
      require "pages/manage-users-add.php";
      break;
    case "/manage-users-edit":
      require "pages/manage-users-edit.php";
      break;
    case "/manage-users-changepwd":
      require "pages/manage-users-changepwd.php";
      break;
      case "/manage-posts":
        require "pages/manage-posts.php";
        break;
      case "/manage-posts-add":
        require "pages/manage-posts-add.php";
        break;
      case "/manage-posts-edit":
        require "pages/manage-posts-edit.php";
        break;
        
      
    // actions routes
    case '/auth/login':
      require "includes/auth/do_login.php";
      break;
    case '/auth/signup':
      require "includes/auth/do_signup.php";
      break;
       // TODO: setup the action route for add user
       case '/user/add':
        require "includes/user/add.php";
        break;
        case '/user/changepwd':
          require "includes/user/changepwd.php";
          break;
    // setup the action for delete user
    case '/user/update':
      require "includes/user/update.php";
      break;
    case '/user/delete':
      require "includes/user/delete.php";
      break;
    case'/post/add':
    require "includes/post/add-post.php";
    break;
     case'/post/delete':
    require "includes/post/delete-post.php";
    break;
     case'/post/update':
    require "includes/post/update-post.php";
    break;
  default:
 require 'pages/home.php';
      break;
  }
