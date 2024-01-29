<!DOCTYPE html>
<html>
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php include('assets/include/header.php'); ?>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
 <?php include('assets/include/navigation.php'); ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Team Assign List</h1>
        </section>

        <!-- Main content -->
          <section class="content">
               <form class="add-ca-in" method="post"  action="" id="submitForm">
            <div class="box">
                 <div id="pdf" class="box-header" style="border-bottom:none;">
                  <button type="button" class="btn btn-primary" onclick="generateCSV()">Generate CSV</button>
                  <button type="button" class="btn btn-primary" onclick="generatePDF()">Generate PDF</button>
                </div>
                <div class="box-header" style="border-bottom:none;">
                    <div class="col-md-2">
                    <label>Job Number</label>
                  <select name="job" id="job" class="form-control selectpicker" data-live-search="true" >
                   <option value="">Select Job Number</option>
                    <?php foreach($job as $obj){ ?>
                        
                        <option value=<?php echo $obj['id']; ?>><?php echo $obj['job_number'];?></option>
                    <?php } ?>
                  </select>
                </div>  <div class="col-md-2">
                    <label>Team</label>
                  <select name="team" id="team" class="form-control selectpicker" data-live-search="true" >
                   <option value="">Select Team</option>
                    <?php foreach($team as $obj){ ?>
                        
                        <option value=<?php echo $obj['id']; ?>><?php echo $obj['name'];?></option>
                    <?php } ?>
                  </select>
                </div> <div class="col-md-2">
    <label>Status</label>
    <select name="history_status" id="history_status" class="form-control">
        <option value="">Select Status</option>
        <option value="0">Pending</option>
        <option value="1">Approve</option>
        <!-- Add more status options as needed -->
    </select>
</div>      <div class="col-md-2">
    <label>From Date</label>
    <input type="date" name="history_date" id="history_date" class="form-control">
</div>
<div class="col-md-2">
    <label>To Date</label>
    <input type="date" name="to_date" id="to_date" class="form-control">
</div>
          
                  
                </div> </form>
                <div class="box-body">
              <table width="100%" class="table table-striped table-bordered table-hover" id="table">
                                    <thead>
                                        <tr>
                                            <th>#Serial</th>
                                            <th>Job Number</th>
                                           
                                            <th>Date</th>
                                            <th>Team Name</th>
                                             <th>Description</th>
                                               <th>Status</th>
                                               
                                            <!--<th>Activate/Deactivate</th>-->
                                            <!--<th>Action</th>-->
                                        </tr>
                                    </thead>
                                </table>
                 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
               
          </section>
<!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer clearfix">
        <div class="pull-right">
         <strong>Copyright &copy; 2022 <a target="_blank" href="#">Onlister</a></strong>.  All Rights Reserved.
        </div>
      </footer>

      <!-- Control Sidebar -->
     
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
    <!-- jQuery 2.1.4 -->
     <!-- DataTables JavaScript -->


       <!-- VIEW MODAL BODY -->
<!--     <div class="modal fade view-modal" id="view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
              <div class="project-view"></div>
            </div>
        </div>
    </div> -->

     <!-- DELETE MODAL BODY -->
     <div class="modal fade del-modal" id="delModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                  <div class="pro-dele"></div>
            </div>
        </div>
    </div>
    <!--confirm project delete-->
    <div class="modal fade sucs-modal" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                    <h4 class="modal-title" >Deleted successfully !</h4>
                    <button type="button" class="btn confirm-btn" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!--confirm project edit-->
    <div class="modal fade sucs-modal" id="update_confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                    <h4 class="modal-title" >updated successfully !</h4>
                    <button type="button" class="btn confirm-btn" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!--confirm project add-->
      <div class="modal fade sucs-modal" id="add_confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                    <h4 class="modal-title" >Added successfully !</h4>
                    <button type="button" class="btn confirm-btn" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

         <div class="modal fade sucs-modal" id="exist_confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              
                <div class="alert alert-danger">
                  <a href="#" data-dismiss="alert" class="close" aria-label="close" title="close">×</a>
                   <strong>Duplicate !!</strong> Sorry... This module you already added ..You can only Edit this item..
                </div>
        
            </div>
        </div>
    </div>


    <div class="modal fade batch-modal" id="sub-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
               <div class="sub"></div>
            </div>
        </div>
    </div>      

    <div class="modal fade batch-modal" id="std-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
               <div class="std"></div>
            </div>
        </div>
    </div> 

     <?php include('assets/include/footer.php'); ?>
    

     <script>



    // $(document).ready(function () {//delete_casestudy modal when edit button click
    //     $('#delModal').on('show.bs.modal', function (e) 
    //     {
    //         var rowid = $(e.relatedTarget).data('id');
    //       // var name = $(e.relatedTarget).data('name');
    //       // var cropname = $(e.relatedTarget).data('cropname');
    //         $.ajax({
    //             type: 'post',
    //             url: '<?= CUSTOM_BASE_URL . 'Institutes/Test_series_group/delete' ?>', //Here you will fetch records 
    //             data: 'rowid=' + rowid , //Pass $id
    //             //data: 'rowid=' + rowid + '&name=' + name + '&cropname=' + cropname, //Pass $id
    //             success: function (data) {
    //              $('.pro-dele').html(data);//Show fetched data from database
    //             }
    //         });
    //     });
    // });

    </script>
  </body>
</html>



     <script>


    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
        
    });
    </script>


<script type="text/javascript">
function generatePDF() {
    const form = document.getElementById('submitForm');
    form.action = '<?php echo site_url('Team/generate_pdf'); ?>';
    form.submit();
}
function generateCSV() {
    const form = document.getElementById('submitForm');
    form.action = '<?php echo site_url('Team/generate_excel'); ?>';
    form.submit();
}
    var table;
   
    $(document).ready(function() {
        //datatables id
            fill_datatable();    
          function fill_datatable(job_id='', date='', status='',todate='',teamid='') {
              
        table = $('#table').DataTable({ 
            "processing": true, 
            "serverSide": true, 
            "stateSave": true,
            "order": [], 
        "ajax": {
        "url": '<?php echo site_url('Team/list'); ?>',
        "type": "POST",
         "data":{job_id: job_id,
                    date: date,
                    status: status,todate:todate,teamid:teamid,},
        },
        });
        
    }
    
     $("#job").on("change",function(){
        $('#table').DataTable().destroy(); 
        var job_id = $(this).val();
        var date = $("#history_date").val();
        var status = $("#history_status").val();
        var todate= $("#to_date").val();
        var teamid= $("#team").val();
        fill_datatable(job_id,date,status,todate,teamid);
    });
     $("#history_date").on("change",function(){
        $('#table').DataTable().destroy(); 
        var date = $(this).val();
          var job_id = $("#job").val();
        var status = $("#history_status").val();
         var todate= $("#to_date").val();
        var teamid= $("#team").val();
         fill_datatable(job_id,date,status,todate,teamid);
    });    
      $("#history_status").on("change",function(){
        $('#table').DataTable().destroy(); 
        var status = $(this).val();
          var job_id = $("#job").val();
      var date = $("#history_date").val();
       var todate= $("#to_date").val();
        var teamid= $("#team").val();
          fill_datatable(job_id,date,status,todate,teamid);
    }); 
     $("#to_date").on("change",function(){
        $('#table').DataTable().destroy(); 
        var todate = $(this).val();
          var job_id = $("#job").val();
        var status = $("#history_status").val();
         var date = $("#history_date").val();
        var teamid= $("#team").val();
         fill_datatable(job_id,date,status,todate,teamid);
    });
     $("#team").on("change",function(){
        $('#table').DataTable().destroy(); 
        var teamid = $(this).val();
        var date = $("#history_date").val();
        var status = $("#history_status").val();
        var todate= $("#to_date").val();
        var job_id = $("#job").val();
        fill_datatable(job_id,date,status,todate,teamid);
    });
    });

    //sucessfuly add edit delete popup with fals data
<?php if ($this->session->flashdata('add')) { ?>
    $("#add_confirm").modal('show');<?php } ?>
<?php if ($this->session->flashdata('update')) { ?>
    $("#update_confirm").modal('show');<?php } ?>
<?php if ($this->session->flashdata('delete')) { ?>
    $("#delete_confirm").modal('show');<?php } ?>



      $(function () {

        $("#example1").DataTable();

        $('#example2').DataTable({

          "paging": true,

          "lengthChange": false,

          "searching": false,

          "ordering": true,

          "info": true,

          "autoWidth": false

        });

      });


    </script>
<script>
   function updateStatus(id, newStatus) {
    
    // Send an AJAX request to update the status
    $.ajax({
        url: '<?php echo site_url('Team/updateStatus'); ?>', // Replace 'your_controller' with the actual controller name
        method: 'POST',
        data: { id: id, status: newStatus },
      success: function (response) {
    // Handle success (if needed)
    if (response.success) {
        alert('Update successful!');
        location.reload();
    } else {
        alert('Update failed!');
    }
},
        error: function (xhr, status, error) {
            // Handle error (if needed)
            console.error(error);
        }
    });
}
  
</script>