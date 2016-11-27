<?php ob_end_flush(); ?>
<?php mysqli_close($connection); ?>

<?php include("../assets/blocks/footer_block.php"); ?>

<script type="text/javascript">
   //Date range picker
    $('#reservation').daterangepicker();
    $("#birthday").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    $("#starting").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
   
   //Date range picker with time picker
   $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
   
   
   
   //Flat red color scheme for iCheck
   $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
     checkboxClass: 'icheckbox_flat-green',
     radioClass: 'iradio_flat-green'
   });
   
</script>
<script type="text/javascript">
   //Timepicker
   $(".timepicker").timepicker({
   showInputs: false
   });
   
   $('.select2').select2();
</script>
<!-- Tables -->


<script type="text/javascript">
   tinymce.init({
       selector: "#mytextarea"
   });
</script>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
</body>
</html>