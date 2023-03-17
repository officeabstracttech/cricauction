<?php

include("header.php");

if(isset($_GET["addnewplayer"]))
{
  mysqli_query($con,"insert into player_mapping_master(player_id,tournment_id,enrolled_status,sold_status) values(".$_GET["addnewplayer"].",".$_SESSION["login_user"].",1,0);");
  echo "<script>window.location.href='startpage.php';</script>";
}
else if(isset($_GET["addplayer"]))
{
mysqli_query($con,"update player_mapping_master set tournment_id=".$_SESSION["login_user"].",enrolled_status=1, sold_status=0 where id=".$_GET["addplayer"]."");
echo "<script>window.location.href='startpage.php';</script>";
}
else if(isset($_GET["removeplayer"]))
{
  mysqli_query($con,"update player_mapping_master set tournment_id=".$_SESSION["login_user"].",enrolled_status=0 where id=".$_GET["removeplayer"]."");
  echo "<script>window.location.href='startpage.php';</script>";

}


if(isset($_GET["set"]))
{
  if($_GET["set"]==3 || $_GET["set"]==4)
  {
    mysqli_query($con,"update tournment_master set process=".$_GET["set"]." where id=".$_SESSION["login_user"]."");
    if($_GET["set"]==3)
    {
      echo "<script>window.location.href='startpage.php';</script>";
    }
    else if($_GET["set"]==4)
    {
      echo "<script>window.location.href='index.php';</script>";

    }
  }
}


if(isset($_POST["new_team_btn"]))
{
  if(!empty($_FILES["team_logo"]["name"])) { 
      // Get file info 
      $fileName = basename($_FILES["team_logo"]["name"]); 
      $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
       
      // Allow certain file formats 
      $allowTypes = array('jpg','png','jpeg','PNG'); 
      if(in_array($fileType, $allowTypes)){ 
          $image = $_FILES['team_logo']['tmp_name']; 
          $imgContent = addslashes(file_get_contents($image)); 
       
          // Insert image content into database 
          $result=mysqli_query($con,"select max_point from tournment_master where id=".$_SESSION["login_user"]."");
          $result=mysqli_fetch_row($result);
          $maxpoint=$result[0];
          $insert = mysqli_query($con,"insert into team_master(tournment_id,team_name,team_logo,team_points,players_taken,status,phone_no,pass) values(".$_SESSION["login_user"].",'".$_POST["team_name"]."','".$imgContent."',".$maxpoint.",0,1,'".$_POST["phone_no"]."','".$_POST["pass"]."')");
         
          if($insert){ 
            echo "<script>alert('Team added Successfully');window.location.href='startpage.php'; </script>";
         
          }else{ 
            echo "<script>alert('Logo not uploaded');window.location.href='startpage.php'; </script>";
      
          }  
      }else{ 
        echo "<script>alert('file type only png,jpeg,jpg is supported');window.location.href='startpage.php'; </script>";
 
      } 
  }else{ 
    echo "<script>alert('Please select the logo');window.location.href='startpage.php'; </script>";

  }   
}


if(isset($_POST["tournment_btn"]))
{
  if(!empty($_FILES["tournment_logo"]["name"])) { 
      // Get file info 
      $fileName = basename($_FILES["tournment_logo"]["name"]); 
      $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
       
      // Allow certain file formats 
      $allowTypes = array('jpg','png','jpeg','JPG','PNG','JPEG'); 
      if(in_array($fileType, $allowTypes)){ 
          $image = $_FILES['tournment_logo']['tmp_name']; 
          $imgContent = addslashes(file_get_contents($image)); 
       
          // Insert image content into database 
       
          $insert = mysqli_query($con,"update tournment_master set tournment_name='".$_POST["tournment_name"]."',max_point=".$_POST["max_point"].",base_point=".$_POST["base_point"].",max_player=".$_POST["max_player"].",tournment_logo='".$imgContent."',process=2 where id=".$_SESSION["login_user"]." ");
       
          if($insert){ 
            echo "<script>alert('Torunment added Successfully');window.location.href='startpage.php'; </script>";
         
          }else{ 
            echo "<script>alert('Logo not uploaded');window.location.href='startpage.php'; </script>";
          }  
      }else{ 
        echo "<script>alert('file type only png,jpeg,jpg is supported');window.location.href='startpage.php'; </script>";
 
      } 
  }else{ 
    echo "<script>alert('Please select the logo');window.location.href='startpage.php'; </script>";

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
                        Are you sure you want to procesed ?
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
                        Are you sure you want to procesed ?
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
  echo '
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
          
            ';
            
            $result=mysqli_query($con,"select * from player_master");
            while($data=mysqli_fetch_row($result))
            {
              echo '
              <tr>
              <td class="table-column-pe-0">
                
              </td>
              <td class="table-column-ps-0">
                <div class="ms-3">
                    <span class="d-block h5 text-inherit mb-0">'.$data[1].'</span>
                </div>  
              </td>
              <td>
                <span class="d-block h5 mb-0">'.$data[2].'</span>
                
              </td>
              <td>'.$data[6].'</td>
              <td>
              </td>
              <td>
              </td>
              <td></td>
              <td>
              ';
              $mappingpointer=mysqli_query($con,"select * from player_mapping_master where player_id=".$data[0]." and tournment_id=".$_SESSION["login_user"]."");
              if(mysqli_num_rows($mappingpointer)>0)
              {
                $mappingrow=mysqli_fetch_row($mappingpointer);
                if($mappingrow[6]==0){
                  
              echo  ' <a type="button" href="startpage.php?addplayer='.$mappingrow[0].'" class="btn btn-outline-success btn-sm">
              Add Player
           </a>';
                }
                else if($mappingrow[6]==1)
                {
              echo  ' <a type="button" href="startpage.php?removeplayer='.$mappingrow[0].'" class="btn btn-outline-danger btn-sm">
              Remove Player
           </a>'; 
                }
              }
              else
              {
                echo  ' <a type="button" href="startpage.php?addnewplayer='.$data[0].'" class="btn btn-outline-success btn-sm">
                Add Player
             </a>';
              }
              echo '  </td>
            </tr>
  
              ';
            }


            echo '

    
        
     
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
              <select id="datatableEntries" class="js-select form-select form-select-borderless w-auto" autocomplete="off" data-hs-tom-select-options=\'{
                        "searchInDropdown": false,
                        "hideSearch": true
                      }\'>
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
  <!-- End Card -->';

}

?>


   

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
