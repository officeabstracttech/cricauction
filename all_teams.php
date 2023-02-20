<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Title -->
  <title>Teams</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="./favicon.ico">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="./assets/vendor/bootstrap-icons/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.css">
  <link rel="stylesheet" href="./assets/vendor/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="./assets/vendor/tom-select/dist/css/tom-select.bootstrap5.css">

  <!-- CSS Front Template -->

  <link rel="preload" href="./assets/css/theme.min.css" data-hs-appearance="default" as="style">
  <link rel="preload" href="./assets/css/theme-dark.min.css" data-hs-appearance="dark" as="style">

  <style data-hs-appearance-onload-styles>
    *
    {
      transition: unset !important;
    }

    body
    {
      opacity: 0;
    }
  </style>

  <script>
            window.hs_config = {"autopath":"@@autopath","deleteLine":"hs-builder:delete","deleteLine:build":"hs-builder:build-delete","deleteLine:dist":"hs-builder:dist-delete","previewMode":false,"startPath":"/index.html","vars":{"themeFont":"https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap","version":"?v=1.0"},"layoutBuilder":{"extend":{"switcherSupport":true},"header":{"layoutMode":"default","containerMode":"container-fluid"},"sidebarLayout":"default"},"themeAppearance":{"layoutSkin":"default","sidebarSkin":"default","styles":{"colors":{"primary":"#377dff","transparent":"transparent","white":"#fff","dark":"132144","gray":{"100":"#f9fafc","900":"#1e2022"}},"font":"Inter"}},"languageDirection":{"lang":"en"},"skipFilesFromBundle":{"dist":["assets/js/hs.theme-appearance.js","assets/js/hs.theme-appearance-charts.js","assets/js/demo.js"],"build":["assets/css/theme.css","assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js","assets/js/demo.js","assets/css/theme-dark.css","assets/css/docs.css","assets/vendor/icon-set/style.css","assets/js/hs.theme-appearance.js","assets/js/hs.theme-appearance-charts.js","node_modules/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js","assets/js/demo.js"]},"minifyCSSFiles":["assets/css/theme.css","assets/css/theme-dark.css"],"copyDependencies":{"dist":{"*assets/js/theme-custom.js":""},"build":{"*assets/js/theme-custom.js":"","node_modules/bootstrap-icons/font/*fonts/**":"assets/css"}},"buildFolder":"","replacePathsToCDN":{},"directoryNames":{"src":"./src","dist":"./dist","build":"./build"},"fileNames":{"dist":{"js":"theme.min.js","css":"theme.min.css"},"build":{"css":"theme.min.css","js":"theme.min.js","vendorCSS":"vendor.min.css","vendorJS":"vendor.min.js"}},"fileTypes":"jpg|png|svg|mp4|webm|ogv|json"}
            window.hs_config.gulpRGBA = (p1) => {
  const options = p1.split(',')
  const hex = options[0].toString()
  const transparent = options[1].toString()

  var c;
  if(/^#([A-Fa-f0-9]{3}){1,2}$/.test(hex)){
    c= hex.substring(1).split('');
    if(c.length== 3){
      c= [c[0], c[0], c[1], c[1], c[2], c[2]];
    }
    c= '0x'+c.join('');
    return 'rgba('+[(c>>16)&255, (c>>8)&255, c&255].join(',')+',' + transparent + ')';
  }
  throw new Error('Bad Hex');
}
            window.hs_config.gulpDarken = (p1) => {
  const options = p1.split(',')

  let col = options[0].toString()
  let amt = -parseInt(options[1])
  var usePound = false

  if (col[0] == "#") {
    col = col.slice(1)
    usePound = true
  }
  var num = parseInt(col, 16)
  var r = (num >> 16) + amt
  if (r > 255) {
    r = 255
  } else if (r < 0) {
    r = 0
  }
  var b = ((num >> 8) & 0x00FF) + amt
  if (b > 255) {
    b = 255
  } else if (b < 0) {
    b = 0
  }
  var g = (num & 0x0000FF) + amt
  if (g > 255) {
    g = 255
  } else if (g < 0) {
    g = 0
  }
  return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
}
            window.hs_config.gulpLighten = (p1) => {
  const options = p1.split(',')

  let col = options[0].toString()
  let amt = parseInt(options[1])
  var usePound = false

  if (col[0] == "#") {
    col = col.slice(1)
    usePound = true
  }
  var num = parseInt(col, 16)
  var r = (num >> 16) + amt
  if (r > 255) {
    r = 255
  } else if (r < 0) {
    r = 0
  }
  var b = ((num >> 8) & 0x00FF) + amt
  if (b > 255) {
    b = 255
  } else if (b < 0) {
    b = 0
  }
  var g = (num & 0x0000FF) + amt
  if (g > 255) {
    g = 255
  } else if (g < 0) {
    g = 0
  }
  return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
}
            </script>
</head>

<body class="footer-offset">

  <script src="./assets/js/hs.theme-appearance.js"></script>

<body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl   footer-offset">

  <script src="./assets/js/hs.theme-appearance.js"></script>

  <script src="./assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js"></script>

  <!-- ========== HEADER ========== -->
  <header id="header" class="navbar navbar-expand-lg navbar-bordered navbar-spacer-y-0 flex-lg-column">
    <div class="navbar-dark w-100 bg-dark py-2">
      <div class="container">
        <div class="navbar-nav-wrap">
          <!-- Logo -->
          <a class="navbar-brand" href="./index.html" aria-label="Front">
            <img class="navbar-brand-logo" src="./assets/svg/logos/logo.svg" alt="Logo">
          </a>
          <!-- End Logo -->

         
            
          <div class="navbar-nav-wrap-content-end">
            <!-- Navbar -->
            <ul class="navbar-nav">
              <li class="nav-item d-none d-md-inline-block">
               
              <li class="nav-item">
                <!-- Account -->
                <div class="dropdown">
                  <a class="navbar-dropdown-account-wrapper" href="javascript:;" id="accountNavbarDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
                    <div class="avatar avatar-sm avatar-circle">
                      <img class="avatar-img" src="./assets/img/160x160/img6.jpg" alt="Image Description">
                      <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                    </div>
                  </a>

                  <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account" aria-labelledby="accountNavbarDropdown" style="width: 16rem;">
                    <div class="dropdown-item-text">
                      <div class="d-flex align-items-center">
                        <div class="avatar avatar-sm avatar-circle">
                          <img class="avatar-img" src="./assets/img/160x160/img6.jpg" alt="Image Description">
                        </div>
                        <div class="flex-grow-1 ms-3">
                          <h5 class="mb-0">Owner Name</h5>
                          <p class="card-text text-body">Owner Site</p>
                        </div>
                      </div>
                    </div>

                    <div class="dropdown-divider"></div>

                   

                    <a class="dropdown-item" href="#">Profile &amp; account</a>
                    

                    <div class="dropdown-divider"></div>

                    

                    <div class="dropdown-divider"></div>

                    <!-- Dropdown -->
                    <div class="dropdown">
                      <a class="navbar-dropdown-submenu-item dropdown-item dropdown-toggle" href="#" id="navSubmenuPagesAccountDropdown2" aria-expanded="false">Customization</a>

                     
                    </div>
                    <!-- End Dropdown -->

                   

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="#">Sign out</a>
                  </div>
                </div>
                <!-- End Account -->
              </li>

              <li class="nav-item">
                <!-- Toggler -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDoubleLineContainerNavDropdown" aria-controls="navbarDoubleLineContainerNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-default">
                    <i class="bi-list"></i>
                  </span>
                  <span class="navbar-toggler-toggled">
                    <i class="bi-x"></i>
                  </span>
                </button>
                <!-- End Toggler -->
              </li>
            </ul>
            <!-- End Navbar -->
          </div>
          <!-- End Content End -->
        </div>
      </div>
    </div>

    <div class="container">
      <nav class="js-mega-menu flex-grow-1">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbarDoubleLineContainerNavDropdown">
          <ul class="navbar-nav">
            <!-- Home -->
            <li class="hs-has-sub-menu nav-item">
              <a id="dashboardsMegaMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle active" href="#" role="button"><i class="bi-house-door dropdown-item-icon"></i> Home</a>
            </li>
            <!-- End Home -->

            <!-- Teams -->
            <li class="hs-has-sub-menu nav-item">
              <a id="pagesMegaMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle " href="#" role="button"><i class="bi-files-alt dropdown-item-icon"></i> Teams</a>


            <!-- Players -->
            <li class="hs-has-sub-menu nav-item">
              <a id="appsMegaMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle " href="#" role="button"><i class="bi-app-indicator dropdown-item-icon"></i> Players</a>

              
            </li>
            <!-- End Apps -->

            <li class="nav-item">
              <a class="nav-link " href="./layouts/index.html">
                <i class="bi-grid-1x2 dropdown-item-icon"></i> Live
              </a>
            </li>

           
        </div>
        <!-- End Collapse -->
      </nav>
    </div>
  </header>
  <!-- ========== END HEADER ========== -->

   <!-- Folders -->
   <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 mb-5">
        <div class="col mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-sm card-hover-shadow h-100">
            <div class="card-body">
              <div class="d-flex align-items-center">
                

                <h5 class="text-truncate ms-2 mb-0">Team 1</h5>

                <!-- Dropdown -->
                <div class="dropdown ms-auto">
                  <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm card-dropdown-btn rounded-circle" id="folderDropdown1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi-three-dots-vertical"></i>
                  </button>

                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="folderDropdown1" style="min-width: 13rem;">
                    <span class="dropdown-header">Settings</span>

                    <a class="dropdown-item" href="#">
                      <i class="bi-chat-left-dots dropdown-item-icon"></i> View Team
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="bi-pencil dropdown-item-icon"></i> Rename
                    </a>
                    

                    <div class="dropdown-divider"></div>

                   
                    <a class="dropdown-item" href="#">
                      <i class="bi-trash dropdown-item-icon"></i> Delete Team
                    </a>
                  </div>
                </div>
                <!-- End Dropdown -->
              </div>
            </div>
            <a class="stretched-link" href="#"></a>
          </div>
          <!-- End Card -->
        </div>
        <!-- End Col -->

        <div class="col mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-sm card-hover-shadow h-100">
            <div class="card-body">
              <div class="d-flex align-items-center">
                

                <h5 class="text-truncate ms-2 mb-0">Team 2</h5>

                <!-- Dropdown -->
                <div class="dropdown ms-auto">
                  <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm card-dropdown-btn rounded-circle" id="folderDropdown2" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi-three-dots-vertical"></i>
                  </button>

                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="folderDropdown2" style="min-width: 13rem;">
                    <span class="dropdown-header">Settings</span>

                    <a class="dropdown-item" href="#">
                      <i class="bi-chat-left-dots dropdown-item-icon"></i> View Team
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="bi-pencil dropdown-item-icon"></i> Rename
                    </a>
                   
                    <div class="dropdown-divider"></div>
                   
                    <a class="dropdown-item" href="#">
                      <i class="bi-trash dropdown-item-icon"></i> Delete Team
                    </a>
                  </div>
                </div>
                <!-- End Dropdown -->
              </div>
            </div>
            <a class="stretched-link" href="#"></a>
          </div>
          <!-- End Card -->
        </div>
        <!-- End Col -->
        <div class="col mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-sm card-hover-shadow h-100">
            <div class="card-body">
              <div class="d-flex align-items-center">
               

                <h5 class="text-truncate ms-2 mb-0">Team 3</h5>

                <!-- Dropdown -->
                <div class="dropdown ms-auto">
                  <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm card-dropdown-btn rounded-circle" id="folderDropdown2" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi-three-dots-vertical"></i>
                  </button>

                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="folderDropdown2" style="min-width: 13rem;">
                    <span class="dropdown-header">Settings</span>

                    <a class="dropdown-item" href="#">
                      <i class="bi-chat-left-dots dropdown-item-icon"></i> View Team
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="bi-pencil dropdown-item-icon"></i> Rename
                    </a>
                   
                    <div class="dropdown-divider"></div>
                   
                    <a class="dropdown-item" href="#">
                      <i class="bi-trash dropdown-item-icon"></i> Delete Team
                    </a>
                  </div>
                </div>
                <!-- End Dropdown -->
              </div>
            </div>
            <a class="stretched-link" href="#"></a>
          </div>
          <!-- End Card -->
        </div>
        <!-- End Col -->
        <div class="col mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-sm card-hover-shadow h-100">
            <div class="card-body">
              <div class="d-flex align-items-center">

                <h5 class="text-truncate ms-2 mb-0">Team 4</h5>

                <!-- Dropdown -->
                <div class="dropdown ms-auto">
                  <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm card-dropdown-btn rounded-circle" id="folderDropdown2" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi-three-dots-vertical"></i>
                  </button>

                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="folderDropdown2" style="min-width: 13rem;">
                    <span class="dropdown-header">Settings</span>

                    <a class="dropdown-item" href="#">
                      <i class="bi-chat-left-dots dropdown-item-icon"></i> View Team
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="bi-pencil dropdown-item-icon"></i> Rename
                    </a>
                   
                    <div class="dropdown-divider"></div>
                   
                    <a class="dropdown-item" href="#">
                      <i class="bi-trash dropdown-item-icon"></i> Delete Team
                    </a>
                  </div>
                </div>
                <!-- End Dropdown -->
              </div>
            </div>
            <a class="stretched-link" href="#"></a>
          </div>
          <!-- End Card -->
        </div>
        <!-- End Col -->
        <div class="col mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-sm card-hover-shadow h-100">
            <div class="card-body">
              <div class="d-flex align-items-center">

                <h5 class="text-truncate ms-2 mb-0">Team 5</h5>

                <!-- Dropdown -->
                <div class="dropdown ms-auto">
                  <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm card-dropdown-btn rounded-circle" id="folderDropdown2" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi-three-dots-vertical"></i>
                  </button>

                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="folderDropdown2" style="min-width: 13rem;">
                    <span class="dropdown-header">Settings</span>

                    <a class="dropdown-item" href="#">
                      <i class="bi-chat-left-dots dropdown-item-icon"></i> View Team
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="bi-pencil dropdown-item-icon"></i> Rename
                    </a>
                   
                    <div class="dropdown-divider"></div>
                   
                    <a class="dropdown-item" href="#">
                      <i class="bi-trash dropdown-item-icon"></i> Delete Team
                    </a>
                  </div>
                </div>
                <!-- End Dropdown -->
              </div>
            </div>
            <a class="stretched-link" href="#"></a>
          </div>
          <!-- End Card -->
        </div>
        <!-- End Col -->
        <div class="col mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-sm card-hover-shadow h-100">
            <div class="card-body">
              <div class="d-flex align-items-center">

                <h5 class="text-truncate ms-2 mb-0">Team 6</h5>

                <!-- Dropdown -->
                <div class="dropdown ms-auto">
                  <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm card-dropdown-btn rounded-circle" id="folderDropdown2" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi-three-dots-vertical"></i>
                  </button>

                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="folderDropdown2" style="min-width: 13rem;">
                    <span class="dropdown-header">Settings</span>

                    <a class="dropdown-item" href="#">
                      <i class="bi-chat-left-dots dropdown-item-icon"></i> View Team
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="bi-pencil dropdown-item-icon"></i> Rename
                    </a>
                   
                    <div class="dropdown-divider"></div>
                   
                    <a class="dropdown-item" href="#">
                      <i class="bi-trash dropdown-item-icon"></i> Delete Team
                    </a>
                  </div>
                </div>
                <!-- End Dropdown -->
              </div>
            </div>
            <a class="stretched-link" href="#"></a>
          </div>
          <!-- End Card -->
        </div>
        <!-- End Col -->
        <div class="col mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-sm card-hover-shadow h-100">
            <div class="card-body">
              <div class="d-flex align-items-center">

                <h5 class="text-truncate ms-2 mb-0">Team 7</h5>

                <!-- Dropdown -->
                <div class="dropdown ms-auto">
                  <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm card-dropdown-btn rounded-circle" id="folderDropdown2" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi-three-dots-vertical"></i>
                  </button>

                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="folderDropdown2" style="min-width: 13rem;">
                    <span class="dropdown-header">Settings</span>

                    <a class="dropdown-item" href="#">
                      <i class="bi-chat-left-dots dropdown-item-icon"></i> View Team
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="bi-pencil dropdown-item-icon"></i> Rename
                    </a>
                   
                    <div class="dropdown-divider"></div>
                   
                    <a class="dropdown-item" href="#">
                      <i class="bi-trash dropdown-item-icon"></i> Delete Team
                    </a>
                  </div>
                </div>
                <!-- End Dropdown -->
              </div>
            </div>
            <a class="stretched-link" href="#"></a>
          </div>
          <!-- End Card -->
        </div>
        <!-- End Col -->
        <div class="col mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-sm card-hover-shadow h-100">
            <div class="card-body">
              <div class="d-flex align-items-center">

                <h5 class="text-truncate ms-2 mb-0">Team 7</h5>

                <!-- Dropdown -->
                <div class="dropdown ms-auto">
                  <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm card-dropdown-btn rounded-circle" id="folderDropdown2" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi-three-dots-vertical"></i>
                  </button>

                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="folderDropdown2" style="min-width: 13rem;">
                    <span class="dropdown-header">Settings</span>

                    <a class="dropdown-item" href="#">
                      <i class="bi-chat-left-dots dropdown-item-icon"></i> View Team
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="bi-pencil dropdown-item-icon"></i> Rename
                    </a>
                   
                    <div class="dropdown-divider"></div>
                   
                    <a class="dropdown-item" href="#">
                      <i class="bi-trash dropdown-item-icon"></i> Delete Team
                    </a>
                  </div>
                </div>
                <!-- End Dropdown -->
              </div>
            </div>
            <a class="stretched-link" href="#"></a>
          </div>
          <!-- End Card -->
        </div>
        <!-- End Col -->
        <div class="col mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-sm card-hover-shadow h-100">
            <div class="card-body">
              <div class="d-flex align-items-center">

                <h5 class="text-truncate ms-2 mb-0">Team 8</h5>

                <!-- Dropdown -->
                <div class="dropdown ms-auto">
                  <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm card-dropdown-btn rounded-circle" id="folderDropdown2" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi-three-dots-vertical"></i>
                  </button>

                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="folderDropdown2" style="min-width: 13rem;">
                    <span class="dropdown-header">Settings</span>

                    <a class="dropdown-item" href="#">
                      <i class="bi-chat-left-dots dropdown-item-icon"></i> View Team
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="bi-pencil dropdown-item-icon"></i> Rename
                    </a>
                   
                    <div class="dropdown-divider"></div>
                   
                    <a class="dropdown-item" href="#">
                      <i class="bi-trash dropdown-item-icon"></i> Delete Team
                    </a>
                  </div>
                </div>
                <!-- End Dropdown -->
              </div>
            </div>
            <a class="stretched-link" href="#"></a>
          </div>
          <!-- End Card -->
        </div>
        <!-- End Col -->
        <div class="col mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-sm card-hover-shadow h-100">
            <div class="card-body">
              <div class="d-flex align-items-center">

                <h5 class="text-truncate ms-2 mb-0">Team 9</h5>

                <!-- Dropdown -->
                <div class="dropdown ms-auto">
                  <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm card-dropdown-btn rounded-circle" id="folderDropdown2" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi-three-dots-vertical"></i>
                  </button>

                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="folderDropdown2" style="min-width: 13rem;">
                    <span class="dropdown-header">Settings</span>

                    <a class="dropdown-item" href="#">
                      <i class="bi-chat-left-dots dropdown-item-icon"></i> View Team
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="bi-pencil dropdown-item-icon"></i> Rename
                    </a>
                   
                    <div class="dropdown-divider"></div>
                   
                    <a class="dropdown-item" href="#">
                      <i class="bi-trash dropdown-item-icon"></i> Delete Team
                    </a>
                  </div>
                </div>
                <!-- End Dropdown -->
              </div>
            </div>
            <a class="stretched-link" href="#"></a>
          </div>
          <!-- End Card -->
        </div>
        <!-- End Col -->


        <div class="col mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card card-sm card-hover-shadow h-100">
            <div class="card-body">
              <div class="d-flex align-items-center">

                <h5 class="text-truncate ms-2 mb-0">Team 10</h5>

                <!-- Dropdown -->
                <div class="dropdown ms-auto">
                  <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm card-dropdown-btn rounded-circle" id="folderDropdown3" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi-three-dots-vertical"></i>
                  </button>

                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="folderDropdown3" style="min-width: 13rem;">
                    <span class="dropdown-header">Settings</span>

                    <a class="dropdown-item" href="#">
                      <i class="bi-chat-left-dots dropdown-item-icon"></i> View Team
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="bi-pencil dropdown-item-icon"></i> Rename
                    </a>
                   
                    <div class="dropdown-divider"></div>
                   
                    <a class="dropdown-item" href="#">
                      <i class="bi-trash dropdown-item-icon"></i> Delete Team
                    </a>
                  </div>
                </div>
                <!-- End Dropdown -->
              </div>
            </div>
            <a class="stretched-link" href="#"></a>
          </div>
          <!-- End Card -->
        </div>
        <!-- End Col -->
      </div>
      <!-- End Folders -->

      <div class="d-grid mx-auto" style="max-width: 15rem;">
        <a class="btn btn-primary btn-lg" href="#">Add Team</a>
      </div>




    <!-- JS Global Compulsory  -->
    <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="./assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
  <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <!-- JS Implementing Plugins -->
  <script src="./assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside.min.js"></script>
  <script src="./assets/vendor/hs-form-search/dist/hs-form-search.min.js"></script>

  <script src="./assets/vendor/daterangepicker/moment.min.js"></script>
  <script src="./assets/vendor/daterangepicker/daterangepicker.js"></script>
  <script src="./assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="./assets/vendor/chartjs-chart-matrix/dist/chartjs-chart-matrix.min.js"></script>
  <script src="./assets/vendor/jsvectormap/dist/js/jsvectormap.min.js"></script>
  <script src="./assets/vendor/jsvectormap/dist/maps/world.js"></script>
  <script src="./assets/vendor/tom-select/dist/js/tom-select.complete.min.js"></script>

  <!-- JS Front -->
  <script src="./assets/js/theme.min.js"></script>
  <script src="./assets/js/hs.theme-appearance-charts.js"></script>

  <!-- JS Plugins Init. -->
  <script>
    $(document).on('ready', function () {
      // INITIALIZATION OF DATERANGEPICKER
      // =======================================================
      $('.js-daterangepicker').daterangepicker();

      $('.js-daterangepicker-times').daterangepicker({
        timePicker: true,
        startDate: moment().startOf('hour'),
        endDate: moment().startOf('hour').add(32, 'hour'),
        locale: {
          format: 'M/DD hh:mm A'
        }
      });

      var start = moment();
      var end = moment();

      function cb(start, end) {
        $('#js-daterangepicker-predefined .js-daterangepicker-predefined-preview').html(start.format('MMM D') + ' - ' + end.format('MMM D, YYYY'));
      }

      $('#js-daterangepicker-predefined').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
      }, cb);

      cb(start, end);
    });
  </script>

  <!-- JS Plugins Init. -->
  <script>
    (function() {
      window.onload = function () {
        

        // INITIALIZATION OF NAVBAR VERTICAL ASIDE
        // =======================================================
        new HSSideNav('.js-navbar-vertical-aside').init()


        // INITIALIZATION OF FORM SEARCH
        // =======================================================
        new HSFormSearch('.js-form-search')


        // INITIALIZATION OF BOOTSTRAP DROPDOWN
        // =======================================================
        HSBsDropdown.init()


        // INITIALIZATION OF CHARTJS
        // =======================================================
        HSCore.components.HSChartJS.init('.js-chart')


        // INITIALIZATION OF VECTOR MAP
        // =======================================================
        setTimeout(() => {
          HSCore.components.HSJsVectorMap.init('.js-jsvectormap', {
            backgroundColor: HSThemeAppearance.getAppearance() === 'dark' ? '#25282a' : '#ffffff'
          })

          const vectorMap = HSCore.components.HSJsVectorMap.getItem(0)

          window.addEventListener('on-hs-appearance-change', e => {
            vectorMap.setBackgroundColor(e.detail === 'dark' ? '#25282a' : '#ffffff')
          })
        }, 300)


        // INITIALIZATION OF SELECT
        // =======================================================
        HSCore.components.HSTomSelect.init('.js-select')
      }
    })()
  </script>

  <!-- Style Switcher JS -->

  <script>
      (function () {
        // STYLE SWITCHER
        // =======================================================
        const $dropdownBtn = document.getElementById('selectThemeDropdown') // Dropdowon trigger
        const $variants = document.querySelectorAll(`[aria-labelledby="selectThemeDropdown"] [data-icon]`) // All items of the dropdown

        // Function to set active style in the dorpdown menu and set icon for dropdown trigger
        const setActiveStyle = function () {
          $variants.forEach($item => {
            if ($item.getAttribute('data-value') === HSThemeAppearance.getOriginalAppearance()) {
              $dropdownBtn.innerHTML = `<i class="${$item.getAttribute('data-icon')}" />`
              return $item.classList.add('active')
            }

            $item.classList.remove('active')
          })
        }

        // Add a click event to all items of the dropdown to set the style
        $variants.forEach(function ($item) {
          $item.addEventListener('click', function () {
            HSThemeAppearance.setAppearance($item.getAttribute('data-value'))
          })
        })

        // Call the setActiveStyle on load page
        setActiveStyle()

        // Add event listener on change style to call the setActiveStyle function
        window.addEventListener('on-hs-appearance-change', function () {
          setActiveStyle()
        })
      })()
    </script>

  <!-- End Style Switcher JS -->