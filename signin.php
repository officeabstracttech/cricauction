<?php
        function ageCalculator($dob){
          if(!empty($dob)){
              $birthdate = new DateTime($dob);
              $today   = new DateTime('today');
              $age = $birthdate->diff($today)->y;
              return $age;
          }else{
              return 0;
          }
        }

if(isset($_POST["sub_btn"]))
{
  include("config.php");
  
  if($_POST["pass"]!=$_POST["confirm_pass"])
  {
      echo "<script>alert('Pass and Confirm password not matched.');</script>";
      header("location:signin.php");
  }
  if($_FILES["player_logo"]["error"] > 0)
  {
    echo "<script>alert('"Return Code: " . $_FILES["player_logo"]["error"] . ""');window.location.href='login.php'; </script>";
    
  } 
  if(!empty($_FILES["player_logo"]["name"])) {

    // Get file info 
    $fileName = basename($_FILES["player_logo"]["name"]); 
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
     
    // Allow certain file formats 
    $allowTypes = array('jpg','png','jpeg','JPG','PNG','JPEG'); 
    if(in_array($fileType, $allowTypes)){ 
        $image = $_FILES['player_logo']['tmp_name']; 
        $imgContent = addslashes(file_get_contents($image)); 
     
        

        // Insert image content into database 
        $insert = mysqli_query($con,"insert into player_master(player_name,player_role,player_dob,player_jersy_size,player_jersy_no,phone_no,pass,player_logo,status,player_age,tshirt_name,trouser_length) values('".$_POST['player_name']."','".$_POST['player_role']."','".$_POST['player_dob']."','".$_POST['player_jersy_size']."',".$_POST['player_jersy_no'].",'".$_POST['phone_no']."','cric@123','".$imgContent."','1',".ageCalculator($_POST["player_dob"]).",'".$_POST["t_shirt_name"]."',".$_POST["trouser_no"].")");

        if($insert){ 
          echo "<script>alert('Player registered Successfully');window.location.href='login.php'; </script>";
       
        }else{ 
          echo "<script>alert('Photo not uploaded');window.location.href='signin.php'; </script>";
        }  
    }else{ 
      echo "<script>alert('file type only png,jpeg,jpg is supported');window.location.href='signin.php'; </script>";

    } 
}else{ 
  echo "<script>alert('Please select the photo');window.location.href='signin.php'; </script>";

}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Title -->
  <title>Player Registration</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="./favicon.ico">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./assets/vendor/flatpickr/dist/flatpickr.min.css">

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="./assets/vendor/bootstrap-icons/font/bootstrap-icons.css">
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
<body>
  

  <script src="./assets/js/hs.theme-appearance.js"></script>

  <!-- ========== MAIN CONTENT ========== -->
  <main id="content" role="main" class="main">
    <div class="position-fixed top-0 end-0 start-0 bg-img-start" style="height: 32rem; background-image: url(./assets/svg/components/card-6.svg);">
      <!-- Shape -->
      <div class="shape shape-bottom zi-1">
        <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1921 273">
          <polygon fill="#fff" points="0,273 1921,273 1921,0 " />
        </svg>
      </div>
      <!-- End Shape -->
    </div>

    <!-- Content -->
    <div class="container py-5 py-sm-7">
      <a class="d-flex justify-content-center mb-5" href="./index.html">
        <img class="zi-2" src="./assets/svg/logos/logo.svg" alt="Image Description" style="width: 8rem;">
      </a>

      <div class="mx-auto" style="max-width: 30rem;">
        <!-- Card -->
        <div class="card card-lg mb-5">
          <div class="card-body">
            <!-- Form -->
              <div class="text-center">
                <div class="mb-5">
                  <h1 class="display-5">Create your account</h1>
                  <p>Already have an account? <a class="link" href="./login.php">Sign in here</a></p>
                </div>
               </div>
               <form action="signin.php" method="post" enctype="multipart/form-data">
                 <!-- Media -->
                 <div class="d-flex align-items-center">
                   <!-- Avatar -->
                   <label class="avatar avatar-xl avatar-circle" for="avatarUploader">
                     <img id="avatarImg" class="avatar-img" src="./assets/avatar.png" alt="Image Description">
                   </label>
                                    
                   <div class="d-flex gap-3 ms-4">
                     <div class="form-attachment-btn btn btn-sm btn-primary">Upload photo
                       <input type="file" required  name="player_logo">
                     </div>
                     <!-- End Avatar -->
                            
                   </div>
                 </div>
                 <!-- End Media -->
               
              <label class="form-label" for="fullNameSrEmail">Full name</label>

              <!-- Form -->
              <div class="row">
                <div class="col-sm-6">
                  <!-- Form -->
                  <div class="mb-4">
                    <input type="text" class="form-control form-control-lg" name="player_name" id="fullNameSrEmail"  placeholder=" " aria-label=" " required>
                    <span class="invalid-feedback">Please enter your first name.</span>
                  </div>
                  <!-- End Form -->
                </div>

      
              <!-- End Form -->
               <!-- Form Group -->
               <div class="form-group">
                
               <label for="projectDeadlineFlatpickrNewProjectLabel" class="input-label">Date of Birth</label>

                  <div id="projectDeadlineNewProjectFlatpickr" class="js-flatpickr flatpickr-custom input-group"
                         data-hs-flatpickr-options='{
                            "appendTo": "#projectDeadlineNewProjectFlatpickr",
                            "dateFormat": "Y-m-d",
                             "wrap": true
                               }'>
                 <div class="input-group-prepend input-group-text" data-bs-toggle>
                       <i class="bi-calendar-week"></i>
                           </div>
                          <h1> </h1>
                 <input type="text" class="flatpickr-custom-form-control form-control" id="projectDeadlineFlatpickrNewProjectLabel" placeholder="Select dates" data-input value="29/06/2020" name="player_dob">
                     </div>
                    </div>
              <!-- End Form Group -->


                 <!-- Select -->
              <div class="tom-select-custom">
                <h1> </h1>
                <h1> </h1>
                <h6>Specialization</h6>
                  <select class="js-select form-select" autocomplete="off"
                      data-hs-tom-select-options='{
                        "placeholder": "Select a Specialization...",
                        "hideSearch": true
                      }' name="player_role">
                    <option value="Not Specified">Select a Specialization...</option>
                    <option value="Batsman">Batsman</option>
                    <option value="Bowler">Bowler</option>
                    <option value="All-Rounder">All-Rounder</option>
                    <option value="Wicket-Keeper">Wicket-Keeper</option>
                  </select>
                </div>
                <!-- End Select -->

              <!-- Form -->
              <div class="mb-4">
                <h1> </h1>
                <label class="form-label" for="signupSrMob">Mobile Number</label>
                <input type="text" class="form-control form-control-lg" name="phone_no" id="signupSrEmail" placeholder="" aria-label="" required>
                <span class="invalid-feedback">Please enter a valid Mobile address.</span>
              </div>
              <!-- End Form -->




   <!-- Form -->
              <div class="mb-4">
                <h1> </h1>
                <label class="form-label" for="signupSrMob">T-shirt name</label>
                <input type="text" class="form-control form-control-lg" name="t_shirt_name" id="signupSrEmail" placeholder="" aria-label="" required>
                <span class="invalid-feedback">Please enter a valid Mobile address.</span>
              </div>
              <!-- End Form -->

   <!-- Form -->
              <div class="mb-4">
                <h1> </h1>
                <label class="form-label" for="signupSrMob">Trouser Number</label>
                <input type="text" class="form-control form-control-lg" name="trouser_no" id="signupSrEmail" placeholder="" aria-label="" required>
                <span class="invalid-feedback">Please enter a valid Mobile address.</span>
              </div>
              <!-- End Form -->




      
              <!-- Form -->
              <div class="mb-4">
                <label class="form-label" for="signupSrEmail">Jersy Number</label>
                <input type="text" class="form-control form-control-lg" name="player_jersy_no" id="signupSrjno" placeholder="" aria-label="" required>
                <span class="invalid-feedback"> </span>
              </div>
              <!-- End Form -->

                <!-- Select -->
                <div class="tom-select-custom">
                <h1> </h1>
                <h1> </h1>
                <h6>Jersy Size</h6>
                  <select class="js-select form-select" autocomplete="off"
                      data-hs-tom-select-options='{
                        "placeholder": "Select a Specialization...",
                        "hideSearch": true
                      }' name="player_jersy_size">
                    <option value="Not Specified">Select a Size...</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                    <option value="XXXL">XXXL</option>
                  </select>
                </div>
                <!-- End Select -->
               
              <!-- Form -->
              <div class="mb-4">
                <label class="form-label" for="signupSrPassword">Password</label>

                <div class="input-group input-group-merge" data-hs-validation-validate-class>
                  <input type="password" class="js-toggle-password form-control form-control-lg" name="pass" id="signupSrPassword" placeholder="8+ characters required" aria-label="8+ characters required"  minlength="8" data-hs-toggle-password-options='{
                           "target": [".js-toggle-password-target-1", ".js-toggle-password-target-2"],
                           "defaultClass": "bi-eye-slash",
                           "showClass": "bi-eye",
                           "classChangeTarget": ".js-toggle-password-show-icon-1"
                         }'>
                  <a class="js-toggle-password-target-1 input-group-append input-group-text" href="javascript:;">
                    <i class="js-toggle-password-show-icon-1 bi-eye"></i>
                  </a>
                </div>

                <span class="invalid-feedback">Your password is invalid. Please try again.</span>
              </div>
              <!-- End Form -->

              <!-- Form -->
              <div class="mb-4">
                <label class="form-label" for="signupSrConfirmPassword">Confirm password</label>

                <div class="input-group input-group-merge" data-hs-validation-validate-class>
                  <input type="password" class="js-toggle-password form-control form-control-lg" name="confirm_pass" id="signupSrConfirmPassword" placeholder="8+ characters required" aria-label="8+ characters required"  minlength="8" data-hs-toggle-password-options='{
                           "target": [".js-toggle-password-target-1", ".js-toggle-password-target-2"],
                           "defaultClass": "bi-eye-slash",
                           "showClass": "bi-eye",
                           "classChangeTarget": ".js-toggle-password-show-icon-2"
                         }'>
                  <a class="js-toggle-password-target-2 input-group-append input-group-text" href="javascript:;">
                    <i class="js-toggle-password-show-icon-2 bi-eye"></i>
                  </a>
                </div>

                <span class="invalid-feedback">Password does not match the confirm password.</span>
              </div>
              <!-- End Form -->


              <!-- Form Check -->
              <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" value="" id="termsCheckbox">
                <label class="form-check-label" for="termsCheckbox">
                  I accept the <a>Terms and Conditions</a>
                </label>
                <span class="invalid-feedback">Please accept our Terms and Conditions.</span>
              </div>
              <!-- End Form Check -->

              <div class="d-grid gap-2">
                <button type="submit" name="sub_btn" class="btn btn-primary btn-lg">Create an account</button>         
              </div>
            </form>
            <!-- End Form -->
          </div>
        </div>
        <!-- End Card -->

        <!-- Footer -->
        <div class="position-relative text-center zi-1">
          <small class="text-cap text-body mb-4">World's Best Auction Software</small>

          
        </div>
        <!-- End Footer -->
      </div>
    </div>
    <!-- End Content -->
  </main>
  <!-- ========== END MAIN CONTENT ========== -->

  <!-- JS Global Compulsory  -->
  <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="./assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
  <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <!-- JS Implementing Plugins -->
  <script src="./assets/vendor/hs-toggle-password/dist/js/hs-toggle-password.js"></script>
  <script src="./assets/vendor/flatpickr/dist/flatpickr.min.js"></script>
  <script src="./assets/vendor/flatpickr/dist/flatpickr.min.js"></script>
  <script src="./assets/vendor/tom-select/dist/js/tom-select.complete.min.js"></script>
  <script src="./assets/vendor/hs-file-attach/dist/hs-file-attach.min.js"></script>

  <!-- JS Front -->
  <script src="./assets/js/theme.min.js"></script>

  <!-- JS Plugins Init. -->
  <script>
  (function() {
    // INITIALIZATION OF FILE ATTACH
    // =======================================================
    new HSFileAttach('.js-file-attach')
  })();
</script>
  <script>
  (function() {
    // INITIALIZATION OF SELECT
    // =======================================================
    HSCore.components.HSTomSelect.init('.js-select')
  })();
</script>
  <script>
  (function() {
    // INITIALIZATION OF FLATPICKR
    // =======================================================
    HSCore.components.HSFlatpickr.init('.js-flatpickr')
  })();
</script>
  <script>
    (function() {
      window.onload = function () {
        // INITIALIZATION OF BOOTSTRAP VALIDATION
        // =======================================================


        // INITIALIZATION OF TOGGLE PASSWORD
        // =======================================================
        new HSTogglePassword('.js-toggle-password')
      }
    })()
  </script>
</body>
</html>
