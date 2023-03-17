<?php
include("config.php");

if(!isset($_SESSION["login_user"]))
{
  header("location:landing.php");
}
if(isset($_GET["back"]) && $_GET["back"]==1)
{
  $currentcounter=mysqli_query($con,"select current_player_count from auction_traker where tournment_id=".$_SESSION["login_user"]."");
  $currentcounter=mysqli_fetch_row($currentcounter);
  $currentcounter=$currentcounter[0]-1;
  if($currentcounter!=0)
  {

    mysqli_query($con,"update auction_traker set current_player_count=".$currentcounter." where tournment_id=".$_SESSION["login_user"]."");
  }
//  header("location:live.php");  
  
}
if(isset($_GET["edit"]) && $_GET["edit"]==1)
  {
  $editresult=mysqli_query($con,"select * from player_mapping_master where id=".$_GET["id"]."");
  $editresult=mysqli_fetch_row($editresult);
  if($editresult[4]==1)
  {
      $teamresult=mysqli_query($con,"select * from team_master where id=".$editresult[2]."");
      $teamresult=mysqli_fetch_row($teamresult);
      $updatedplayer=$teamresult[7]-1;
      $updatedpoints=$teamresult[6]+$editresult[5];
      mysqli_query($con,"update team_master set team_points=".$updatedpoints.", players_taken=".$updatedplayer." where id=".$teamresult[0]."");
    mysqli_query($con,"update player_mapping_master set sold_status=0,sold_points=0, team_id=0 where id=".$editresult[0]."");
 //   header("location:live.php");  
  
  }
  else if($editresult[4]==2)
  {
    mysqli_query($con,"update player_mapping_master set sold_status=0 where id=".$_GET["id"]."");
//    header("location:live.php");
  }

}

if(isset($_GET["next"]) && $_GET["next"]==1)
{
  $currentcounter=mysqli_query($con,"select current_player_count from auction_traker where tournment_id=".$_SESSION["login_user"]."");
  $currentcounter=mysqli_fetch_row($currentcounter);
  $currentcounter=$currentcounter[0]+1;
  mysqli_query($con,"update auction_traker set current_player_count=".$currentcounter." where tournment_id=".$_SESSION["login_user"]."");
//  header("location:live.php");
}


$soldflag=0;
if(isset($_POST["sold_btn"]))
{
  $maxplayer=mysqli_query($con,"select max_player from tournment_master where id=".$_SESSION["login_user"]."");
  $teamplayertaken=mysqli_query($con,"select players_taken from team_master where id=".$_POST["biding_team_id"]."");
  $maxplayer=mysqli_fetch_row($maxplayer);
  $teamplayertaken=mysqli_fetch_row($teamplayertaken);
  if($maxplayer[0]==$teamplayertaken[0])
  {
    echo "<script>alert('Alert.. Team has taken ".$maxplayer[0]." players. There Team is Ready.');</script>";
  }
  else
  {
mysqli_query($con,"update player_mapping_master set team_id=".$_POST["biding_team_id"].", sold_status=1,sold_points=".$_POST["biding_team_points"]." where player_id=".$_POST["biding_player_id"]." and tournment_id=".$_SESSION["login_user"]."");
$teamresult=mysqli_query($con,"select team_points,players_taken from team_master where id=".$_POST["biding_team_id"]."");
$teamdata=mysqli_fetch_row($teamresult);
$newteampoints=$teamdata[0]-$_POST["biding_team_points"];
$newplayertaken=$teamdata[1]+1;
mysqli_query($con,"update team_master set team_points=".$newteampoints.", players_taken=".$newplayertaken." where id=".$_POST["biding_team_id"]." and tournment_id=".$_SESSION["login_user"]."");
$soldflag=1;
  }
//header("location:live.php");
}
if(isset($_POST["unsold_btn"]))
{
 
mysqli_query($con,"update player_mapping_master set  sold_status=2, sold_points=0 where player_id=".$_POST["biding_player_id"]." and tournment_id=".$_SESSION["login_user"]."");
 $soldflag=2;
// header("location:live.php");
}


$result=mysqli_query($con,"select * from auction_traker where tournment_id=".$_SESSION["login_user"]."");
$counter=0;
$final=0;
if(mysqli_num_rows($result)>0){
      $auctiondata=mysqli_fetch_row($result);
      $counter=$auctiondata[3];
      if($auctiondata[2]==$counter)
      {
        $final=1;
      }
 }
 else
{
  $count=mysqli_query($con,"select count(id) from player_mapping_master where tournment_id=".$_SESSION["login_user"]." and enrolled_status=1");
  $count=mysqli_fetch_row($count);
  mysqli_query($con,"insert into auction_traker(tournment_id,total_player,current_player_count,process) values(".$_SESSION["login_user"].",".$count[0].",1,1)");
  $counter=1; 
  
}

$i=1;
$mappingresult=mysqli_query($con,"select * from player_mapping_master where tournment_id=".$_SESSION["login_user"]." and enrolled_status=1 ");
$mappingdata=0;
while($mappingdata=mysqli_fetch_row($mappingresult) )
{
  if($i==$counter)
  {
    break;
  }
  $i=$i+1;
}

if($mappingdata[4]==1)
{
  $soldflag=1;
}
else if($mappingdata[4]==2)
{
$soldflag=2;
}

$tournmentDetail=mysqli_query($con,"select * from tournment_master where id=".$_SESSION["login_user"]."");
$tournmentDetail=mysqli_fetch_row($tournmentDetail);

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
        <img class="navbar-brand-logo" src="./assets/cricauctionlogo.svg" alt="Logo" data-hs-theme-appearance="dark">
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


      <div class="navbar-nav-wrap-content-start">
        <!-- Navbar -->
        <ul class="navbar-nav">
          <li class="nav-item d-none d-sm-inline-block">
            
          </li>


        
        <li class="nav-item d-none d-sm-inline-block">
          <a class="btn btn-primary" href="live.php?back=1">Back</a>
          </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a class="btn btn-outline-warning" href="live.php?edit=1&id=<?php echo $mappingdata[0];?>">Edit</a>

          </li>
         
        <?php
        if($final==1)
        {
              echo '<li class="nav-item">
              <a class="btn btn-danger" href="index.php">End Auction</a>
                 </li>';
        }
        else
        {
          
          echo '<li class="nav-item">
          <a class="btn btn-primary" href="live.php?next=1">Next Player</a>
             </li>';
        }
        ?>

          
        </ul>
        <!-- End Navbar -->
      </div>
      
      <div class="navbar-nav-wrap-content-end">
        <!-- Navbar -->
        <ul class="navbar-nav">
          <li class="nav-item d-none d-sm-inline-block">
            
          </li>

          <li class="nav-item">
          <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" onClick="changeTheme()" aria-expanded="false" data-bs-dropdown-animation=""><i class="bi-brightness-high"></i></button> 
        </li>
         
        
      
        <li class="nav-item d-none d-sm-inline-block">
          <a class="btn btn-outline-success" href="index.php">Home</a>
          </li>
         
          <li class="nav-item d-none d-sm-inline-block">
          <a class="btn btn-outline-success" href="team_management.php">Summary</a>
          </li>
     
          
        </ul>
        <!-- End Navbar -->
      </div>
    </div>
  </header>

  <script>
  var Themeflag=1;   
function changeTheme()
{
if(Themeflag==1)
{

  HSThemeAppearance.setAppearance("dark")
  Themeflag=2;
}
else
{ 
  HSThemeAppearance.setAppearance("default")
  Themeflag=1;
}
}

    </script>

  <!-- ========== END HEADER ========== -->

  <!-- ========== MAIN CONTENT ========== -->
  <!-- Navbar Vertical -->

  <aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered bg-white  ">
    <div class="navbar-vertical-container">
      <div class="navbar-vertical-footer-offset">
        <!-- Logo -->

        <a class="navbar-brand" href="#" aria-label="Front">
          <img class="navbar-brand-logo" src="./assets/cricauctionlogo.svg" alt="Logo" data-hs-theme-appearance="default">
          <img class="navbar-brand-logo" src="./assets/cricauctionlogo.svg" alt="Logo" data-hs-theme-appearance="dark">
        </a>

        <!-- End Logo -->

        <!-- Navbar Vertical Toggle -->
       

        <!-- End Navbar Vertical Toggle -->

        
        <div class="navbar-vertical-content">
          <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav">

<?php


$resultteam=mysqli_query($con,"select * from team_master where tournment_id=".$_SESSION["login_user"]."");
while($temp=mysqli_fetch_row($resultteam))
{
  $r=mysqli_query($con,"select * from tournment_master where id=".$_SESSION["login_user"]."");
  $d=mysqli_fetch_row($r);
  $maxpoint=$temp[6]-(($d[4]-$temp[7]-1)*$d[3]);
  echo '  <button type="button" onclick="teamfunc('.$temp[0].',\''.$temp[2].'\','.$maxpoint.')" class="btn btn-outline-primary" >'.$temp[2].'</button>
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
      team_id.value=id;
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
     <?php
     if($soldflag==0)
     {
        echo '<div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
        <!-- Card -->
        <div class="card ">
          <div class="card-body">
          <span class="d-block "><h1>BID CONTROLES</h1></span>
          <form action="live.php" method="post" onsubmit="this.querySelectorAll(\'input\').forEach(i => i.disabled = false)">
            <div class="mb-3 ">
              <label class="form-label" for="exampleFormControlTitleInput2">BIDING TEAM</label>
              <input type="text" id="biding_team_name" name="biding_team_name" class="form-control form-control-light" placeholder="selected team" disabled>
              <input type="text" hidden id="biding_team_id" name="biding_team_id" class="form-control form-control-title" placeholder="selected team" disabled>
              <input type="text" hidden id="biding_player_id" name="biding_player_id" class="form-control form-control-title" placeholder="selected team" value="'.$mappingdata[1].'" disabled>
              
              <input type="text" hidden id="biding_max_point" value="0" class="form-control form-control-title" placeholder="selected team" disabled>
            </div>
            <div class="mb-3">
              <label class="form-label" for="exampleFormControlTitleInput2">BIDING POINTS</label>
              <input type="text" id="biding_team_points" name="biding_team_points" value="'.$tournmentDetail[3].'" disabled class="form-control form-control-title" placeholder="points">
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
              <button type="submit" name="unsold_btn" class="btn btn-outline-danger">UNSOLD</button>
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
   ';
     }
     
     ?>   
      
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

<?php
if($soldflag==0)
{
echo '    <div class="col-sm-6 col-lg-8 mb-3 mb-lg-5">
';
}
else
{
  
echo '    <div class="col-sm-6 col-lg-12 mb-3 mb-lg-5">
';
}
?>
  
        <!-- Card -->
        <div class="card p-3 mb-2 bg-soft-primary text-primary " style="background:url(./assets/gif/backgroundcricketfinal.jpg);  background-repeat: no-repeat, repeat; background-color: #cccccc;
  height: 800px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;">
          <div class="card-body ">
            <!-- Profile Cover -->
            <div class="profile-cover">
            </div>
            <!-- End Profile Cover -->

              <!-- End Profile Cover -->
              <!-- Profile Header -->
              <div class="text-center mb-5 p-3 mb-2 bg-soft-light ">
              <!-- Avatar -->
             <!-- Avatar -->
  <div class="avatar avatar-xxl avatar-circle profile-cover-avatar">
    <img class="avatar-img" src="./assets/gif/ball.gif" alt="Image Description">
    
  </div>
  <!-- End Avatar -->         
              <!-- End Avatar -->

              <div class="row">
                
              <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5"></div>
              
              <div class="col-sm-6 col-lg-8 mb-3 mb-lg-5">
              
              <?php
                    $playerdata=mysqli_query($con,"select * from player_master where id=".$mappingdata[1]."");
                    $playerdata=mysqli_fetch_row($playerdata);
                    ?>

              <!-- Card -->
                <div class="card mb-6" style="max-width: 540px;<?php if($soldflag>0){echo 'position:relative;';}?> ">
                      <?php
                      
                      if($soldflag==1)
                      {
                        echo '
                        <div style="position:absolute; top:-200px; "><img src="./assets/gif/congratsfinal.gif" style="background:transparent;"></img></div>
                        
                  <div style="position:absolute; left:400px; top:100px;  "><img src="./assets/gif/soldresized.gif" style="background:transparent;"></img></div>
                        ';
                      }
                      else if($soldflag==2)
                      {
                          echo '<div style="position:absolute; top:-10px; left:150px; "><img src="./assets/gif/sadfinal.gif" style="background:transparent;"></img></div>
                          ';
                      }


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

                      ?>
                  <div class="row no-gutters">
                    <div class="col-md-4">
                 
              <span class="avatar avatar-xxl avatar-4x3">
                <img class="avatar-img" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($playerdata[8]);?>" alt="player image">
              </span>
                    </div>
                    <div class="col-md-6">
                      <div class="card-body">
                        <h1 class="card-title">#<?php echo $playerdata[0];?></h1>
                        <h2>Name :<?php echo $playerdata[1];?></h2>
                        <h2>Role :<?php echo $playerdata[2];?></h2>
                        <h2>AGE    :<?php echo ageCalculator($playerdata[3]);?></h2>
                        <p class="card-text"><small class="text-muted">cricauction</small></p>
                        
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Card -->

              </div>

             </div>
              <!-- End Profile Header -->



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