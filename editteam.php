<?php

include("header.php");

?>


      
</div>
</div>
<<<<<<< HEAD
    <!-- End Content -->

    <!-- Footer -->

    <div class="footer">
      <div class="row justify-content-between align-items-center">
        <div class="col">
          <p class="fs-6 mb-0">&copy;CricAuction <span class="d-none d-sm-inline-block"></span></p>
        </div>
        <!-- End Col -->

       
        <!-- End Col -->
      </div>
      <!-- End Row -->
    </div>

    <!-- End Footer -->
  </main>
=======
>>>>>>> 2cd56b84e209e41e5c84c19f835338b6ef63990b
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

<div>
</div>
<main id="content" role="main" class="main">
    <!-- Content -->
    <div class="content container-fluid">
      <!-- Page Header -->
      <div class="page-header">
        <div class="row align-items-end">
<div class="content container-fluid">
      <!-- Page Header -->
      <div class="page-header">
        <div class="row align-items-end">
            
                <div class="col-sm mb-2 mb-sm-0">
            
                <h1 class="page-header-title">Create Tournment</h1>
                </div>
          
                          
          <!-- End Col -->

          
          <!-- End Col -->
        </div>
        <!-- End Row -->
      </div>
      <!-- End Page Header -->
   <!-- Stats -->
   <div class="row">   
   <div class="col-sm-6 col-lg-6 mb-3 mb-lg-5">
       <!-- Card -->
       <div class="card h-100">
       <div class="tab-pane fade p-4 show active" id="nav-result14" role="tabpanel" aria-labelledby="nav-resultTab14">
         <div class="w-md-50">
             <form action="editteam.php" method="post" enctype="multipart/form-data" >
              <input hidden type="text" value="<?php echo $_GET['id'] ?>" name="id">
           <!-- Form -->
           <div class="mb-3">
             <label for="formControlLightFullName" class="form-label">Team Name</label>

             <input type="text" class="form-control form-control-light" id="formControlLightFullName" placeholder="Enter Team Name" name="team_name">
           </div>
           <!-- End Form -->

           <div class="mb-3">
             <label for="formControlLightFullName" class="form-label">Phone number</label>

             <input  type="text" class="form-control form-control-light" id="formControlLightFullName" placeholder="Enter phone Number" name="phone_no">
           </div>
           <!-- End Form -->
           
           <div class="mb-3">
             <label for="formControlLightFullName" class="form-label">Password </label>

             <input type="text" class="form-control form-control-light" id="formControlLightFullName" placeholder="Enter Password" name="pass">
           </div>
           <!-- End Form -->
         
           <
           <button type="submit" name="edt_btn" class="btn btn-success">change</button>
     </form>
         </div>
       </div>
    
     </div>
       <!-- End Card -->
     </div>

   </div>
   <!-- End Stats -->


            
    </div>

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
<?php
	if(isset($_POST['edt_btn']))
	{
	  mysqli_query($con,"update team_master set team_name='".$_POST["team_name"]."',phone_no='".$_POST["phone_no"]."',pass='".$_POST["pass"]."' where id=".$_POST["id"]."");
    echo "<script>window.location.href='startpage.php';</script>";
		//echo "update team_master set team_name='".$_POST["team_name"]."',phone_no='".$_POST["phone_no"]."',pass='".$_POST["pass"]."' where id=".$_POST["id"]."";
	}
?>