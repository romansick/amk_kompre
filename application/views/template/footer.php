 <footer class="footer">
   <div class="container-fluid">
     <div class="row">
       <div class="col-sm-6">
         <script>
           document.write(new Date().getFullYear())
         </script> © 2021.
       </div>
       <div class="col-sm-6">
         <div class="text-sm-right d-none d-sm-block">
           PT. Ardhana Mitra Kencana
         </div>
       </div>
     </div>
   </div>
 </footer>
 </div>
 <!-- end main content-->

 </div>
 <!-- END layout-wrapper -->
 <!-- Right bar overlay-->
 <div class="rightbar-overlay"></div>

 <!-- JAVASCRIPT -->
 <script src="<?= base_url('assets\libs\jquery\jquery.min.js'); ?>"></script>

 <script src="<?= base_url('assets\libs\bootstrap\js\bootstrap.bundle.min.js'); ?>"></script>
 <script src="<?= base_url('assets\libs\metismenu\metisMenu.min.js'); ?>"></script>
 <script src="<?= base_url('assets\libs\simplebar\simplebar.min.js'); ?>"></script>
 <script src="<?= base_url('assets\libs\node-waves\waves.min.js'); ?>"></script>
 <!-- bs custom file input plugin -->
 <script src="<?= base_url('assets\libs\bs-custom-file-input\bs-custom-file-input.min.js'); ?>"></script>

 <script src="<?= base_url('assets\libs\jquery.easing\jquery.easing.min.js'); ?>"></script>

 <!-- Required datatable js -->
 <script src="<?= base_url('assets\libs\datatables.net\js\jquery.dataTables.min.js'); ?>"></script>
 <script src="<?= base_url('assets\libs\datatables.net-bs4\js\dataTables.bootstrap4.min.js'); ?>"></script>
 <!-- Buttons examples -->
 <script src="<?= base_url('assets\libs\datatables.net-buttons\js\dataTables.buttons.min.js'); ?>"></script>
 <script src="<?= base_url('assets\libs\datatables.net-buttons-bs4\js\buttons.bootstrap4.min.js'); ?>"></script>
 <script src="<?= base_url('assets\libs\jszip\jszip.min.js'); ?>"></script>
 <script src="<?= base_url('assets\libs\pdfmake\build\pdfmake.min.js'); ?>"></script>
 <script src="<?= base_url('assets\libs\pdfmake\build\vfs_fonts.js'); ?>"></script>
 <script src="<?= base_url('assets\libs\datatables.net-buttons\js\buttons.html5.min.js'); ?>"></script>
 <script src="<?= base_url('assets\libs\datatables.net-buttons\js\buttons.print.min.js'); ?>"></script>
 <script src="<?= base_url('assets\libs\datatables.net-buttons\js\buttons.colVis.min.js'); ?>"></script>

 <!-- Responsive examples -->
 <script src="<?= base_url('assets\libs\datatables.net-responsive\js\dataTables.responsive.min.js'); ?>"></script>
 <script src="<?= base_url('assets\libs\datatables.net-responsive-bs4\js\responsive.bootstrap4.min.js'); ?>"></script>

 <!-- Datatable init js -->
 <script src="<?= base_url('assets\js\pages\datatables.init.js'); ?>"></script>


 <!-- Bootrstrap touchspin -->
 <script src="<?= base_url('assets\libs\bootstrap-touchspin\jquery.bootstrap-touchspin.min.js'); ?>"></script>

 <script src="<?= base_url('assets\js\pages\ecommerce-cart.init.js'); ?>"></script>

 <!-- Saas dashboard init -->
 <script src="<?= base_url('assets\js\pages\saas-dashboard.init.js'); ?>"></script>
 <script src="<?= base_url('assets\js\app.js'); ?>"></script>
 <script type="text/javascript">
   window.setTimeout(function() {
     $("#alert").fadeTo(500, 0).slideUp(500, function() {
       $(this).remove();
     });
   }, 4000);
   $(function() {
     "use strict";

     $(".popup img").click(function() {
       var $src = $(this).attr("src");
       $(".show").fadeIn();
       $(".img-show img").attr("src", $src);
     });

     $("span, .overlay").click(function() {
       $(".show").fadeOut();
     });

   });
 </script>

 </body>

 </html>