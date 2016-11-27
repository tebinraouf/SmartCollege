<?php ob_end_flush(); ?>
<?php mysqli_close($connection); ?>

    <?php include("../assets/blocks/footer_block.php"); ?>
    


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    
    <script src="../assets/plugins/colorpick/tinycolor-0.9.15.min.js"></script>
    <script src="../assets/plugins/colorpick/pick-a-color-1.2.3.min.js"></script>
<script>
   
  
   $(function () {
     $('#allUsersTable').DataTable({
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
