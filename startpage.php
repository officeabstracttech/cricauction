<?php

include("header.php");

if(isset($_GET["set"]))
{
  if($_GET["set"]==3 || $_GET["set"]==4)
  {
    mysqli_query($con,"update tournment_master set process=".$_GET["set"]." where id=".$_SESSION["login_user"]."");
  }
}

if(isset($_POST["new_team_btn"]))
{
    $logotargetdir="upload/teamlogo/";
    $logofilepath = "";

        function createPathName($temp)
        {

            if(!file_exists($temp))
            {
                return false;
            }
            return true;
        }


        function checkImage()
        {
            $check=getimagesize($_FILES["team_logo"]["tmp_name"]);
            if($check !==false)
            {
                return true;
            }
            else{
                return false;    
            }
        }

  
        if(checkImage())
        {
            $filetype=strtolower(pathinfo($_FILES["team_logo"]["name"],PATHINFO_EXTENSION));
            $logofilepath=$logotargetdir."".$_POST["team_name"].".".$filetype;
            $i=1;
            while(createPathName($logofilepath))
            {
                $logofilepath=$logotargetdir.$_POST["team_name"].$i.".".$filetype;
                $i+=1;
            }

            if($filetype != "jpg" && $filetype != "png" && $filetype != "jpeg")
            {
                echo "<script>alert('file type only png, jpeg,jpg is supported');window.location.href='startpage.php'; </script>";
            }
            else
            {
                if(move_uploaded_file($_FILES["team_logo"]["tmp_name"],$logofilepath))
                {
                    $result=mysqli_query($con,"select max_point from tournment_master where id=".$_SESSION["login_user"]."");
                    $result=mysqli_fetch_row($result);
                    $maxpoint=$result[0];
                    mysqli_query($con,"insert into team_master(tournment_id,team_name,team_logo,team_points,players_taken,status,phone_no,pass) values(".$_SESSION["login_user"].",'".$_POST["team_name"]."','".$logofilepath."',".$maxpoint.",0,1,'".$_POST["phone_no"]."','".$_POST["pass"]."')");
                    echo "<script>alert('Team Added successfully'); window.location.href='startpage.php'</script>";
                    
                }
                else
                {
                    echo "<script>alert('not uploaded');</script>";
                }
            }

        }



}

if(isset($_POST["tournment_btn"]))
{
    
    $logotargetdir="upload/tournmentlogo/";
    $logofilepath = "";

        function createPathName($temp)
        {

            if(!file_exists($temp))
            {
                return false;
            }
            return true;
        }


        function checkImage()
        {
            $check=getimagesize($_FILES["tournment_logo"]["tmp_name"]);
            if($check !==false)
            {
                return true;
            }
            else{
                return false;    
            }
        }

  
        if(checkImage())
        {
            $filetype=strtolower(pathinfo($_FILES["tournment_logo"]["name"],PATHINFO_EXTENSION));
            $logofilepath=$logotargetdir."".$_POST["tournment_name"].".".$filetype;
            $i=1;
            while(createPathName($logofilepath))
            {
                $logofilepath=$logotargetdir.$_POST["tournment_name"].$i.".".$filetype;
                $i+=1;
            }

            if($filetype != "jpg" && $filetype != "png" && $filetype != "jpeg")
            {
                echo "<script>alert('file type only png, jpeg,jpg is supported');window.location.href='startpage.php'; </script>";
            }
            else
            {
                if(move_uploaded_file($_FILES["tournment_logo"]["tmp_name"],$logofilepath))
                {
                    mysqli_query($con,"update tournment_master set tournment_name='".$_POST["tournment_name"]."',max_point=".$_POST["max_point"].",base_point=".$_POST["base_point"].",max_player=".$_POST["max_player"].",tournment_logo='".$logofilepath."',process=2 where id=".$_SESSION["login_user"]." ");
                    echo "<script>alert('File uploaded successfully');window.location.href='startpage.php'</script>";
                    
                }
                else
                {
                    echo "<script>alert('file not uploaded');</script>";
                }
            }

        }




}



$result=mysqli_query($con,"select process from tournment_master where id=".$_SESSION["login_user"]."");
$process=mysqli_fetch_row($result);
$process=$process[0];



?>


<main id="content" role="main" class="main">
    <!-- Content -->
    <div class="content container-fluid">
      <!-- Page Header -->
      <div class="page-header">
        <div class="row align-items-end">
            <?php
            if($process==1)
            {
                echo '
                <div class="col-sm mb-2 mb-sm-0">
            
                <h1 class="page-header-title">Create Tournment</h1>
                </div>
          
                ';
            }
            else if($process==2)
            {
             echo '  <div class="col-sm mb-2 mb-sm-0">
          
                <h1 class="page-header-title">Adding Team</h1>
                </div>
          
                <div class="col-sm-auto">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Next Step
                </button>
                <!-- End Button trigger modal -->
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Alert</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Are you sure you want to processed ?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
                        <a  class="btn btn-primary" href="startpage.php?set=3">Yes</a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Modal -->
              </div>

                ';

            }
            else if($process==3)
            {
             echo '  <div class="col-sm mb-2 mb-sm-0">
          
                <h1 class="page-header-title">Adding Player</h1>
                </div>
          
                <div class="col-sm-auto">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Finish Setup
                </button>
                <!-- End Button trigger modal -->
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Alert</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Are you sure you want to processed ?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
                        <a  class="btn btn-primary" href="startpage.php?set=4">Yes</a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Modal -->
              </div>
                ';
            }
            ?>          
          <!-- End Col -->

          
          <!-- End Col -->
        </div>
        <!-- End Row -->
      </div>
      <!-- End Page Header -->
<?php

if($process==1)
{
   echo '   <!-- Stats -->
   <div class="row">   
   <div class="col-sm-6 col-lg-6 mb-3 mb-lg-5">
       <!-- Card -->
       <div class="card h-100">
       <div class="tab-pane fade p-4 show active" id="nav-result14" role="tabpanel" aria-labelledby="nav-resultTab14">
         <div class="w-md-50">
             <form action="startpage.php" method="post" enctype="multipart/form-data">
           <!-- Form -->
           <div class="mb-3">
             <label for="formControlLightFullName" class="form-label">Tournment Name</label>

             <input type="text" class="form-control form-control-light" id="formControlLightFullName" placeholder="Enter Tournment name" name="tournment_name">
           </div>
           <!-- End Form -->

           <div class="mb-3">
             <label for="formControlLightFullName" class="form-label">Max Points</label>

             <input type="text" class="form-control form-control-light" id="formControlLightFullName" placeholder="Enter Max Point" name="max_point">
           </div>
           <!-- End Form -->
           
           <div class="mb-3">
             <label for="formControlLightFullName" class="form-label">Base Points</label>

             <input type="text" class="form-control form-control-light" id="formControlLightFullName" placeholder="Enter Base Point" name="base_point">
           </div>
           <!-- End Form -->
         
           <div class="mb-3">
             <label for="formControlLightFullName" class="form-label">Max number of players</label>

             <input type="text" class="form-control form-control-light" id="formControlLightFullName" placeholder="Enter Player count" name="max_player">
           </div>
           <!-- End Form -->
            
             <input type="file" id="customFileEg1" name="tournment_logo" class="form-control">
             </br></br>
           <button type="submit" name="tournment_btn" class="btn btn-success">Create Tournment</button>
     </form>
         </div>
       </div>
    
     </div>
       <!-- End Card -->
     </div>

   </div>
   <!-- End Stats -->
';
}

?>


<?php
if($process==2)
{
echo '<!-- Card -->
<div class="card">
  <!-- Header -->
  <div class="card-header card-header-content-md-between">
   
      
    <div class="col-sm-auto">
      
      <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
  <i class="bi-person-plus-fill me-1"></i> Add Team
  </button>
  <!-- End Button trigger modal -->

    </div>
    </div>
  </div>
  <!-- End Header -->


  <!-- Modal -->
  <div id="exampleModalCenter" class="modal  fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Add Team</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="startpage.php" method="post" enctype="multipart/form-data">
      <div class="modal-body">
      <div class="mb-3">
      <label class="form-label" for="exampleFormControlInput1">Team Name</label>
      <input type="text" id="exampleFormControlInput1" name="team_name" required class="form-control" placeholder="Enter team name">
  </div>
      <div class="mb-3">
      <label class="form-label" for="exampleFormControlInput1">Team Phone no</label>
      <input type="text" id="exampleFormControlInput1" name="phone_no" required class="form-control" placeholder="Enter team leader phone no">
  </div>
      <div class="mb-3">
      <label class="form-label" for="exampleFormControlInput1">Team  Password</label>
      <input type="text" id="exampleFormControlInput1" name="pass" required class="form-control" placeholder="Enter team login password">
  </div>
  <div class="mb-3">
  <label class="form-label" for="exampleFormControlInput1">Team Logo</label>
          <input type="file" id="customFileEg1" name="team_logo" required class="form-control">
     </div> 
          </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="new_team_btn" class="btn btn-primary">Add Team</button>
      </div>
      </form>
      </div>
  </div>
  </div>
  <!-- End Modal -->



  <!-- Table -->
  <div class="table-responsive datatable-custom position-relative">
    <table id="datatable" class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table" data-hs-datatables-options=\'{
             "columnDefs": [{
                "targets": [0, 7],
                "orderable": false
              }],
             "order": [],
             "info": {
               "totalQty": "#datatableWithPaginationInfoTotalQty"
             },
             "search": "#datatableSearch",
             "entries": "#datatableEntries",
             "pageLength": 15,
             "isResponsive": false,
             "isShowPaging": false,
             "pagination": "datatablePagination"
           }\'>
      <thead class="thead-light">
        <tr>
          <th class="table-column-pe-0">
            
          </th>
          <th class="table-column-ps-0">Team Name</th>
          <th class="table-column-ps-0">Team Login Phone No</th>
          
         <th class="table-column-ps-0">Team Login Pass</th>
          <th>Action</th>
          <th></th>
        </tr>
      </thead>

      <tbody>
';

  $result=mysqli_query($con,"select * from team_master where tournment_id=".$_SESSION["login_user"]."");
  while($data=mysqli_fetch_row($result))
  {
      echo '  <tr>
    <td class="table-column-pe-0">
      <div class="form-check">
       </div>
    </td>
    <td>
    <span class="d-block h5 mb-0">'.$data[2].'</span>
    </td>
    <td>
    <span class="d-block h5 mb-0">'.$data[4].'</span>
    </td>
    <td>
    <span class="d-block h5 mb-0">'.$data[5].'</span>
    </td>
    <td>
      <a href="editteam.php?id='.$data[0].'" class="btn btn-danger btn-sm">
        <i class="bi-pencil-fill me-1"></i> Edit
      </a>
    </td>
  </tr>';
}
echo '

</tbody>
</table>
</div>
<!-- End Table -->

</div>
<!-- End Card -->


';

}
?>




<?php
if($process==3)
{
  
}

?>


   

      <!-- Card -->
      <div class="card">
        <!-- Header -->
        <div class="card-header card-header-content-md-between">
          <div class="mb-2 mb-md-0">
            <form>
              <!-- Search -->
              <div class="input-group input-group-merge input-group-flush">
                <div class="input-group-prepend input-group-text">
                  <i class="bi-search"></i>
                </div>
                <input id="datatableSearch" type="search" class="form-control" placeholder="Search users" aria-label="Search users">
              </div>
              <!-- End Search -->
            </form>
          </div>

        </div>
        <!-- End Header -->

        <!-- Table -->
        <div class="table-responsive datatable-custom position-relative">
          <table id="datatable" class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table" data-hs-datatables-options='{
                   "columnDefs": [{
                      "targets": [0, 7],
                      "orderable": false
                    }],
                   "order": [],
                   "info": {
                     "totalQty": "#datatableWithPaginationInfoTotalQty"
                   },
                   "search": "#datatableSearch",
                   "entries": "#datatableEntries",
                   "pageLength": 15,
                   "isResponsive": false,
                   "isShowPaging": false,
                   "pagination": "datatablePagination"
                 }'>
            <thead class="thead-light">
              <tr>
                <th class="table-column-pe-0">
                  
                </th>
                <th class="table-column-ps-0">Player Name</th>
                <th>Player Role</th>
                <th>Phone number</th>
                <th></th>
                <th></th>
                <th></th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td class="table-column-pe-0">
                  
                </td>
                <td class="table-column-ps-0">
                  <div class="ms-3">
                      <span class="d-block h5 text-inherit mb-0">Amanda Harvey </span>
                  </div>  
                </td>
                <td>
                  <span class="d-block h5 mb-0">Director</span>
                  
                </td>
                <td>United Kingdom</td>
                <td>
                </td>
                <td>
                </td>
                <td></td>
                <td>
                  <button type="button" class="btn btn-white btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal">
                     Add 
                  </button>
                </td>
              </tr>

              <tr>
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="usersDataCheck2">
                    <label class="form-check-label" for="usersDataCheck2"></label>
                  </div>
                </td>
                <td class="table-column-ps-0">
                  <a class="d-flex align-items-center" href="./user-profile.html">
                    <div class="avatar avatar-soft-primary avatar-circle">
                      <span class="avatar-initials">A</span>
                    </div>
                    <div class="ms-3">
                      <span class="d-block h5 text-inherit mb-0">Anne Richard</span>
                      <span class="d-block fs-5 text-body">anne@site.com</span>
                    </div>
                  </a>
                </td>
                <td>
                  <span class="d-block h5 mb-0">Seller</span>
                  <span class="d-block fs-5">Branding products</span>
                </td>
                <td>United States</td>
                <td>
                  <span class="legend-indicator bg-warning"></span>Pending
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="fs-5 me-2">24%</span>
                    <div class="progress table-progress">
                      <div class="progress-bar" role="progressbar" style="width: 24%" aria-valuenow="24" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </td>
                <td>Employee</td>
                <td>
                  <button type="button" class="btn btn-white btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal">
                    <i class="bi-pencil-fill me-1"></i> Edit
                  </button>
                </td>
              </tr>

              <tr>
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="usersDataCheck3">
                    <label class="form-check-label" for="usersDataCheck3"></label>
                  </div>
                </td>
                <td class="table-column-ps-0">
                  <a class="d-flex align-items-center" href="./user-profile.html">
                    <div class="avatar avatar-circle">
                      <img class="avatar-img" src="./assets/img/160x160/img3.jpg" alt="Image Description">
                    </div>
                    <div class="ms-3">
                      <span class="d-block h5 text-inherit mb-0">David Harrison</span>
                      <span class="d-block fs-5 text-body">david@site.com</span>
                    </div>
                  </a>
                </td>
                <td>
                  <span class="d-block h5 mb-0">Unknown</span>
                  <span class="d-block fs-5">Unknown</span>
                </td>
                <td>United States</td>
                <td>
                  <span class="legend-indicator bg-success"></span>Active
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="fs-5 me-2">100%</span>
                    <div class="progress table-progress">
                      <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </td>
                <td>Employee</td>
                <td>
                  <button type="button" class="btn btn-white btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal">
                    <i class="bi-pencil-fill me-1"></i> Edit
                  </button>
                </td>
              </tr>

              <tr>
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="usersDataCheck4">
                    <label class="form-check-label" for="usersDataCheck4"></label>
                  </div>
                </td>
                <td class="table-column-ps-0">
                  <a class="d-flex align-items-center" href="./user-profile.html">
                    <div class="avatar avatar-circle">
                      <img class="avatar-img" src="./assets/img/160x160/img5.jpg" alt="Image Description">
                    </div>
                    <div class="ms-3">
                      <span class="d-block h5 text-inherit mb-0">Finch Hoot</span>
                      <span class="d-block fs-5 text-body">finch@site.com</span>
                    </div>
                  </a>
                </td>
                <td>
                  <span class="d-block h5 mb-0">Designer</span>
                  <span class="d-block fs-5">IT department</span>
                </td>
                <td>Argentina</td>
                <td>
                  <span class="legend-indicator bg-danger"></span>Suspended
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="fs-5 me-2">50%</span>
                    <div class="progress table-progress">
                      <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </td>
                <td>Employee</td>
                <td>
                  <button type="button" class="btn btn-white btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal">
                    <i class="bi-pencil-fill me-1"></i> Edit
                  </button>
                </td>
              </tr>

              <tr>
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="usersDataCheck5">
                    <label class="form-check-label" for="usersDataCheck5"></label>
                  </div>
                </td>
                <td class="table-column-ps-0">
                  <a class="d-flex align-items-center" href="./user-profile.html">
                    <div class="avatar avatar-soft-dark avatar-circle">
                      <span class="avatar-initials">B</span>
                    </div>
                    <div class="ms-3">
                      <span class="d-block h5 text-inherit mb-0">Bob Dean</span>
                      <span class="d-block fs-5 text-body">bob@site.com</span>
                    </div>
                  </a>
                </td>
                <td>
                  <span class="d-block h5 mb-0">Executive director</span>
                  <span class="d-block fs-5">Marketing</span>
                </td>
                <td>Austria</td>
                <td>
                  <span class="legend-indicator bg-success"></span>Active
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="fs-5 me-2">5%</span>
                    <div class="progress table-progress">
                      <div class="progress-bar" role="progressbar" style="width: 5%" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </td>
                <td>Employee</td>
                <td>
                  <button type="button" class="btn btn-white btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal">
                    <i class="bi-pencil-fill me-1"></i> Edit
                  </button>
                </td>
              </tr>

              <tr>
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="usersDataCheck6">
                    <label class="form-check-label" for="usersDataCheck6"></label>
                  </div>
                </td>
                <td class="table-column-ps-0">
                  <a class="d-flex align-items-center" href="./user-profile.html">
                    <div class="avatar avatar-circle">
                      <img class="avatar-img" src="./assets/img/160x160/img9.jpg" alt="Image Description">
                    </div>
                    <div class="ms-3">
                      <span class="d-block h5 text-inherit mb-0">Ella Lauda <i class="bi-patch-check-fill text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></span>
                      <span class="d-block fs-5 text-body">ella@site.com</span>
                    </div>
                  </a>
                </td>
                <td>
                  <span class="d-block h5 mb-0">Co-founder</span>
                  <span class="d-block fs-5">All departments</span>
                </td>
                <td>United Kingdom</td>
                <td>
                  <span class="legend-indicator bg-success"></span>Active
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="fs-5 me-2">100%</span>
                    <div class="progress table-progress">
                      <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </td>
                <td>Owner</td>
                <td>
                  <button type="button" class="btn btn-white btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal">
                    <i class="bi-pencil-fill me-1"></i> Edit
                  </button>
                </td>
              </tr>

              <tr>
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="usersDataCheck7">
                    <label class="form-check-label" for="usersDataCheck7"></label>
                  </div>
                </td>
                <td class="table-column-ps-0">
                  <a class="d-flex align-items-center" href="./user-profile.html">
                    <div class="avatar avatar-soft-info avatar-circle">
                      <span class="avatar-initials">L</span>
                    </div>
                    <div class="ms-3">
                      <span class="d-block h5 text-inherit mb-0">Lori Hunter</span>
                      <span class="d-block fs-5 text-body">hunter@site.com</span>
                    </div>
                  </a>
                </td>
                <td>
                  <span class="d-block h5 mb-0">Developer</span>
                  <span class="d-block fs-5">Mobile app</span>
                </td>
                <td>Estonia</td>
                <td>
                  <span class="legend-indicator bg-success"></span>Active
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="fs-5 me-2">100%</span>
                    <div class="progress table-progress">
                      <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </td>
                <td>Employee</td>
                <td>
                  <button type="button" class="btn btn-white btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal">
                    <i class="bi-pencil-fill me-1"></i> Edit
                  </button>
                </td>
              </tr>

              <tr>
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="usersDataCheck16">
                    <label class="form-check-label" for="usersDataCheck16"></label>
                  </div>
                </td>
                <td class="table-column-ps-0">
                  <a class="d-flex align-items-center" href="./user-profile.html">
                    <div class="avatar avatar-soft-primary avatar-circle">
                      <span class="avatar-initials">M</span>
                    </div>
                    <div class="ms-3">
                      <span class="d-block h5 text-inherit mb-0">Mark Colbert</span>
                      <span class="d-block fs-5 text-body">mark@site.com</span>
                    </div>
                  </a>
                </td>
                <td>
                  <span class="d-block h5 mb-0">Executive director</span>
                  <span class="d-block fs-5">Human resources</span>
                </td>
                <td>Canada</td>
                <td>
                  <span class="legend-indicator bg-success"></span>Active
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="fs-5 me-2">90%</span>
                    <div class="progress table-progress">
                      <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </td>
                <td>Employee</td>
                <td>
                  <button type="button" class="btn btn-white btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal">
                    <i class="bi-pencil-fill me-1"></i> Edit
                  </button>
                </td>
              </tr>

              <tr>
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="usersDataCheck9">
                    <label class="form-check-label" for="usersDataCheck9"></label>
                  </div>
                </td>
                <td class="table-column-ps-0">
                  <a class="d-flex align-items-center" href="./user-profile.html">
                    <div class="avatar avatar-circle">
                      <img class="avatar-img" src="./assets/img/160x160/img6.jpg" alt="Image Description">
                    </div>
                    <div class="ms-3">
                      <span class="d-block h5 text-inherit mb-0">Costa Quinn</span>
                      <span class="d-block fs-5 text-body">costa@site.com</span>
                    </div>
                  </a>
                </td>
                <td>
                  <span class="d-block h5 mb-0">Co-founder</span>
                  <span class="d-block fs-5">All departments</span>
                </td>
                <td>France</td>
                <td>
                  <span class="legend-indicator bg-warning"></span>Pending
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="fs-5 me-2">83%</span>
                    <div class="progress table-progress">
                      <div class="progress-bar" role="progressbar" style="width: 83%" aria-valuenow="83" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </td>
                <td>Owner</td>
                <td>
                  <button type="button" class="btn btn-white btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal">
                    <i class="bi-pencil-fill me-1"></i> Edit
                  </button>
                </td>
              </tr>

              <tr>
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="usersDataCheck10">
                    <label class="form-check-label" for="usersDataCheck10"></label>
                  </div>
                </td>
                <td class="table-column-ps-0">
                  <a class="d-flex align-items-center" href="./user-profile.html">
                    <div class="avatar avatar-soft-danger avatar-circle">
                      <span class="avatar-initials">R</span>
                    </div>
                    <div class="ms-3">
                      <span class="d-block h5 text-inherit mb-0">Rachel Doe <i class="bi-patch-check-fill text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></span>
                      <span class="d-block fs-5 text-body">rachel@site.com</span>
                    </div>
                  </a>
                </td>
                <td>
                  <span class="d-block h5 mb-0">Accountant</span>
                  <span class="d-block fs-5">Finance</span>
                </td>
                <td>United States</td>
                <td>
                  <span class="legend-indicator bg-success"></span>Active
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="fs-5 me-2">30%</span>
                    <div class="progress table-progress">
                      <div class="progress-bar" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </td>
                <td>Employee</td>
                <td>
                  <button type="button" class="btn btn-white btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal">
                    <i class="bi-pencil-fill me-1"></i> Edit
                  </button>
                </td>
              </tr>

              <tr>
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="usersDataCheck11">
                    <label class="form-check-label" for="usersDataCheck11"></label>
                  </div>
                </td>
                <td class="table-column-ps-0">
                  <a class="d-flex align-items-center" href="./user-profile.html">
                    <div class="avatar avatar-circle">
                      <img class="avatar-img" src="./assets/img/160x160/img8.jpg" alt="Image Description">
                    </div>
                    <div class="ms-3">
                      <span class="d-block h5 text-inherit mb-0">Linda Bates</span>
                      <span class="d-block fs-5 text-body">linda@site.com</span>
                    </div>
                  </a>
                </td>
                <td>
                  <span class="d-block h5 mb-0">Unknown</span>
                  <span class="d-block fs-5">Unknown</span>
                </td>
                <td>United Kingdom</td>
                <td>
                  <span class="legend-indicator bg-danger"></span>Suspended
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="fs-5 me-2">0%</span>
                    <div class="progress table-progress">
                      <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </td>
                <td>Employee</td>
                <td>
                  <button type="button" class="btn btn-white btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal">
                    <i class="bi-pencil-fill me-1"></i> Edit
                  </button>
                </td>
              </tr>

              <tr>
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="usersDataCheck12">
                    <label class="form-check-label" for="usersDataCheck12"></label>
                  </div>
                </td>
                <td class="table-column-ps-0">
                  <a class="d-flex align-items-center" href="./user-profile.html">
                    <div class="avatar avatar-soft-info avatar-circle">
                      <span class="avatar-initials">B</span>
                    </div>
                    <div class="ms-3">
                      <span class="d-block h5 text-inherit mb-0">Brian Halligan</span>
                      <span class="d-block fs-5 text-body">brian@site.com</span>
                    </div>
                  </a>
                </td>
                <td>
                  <span class="d-block h5 mb-0">Director</span>
                  <span class="d-block fs-5">Accounting</span>
                </td>
                <td>France</td>
                <td>
                  <span class="legend-indicator bg-success"></span>Active
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="fs-5 me-2">71%</span>
                    <div class="progress table-progress">
                      <div class="progress-bar" role="progressbar" style="width: 71%" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </td>
                <td>Employee</td>
                <td>
                  <button type="button" class="btn btn-white btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal">
                    <i class="bi-pencil-fill me-1"></i> Edit
                  </button>
                </td>
              </tr>

              <tr>
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="usersDataCheck13">
                    <label class="form-check-label" for="usersDataCheck13"></label>
                  </div>
                </td>
                <td class="table-column-ps-0">
                  <a class="d-flex align-items-center" href="./user-profile.html">
                    <div class="avatar avatar-soft-dark avatar-circle">
                      <span class="avatar-initials">C</span>
                    </div>
                    <div class="ms-3">
                      <span class="d-block h5 text-inherit mb-0">Chris Mathew</span>
                      <span class="d-block fs-5 text-body">chris@site.com</span>
                    </div>
                  </a>
                </td>
                <td>
                  <span class="d-block h5 mb-0">Developer</span>
                  <span class="d-block fs-5">Mobile app</span>
                </td>
                <td>Switzerland</td>
                <td>
                  <span class="legend-indicator bg-warning"></span>Pending
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="fs-5 me-2">0%</span>
                    <div class="progress table-progress">
                      <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </td>
                <td>Employee</td>
                <td>
                  <button type="button" class="btn btn-white btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal">
                    <i class="bi-pencil-fill me-1"></i> Edit
                  </button>
                </td>
              </tr>

              <tr>
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="usersDataCheck14">
                    <label class="form-check-label" for="usersDataCheck14"></label>
                  </div>
                </td>
                <td class="table-column-ps-0">
                  <a class="d-flex align-items-center" href="./user-profile.html">
                    <div class="avatar avatar-circle">
                      <img class="avatar-img" src="./assets/img/160x160/img7.jpg" alt="Image Description">
                    </div>
                    <div class="ms-3">
                      <span class="d-block h5 text-inherit mb-0">Clarice Boone <i class="bi-patch-check-fill text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></span>
                      <span class="d-block fs-5 text-body">clarice@site.com</span>
                    </div>
                  </a>
                </td>
                <td>
                  <span class="d-block h5 mb-0">Seller</span>
                  <span class="d-block fs-5">Branding products</span>
                </td>
                <td>United Kingdom</td>
                <td>
                  <span class="legend-indicator bg-success"></span>Active
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="fs-5 me-2">37%</span>
                    <div class="progress table-progress">
                      <div class="progress-bar" role="progressbar" style="width: 37%" aria-valuenow="37" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </td>
                <td>Employee</td>
                <td>
                  <button type="button" class="btn btn-white btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal">
                    <i class="bi-pencil-fill me-1"></i> Edit
                  </button>
                </td>
              </tr>

              <tr>
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="usersDataCheck15">
                    <label class="form-check-label" for="usersDataCheck15"></label>
                  </div>
                </td>
                <td class="table-column-ps-0">
                  <a class="d-flex align-items-center" href="./user-profile.html">
                    <div class="avatar avatar-soft-dark avatar-circle">
                      <span class="avatar-initials">L</span>
                    </div>
                    <div class="ms-3">
                      <span class="d-block h5 text-inherit mb-0">Lewis Clarke</span>
                      <span class="d-block fs-5 text-body">lewis@site.com</span>
                    </div>
                  </a>
                </td>
                <td>
                  <span class="d-block h5 mb-0">Co-founder</span>
                  <span class="d-block fs-5">IT department</span>
                </td>
                <td>Switzerland</td>
                <td>
                  <span class="legend-indicator bg-warning"></span>Pending
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="fs-5 me-2">100%</span>
                    <div class="progress table-progress">
                      <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </td>
                <td>Owner</td>
                <td>
                  <button type="button" class="btn btn-white btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal">
                    <i class="bi-pencil-fill me-1"></i> Edit
                  </button>
                </td>
              </tr>

              <tr>
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="usersDataCheck8">
                    <label class="form-check-label" for="usersDataCheck8"></label>
                  </div>
                </td>
                <td class="table-column-ps-0">
                  <a class="d-flex align-items-center" href="./user-profile.html">
                    <div class="avatar avatar-circle">
                      <img class="avatar-img" src="./assets/img/160x160/img4.jpg" alt="Image Description">
                    </div>
                    <div class="ms-3">
                      <span class="d-block h5 text-inherit mb-0">Sam Kart</span>
                      <span class="d-block fs-5 text-body">sam@site.com</span>
                    </div>
                  </a>
                </td>
                <td>
                  <span class="d-block h5 mb-0">Designer</span>
                  <span class="d-block fs-5">Branding</span>
                </td>
                <td>Canada</td>
                <td>
                  <span class="legend-indicator bg-warning"></span>Pending
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="fs-5 me-2">7%</span>
                    <div class="progress table-progress">
                      <div class="progress-bar" role="progressbar" style="width: 7%" aria-valuenow="7" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </td>
                <td>Employee</td>
                <td>
                  <button type="button" class="btn btn-white btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal">
                    <i class="bi-pencil-fill me-1"></i> Edit
                  </button>
                </td>
              </tr>

              <tr>
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="usersDataCheck17">
                    <label class="form-check-label" for="usersDataCheck17"></label>
                  </div>
                </td>
                <td class="table-column-ps-0">
                  <a class="d-flex align-items-center" href="./user-profile.html">
                    <div class="avatar avatar-soft-danger avatar-circle">
                      <span class="avatar-initials">J</span>
                    </div>
                    <div class="ms-3">
                      <span class="d-block h5 text-inherit mb-0">Johnny Appleseed</span>
                      <span class="d-block fs-5 text-body">johnny@site.com</span>
                    </div>
                  </a>
                </td>
                <td>
                  <span class="d-block h5 mb-0">Accountant</span>
                  <span class="d-block fs-5">Human resources</span>
                </td>
                <td>United States</td>
                <td>
                  <span class="legend-indicator bg-success"></span>Active
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="fs-5 me-2">80%</span>
                    <div class="progress table-progress">
                      <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </td>
                <td>Employee</td>
                <td>
                  <button type="button" class="btn btn-white btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal">
                    <i class="bi-pencil-fill me-1"></i> Edit
                  </button>
                </td>
              </tr>

              <tr>
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="usersDataCheck18">
                    <label class="form-check-label" for="usersDataCheck18"></label>
                  </div>
                </td>
                <td class="table-column-ps-0">
                  <a class="d-flex align-items-center" href="./user-profile.html">
                    <div class="avatar avatar-soft-danger avatar-circle">
                      <span class="avatar-initials">P</span>
                    </div>
                    <div class="ms-3">
                      <span class="d-block h5 text-inherit mb-0">Phileas Fogg</span>
                      <span class="d-block fs-5 text-body">phileas@site.com</span>
                    </div>
                  </a>
                </td>
                <td>
                  <span class="d-block h5 mb-0">Designer</span>
                  <span class="d-block fs-5">Branding</span>
                </td>
                <td>Spain</td>
                <td>
                  <span class="legend-indicator bg-danger"></span>Suspended
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="fs-5 me-2">46%</span>
                    <div class="progress table-progress">
                      <div class="progress-bar" role="progressbar" style="width: 46%" aria-valuenow="46" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </td>
                <td>Employee</td>
                <td>
                  <button type="button" class="btn btn-white btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal">
                    <i class="bi-pencil-fill me-1"></i> Edit
                  </button>
                </td>
              </tr>

              <tr>
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="usersDataCheck19">
                    <label class="form-check-label" for="usersDataCheck19"></label>
                  </div>
                </td>
                <td class="table-column-ps-0">
                  <a class="d-flex align-items-center" href="./user-profile.html">
                    <div class="avatar avatar-circle">
                      <img class="avatar-img" src="./assets/img/160x160/img6.jpg" alt="Image Description">
                    </div>
                    <div class="ms-3">
                      <span class="d-block h5 text-inherit mb-0">Mark Williams <i class="bi-patch-check-fill text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></span>
                      <span class="d-block fs-5 text-body">mark@site.com</span>
                    </div>
                  </a>
                </td>
                <td>
                  <span class="d-block h5 mb-0">Co-founder</span>
                  <span class="d-block fs-5">Branding</span>
                </td>
                <td>United Kingdom</td>
                <td>
                  <span class="legend-indicator bg-success"></span>Active
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="fs-5 me-2">100%</span>
                    <div class="progress table-progress">
                      <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </td>
                <td>Owner</td>
                <td>
                  <button type="button" class="btn btn-white btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal">
                    <i class="bi-pencil-fill me-1"></i> Edit
                  </button>
                </td>
              </tr>

              <tr>
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="usersDataCheck20">
                    <label class="form-check-label" for="usersDataCheck20"></label>
                  </div>
                </td>
                <td class="table-column-ps-0">
                  <a class="d-flex align-items-center" href="./user-profile.html">
                    <div class="avatar avatar-soft-dark avatar-circle">
                      <span class="avatar-initials">T</span>
                    </div>
                    <div class="ms-3">
                      <span class="d-block h5 text-inherit mb-0">Timothy Silva</span>
                      <span class="d-block fs-5 text-body">timothy@site.com</span>
                    </div>
                  </a>
                </td>
                <td>
                  <span class="d-block h5 mb-0">Developer</span>
                  <span class="d-block fs-5">Mobile app</span>
                </td>
                <td>Italy</td>
                <td>
                  <span class="legend-indicator bg-warning"></span>Pending
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="fs-5 me-2">12%</span>
                    <div class="progress table-progress">
                      <div class="progress-bar" role="progressbar" style="width: 12%" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </td>
                <td>Employee</td>
                <td>
                  <button type="button" class="btn btn-white btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal">
                    <i class="bi-pencil-fill me-1"></i> Edit
                  </button>
                </td>
              </tr>

              <tr>
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="usersDataCheck21">
                    <label class="form-check-label" for="usersDataCheck21"></label>
                  </div>
                </td>
                <td class="table-column-ps-0">
                  <a class="d-flex align-items-center" href="./user-profile.html">
                    <div class="avatar avatar-soft-dark avatar-circle">
                      <span class="avatar-initials">G</span>
                    </div>
                    <div class="ms-3">
                      <span class="d-block h5 text-inherit mb-0">Gary Bishop <i class="bi-patch-check-fill text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></span>
                      <span class="d-block fs-5 text-body">gary@site.com</span>
                    </div>
                  </a>
                </td>
                <td>
                  <span class="d-block h5 mb-0">Developer</span>
                  <span class="d-block fs-5">Mobile app</span>
                </td>
                <td>Latvia</td>
                <td>
                  <span class="legend-indicator bg-success"></span>Active
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="fs-5 me-2">50%</span>
                    <div class="progress table-progress">
                      <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </td>
                <td>Employee</td>
                <td>
                  <button type="button" class="btn btn-white btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal">
                    <i class="bi-pencil-fill me-1"></i> Edit
                  </button>
                </td>
              </tr>

              <tr>
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="usersDataCheck22">
                    <label class="form-check-label" for="usersDataCheck22"></label>
                  </div>
                </td>
                <td class="table-column-ps-0">
                  <a class="d-flex align-items-center" href="./user-profile.html">
                    <div class="avatar avatar-soft-dark avatar-circle">
                      <span class="avatar-initials">Y</span>
                    </div>
                    <div class="ms-3">
                      <span class="d-block h5 text-inherit mb-0">Yorker Scogings</span>
                      <span class="d-block fs-5 text-body">yorker@site.com</span>
                    </div>
                  </a>
                </td>
                <td>
                  <span class="d-block h5 mb-0">Seller</span>
                  <span class="d-block fs-5">Branding products</span>
                </td>
                <td>Norway</td>
                <td>
                  <span class="legend-indicator bg-danger"></span>Suspended
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="fs-5 me-2">49%</span>
                    <div class="progress table-progress">
                      <div class="progress-bar" role="progressbar" style="width: 49%" aria-valuenow="49" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </td>
                <td>Employee</td>
                <td>
                  <button type="button" class="btn btn-white btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal">
                    <i class="bi-pencil-fill me-1"></i> Edit
                  </button>
                </td>
              </tr>

              <tr>
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="usersDataCheck23">
                    <label class="form-check-label" for="usersDataCheck23"></label>
                  </div>
                </td>
                <td class="table-column-ps-0">
                  <a class="d-flex align-items-center" href="./user-profile.html">
                    <div class="avatar avatar-soft-info avatar-circle">
                      <span class="avatar-initials">F</span>
                    </div>
                    <div class="ms-3">
                      <span class="d-block h5 text-inherit mb-0">Frank Phillips</span>
                      <span class="d-block fs-5 text-body">frank@site.com</span>
                    </div>
                  </a>
                </td>
                <td>
                  <span class="d-block h5 mb-0">Unknown</span>
                  <span class="d-block fs-5">Unknown</span>
                </td>
                <td>Norway</td>
                <td>
                  <span class="legend-indicator bg-danger"></span>Suspended
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="fs-5 me-2">3%</span>
                    <div class="progress table-progress">
                      <div class="progress-bar" role="progressbar" style="width: 3%" aria-valuenow="3" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </td>
                <td>Employee</td>
                <td>
                  <button type="button" class="btn btn-white btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal">
                    <i class="bi-pencil-fill me-1"></i> Edit
                  </button>
                </td>
              </tr>

              <tr>
                <td class="table-column-pe-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="usersDataCheck24">
                    <label class="form-check-label" for="usersDataCheck24"></label>
                  </div>
                </td>
                <td class="table-column-ps-0">
                  <a class="d-flex align-items-center" href="./user-profile.html">
                    <div class="avatar avatar-soft-primary avatar-circle">
                      <span class="avatar-initials">E</span>
                    </div>
                    <div class="ms-3">
                      <span class="d-block h5 text-inherit mb-0">Elizabeth Carter</span>
                      <span class="d-block fs-5 text-body">eliz@site.com</span>
                    </div>
                  </a>
                </td>
                <td>
                  <span class="d-block h5 mb-0">Unknown</span>
                  <span class="d-block fs-5">Unknown</span>
                </td>
                <td>United States</td>
                <td>
                  <span class="legend-indicator bg-warning"></span>Pending
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="fs-5 me-2">95%</span>
                    <div class="progress table-progress">
                      <div class="progress-bar" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </td>
                <td>Employee</td>
                <td>
                  <button type="button" class="btn btn-white btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal">
                    <i class="bi-pencil-fill me-1"></i> Edit
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- End Table -->

        <!-- Footer -->
        <div class="card-footer">
          <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
            <div class="col-sm mb-2 mb-sm-0">
              <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                <span class="me-2">Showing:</span>

                <!-- Select -->
                <div class="tom-select-custom">
                  <select id="datatableEntries" class="js-select form-select form-select-borderless w-auto" autocomplete="off" data-hs-tom-select-options='{
                            "searchInDropdown": false,
                            "hideSearch": true
                          }'>
                    <option value="10">10</option>
                    <option value="15" selected>15</option>
                    <option value="20">20</option>
                  </select>
                </div>
                <!-- End Select -->

                <span class="text-secondary me-2">of</span>

                <!-- Pagination Quantity -->
                <span id="datatableWithPaginationInfoTotalQty"></span>
              </div>
            </div>
            <!-- End Col -->

            <div class="col-sm-auto">
              <div class="d-flex justify-content-center justify-content-sm-end">
                <!-- Pagination -->
                <nav id="datatablePagination" aria-label="Activity pagination"></nav>
              </div>
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
        <!-- End Footer -->
      </div>
      <!-- End Card -->
    </div>
    <!-- End Content -->

    <!-- Footer -->

    <div class="footer">
      <div class="row justify-content-between align-items-center">
        <div class="col">
          <p class="fs-6 mb-0">&copy; Front. <span class="d-none d-sm-inline-block">2022 Htmlstream.</span></p>
        </div>
        <!-- End Col -->

        <div class="col-auto">
          <div class="d-flex justify-content-end">
            <!-- List Separator -->
            <ul class="list-inline list-separator">
              <li class="list-inline-item">
                <a class="list-separator-link" href="#">FAQ</a>
              </li>

              <li class="list-inline-item">
                <a class="list-separator-link" href="#">License</a>
              </li>

              <li class="list-inline-item">
                <!-- Keyboard Shortcuts Toggle -->
                <button class="btn btn-ghost-secondary btn btn-icon btn-ghost-secondary rounded-circle" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasKeyboardShortcuts" aria-controls="offcanvasKeyboardShortcuts">
                  <i class="bi-command"></i>
                </button>
                <!-- End Keyboard Shortcuts Toggle -->
              </li>
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

  <!-- ========== SECONDARY CONTENTS ========== -->
  
  <!-- ========== END SECONDARY CONTENTS ========== -->

  <!-- JS Global Compulsory  -->
  <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="./assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
  <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <!-- JS Implementing Plugins -->
  <script src="./assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside.min.js"></script>
  <script src="./assets/vendor/hs-form-search/dist/hs-form-search.min.js"></script>

  <script src="./assets/vendor/hs-toggle-password/dist/js/hs-toggle-password.js"></script>
  <script src="./assets/vendor/hs-file-attach/dist/hs-file-attach.min.js"></script>
  <script src="./assets/vendor/hs-nav-scroller/dist/hs-nav-scroller.min.js"></script>
  <script src="./assets/vendor/hs-step-form/dist/hs-step-form.min.js"></script>
  <script src="./assets/vendor/hs-counter/dist/hs-counter.min.js"></script>
  <script src="./assets/vendor/appear/dist/appear.min.js"></script>
  <script src="./assets/vendor/imask/dist/imask.min.js"></script>
  <script src="./assets/vendor/tom-select/dist/js/tom-select.complete.min.js"></script>
  <script src="./assets/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
  <script src="./assets/vendor/datatables.net.extensions/select/select.min.js"></script>
  <script src="./assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="./assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="./assets/vendor/jszip/dist/jszip.min.js"></script>
  <script src="./assets/vendor/pdfmake/build/pdfmake.min.js"></script>
  <script src="./assets/vendor/pdfmake/build/vfs_fonts.js"></script>
  <script src="./assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="./assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="./assets/vendor/datatables.net-buttons/js/buttons.colVis.min.js"></script>

  <!-- JS Front -->
  <script src="./assets/js/theme.min.js"></script>

  <!-- JS Plugins Init. -->
  <script>
    $(document).on('ready', function () {
      // INITIALIZATION OF DATATABLES
      // =======================================================
      HSCore.components.HSDatatables.init($('#datatable'), {
        dom: 'Bfrtip',
        buttons: [
          {
            extend: 'copy',
            className: 'd-none'
          },
          {
            extend: 'excel',
            className: 'd-none'
          },
          {
            extend: 'csv',
            className: 'd-none'
          },
          {
            extend: 'pdf',
            className: 'd-none'
          },
          {
            extend: 'print',
            className: 'd-none'
          },
        ],
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
      })

      const datatable = HSCore.components.HSDatatables.getItem(0)

      $('#export-copy').click(function() {
        datatable.button('.buttons-copy').trigger()
      });

      $('#export-excel').click(function() {
        datatable.button('.buttons-excel').trigger()
      });

      $('#export-csv').click(function() {
        datatable.button('.buttons-csv').trigger()
      });

      $('#export-pdf').click(function() {
        datatable.button('.buttons-pdf').trigger()
      });

      $('#export-print').click(function() {
        datatable.button('.buttons-print').trigger()
      });

      $('.js-datatable-filter').on('change', function() {
        var $this = $(this),
          elVal = $this.val(),
          targetColumnIndex = $this.data('target-column-index');

        if (elVal === 'null') elVal = ''

        datatable.column(targetColumnIndex).search(elVal).draw();
      });
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


        // INITIALIZATION OF INPUT MASK
        // =======================================================
        HSCore.components.HSMask.init('.js-input-mask')


        // INITIALIZATION OF NAV SCROLLER
        // =======================================================
        new HsNavScroller('.js-nav-scroller')


        // INITIALIZATION OF COUNTER
        // =======================================================
        new HSCounter('.js-counter')


        // INITIALIZATION OF TOGGLE PASSWORD
        // =======================================================
        new HSTogglePassword('.js-toggle-password')


        // INITIALIZATION OF FILE ATTACHMENT
        // =======================================================
        new HSFileAttach('.js-file-attach')
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