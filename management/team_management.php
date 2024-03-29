<?php

include("header.php");

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
          <!-- End Col -->

          <span ><h1>All Teams</h1></span>
          
          <!-- End Col -->
        </div>
        <!-- End Row -->
      </div>
      <!-- End Page Header -->

      <div class="row">
      <?php  
      $teamresult=mysqli_query($con,"select * from team_master where tournment_id=".$_SESSION["login_user"]."");
   
  $r=mysqli_query($con,"select * from tournment_master where id=".$_SESSION["login_user"]."");
  $d=mysqli_fetch_row($r);
      while($team=mysqli_fetch_row($teamresult))
      {
        $maxpoint=$team[6]-(($d[4]-$team[7]-1)*$d[3]);

        $playercounter=mysqli_query($con,"SELECT count(player_mapping_master.id) from player_mapping_master left join player_master on player_mapping_master.player_id=player_master.id where team_id=".$team[0]." and player_age>=37");
        $playercounter=mysqli_fetch_row($playercounter);
       echo '
       
      <div class="col-sm-6 col-lg-2 mb-3 mb-lg-5">
       <!-- Card -->
       <a class="card" data-bs-toggle="modal" data-bs-target="#TeamData'.$team[0].'" style="max-width: 20rem;">
         <img class="card-img-top" src="data:image/jpg;charset=utf8;base64,'.base64_encode($team[3]).'" alt="Card image cap">
         <div class="card-body">
           <h1 class="card-title">'.$team[2].'</h1>
          <h3>Remaining Points: <span style="font-size:24px;"> '.$team[6].'</span></h3>
          <h3>Player MaxPoints: <span style="font-size:24px;"> '.$maxpoint.'</span></h3>
          <h3>Players Taken : <span style="font-size:24px;">'.$team[7].'</span></h3>
          <h3>Players Taken +37 : <span style="font-size:24px;">'.$playercounter[0].'</span></h3>
         </div>
       </a>
      <!-- End Card -->
      </div>


      <!-- Modal -->
      <div class="modal fade" id="TeamData'.$team[0].'"  tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
      
            <div class="modal-header">
              <h5 class="modal-title h4" id="myExtraLargeModalLabel">'.$team[2].'</h5>
              
            <a href="report.php?report=3&team_id='.$team[0].'"> Team Report</a>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
            <!-- Card -->
            <div class="card ">
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
                      <th>Player DOB</th>
                      <th>Sold Points</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
          
                  <tbody>
                    
                      ';
                      
                      $result=mysqli_query($con,"
                      SELECT player_name,player_role,phone_no,player_dob,sold_points from player_master inner join player_mapping_master on player_master.id=player_mapping_master.player_id and player_mapping_master.team_id=".$team[0]."");
                      while($data=mysqli_fetch_row($result))
                      {
                        echo '
                        <tr>
                        <td class="table-column-pe-0">
                          
                        </td>
                        <td class="table-column-ps-0">
                          <div class="ms-3">
                              <span class="d-block h5 text-inherit mb-0">'.$data[0].'</span>
                          </div>  
                        </td>
                        <td>
                          <span class="d-block h5 mb-0">'.$data[1].'</span>
                          
                        </td>
                        <td>'.$data[2].'</td>
                        <td>'.$data[3].'</td>
                          <td>'.$data[4].'</td>
                          <td></td>
                          <td></td>
                          ';
                        
                        
                        echo ' </tr>';
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
            <!-- End Card -->


            </div>
          </div>
        </div>
      </div>
      <!-- End Modal -->







      ';  
      }
      
      ?>
     

      </div>





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
          <p class="fs-6 mb-0">&copy; Cricauction </p>
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
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <!-- JS Implementing Plugins -->
  <script src="../assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside.min.js"></script>
  <script src="../assets/vendor/hs-form-search/dist/hs-form-search.min.js"></script>

  <script src="../assets/vendor/hs-toggle-password/dist/js/hs-toggle-password.js"></script>
  <script src="../assets/vendor/hs-file-attach/dist/hs-file-attach.min.js"></script>
  <script src="../assets/vendor/hs-nav-scroller/dist/hs-nav-scroller.min.js"></script>
  <script src="../assets/vendor/hs-step-form/dist/hs-step-form.min.js"></script>
  <script src="../assets/vendor/hs-counter/dist/hs-counter.min.js"></script>
  <script src="../assets/vendor/appear/dist/appear.min.js"></script>
  <script src="../assets/vendor/imask/dist/imask.min.js"></script>
  <script src="../assets/vendor/tom-select/dist/js/tom-select.complete.min.js"></script>
  <script src="../assets/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
  <script src="../assets/vendor/datatables.net.extensions/select/select.min.js"></script>
  <script src="../assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="../assets/vendor/jszip/dist/jszip.min.js"></script>
  <script src="../assets/vendor/pdfmake/build/pdfmake.min.js"></script>
  <script src="../assets/vendor/pdfmake/build/vfs_fonts.js"></script>
  <script src="../assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="../assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="../assets/vendor/datatables.net-buttons/js/buttons.colVis.min.js"></script>

  <!-- JS Front -->
  <script src="../assets/js/theme.min.js"></script>

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
              <img class="mb-3" src="../assets/svg/illustrations/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="default">
              <img class="mb-3" src="../assets/svg/illustrations-light/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="dark">
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
