<?php ob_end_flush(); ?>
<?php mysqli_close($connection); ?>

    <?php include("../assets/blocks/footer_block.php"); ?>


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <script type="text/javascript">

    $("#birthday").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    $("#starting").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

    </script>

<script>
   $(function () {
     $('#newsTable').DataTable({
       "paging": true,
       "lengthChange": true,
       "searching": true,
       "ordering": false,
       "info": true,
       "autoWidth": false,
       "pageLength": 3,
       "lengthMenu": [[ 3, 10, 25, 50, 75, -1 ], [3, 10, 25, 50, 75, "All"]],
     });
   });
   
   $(function () {
     $('#proTable').DataTable({
       "paging": true,
       "lengthChange": true,
       "searching": true,
       "ordering": true,
       "info": true,
       "autoWidth": true,
       "pageLength": 5,
       responsive: true,
       "lengthMenu": [[ 5, 10, 25, 50, 75, -1 ], [5, 10, 25, 50, 75, "All"]],
     });
   });
   
   
   
</script>


</body>

</html>
