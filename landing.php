<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Title -->
  <title>CricAuction</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="./favicon.ico">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="./assets/vendor/bootstrap-icons/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./assets/vendor/hs-img-compare/hs-img-compare.css">

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

<body>
  <style type="text/css">
    @media (min-width: 1400px)
    {
      .container-lg
      {
        max-width: 1140px;
      }
    }
  </style>

  <script src="./assets/js/hs.theme-appearance.js"></script>

  <!-- ========== HEADER ========== -->
  <header id="header" class="navbar navbar-expand-lg navbar-center navbar-light bg-white navbar-absolute-top navbar-show-hide" data-hs-header-options='{
            "fixMoment": 0,
            "fixEffect": "slide"
          }'>
    <div class="container-lg">
      <nav class="js-mega-menu navbar-nav-wrap">
        <!-- Logo -->

        <a class="navbar-brand" href="./index.html" aria-label="Front">
          <img class="navbar-brand-logo" src="./assets/svg/logos/logo.svg" alt="Logo" data-hs-theme-appearance="default">
          <img class="navbar-brand-logo" src="./assets/svg/logos-light/logo.svg" alt="Logo" data-hs-theme-appearance="dark">
        </a>

        <!-- End Logo -->

        <!-- Secondary Content -->
        <div class="navbar-nav-wrap-secondary-content">
          
          <a class="btn btn-primary navbar-btn" href="#">Contact Us</a>
        </div>
        <!-- End Secondary Content -->

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContainerNavDropdown" aria-controls="navbarContainerNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-default">
            <i class="bi-list"></i>
          </span>
          <span class="navbar-toggler-toggled">
            <i class="bi-x"></i>
          </span>
        </button>
        <!-- End Toggler -->

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbarContainerNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link py-2 py-lg-3" href="./login.php">Login<span class="badge bg-dark rounded-pill ms-1"></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link py-2 py-lg-3" href="https://htmlstream.com/contact-us" target="_blank">Sign Up </a>
            </li>
            
          </ul>
        </div>
        <!-- End Collapse -->
      </nav>
    </div>
  </header>

  <!-- ========== END HEADER ========== -->

  <!-- ========== MAIN CONTENT ========== -->
  <main id="content" role="main" class="main">
    <!-- Hero -->
    <div class="overflow-hidden gradient-radial-sm-primary">
      <div class="container-lg content-space-t-3 content-space-t-lg-4 content-space-b-2">
        <div class="w-lg-75 text-center mx-lg-auto text-center mx-auto">
          <!-- Heading -->
          <div class="mb-7 animated fadeInUp">
            <h1 class="display-2 mb-3">Cric<span class="text-primary text-highlight-warning">Auction</span></h1>
            <p class="fs-2">An Absolute Cricketing Solution</p>
          </div>
          <!-- End Heading -->
        </div>
      </div>
    </div>
    <!-- End Hero -->

    <!-- Card Grid -->
    <div class="container-lg content-space-t-lg-2 content-space-b-2 content-space-b-lg-3">
      <!-- Heading -->
      <div class="w-lg-75 text-center mx-lg-auto mb-7 mb-md-10">
        <h2 class="display-4">About <span class="text-primary">CricAuction</span></h2>
        <p class="lead">CricAuction is a type of software that is designed to help businesses and individuals manage their auction operations. The CricAuction software typically provides features and tools for creating and managing auctions, managing bidders and bids, tracking sales and payments, generating reports, and more.

CricAuction can be used for a variety of different types of auctions, including online auctions, live auctions, silent auctions, and more. Many auction management software solutions are web-based, which means they can be accessed from anywhere with an internet connection.</p>
      </div>
      <!-- End Heading -->

      
        </div>
        <!-- End Col -->
      </div>
      <!-- End Row -->
    </div>
    <!-- End Card Grid -->

   

    <!-- Card Grid -->
    <div class="container-lg content-space-2 content-space-lg-3">
      <!-- Heading -->
      <div class="w-lg-75 text-center mx-lg-auto mb-7 mb-md-10">
        <h2 class="display-4">Packed with <span class="text-primary">features</span> you already love</h2>
        <p class="lead">CricAuction is used to facilitate online auctions, and typically includes a range of features to help sellers and buyers participate in the auction process. Some common features of auction software include:</p>
      </div>
      <!-- End Heading -->

      <div class="row">
        <div class="col-md-7 mb-4">
          <!-- Card -->
          <div class="card card-lg h-100 bg-light border-0 shadow-none overflow-hidden">
            <div class="card-body">
              <h2 class="card-title h1 text-inherit">Player registration</h2>
              <p class="card-text lead"> Players can register to participate in auctions and create their own profiles.</p>
            </div>
           
          </div>
          <!-- End Card -->
        </div>
        <!-- End Col -->

        <div class="col-md-5 mb-4">
          <!-- Card -->
          <div class="card card-lg h-100 bg-light border-0 shadow-none overflow-hidden">
            <div class="card-body">
              <h2 class="card-title h1 text-inherit">Team listings</h2>
              <p class="card-text lead">Team Owners can list Team in the auction, with details such as photos, descriptions.</p>
            </div>
           
          </div>
          <!-- End Card -->
        </div>
        <!-- End Col -->

        <div class="col-md-5 mb-4">
          <!-- Card -->
          <div class="card card-lg h-100 bg-light border-0 shadow-none overflow-hidden">
            <div class="card-body">
              <h2 class="card-title h1 text-inherit">Bidding system</h2>
              <p class="card-text lead">Buyers can place bids on items, with the auction software automatically updating the current highest bid.</p>
            </div>
            
          </div>
          <!-- End Card -->
        </div>
        <!-- End Col -->

        <div class="col-md-7 mb-4">
          <!-- Card -->
          <div class="card card-lg h-100 bg-light border-0 shadow-none overflow-hidden">
            <div class="card-body">
              <h2 class="card-title h1 text-inherit">Bid history</h2>
              <p class="card-text lead"> Users can view the bidding history for an item, including the bids placed, the time they were placed, and the bidder's username.</p>
            </div>
          </div>
          <!-- End Card -->
        </div>
        <!-- End Col -->

        <div class="col-md-7 mb-4 mb-md-0">
          <!-- Card -->
          <div class="card card-lg h-100 bg-light border-0 shadow-none overflow-hidden">
            <div class="card-body">
              <h2 class="card-title h1 text-inherit">Reports and analytics</h2>
              <p class="card-text lead">CricAuction can generate reports and analytics to help teams track their spending, analyze their bidding strategy, and optimize their team composition.</p>
            </div>
          </div>
          <!-- End Card -->
        </div>
        <!-- End Col -->

        <div class="col-md-5">
          <!-- Card -->
          <div class="card card-lg h-100 bg-light border-0 shadow-none overflow-hidden">
            <div class="card-body">
              <h2 class="card-title h1 text-inherit">Team management</h2>
              <p class="card-text lead">CricAuction allows teams to manage their bidding strategy, track their purchases, and manage their player roster.</p>
          </div>
          <!-- End Card -->
        </div>
        <!-- End Col -->
      </div>
      <!-- End Row -->
    </div>
    <!-- End Card Grid -->

    

    <!-- Sliding Image -->
    <div class="content-space-b-2">
      <!-- Heading -->
      <div class="container-lg">
        <div class="w-lg-75 text-center mx-lg-auto mb-7 mb-md-10">
          <h2 class="display-4">Some Auctions That We Hosted</h2>
          
        </div>
      </div>
      <!-- End Heading -->

      <div class="sliding-img mb-5">
        <div class="sliding-img-frame-to-start" style="background-image: url(./assets/img/others/img1.png);" data-hs-theme-appearance="default"></div>
        
      </div>

      <div class="sliding-img">
        <div class="sliding-img-frame-to-end" style="background-image: url(./assets/img/others/img2.png);" data-hs-theme-appearance="default"></div>
       
      </div>
    </div>
    <!-- End Sliding Image -->
   
      </div>

      <div class="d-grid mx-auto" style="max-width: 15rem;">
        <a class="btn btn-primary btn-lg" href="#">Get Quote</a>
      </div>
    </div>
    <!-- End Tools -->

   
  </main>
  <!-- ========== END MAIN CONTENT ========== -->

  <!-- ========== FOOTER ========== -->
  <footer class="container-lg text-center py-10">
    <!-- Socials -->
    <ul class="list-inline mb-3">
      <li class="list-inline-item">
        <a class="btn btn-soft-secondary btn-sm btn-icon rounded-circle" href="#">
          <i class="bi-facebook"></i>
        </a>
      </li>

      <li class="list-inline-item">
        <a class="btn btn-soft-secondary btn-sm btn-icon rounded-circle" href="#">
          <i class="bi-twitter"></i>
        </a>
      </li>

      <li class="list-inline-item">
        <a class="btn btn-soft-secondary btn-sm btn-icon rounded-circle" href="#">
          <i class="bi-github"></i>
        </a>
      </li>

      <li class="list-inline-item">
        <a class="btn btn-soft-secondary btn-sm btn-icon rounded-circle" href="https://www.instagram.com/htmlstream/">
          <i class="bi-instagram"></i>
        </a>
      </li>
    </ul>
    <!-- End Socials -->

    <p class="mb-0">&copy; CricAuction. 2023 Abstract Tech Solution. All rights reserved.</p>
  </footer>
  <!-- ========== END FOOTER ========== -->


  <!-- JS Global Compulsory  -->
  <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="./assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
  <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <!-- JS Implementing Plugins -->
  <script src="./assets/vendor/hs-header/dist/hs-header.min.js"></script>
  <script src="./assets/vendor/hs-img-compare/hs-img-compare.js"></script>
  <script src="./assets/vendor/hs-go-to/dist/hs-go-to.min.js"></script>

  <!-- JS Front -->
  <script src="./assets/js/theme.min.js"></script>

  <!-- JS Plugins Init. -->
  <script>
    (function() {
      // INITIALIZATION OF NAVBAR
      // =======================================================
      new HSHeader('#header').init()


      // INITIALIZATION OF GO TO
      // =======================================================
      new HSGoTo('.js-go-to')


      // TRANSFORMATION
      // =======================================================
      const $figure = document.querySelector('.js-img-comp')

      if (window.pageYOffset) {
        $figure.style.transform = `rotateY(${-18 + window.pageYOffset}deg) rotateX(${window.pageYOffset / 5}deg)`
      }

      let y = -18 + window.pageYOffset,
        x = 55 - window.pageYOffset

      const figureTransformation = function () {
        if (-18 + window.pageYOffset / 5 > 0) {
          y = 0
        }

        if (55 - window.pageYOffset / 3 < 0) {
          x = 0
        }

        y = -18 + window.pageYOffset / 5 < 0 ? -18 + window.pageYOffset / 5 : y
        x = 55 - window.pageYOffset / 3 > 0 ? 55 - window.pageYOffset / 3 : x
        $figure.style.transform = `rotateY(${y}deg) rotateX(${x}deg)`
      }

      figureTransformation()
      window.addEventListener('scroll', figureTransformation)
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