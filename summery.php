<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Title -->
  <title>Summery</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="./favicon.ico">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="./assets/vendor/bootstrap-icons/font/bootstrap-icons.css">

  <link rel="stylesheet" href="./assets/vendor/tom-select/dist/css/tom-select.bootstrap5.css">
  <link rel="stylesheet" href="./assets/vendor/daterangepicker/daterangepicker.css">

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

<body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl   footer-offset">

  <script src="./assets/js/hs.theme-appearance.js"></script>

  <script src="./assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js"></script>

  <!-- ========== HEADER ========== -->

  <header id="header" class="navbar navbar-expand-lg navbar-fixed navbar-height navbar-container navbar-bordered bg-white">
    <div class="navbar-nav-wrap">
      <!-- Logo -->
      <a class="navbar-brand" href="./index.php" aria-label="CricAuction">
        <img class="navbar-brand-logo" src="./assets/cricauctionlogo.png.png" alt="Logo" data-hs-theme-appearance="default">
        <img class="navbar-brand-logo" src="./assets/cricauctionlogo.png.png" alt="Logo" data-hs-theme-appearance="dark">
        <img class="navbar-brand-logo-mini" src="./assets/svg/logos/logo-short.svg" alt="Logo" data-hs-theme-appearance="default">
        <img class="navbar-brand-logo-mini" src="./assets/svg/logos-light/logo-short.svg" alt="Logo" data-hs-theme-appearance="dark">
      </a>
      <!-- End Logo -->
      <h1>Bramhan Premier League</h1>
    </div>
  </header>

  <!-- ========== END HEADER ========== -->

  <!-- ========== MAIN CONTENT ========== -->
  <!-- Navbar Vertical -->

  <aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered bg-white  ">
    <div class="navbar-vertical-container">
      <div class="navbar-vertical-footer-offset">
        <!-- Logo -->

        <a class="navbar-brand" href="./index.php" aria-label="Front">
          <img class="navbar-brand-logo" src="./assets/cricauctionlogo.png.png" alt="Logo" data-hs-theme-appearance="default">
          <img class="navbar-brand-logo" src="./assets/cricauctionlogo.png.png" alt="Logo" data-hs-theme-appearance="dark">
          <img class="navbar-brand-logo-mini" src="./assets/svg/logos/logo-short.svg" alt="Logo" data-hs-theme-appearance="default">
          <img class="navbar-brand-logo-mini" src="./assets/svg/logos-light/logo-short.svg" alt="Logo" data-hs-theme-appearance="dark">
        </a>

        <!-- End Logo -->

        <!-- Navbar Vertical Toggle -->
        <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
          <i class="bi-arrow-bar-left navbar-toggler-short-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
          <i class="bi-arrow-bar-right navbar-toggler-full-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
        </button>

        <!-- End Navbar Vertical Toggle -->

        <!-- Content -->
        <div class="navbar-vertical-content">
        <!-- Card -->
        <div class="card">
          <img class="card-img card-img-top" src="./assets/AbstractLogo.png" alt="Card image cap">
        </div>
        <!-- End Card -->
         <!-- Card -->
         <div class="card">
          <img class="card-img card-img-top" src="./assets/apllogo.jpg" alt="Card image cap">
        </div>
        <!-- End Card --> <!-- Card -->
        <div class="card">
          <img class="card-img card-img-top" src="./assets/cricauctionlogo.jpg" alt="Card image cap">
        </div>
        <!-- End Card -->
         <!-- Card -->
         <div class="card">
          <img class="card-img card-img-top" src="./assets/cricauctionlogo.jpg" alt="Card image cap">
        </div>
        <!-- End Card -->
        </div>
        <!-- Footer -->
        <div class="navbar-vertical-footer">
          <ul class="navbar-vertical-footer-list">
            <li class="navbar-vertical-footer-list-item">
              <!-- Style Switcher -->
              <div class="dropdown dropup">
                <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="selectThemeDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>

                </button>

                <div class="dropdown-menu navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectThemeDropdown">
                  <a class="dropdown-item" href="#" data-icon="bi-moon-stars" data-value="auto">
                    <i class="bi-moon-stars me-2"></i>
                    <span class="text-truncate" title="Auto (system default)">Auto (system default)</span>
                  </a>
                  <a class="dropdown-item" href="#" data-icon="bi-brightness-high" data-value="default">
                    <i class="bi-brightness-high me-2"></i>
                    <span class="text-truncate" title="Default (light mode)">Default (light mode)</span>
                  </a>
                  <a class="dropdown-item active" href="#" data-icon="bi-moon" data-value="dark">
                    <i class="bi-moon me-2"></i>
                    <span class="text-truncate" title="Dark">Dark</span>
                  </a>
                </div>
              </div>

              <!-- End Style Switcher -->
            </li>

            

            
          </ul>
        </div>
        <!-- End Footer -->
      </div>
    </div>
  </aside>

  <main id="content" role="main" class="main">
    <!-- Content -->
    <div class="content container-fluid">
     
    </div>
    <!-- End Content -->
    <div class="row">
        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
        <div class="card" style="max-width: 20rem;">
          <img class="card-img-top" src="./assets/apllogo.jpg" alt="Card image cap">
          <div class="card-body">
            <h1 class="card-title">Team Name</h1>
            <h3>Remaining Points <h3>00</h3></h3>
            <h3>Total Players <h3>00</h3></h3>

          </div>
        </div>
        <!-- End Card -->
      </div>
      <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
        <div class="card" style="max-width: 20rem;">
          <img class="card-img-top" src="./assets/apllogo.jpg" alt="Card image cap">
          <div class="card-body">
            <h1 class="card-title">Team Name</h1>
            <h3>Remaining Points <h3>00</h3></h3>
            <h3>Total Players <h3>00</h3></h3>

          </div>
        </div>
        <!-- End Card -->
      </div>
      <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
        <div class="card" style="max-width: 20rem;">
          <img class="card-img-top" src="./assets/apllogo.jpg" alt="Card image cap">
          <div class="card-body">
            <h1 class="card-title">Team Name</h1>
            <h3>Remaining Points <h3>00</h3></h3>
            <h3>Total Players <h3>00</h3></h3>

          </div>
        </div>
        <!-- End Card -->
      </div>
      <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
        <div class="card" style="max-width: 20rem;">
          <img class="card-img-top" src="./assets/apllogo.jpg" alt="Card image cap">
          <div class="card-body">
            <h1 class="card-title">Team Name</h1>
            <h3>Remaining Points <h3>00</h3></h3>
            <h3>Total Players <h3>00</h3></h3>

          </div>
        </div>
        <!-- End Card -->
      </div>
      <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
        <div class="card" style="max-width: 20rem;">
          <img class="card-img-top" src="./assets/apllogo.jpg" alt="Card image cap">
          <div class="card-body">
            <h1 class="card-title">Team Name</h1>
            <h3>Remaining Points <h3>00</h3></h3>
            <h3>Total Players <h3>00</h3></h3>

          </div>
        </div>
        <!-- End Card -->
      </div>
      <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
        <div class="card" style="max-width: 20rem;">
          <img class="card-img-top" src="./assets/apllogo.jpg" alt="Card image cap">
          <div class="card-body">
            <h1 class="card-title">Team Name</h1>
            <h3>Remaining Points <h3>00</h3></h3>
            <h3>Total Players <h3>00</h3></h3>

          </div>
        </div>
        <!-- End Card -->
      </div>
      <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
        <div class="card" style="max-width: 20rem;">
          <img class="card-img-top" src="./assets/apllogo.jpg" alt="Card image cap">
          <div class="card-body">
            <h1 class="card-title">Team Name</h1>
            <h3>Remaining Points <h3>00</h3></h3>
            <h3>Total Players <h3>00</h3></h3>

          </div>
        </div>
        <!-- End Card -->
      </div>
      <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
        <div class="card" style="max-width: 20rem;">
          <img class="card-img-top" src="./assets/apllogo.jpg" alt="Card image cap">
          <div class="card-body">
            <h1 class="card-title">Team Name</h1>
            <h3>Remaining Points <h3>00</h3></h3>
            <h3>Total Players <h3>00</h3></h3>

          </div>
        </div>
        <!-- End Card -->
      </div>
      </div>
    </div>
    <!-- End Card -->
   
    <!-- Footer -->

    <div class="footer">
      <div class="row justify-content-between align-items-center">
        <div class="col">
          <p class="fs-6 mb-0">&copy; CricAuction <span class="d-none d-sm-inline-block">2023 Abstract Tech Solution.</span></p>
        </div>
        <!-- End Col -->

        <div class="col-auto">
          
        </div>
        <!-- End Col -->
      </div>
      <!-- End Row -->
    </div>

    <!-- End Footer -->
  </main>
  <!-- ========== END MAIN CONTENT ========== -->

 
  <!-- JS Global Compulsory  -->
  <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="./assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
  <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <!-- JS Implementing Plugins -->
  <script src="./assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside.min.js"></script>
  <script src="./assets/vendor/hs-form-search/dist/hs-form-search.min.js"></script>

  <script src="./assets/vendor/tom-select/dist/js/tom-select.complete.min.js"></script>
  <script src="./assets/vendor/hs-add-field/dist/hs-add-field.js"></script>
  <script src="./assets/vendor/sortablejs/Sortable.min.js"></script>
  <script src="./assets/vendor/daterangepicker/moment.min.js"></script>
  <script src="./assets/vendor/daterangepicker/daterangepicker.js"></script>
  <script src="./assets/vendor/clipboard/dist/clipboard.min.js"></script>

  <!-- JS Front -->
  <script src="./assets/js/theme.min.js"></script>

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


        // INITIALIZATION OF ADD FIELD
        // =======================================================
        new HSAddField('.js-add-field')


        // INITIALIZATION OF SELECT
        // =======================================================
        HSCore.components.HSTomSelect.init('.js-select')


        // INITIALIZATION OF CLIPBOARD
        // =======================================================
        HSCore.components.HSClipboard.init('.js-clipboard')


        // INITIALIZATION OF SORTABLEJS
        // =======================================================
        HSCore.components.HSSortable.init('.js-sortable', {
          forceFallback: true,
          animation: 0,
          group: 'listGroup',
          delay: 500,
          delayOnTouchOnly: true
        });
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
</body>
</html>