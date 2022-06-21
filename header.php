<?php
include('db.php');
include('function.php');
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="keywords"
      content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, materialpro admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, materialpro admin lite design, materialpro admin lite dashboard bootstrap 5 dashboard template"
    />
    <meta
      name="description"
      content="Material Pro Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework"
    />
    <meta name="robots" content="noindex,nofollow" />
    <title>QR Code Attendent</title>
    <link
      rel="canonical"
      href="https://www.wrappixel.com/templates/materialpro-lite/"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="assets/images/favicon.png"
    />
    <link href="css/style.min.css" rel="stylesheet" />
   
  </head>

  <body>
   
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>
  
    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >
      
      <header class="topbar" data-navbarbg="skin6">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
          <div class="navbar-header" data-logobg="skin6">
            <a target="_blank" class="navbar-brand ms-4" href="https://www.dituniversity.edu.in">
                 Team Chromo  
            </a>
           
            <a
              class="
                nav-toggler
                waves-effect waves-light
                text-white
                d-block d-md-none
              "
              href="javascript:void(0)"
              ><i class="ti-menu ti-close"></i
            ></a>
          </div>
          
          <div
            class="navbar-collapse collapse"
            id="navbarSupportedContent"
            data-navbarbg="skin5"
          >
            <ul class="navbar-nav d-lg-none d-md-block">
              <li class="nav-item">
                <a
                  class="
                    nav-toggler nav-link
                    waves-effect waves-light
                    text-white
                  "
                  href="javascript:void(0)"
                  ><i class="ti-menu ti-close"></i
                ></a>
              </li>
            </ul>
           
            <ul class="navbar-nav me-auto mt-md-0">
             
            </ul>

            <ul class="navbar-nav">
             
              <li class="nav-item dropdown">
                <a target="_blank" href="https://www.dituniversity.edu.in">
                  <img src="Untitled-1-modified.png" alt="" width="40px">
                </a>
                <a
                  class="
                    nav-link
                    dropdown-toggle
                    text-muted
                    waves-effect waves-dark
                  "
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                 Welcome <?php echo $_SESSION['QR_USER_NAME']?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown"></ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      
      <aside class="left-sidebar" data-sidebarbg="skin6">
        <div class="scroll-sidebar">
          <nav class="sidebar-nav">
            <ul id="sidebarnav">
              <?php
              if($_SESSION['QR_USER_ROLE']==0)
             
              {
                ?>
                <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="user.php"
                  aria-expanded="false"
                  ><i class="mdi me-2 mdi-gauge"></i
                  ><span class="hide-menu">Users</span></a
                >
              </li>
              <?php
              }
              ?>
              
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="qr_code.php"
                  aria-expanded="false"
                  ><i class="mdi me-2 mdi-gauge"></i
                  ><span class="hide-menu">QR Code</span></a
                >
              </li>

              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="logout.php"
                  aria-expanded="false"
                  ><i class="mdi me-2 mdi-gauge"></i
                  ><span class="hide-menu">Logout</span></a
                >
              </li>
            </ul>
          </nav>
         
      </aside>
    
      
        
      