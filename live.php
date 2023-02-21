<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Title -->
  <title>CricAuction Live</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="../favicon.ico">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="./assets/vendor/bootstrap-icons/font/bootstrap-icons.css">

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

<body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl navbar-vertical-aside-closed-mode">

  <script src="../assets/js/hs.theme-appearance.js"></script>

  <!-- ========== MAIN CONTENT ========== -->
  <!-- Navbar Vertical -->
  <aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered bg-white  ">
    <div class="navbar-vertical-container">
      <div class="navbar-vertical-footer-offset">
        <!-- Logo -->

        <a class="navbar-brand" href="../index.html" aria-label="Front">
          <img class="navbar-brand-logo" src="../assets/svg/logos/logo.svg" alt="Logo" data-hs-theme-appearance="default">
          <img class="navbar-brand-logo" src="../assets/svg/logos-light/logo.svg" alt="Logo" data-hs-theme-appearance="dark">
          <img class="navbar-brand-logo-mini" src="../assets/svg/logos/logo-short.svg" alt="Logo" data-hs-theme-appearance="default">
          <img class="navbar-brand-logo-mini" src="../assets/svg/logos-light/logo-short.svg" alt="Logo" data-hs-theme-appearance="dark">
        </a>

        <!-- End Logo -->
        <img src="../assets/AbstractLogo.png" alt="">
        <img src="../assets/cricauctionlogo.jpg" alt="">
        <img src="../assets/apllogo.jpg" alt="">
        
       
        

    </div>
  </aside>

  <!-- End Navbar Vertical -->

  <main id="content" role="main" class="main splitted-content-main">
    <!-- Fluid Content -->
    <div class="splitted-content-fluid content-space">
      <!-- Toggles -->
      <div class="d-flex d-xl-none justify-content-end mt-3 me-3">
        <ul class="list-inline">
          <li class="list-inline-item">
            <!-- Offcanvas Toggle -->
            <button class="navbar-toggler splitted-content-toggle" type="button" data-bs-toggle="offcanvas" data-bs-target="#splittedOffcanvasContent" aria-controls="splittedOffcanvasContent">
              <span class="navbar-toggler-default">
                <i class="bi-list"></i>
              </span>
              <span class="navbar-toggler-toggled">
                <i class="bi-x"></i>
              </span>
            </button>
            <!-- End Offcanvas Toggle -->
          </li>

          <li class="list-inline-item">
            <!-- Navbar Vertical Toggle -->
            <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler position-static">
              <i class="bi-arrow-bar-left navbar-toggler-short-align" data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
              <i class="bi-arrow-bar-right navbar-toggler-full-align" data-bs-template='<div class="tooltip d-none d-sm-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
            </button>
            <!-- End Navbar Vertical Toggle -->
          </li>
        </ul>
      </div>
      <!-- End Toggles -->

      <div class="mt-xl-10">
        <!-- Title -->
        <div class="text-center">
          <img class="img-fluid mb-5" src="../assets/svg/layouts/Apl.svg" alt="Image Description" data-hs-theme-appearance="default" style="max-width: 15rem;">
          <img class="img-fluid shadow-sm mb-5" src="../assets/svg/layouts-light/Apl.svg" alt="Image Description" data-hs-theme-appearance="dark" style="max-width: 15rem;">

          <h1>Player name</h1>
          <p>Player Information.</p>
          
        
        </div>
        <!-- End Title -->
      </div>
    </div>
    <!-- End Fluid Content -->

    <!-- Offcanvas Content -->
    <div class="offcanvas offcanvas-start splitted-content-small splitted-content-bordered d-flex flex-column" tabindex="-1" id="splittedOffcanvasContent">
      <div class="offcanvas-body">
        <div class="d-flex justify-content-right flex-column align-items-right h-100 py-10 py-xl-0">
          <a class="btn btn-primary" href="#">team 1</a>
          <h1> </h1>
          <a class="btn btn-primary" href="#">team 2</a>
          <h1> </h1>
          <a class="btn btn-primary" href="#">team 3</a>
          <h1> </h1>
          <a class="btn btn-primary" href="#">team 4</a>
          <h1> </h1>
          <a class="btn btn-primary" href="#">team 5</a>
          <h1> </h1>
          <a class="btn btn-primary" href="#">team 6</a>
          <h1> </h1>
          <a class="btn btn-primary" href="#">team 7</a>
          <h1> </h1>
          <a class="btn btn-primary" href="#">team 8</a>
          <h1> </h1>
          <a class="btn btn-primary" href="#">team 9</a>
          <h1> </h1>
          <a class="btn btn-primary" href="#">team 10</a>
          <h1> </h1>

          <h1>Bid Price</h1>
          <div class="row mb-4">
            <div class="col-sm-9">
              <input type="text" class="form-control" name="department" id="departmentLabel" placeholder="" aria-label="Human resources">
            </div>
          </div>
          <a class="btn btn-primary" href="#">Sale</a>
          <h1> </h1>
          <a class="btn btn-primary" href="#">Skip</a>
        </div>
      </div>
    </div>
    <!-- End Offcanvas Content -->
  </main>
  <!-- ========== END MAIN CONTENT ========== -->

  
  <!-- ========== END SECONDARY CONTENTS ========== -->

  <!-- JS Global Compulsory  -->
  <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="./assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
  <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <!-- JS Implementing Plugins -->
  <script src="./assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside.min.js"></script>
  <script src="./assets/vendor/hs-form-search/dist/hs-form-search.min.js"></script>

  <!-- JS Front -->
  <script src="./assets/js/theme.min.js"></script>

  <!-- JS Plugins Init. -->
  <script>
    (function() {
      // INITIALIZATION OF NAVBAR VERTICAL ASIDE
      // =======================================================
      new HSSideNav('.js-navbar-vertical-aside').init()


      // INITIALIZATION OF FORM SEARCH
      // =======================================================
      new HSFormSearch('.js-form-search')


      // INITIALIZATION OF BOOTSTRAP DROPDOWN
      // =======================================================
      HSBsDropdown.init()


      // INITIALIZATION OF SIDEBAR COMBINATIONS WITH OFFCANVAS
      // =======================================================
      const offcanvasInstance = new bootstrap.Offcanvas(document.querySelector('.offcanvas-start'))
      const defaultTransition = window.getComputedStyle(offcanvasInstance._element).getPropertyValue('transition')
      window.addEventListener('resize', function (e) {
        if (window.innerWidth > 1200) {
          if (offcanvasInstance._element.style.transition !== 'none 0s ease 0s' ) {
            offcanvasInstance._element.style.transition = 'none'
          }

          // Reset offcanvas states
          if (offcanvasInstance._isShown) {
            offcanvasInstance._element.classList.remove('show')
            offcanvasInstance._backdrop._element.remove()
            offcanvasInstance._isShown = false
            offcanvasInstance._backdrop._isAppended = false
          }

          // Show offcanvas if hidden on desktop
          if (offcanvasInstance._element.style.visibility === 'hidden') {
            offcanvasInstance._element.style.visibility = 'visible'
          }
        } else {
          if (offcanvasInstance._element.style.transition === 'none 0s ease 0s' ) {
            offcanvasInstance._element.style.removeProperty('transition')
          }
        }
      })
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
</body>
</html>