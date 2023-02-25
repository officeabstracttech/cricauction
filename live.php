<?php
include("config.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Title -->
  <title>Cric Live</title>

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
      <a class="navbar-brand" href="./index.html" aria-label="Front">
        <img class="navbar-brand-logo" src="./assets/cricauctionlogo.svg" alt="Logo" data-hs-theme-appearance="default">
        <img class="navbar-brand-logo-mini" src="./assets/svg/logos/logo-short.svg" alt="Logo" data-hs-theme-appearance="default">
      </a>
      <!-- End Logo -->

      <div class="navbar-nav-wrap-content-start">
        <!-- Navbar Vertical Toggle -->
        <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
          <i class="bi-arrow-bar-left navbar-toggler-short-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
          <i class="bi-arrow-bar-right navbar-toggler-full-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
        </button>


        <!-- End Search Form -->
      </div>


      <div class="navbar-nav-wrap-content-end">
        <!-- Navbar -->
        <ul class="navbar-nav">
          <li class="nav-item d-none d-sm-inline-block">
            
          </li>

          <li class="nav-item d-none d-sm-inline-block">
          <a class="btn btn-primary" href="#">Undo</a>

          </li>
        

          
         
          <li class="nav-item d-none d-sm-inline-block">
          <a class="btn btn-primary" href="#">Summery</a>

          </li>
        
          </li>

          <li class="nav-item">
          <a class="btn btn-primary" href="#">Next Player</a>

             </li>
        </ul>
        <!-- End Navbar -->
      </div>
    </div>
  </header>

  <!-- ========== END HEADER ========== -->

  <!-- ========== MAIN CONTENT ========== -->
  <!-- Navbar Vertical -->

  <aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered bg-white  ">
    <div class="navbar-vertical-container">
      <div class="navbar-vertical-footer-offset">
        <!-- Logo -->

        <a class="navbar-brand" href="#" aria-label="Front">
          <img class="navbar-brand-logo" src="./assets/cricauctionlogo.svg" alt="Logo" data-hs-theme-appearance="default">
          <img class="navbar-brand-logo-mini" src="./assets/svg/logos/logo-short.svg" alt="Logo" data-hs-theme-appearance="default">
        </a>

        <!-- End Logo -->

        <!-- Navbar Vertical Toggle -->
       

        <!-- End Navbar Vertical Toggle -->

        
        <div class="navbar-vertical-content">
          <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav">

<?php


$result=mysqli_query($con,"select * from team_master where tournment_id=".$_SESSION["login_user"]."");
while($data=mysqli_fetch_row($result))
{
  $r=mysqli_query($con,"select * from tournment_master where id=".$_SESSION["login_user"]."");
  $d=mysqli_fetch_row($r);
  $maxpoint=$data[6]-(($d[4]-$data[7]-1)*$d[3]);
  echo '  <button type="button" onclick="teamfunc('.$data[0].',\''.$data[2].'\','.$maxpoint.')" class="btn btn-outline-primary" >'.$data[2].'</button>
  <h1> </h1>
  
';
}


?>

<script>
  function teamfunc(id,tname,maxpoint)
  {
      var team_name=document.getElementById("biding_team_name");
      team_name.value=tname;
      var team_id=document.getElementById("biding_team_id");
      team_id=id;
      var biding_points=document.getElementById("biding_max_point");
      biding_points.value=""+maxpoint;
     

  }

</script>
          <!-- Team Names -->
          


            
            </div>
            <!-- End Team Names -->
      </div>
    </div>
  </aside>

  <main id="content" role="main" class="main">
    <!-- Content -->
    <div class="content container-fluid">
    
      <!-- Stats -->
      <div class="row">
        
      <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">


        <!-- Card -->
        <div class="card">
          <div class="card-body">
          <span class="d-block "><h1>BID CONTROLES</h1></span>
          <form action="live.php" method="post">
            <div class="mb-3">
              <label class="form-label" for="exampleFormControlTitleInput2">BIDING TEAM</label>
              <input type="text" id="biding_team_name" class="form-control form-control-light" placeholder="selected team" disabled>
              <input type="text" hidden id="biding_team_id" class="form-control form-control-title" placeholder="selected team" disabled>
              <input type="text" hidden id="biding_player_id" class="form-control form-control-title" placeholder="selected team" disabled>
              
              <input type="text" hidden id="biding_max_point" value="0" class="form-control form-control-title" placeholder="selected team" disabled>
            </div>
            <div class="mb-3">
              <label class="form-label" for="exampleFormControlTitleInput2">BIDING POINTS</label>
              <input type="text" id="biding_team_points" value="50" class="form-control form-control-title" placeholder="points">
            </div>
            <div class="row">
              <div class="col-sm-6 col-lg-1 mb-3 mb-lg-5">
              <button type="button" onclick="decrementpoints()" class="btn btn-outline-primary">-</button>
              
              </div>        
              <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
              <button type="button"  onclick="incrementpoint()" class="btn btn-outline-primary">+</button>
              </div>        
            </div>
            <div class="row">
              <div class="col-sm-6 col-lg-6 mb-3 mb-lg-5">
              <button type="submit"  name="sold_btn" id="sold_btn" disabled="false" class="btn btn-outline-success">SOLD</button>
              </div>        
              <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
              <button type="submit" class="btn btn-outline-danger">UNSOLD</button>
              </div>        
            </div>

            <div class="mb-3">
                <label for="formControlLightFullName" class="form-label">SET BIDING INCREMENTOR</label>
                <input type="number" class="form-control form-control-light" id="biding_incrementor" placeholder="Incrementor" value="5" aria-label="Mark Williams">
              </div>
          </form>
          </div>
        </div>
        <!-- End Card -->
      </div>
   
<script>
function incrementpoint()
{
  var bidingteampoints=document.getElementById("biding_team_points");
  var ele=document.getElementById("biding_incrementor");
  let i=parseInt(ele.value);
  let num=parseInt(bidingteampoints.value);
  let bid=num+i;
  let maxpoint=parseInt(document.getElementById("biding_max_point").value);
  if(maxpoint<bid)
  {
      document.getElementById("sold_btn").disabled=true;
  }
  else
  {
    document.getElementById("sold_btn").disabled=false;
  }
  bidingteampoints.value=""+(bid);

}

function decrementpoints()
{
  var bidingteampoints=document.getElementById("biding_team_points");
  var ele=document.getElementById("biding_incrementor");
  let i=parseInt(ele.value);
  let num=parseInt(bidingteampoints.value);
  let bid=num-i;
  let maxpoint=parseInt(document.getElementById("biding_max_point").value);
  if(maxpoint<bid)
  {
      document.getElementById("sold_btn").disabled=true;
  }
  else
  {
    document.getElementById("sold_btn").disabled=false;
  }
  bidingteampoints.value=""+(bid);

}

</script>


      <div class="col-sm-6 col-lg-8 mb-3 mb-lg-5">

        <!-- Card -->
        <div class="card">
          <div class="card-body">
            <!-- Profile Cover -->
<div class="profile-cover">
  <div class="profile-cover-img-wrapper">
      <img class="profile-cover-img" src="./assets/img/1920x400/img1.jpg" alt="Image Description">
  </div>
</div>
<!-- End Profile Cover -->

              <!-- End Profile Cover -->
              <!-- Profile Header -->
              <div class="text-center mb-5">
              <!-- Avatar -->
              
              <!-- End Avatar -->
              <span class="avatar avatar-xxl avatar-4x3">
  <img class="avatar-img" src="./assets/player image.jpeg" alt="Image Description">
</span>
              </br></br>
              <h1>Aditya Patil</h1>
              <h2>Batsman</h2>  <!-- List -->
              <h2>+91 1111111111</h2>

              </div>
              <!-- End Profile Header -->


              <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_8edlac32.json"  background="transparent"  speed="1"  style="width: 500px; height: 500px;"   class="zi-1"   autoplay></lottie-player>




          </div>

        </div>
        <!-- End Card -->
        
      </div>


      </div>
      <!-- End Stats -->

    </div>
    <!-- End Content -->


    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>


    <!-- Footer -->

    <div class="footer">
      <div class="row justify-content-between align-items-center">
        <div class="col">
        
          <p class="fs-6 mb-0">&copy; CricAuction. <span class="d-none d-sm-inline-block">2023 Abstract Tech Solution.</span></p>
        </div>
        <!-- End Col -->

        <div class="col-auto">
          <div class="d-flex justify-content-end">
            <!-- List Separator -->
           
              <li class="list-inline-item">
               
            </ul>
            <!-- End List Separator -->
          </div>
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
  <script src="./assets/vendor/hs-quantity-counter/dist/hs-quantity-counter.min.js"></script>

  <script src="./assets/vendor/tom-select/dist/js/tom-select.complete.min.js"></script>
  <script src="./assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="./assets/vendor/clipboard/dist/clipboard.min.js"></script>
  <script src="./assets/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
  <script src="./assets/vendor/daterangepicker/moment.min.js"></script>
  <script src="./assets/vendor/daterangepicker/daterangepicker.js"></script>

  <!-- JS Front -->
  <script src="./assets/js/theme.min.js"></script>
  <script src="./assets/js/hs.theme-appearance-charts.js"></script>

  <!-- JS Plugins Init. -->
  <script>
    $(document).on('ready', function () {
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


        // INITIALIZATION OF SELECT
        // =======================================================
        HSCore.components.HSTomSelect.init('.js-select')


        // INITIALIZATION OF CLIPBOARD
        // =======================================================
        HSCore.components.HSClipboard.init('.js-clipboard')


        // INITIALIZATION OF CHARTJS
        // =======================================================
        HSCore.components.HSChartJS.init('.js-chart')
      }
    })()
  </script>
<script>
  (function() {
    // INITIALIZATION OF  QUANTITY COUNTER
    // =======================================================
    new HSQuantityCounter('.js-quantity-counter')
  })();
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