<?php ob_end_flush(); ?>
<?php mysqli_close($connection); ?>

    

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include("../assets/blocks/footer_block.php"); ?>

    
  
  <script type="text/javascript">
  
    $('#currentDate').datepicker({
      todayBtn: "linked",
    daysOfWeekDisabled: "5,6",
    todayHighlight: true, 
    autoclose: true
  });


    $('#updateAttendance').datepicker({
      todayBtn: "linked",
    daysOfWeekDisabled: "5,6",
    todayHighlight: true, 
    autoclose: true
  });

</script>

    <script type="text/javascript">







    $("#startingProfessor").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });


        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });

    </script>


    <script type="text/javascript">




$('#select_all').on('ifChecked ifUnchecked', function(event) {
if (event.type == 'ifChecked') {
$('.checkbox').iCheck('check');
} else {
$('.checkbox').iCheck('uncheck');
}
});

$('.checkbox').on('ifChanged', function(event){
if($('.checkbox').filter(':checked').length == $('.checkbox').length) {
$('#select_all').prop('checked', 'checked');
} else {
//$('#select_all').remove('check');
//$('#select_all').iCheck('uncheck')
}
$('#select_all').iCheck('update');
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
     $('#recentClasses').DataTable({
       "paging": true,
       "lengthChange": true,
       "searching": true,
       "ordering": true,
       "info": true,
       "autoWidth": false,
       "pageLength": 5,
       "lengthMenu": [[ 5, 10, 25, 50, 75, -1 ], [5, 10, 25, 50, 75, "All"]],
     });
   });
   
   $(function () {
     $('#pastSemesters').DataTable({
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
   
   
   $(function () {
     $('#studentListTable').DataTable({
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
