<!DOCTYPE html>

<html>

  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <?php include('assets/include/header.php'); ?>

  </head>

  <body class="hold-transition skin-blue sidebar-mini">

    <!-- Site wrapper -->

    <div class="wrapper">

    <?php include('assets/include/navigation.php'); ?>


      <div class="content-wrapper">

        <!-- Content Header -->

        <section class="content-header">

          <h1>Complaints</h1>

        </section>



        <!-- Main content -->

          <section class="content">

            <div class="box">

    <div class="box-header">
 <form class="add-ca-in" method="post" enctype="multipart/form-data" name="form" id="form" action="<?= CUSTOM_BASE_URL . 'Complaint/generate' ?>">
     <div id="pdf">
         <button class="btn bg-blue" name="pdf" type="submit">Generate PDF</button>
         <button class="btn bg-green" name="excel" type="submit">Generate Excel</button>
     </div>
     </div>
     <div class="row">
     <div class="col-md-2">
     <div class="box-header">
      <div class="color-black font-size-16">Status: </div>      
      <select name="status" id="status" class="form-control" >
       <option value="">Select Status</option>
       <option value="1">New</option>
       <option value="2">Pending</option>
       <option value="3">Completed</option>
      </select>
     </div>
     </div>
     
     <div class="col-md-2">
     <div class="box-header">
      <div class="color-black font-size-16">Department: </div>      
      <select name="department" id="department" class="form-control" data-live-search="true">
       <option value="">Select Department</option>
       <?php foreach($department as $value){ ?>
       <option value="<?php echo $value['id']; ?>"><?php echo $value['username']; ?></option>
       <?php } ?>
      </select>
     </div>
     </div>     

     <div class="col-md-2">
     <div class="box-header">
      <div class="color-black font-size-16">Employee: </div>      
      <select name="employee" id="employee" class="form-control" data-live-search="true">
       <option value="">Select Employee</option>
       <?php foreach($employee as $value){ ?>
       <option value="<?php echo $value['id']; ?>"><?php echo $value['username']; ?></option>
       <?php } ?>
      </select>
     </div>
     </div> 


    

    </div>

    <div class="row"> 
     <div class="col-md-2">
     <div class="box-header">
      <div class="color-black font-size-16">Customer: </div>      
      <select name="customer" id="customer" class="form-control" data-live-search="true">
       <option value="">Select Customer</option>
       <?php foreach($customer as $value){ ?>
       <option value="<?php echo $value['id']; ?>"><?php echo $value['username']; ?></option>
       <?php } ?>
      </select>
     </div>
     </div>     

     <div class="col-md-2">
     <div class="box-header">
      <div class="color-black font-size-16">Contract No: </div>      
      <select name="contract_no" id="contract_no" class="form-control" data-live-search="true">
       <option value="">Select Contract No</option>
       <?php foreach($contract as $value){ ?>
       <option value="<?php echo $value['contract_no']; ?>"><?php echo $value['contract_no']; ?></option>
       <?php } ?>
      </select>
     </div>
     </div> 
    </div>
    
    <div class="row">
     <div class="col-md-2">
     <div class="box-header">
      <div class="color-black font-size-16">Date Type: </div>      
      <select name="date_type" id="date_type" class="form-control" >
       <option value="">Select date type</option>
       <option value="1">Created</option>
       <option value="2">Finished</option>
      </select>
     </div>
     </div>

     <div class="col-md-2">
     <div class="box-header">
      <div class="color-black font-size-16">From: </div>      
      <input type="date" name="from" id="from" max="<?php echo date('Y-m-d'); ?>" class="form-control">
     </div>
     </div>
     
     <div class="col-md-2">
     <div class="box-header">
      <div class="color-black font-size-16">To: </div>     
      <input type="date" name="to" id="to" max="<?php echo date('Y-m-d'); ?>" class="form-control">
     </div>
     </div>    
     </div>     

                <div class="box-body">
                 <div class="panel panel-default">
                  <div class="panel-body panel-scroll">
       <table width="100%" class="table table-striped table-bordered table-hover" id="table">
                                    <thead>
                                        <tr>
                                            <th style="width: 55px;">Ticket(AJTK)</th>
                                            <th style="width: 55px;">Complaint</th>
                                            <th style="width: 79px;">Name</th>
                                            <th style="width: 79px;">Mobile</th>
                                            <th style="width: 79px;">Contract No</th>
                                            <th style="width: 79px;">Location</th>
                                            <th style="width: 55px;">Created Date</th>
                                            <th style="width: 55px;">Last Date</th>
                                            <th style="width: 55px;">Finished Date</th>
                                            
                                        </tr>
                                    </thead>
                                </table>
                  </div>
                 </div>
                </div><!-- /.box-body -->

              </div><!-- /.box -->

               
</form>
          </section>

<!-- /.content -->

      </div><!-- /.content-wrapper -->






 
    <!-- VIEW MODAL BODY -->
        <div class="modal fade" id="view-modal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content model_gallery">
                    <div class="modal-body">
                        <div class="row">
                            <!----modal calling div-->
                            <div class="view-modal"></div>
                 
                            <!----end modal calling div-->
                        </div>
                    </div>
                    <div class="modal-footer"></div>
                </div>
            </div>
        </div>

 
          <div class="modal fade del-modal" id="del-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
               <div class="del"></div>
            </div>
        </div>
    </div>

          <div class="modal fade remark-modal clearfix" id="remark-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
               <div class="remark"></div>
            </div>
        </div>
    </div>

     <!-- PAYMENT MODAL BODY -->
     <div class="modal fade del1-modal" id="del1-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                  <div class="payment"></div>
            </div>
        </div>
    </div>

    <div class="modal fade batch-modal" id="batch-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
               <div class="batch"></div>
            </div>
        </div>
    </div>  


    <div class="modal fade package-modal" id="package-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
               <div class="package"></div>
            </div>
        </div>
    </div>  
    
     <div class="modal fade del-modal" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                  <div class="pro-add"></div>
            </div>
        </div>
    </div>    

     <div class="modal fade del-modal" id="roll_no" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                  <div class="pro-roll"></div>
            </div>
        </div>
    </div> 

    <!-- ADD MODAL BODY -->
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
     <!-- UPDATE MODAL BODY -->
    <div class="modal fade sucs-modal" id="update_confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                    <h4 class="modal-title" >Updated successfully !</h4>
                    <button type="button" class="btn confirm-btn" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!-- DELETE MODAL BODY -->
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

    <!-- REGISTER MODAL BODY -->
    <div class="modal fade sucs-modal" id="register_confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                    <h4 class="modal-title" >Registered successfully !</h4>
                    <button type="button" class="btn confirm-btn" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <!-- FAIL MODAL BODY -->
    <div class="modal fade sucs-modal" id="fail_confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                    <h4 class="modal-title" >Already Exist !</h4>
                    <button type="button" class="btn confirm-btn" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>





       <footer class="main-footer clearfix">
        <div class="pull-right">
         <strong>Copyright &copy; 2019 <a target="_blank" href="http://onlister.org">Onlister</a></strong>.  All Rights Reserved.
        </div>
      </footer> 




      <div class="control-sidebar-bg"></div>

    </div><!-- ./wrapper -->



     <?php include('assets/include/footer.php'); ?>



     <script>

    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });

    });
    </script>


<script type="text/javascript">
    var table;
    $(document).ready(function() {
        
  fill_datatable();
  
  function fill_datatable(status='',department='',employee='',from='',to='',date_type='',customer='',contract_no='')
  {    
      
        //datatables id
        table = $('#table').DataTable({ 
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            "pageLength": 25,
            "stateSave": true,
                    // Load data for the table's content from an Ajax source
        "ajax": {
        url: '<?php echo site_url('Complaint/complaint_list'); ?>',
        type: "POST",
        data:{status:status, department:department,employee:employee,from:from,to:to,date_type:date_type,customer:customer,contract_no:contract_no}        
        },
        });
}
    $("#status").on("change",function(){ 
    $('#table').DataTable().destroy();
    var status = $(this).val();
    var department = $("#department").val();
    var employee = $("#employee").val();
    var from = $("#from").val();
    var to = $("#to").val();   
    var date_type = $("#date_type").val();
    var contract_no = $("#contract_no").val();
    var customer = $("#customer").val();

    if(date_type !=''){
        
        if(from !='' || to !=''){
            
            
            fill_datatable(status,department,employee,from,to,date_type,customer,contract_no);
        }
        else{
            
            alert("Choose From - To date !!!");
            
        }
        
    }
    else{
    
    fill_datatable(status,department,employee,from,to,date_type,customer,contract_no);
         
    }


    }); 
    
    $("#department").on("change",function(){ 
    $('#table').DataTable().destroy();
    var department = $(this).val();
    var employee = $("#employee").val();
    var from = $("#from").val();
    var to = $("#to").val();
    var status = $("#status").val();
    var date_type = $("#date_type").val();
    var contract_no = $("#contract_no").val();
    var customer = $("#customer").val();    

    if(date_type !=''){
        
        if(from !='' || to !=''){
            
            
            fill_datatable(status,department,employee,from,to,date_type,customer,contract_no);
        }
        else{
            
            alert("Choose From - To date !!!");
            
        }
        
    }
    else{
    
    fill_datatable(status,department,employee,from,to,date_type,customer,contract_no);
         
    }

    });
    
    $("#employee").on("change",function(){ 
    $('#table').DataTable().destroy();
    var employee = $(this).val();
    var from = $("#from").val();
    var to = $("#to").val();
    var status = $("#status").val();
    var department = $("#department").val();
    var date_type = $("#date_type").val();
    var contract_no = $("#contract_no").val();
    var customer = $("#customer").val();

    if(date_type !=''){
        
        if(from !='' || to !=''){
            
            fill_datatable(status,department,employee,from,to,date_type,customer,contract_no);
        }
        else{
            
            alert("Choose From - To date !!!");
            
            
        }
        
    }
    else{
    
    fill_datatable(status,department,employee,from,to,date_type,customer,contract_no);
         
    }


    });

    $("#customer").on("change",function(){ 
    $('#table').DataTable().destroy();
    var customer = $(this).val();
    var from = $("#from").val();
    var to = $("#to").val();
    var status = $("#status").val();
    var department = $("#department").val();
    var date_type = $("#date_type").val();
    var employee = $("#employee").val();
    var contract_no = $("#contract_no").val();

    if(date_type !=''){
        
        if(from !='' || to !=''){
            
            fill_datatable(status,department,employee,from,to,date_type,customer,contract_no);
        }
        else{
            
            alert("Choose From - To date !!!");
            
            
        }
        
    }
    else{
    
    fill_datatable(status,department,employee,from,to,date_type,customer,contract_no);
         
    }


    });

    $("#contract_no").on("change",function(){ 
    $('#table').DataTable().destroy();
    var contract_no = $(this).val();
    var from = $("#from").val();
    var to = $("#to").val();
    var status = $("#status").val();
    var department = $("#department").val();
    var date_type = $("#date_type").val();
    var employee = $("#employee").val();
    var customer = $("#customer").val();

    if(date_type !=''){
        
        if(from !='' || to !=''){
            
            fill_datatable(status,department,employee,from,to,date_type,customer,contract_no);
        }
        else{
            
            alert("Choose From - To date !!!");
            
            
        }
        
    }
    else{
    
    fill_datatable(status,department,employee,from,to,date_type,customer,contract_no);
         
    }


    });
    
    $("#from").on("change",function(){ 
    $('#table').DataTable().destroy();
    var from = $(this).val();
    var to = $("#to").val();
    var status = $("#status").val();
    var department = $("#department").val();
    var employee = $("#employee").val(); 
    var date_type = $("#date_type").val();
    var contract_no = $("#contract_no").val();
    var customer = $("#customer").val();

    if(date_type !=''){
        
        if(from !='' || to !=''){
            
            fill_datatable(status,department,employee,from,to,date_type,customer,contract_no);
            
        }
        else{
            
            alert("Choose From - To date !!!");
            
        }
        
    }
    else{
    
    alert("Choose Date Type !!!");
         
    }


    });
    
    $("#to").on("change",function(){ 
    $('#table').DataTable().destroy();
    var to = $(this).val();
    var status = $("#status").val();
    var department = $("#department").val();
    var employee = $("#employee").val();
    var from = $("#from").val();
    var date_type = $("#date_type").val();
    var to = $("#to").val();
    var contract_no = $("#contract_no").val();
    var customer = $("#customer").val();
    
    if(date_type !=''){
        
        if(from !='' || to !=''){
            
            
            fill_datatable(status,department,employee,from,to,date_type,customer,contract_no);
            
        }
        else{
            
            alert("Choose From - To date !!!");
            
        }
        
    }
    else{
    
    alert("Choose Date Type !!!");
         
    }    
    });

    $("#date_type").on("change",function(){ 
    $('#table').DataTable().destroy();
    var date_type = $("#date_type").val();
    var status = $("#status").val();
    var department = $("#department").val();
    var employee = $("#employee").val();
    var from = $("#from").val();
    var to = $("#to").val();
    var contract_no = $("#contract_no").val();
    var customer = $("#customer").val();
    
    if(date_type !=''){
        
        if(from !='' || to !=''){
            
            fill_datatable(status,department,employee,from,to,date_type,customer,contract_no);
        }
        else{
            
            
            alert("Choose From - To date !!!");
            
        }
        
    }
    else{
    
    fill_datatable(status,department,employee,from,to,date_type,customer,contract_no);
         
    }

    });
    
    });





    //sucessfuly add edit delete popup with fals data
<?php if ($this->session->flashdata('add')) { ?>
    $("#add_confirm").modal('show');<?php } ?>
<?php if ($this->session->flashdata('update')) { ?>
    $("#update_confirm").modal('show');<?php } ?>
<?php if ($this->session->flashdata('delete')) { ?>
    $("#delete_confirm").modal('show');<?php } ?>
    <?php if ($this->session->flashdata('register')) { ?>
    $("#register_confirm").modal('show');<?php } ?>
<?php if ($this->session->flashdata('fail')) { ?>
    $("#fail_confirm").modal('show');<?php } ?>
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


  </body>

</html>

