<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Title -->
  <title>Team Management</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="./favicon.ico">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="./assets/vendor/bootstrap-icons/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.css">
  <link rel="stylesheet" href="./assets/vendor/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="./assets/vendor/tom-select/dist/css/tom-select.bootstrap5.css">
  <link rel="stylesheet" href="./assets/vendor/hs-table-sticky-header/src/hs.table-sticky-header.css">

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

  <!-- ========== HEADER ========== -->
  <header id="header" class="navbar navbar-expand-lg navbar-bordered bg-white  ">
    <div class="container">
      <nav class="js-mega-menu navbar-nav-wrap">
        <!-- Logo -->

        <a class="navbar-brand" href="./index.html" aria-label="Front">
          <img class="navbar-brand-logo" src="./assets/cricauctionlogo.png.png" alt="Logo" data-hs-theme-appearance="default">
          <img class="navbar-brand-logo" src="./assets/cricauctionlogo.png.png" alt="Logo" data-hs-theme-appearance="dark">
        </a>

        <!-- End Logo -->

        <!-- Secondary Content -->
        <div class="navbar-nav-wrap-secondary-content">
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
          
        </div>
        <!-- End Collapse -->
      </nav>
    </div>
  </header>

  <!-- ========== END HEADER ========== -->

  <!-- ========== MAIN CONTENT ========== -->
  <main id="content" role="main" class="main">
    <!-- Content -->
    <div class="content container">
      <!-- Page Header -->
      <div class="page-header">
        <div class="row align-items-center">
         <div class="col-sm mb-2 mb-sm-0">
            <!-- Card -->
            <div class="card mb-3">
              <div class="row no-gutters">
                <div class="col-md-4">
                  <img class="img-fluid" src="./assets/apllogo.jpg" alt="Card image cap">
                </div>
                <div class="col-md-7">
                  <div class="card-body">
                  <span class="display-1">Chennai Super Kings</span>                    </div>
                </div>
              </div>
            </div>
            <!-- End Card -->          </div>
          <!-- End Col -->

          
          <!-- End Col -->
        </div>
        <!-- End Row -->
      </div>
      <!-- End Page Header -->

      <!-- Stats -->
      <div class="row">
        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
          <!-- Card -->
          <a class="card card-hover-shadow h-100" href="#">
            <div class="card-body">
              <h3>Remaining Points</h3>

              <div class="row align-items-center gx-2 mb-1">
                <div class="col-6">
                  <h2 class="card-title text-inherit">00</h2>
                </div>
                <!-- End Col -->

                
                <!-- End Col -->
              </div>
              <!-- End Row -->

             
            </div>
          </a>
          <!-- End Card -->
        </div>
        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
          <!-- Card -->
          <a class="card card-hover-shadow h-100" href="#">
            <div class="card-body">
              <h3>Total Players</h3>

              <div class="row align-items-center gx-2 mb-1">
                <div class="col-6">
                  <h2 class="card-title text-inherit">00</h2>
                </div>
                <!-- End Col -->

                
                <!-- End Col -->
              </div>
              <!-- End Row -->

             
            </div>
          </a>
          <!-- End Card -->
        </div>
        
        </div>
      </div>
      <!-- End Stats -->

      <div class="row">
       
        <!-- End Col -->
      </div>
      <!-- End Row -->

      <!-- Card -->
      <div class="card mb-3 mb-lg-5">
        <!-- Header -->
        <div class="card-header">
          <div class="row justify-content-between align-items-center flex-grow-1">
            <div class="col-md">
              <div class="d-flex justify-content-between align-items-center">
                <h2>Players</h2>

                <!-- Datatable Info -->
                <div id="datatableCounterInfo" style="display: none;">
                  <div class="d-flex align-items-center">
                    <span class="fs-6 me-3">
                      <span id="datatableCounter">0</span>
                      Selected
                    </span>
                    <a class="btn btn-outline-danger btn-sm" href="javascript:;">
                      <i class="tio-delete-outlined"></i> Delete
                    </a>
                  </div>
                </div>
                <!-- End Datatable Info -->
              </div>
            </div>
            <!-- End Col -->
            <div class="js-sticky-header">
  <!-- Table -->
  <div class="table-responsive">
    <table class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle">
      <thead class="thead-light">
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Player Role</th>
          <th scope="col">Age</th>
          <th scope="col">Action</th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <td>
            <a class="d-flex align-items-center" href="#">
              <div class="avatar avatar-circle">
                <img class="avatar-img" src="./assets/Player Image.jpeg" alt="Image Description">
              </div>
              <div class="flex-grow-1 ms-3">
                <span class="d-block h5 text-inherit mb-0">Aditya Patil <i class="tio-verified text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></span>
              </div>
            </a>
          </td>
          <td>
            <span class="d-block h5 mb-0">All Rounder</span>
          </td>
          <td>18</td>
          <td>
            <button type="button" class="btn btn-soft-danger">Remove</button>
          </td>
        </tr>

        <tr>
          <td>
            <a class="d-flex align-items-center" href="#">
              <div class="avatar avatar-circle">
                <img class="avatar-img" src="./assets/Player Image.jpeg" alt="Image Description">
              </div>
              <div class="flex-grow-1 ms-3">
                <span class="d-block h5 text-inherit mb-0">Aditya Patil <i class="tio-verified text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></span>
              </div>
            </a>
          </td>
          <td>
            <span class="d-block h5 mb-0">All Rounder</span>
          </td>
          <td>18</td>
          <td>
            <button type="button" class="btn btn-soft-danger">Remove</button>
          </td>
        </tr>

        <tr>
          <td>
            <a class="d-flex align-items-center" href="#">
              <div class="avatar avatar-circle">
                <img class="avatar-img" src="./assets/Player Image.jpeg" alt="Image Description">
              </div>
              <div class="flex-grow-1 ms-3">
                <span class="d-block h5 text-inherit mb-0">Aditya Patil <i class="tio-verified text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></span>
              </div>
            </a>
          </td>
          <td>
            <span class="d-block h5 mb-0">All Rounder</span>
          </td>
          <td>18</td>
          <td>
            <button type="button" class="btn btn-soft-danger">Remove</button>
          </td>
        </tr>

        <tr>
          <td>
            <a class="d-flex align-items-center" href="#">
              <div class="avatar avatar-circle">
                <img class="avatar-img" src="./assets/Player Image.jpeg" alt="Image Description">
              </div>
              <div class="flex-grow-1 ms-3">
                <span class="d-block h5 text-inherit mb-0">Aditya Patil <i class="tio-verified text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></span>
              </div>
            </a>
          </td>
          <td>
            <span class="d-block h5 mb-0">All Rounder</span>
          </td>
          <td>18</td>
          <td>
            <button type="button" class="btn btn-soft-danger">Remove</button>
          </td>
        </tr>
        <tr>
          <td>
            <a class="d-flex align-items-center" href="#">
              <div class="avatar avatar-circle">
                <img class="avatar-img" src="./assets/Player Image.jpeg" alt="Image Description">
              </div>
              <div class="flex-grow-1 ms-3">
                <span class="d-block h5 text-inherit mb-0">Aditya Patil <i class="tio-verified text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></span>
              </div>
            </a>
          </td>
          <td>
            <span class="d-block h5 mb-0">All Rounder</span>
          </td>
          <td>18</td>
          <td>
            <button type="button" class="btn btn-soft-danger">Remove</button>
          </td>
        </tr>

        <tr>
          <td>
            <a class="d-flex align-items-center" href="#">
              <div class="avatar avatar-circle">
                <img class="avatar-img" src="./assets/Player Image.jpeg" alt="Image Description">
              </div>
              <div class="flex-grow-1 ms-3">
                <span class="d-block h5 text-inherit mb-0">Aditya Patil <i class="tio-verified text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></span>
              </div>
            </a>
          </td>
          <td>
            <span class="d-block h5 mb-0">All Rounder</span>
          </td>
          <td>18</td>
          <td>
            <button type="button" class="btn btn-soft-danger">Remove</button>
          </td>
        </tr>

        <tr>
          <td>
            <a class="d-flex align-items-center" href="#">
              <div class="avatar avatar-circle">
                <img class="avatar-img" src="./assets/Player Image.jpeg" alt="Image Description">
              </div>
              <div class="flex-grow-1 ms-3">
                <span class="d-block h5 text-inherit mb-0">Aditya Patil <i class="tio-verified text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></span>
              </div>
            </a>
          </td>
          <td>
            <span class="d-block h5 mb-0">All Rounder</span>
          </td>
          <td>18</td>
          <td>
            <button type="button" class="btn btn-soft-danger">Remove</button>
          </td>
        </tr>
        <tr>
          <td>
            <a class="d-flex align-items-center" href="#">
              <div class="avatar avatar-circle">
                <img class="avatar-img" src="./assets/Player Image.jpeg" alt="Image Description">
              </div>
              <div class="flex-grow-1 ms-3">
                <span class="d-block h5 text-inherit mb-0">Aditya Patil <i class="tio-verified text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></span>
              </div>
            </a>
          </td>
          <td>
            <span class="d-block h5 mb-0">All Rounder</span>
          </td>
          <td>18</td>
          <td>
            <button type="button" class="btn btn-soft-danger">Remove</button>
          </td>
        </tr>

        <tr>
          <td>
            <a class="d-flex align-items-center" href="#">
              <div class="avatar avatar-circle">
                <img class="avatar-img" src="./assets/Player Image.jpeg" alt="Image Description">
              </div>
              <div class="flex-grow-1 ms-3">
                <span class="d-block h5 text-inherit mb-0">Aditya Patil <i class="tio-verified text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></span>
              </div>
            </a>
          </td>
          <td>
            <span class="d-block h5 mb-0">All Rounder</span>
          </td>
          <td>18</td>
          <td>
            <button type="button" class="btn btn-soft-danger">Remove</button>
          </td>
        </tr>

        <tr>
          <td>
            <a class="d-flex align-items-center" href="#">
              <div class="avatar avatar-circle">
                <img class="avatar-img" src="./assets/Player Image.jpeg" alt="Image Description">
              </div>
              <div class="flex-grow-1 ms-3">
                <span class="d-block h5 text-inherit mb-0">Aditya Patil <i class="tio-verified text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></span>
              </div>
            </a>
          </td>
          <td>
            <span class="d-block h5 mb-0">All Rounder</span>
          </td>
          <td>18</td>
          <td>
            <button type="button" class="btn btn-soft-danger">Remove</button>
          </td>
        </tr>

        <tr>
          <td>
            <a class="d-flex align-items-center" href="#">
              <div class="avatar avatar-circle">
                <img class="avatar-img" src="./assets/Player Image.jpeg" alt="Image Description">
              </div>
              <div class="flex-grow-1 ms-3">
                <span class="d-block h5 text-inherit mb-0">Aditya Patil <i class="tio-verified text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></span>
              </div>
            </a>
          </td>
          <td>
            <span class="d-block h5 mb-0">All Rounder</span>
          </td>
          <td>18</td>
          <td>
            <button type="button" class="btn btn-soft-danger">Remove</button>
          </td>
        </tr>
        <tr>
          <td>
            <a class="d-flex align-items-center" href="#">
              <div class="avatar avatar-circle">
                <img class="avatar-img" src="./assets/Player Image.jpeg" alt="Image Description">
              </div>
              <div class="flex-grow-1 ms-3">
                <span class="d-block h5 text-inherit mb-0">Aditya Patil <i class="tio-verified text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></span>
              </div>
            </a>
          </td>
          <td>
            <span class="d-block h5 mb-0">All Rounder</span>
          </td>
          <td>18</td>
          <td>
            <button type="button" class="btn btn-soft-danger">Remove</button>
          </td>
        </tr>
        <tr>
          <td>
            <a class="d-flex align-items-center" href="#">
              <div class="avatar avatar-circle">
                <img class="avatar-img" src="./assets/Player Image.jpeg" alt="Image Description">
              </div>
              <div class="flex-grow-1 ms-3">
                <span class="d-block h5 text-inherit mb-0">Aditya Patil <i class="tio-verified text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></span>
              </div>
            </a>
          </td>
          <td>
            <span class="d-block h5 mb-0">All Rounder</span>
          </td>
          <td>18</td>
          <td>
            <button type="button" class="btn btn-soft-danger">Remove</button>
          </td>
        </tr>

        <tr>
          <td>
            <a class="d-flex align-items-center" href="#">
              <div class="avatar avatar-circle">
                <img class="avatar-img" src="./assets/Player Image.jpeg" alt="Image Description">
              </div>
              <div class="flex-grow-1 ms-3">
                <span class="d-block h5 text-inherit mb-0">Aditya Patil <i class="tio-verified text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></span>
              </div>
            </a>
          </td>
          <td>
            <span class="d-block h5 mb-0">All Rounder</span>
          </td>
          <td>18</td>
          <td>
            <button type="button" class="btn btn-soft-danger">Remove</button>
          </td>
        </tr>

        <tr>
          <td>
            <a class="d-flex align-items-center" href="#">
              <div class="avatar avatar-circle">
                <img class="avatar-img" src="./assets/Player Image.jpeg" alt="Image Description">
              </div>
              <div class="flex-grow-1 ms-3">
                <span class="d-block h5 text-inherit mb-0">Aditya Patil <i class="tio-verified text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></span>
              </div>
            </a>
          </td>
          <td>
            <span class="d-block h5 mb-0">All Rounder</span>
          </td>
          <td>18</td>
          <td>
            <button type="button" class="btn btn-soft-danger">Remove</button>
          </td>
        </tr>
        </tbody>
    </table>
  </div>
  <!-- End Table -->
</div>
           
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
        <!-- End Header -->
      </div>
      <!-- End Card -->

        </div>
      </div>
    </div>
    <!-- End Content -->

    <!-- Footer -->
    <div class="footer">
      <div class="container">
        <div class="row justify-content-between align-items-center">
          <div class="col">
            <p class="fs-6 mb-0">&copy; CricAuction. <span class="d-none d-sm-inline-block">2023 Abstract Tech Solution.</span></p>
          </div>
          <!-- End Col -->

          <div class="col-auto">
            
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
      </div>
    </div>
    <!-- End Footer -->
  </main>
  <!-- ========== END MAIN CONTENT ========== -->

 
  <!-- JS Global Compulsory  -->
  <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="./assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
  <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <!-- JS Implementing Plugins -->
  <script src="./assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.js"></script>
  <script src="./assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="./assets/vendor/chartjs-chart-matrix/dist/chartjs-chart-matrix.min.js"></script>
  <script src="./assets/vendor/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js"></script>
  <script src="./assets/vendor/daterangepicker/moment.min.js"></script>
  <script src="./assets/vendor/daterangepicker/daterangepicker.js"></script>
  <script src="./assets/vendor/tom-select/dist/js/tom-select.complete.min.js"></script>
  <script src="./assets/vendor/clipboard/dist/clipboard.min.js"></script>
  <script src="./assets/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
  <script src="./assets/vendor/datatables.net.extensions/select/select.min.js"></script>

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


    // INITIALIZATION OF DATATABLES
    // =======================================================
    HSCore.components.HSDatatables.init($('#datatable'), {
      select: {
        style: 'multi',
        selector: 'td:first-child input[type="checkbox"]',
        classMap: {
          checkAll: '#datatableCheckAll',
          counter: '#datatableCounter',
          counterInfo: '#datatableCounterInfo'
        }
      },
      language: {
        zeroRecords: `<div class="text-center p-4">
              <img class="mb-3" src="./assets/svg/illustrations/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="default">
              <img class="mb-3" src="./assets/svg/illustrations-light/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="dark">
            <p class="mb-0">No data to show</p>
            </div>`
      }
    });

    const datatable = HSCore.components.HSDatatables.getItem(0)

    $('.js-datatable-filter').on('change', function() {
      var $this = $(this),
        elVal = $this.val(),
        targetColumnIndex = $this.data('target-column-index');

      datatable.column(targetColumnIndex).search(elVal).draw();
    });

    $('#datatableSearch').on('mouseup', function (e) {
      var $input = $(this),
        oldValue = $input.val();

      if (oldValue == "") return;

      setTimeout(function(){
        var newValue = $input.val();

        if (newValue == ""){
          // Gotcha
          datatable.search('').draw();
        }
      }, 1);
    });
  </script>

  <!-- JS Plugins Init. -->
  <script src="./assets/vendor/hs-table-sticky-header/src/hs.table-sticky-header.js"></script>

<script>
  $(document).on('ready', function () {
    // INITIALIZATION OF STICKY HEADER
    // =======================================================
    new HSTableStickyHeader('.js-sticky-header', {
      offsetTop: "60px"
    }).init();
  })();
</script>
  <script>
    (function() {
      window.onload = function () {
        // INITIALIZATION OF MEGA MENU
        // =======================================================
        new HSMegaMenu('.js-mega-menu', {
          desktop: {
            position: 'left'
          }
        })


        // INITIALIZATION OF BOOTSTRAP DROPDOWN
        // =======================================================
        HSBsDropdown.init()


        // INITIALIZATION OF CHARTJS
        // =======================================================
        Chart.plugins.unregister(ChartDataLabels);

        HSCore.components.HSChartJS.init('.js-chart')

        HSCore.components.HSChartJS.init('#updatingBarChart')
        const updatingBarChart = HSCore.components.HSChartJS.getItem('updatingBarChart')

        // Call when tab is clicked
        document.querySelectorAll('[data-bs-toggle="chart-bar"]').forEach(item => {
          item.addEventListener('click', e => {
            let keyDataset = e.currentTarget.getAttribute('data-datasets')
            const styles = HSCore.components.HSChartJS.getTheme('updatingBarChart', HSThemeAppearance.getAppearance())

            if (keyDataset === 'lastWeek') {
              updatingBarChart.data.labels = ["Apr 22", "Apr 23", "Apr 24", "Apr 25", "Apr 26", "Apr 27", "Apr 28", "Apr 29", "Apr 30", "Apr 31"];
              updatingBarChart.data.datasets = [
                {
                  "data": [120, 250, 300, 200, 300, 290, 350, 100, 125, 320],
                  "backgroundColor": styles.data.datasets[0].backgroundColor,
                  "hoverBackgroundColor": styles.data.datasets[0].hoverBackgroundColor,
                  "borderColor": styles.data.datasets[0].borderColor
                },
                {
                  "data": [250, 130, 322, 144, 129, 300, 260, 120, 260, 245, 110],
                  "backgroundColor": styles.data.datasets[1].backgroundColor,
                  "borderColor": styles.data.datasets[1].borderColor
                }
              ];
              updatingBarChart.update();
            } else {
              updatingBarChart.data.labels = ["May 1", "May 2", "May 3", "May 4", "May 5", "May 6", "May 7", "May 8", "May 9", "May 10"];
              updatingBarChart.data.datasets = [
                {
                  "data": [200, 300, 290, 350, 150, 350, 300, 100, 125, 220],
                  "backgroundColor": styles.data.datasets[0].backgroundColor,
                  "hoverBackgroundColor": styles.data.datasets[0].hoverBackgroundColor,
                  "borderColor": styles.data.datasets[0].borderColor
                },
                {
                  "data": [150, 230, 382, 204, 169, 290, 300, 100, 300, 225, 120],
                  "backgroundColor": styles.data.datasets[1].backgroundColor,
                  "borderColor": styles.data.datasets[1].borderColor
                }
              ]
              updatingBarChart.update();
            }
          })
        })


        // INITIALIZATION OF CHARTJS
        // =======================================================
        HSCore.components.HSChartJS.init('.js-chart-datalabels', {
          plugins: [ChartDataLabels],
          options: {
            plugins: {
              datalabels: {
                anchor: function (context) {
                  var value = context.dataset.data[context.dataIndex];
                  return value.r < 20 ? 'end' : 'center';
                },
                align: function (context) {
                  var value = context.dataset.data[context.dataIndex];
                  return value.r < 20 ? 'end' : 'center';
                },
                color: function (context) {
                  var value = context.dataset.data[context.dataIndex];
                  return value.r < 20 ? context.dataset.backgroundColor : context.dataset.color;
                },
                font: function (context) {
                  var value = context.dataset.data[context.dataIndex],
                    fontSize = 25;

                  if (value.r > 50) {
                    fontSize = 35;
                  }

                  if (value.r > 70) {
                    fontSize = 55;
                  }

                  return {
                    weight: 'lighter',
                    size: fontSize
                  };
                },
                offset: 2,
                padding: 0
              }
            }
          }
        })

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
</body>
</html>