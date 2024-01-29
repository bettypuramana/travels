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
          <h1>Tour Inclusion List</h1>
        </section>
<?php
// Retrieve flash data in your view
$flash_data = $this->session->flashdata('add');

if (!empty($flash_data)) {
    echo '<div class="alert alert-success">' . $flash_data . '</div>';
}
?>
<?php
// Retrieve flash data in your view
$flash_datadelete = $this->session->flashdata('delete');

if (!empty($flash_datadelete)) {
    echo '<div class="alert alert-danger">' . $flash_datadelete . '</div>';
}
?>
        <!-- Main content -->
          <section class="content">
               
                <div class="box-body">
              <table width="100%" class="table table-striped table-bordered table-hover" id="table">
                                    <thead>
                                        <tr>
                                            <th>#Serial</th>
                                            <th>Package Name</th>
                                            <th>Title</th>
                                           <th>Inclusion Categorey</th>
                                            <th>Day</th>
                                             <th>Options</th>
                                               <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $val = 1; ?>
                                    <?php foreach ($list as $row) { ?>
                                    
                                        <tr>
                                            <td><?= $val++ ?></td>
                                             <td><?= $row->package_name; ?></td>
                                            <td><?= $row->title; ?></td>
                                            <td><?= $row->inclusion_categorey; ?></td>
                                            <td><?= $row->day; ?></td>
                                            <td><?= $row->options; ?></td>
                                             
                                            <td><img src="<?= CUSTOM_BASE_URL.'uploads/tour_details/'.$row->image;?>" alt="tour image" class="img-fluid" height="100"></td>

                                            <td>

                                               <a class="btn btn-warning" href="<?= CUSTOM_BASE_URL.'Admin/Tour_Details/tour_inclusion_edit/'.$row->tour_id;?>"><i class="fa fa-edit" aria-hidden="true"></i></a>

                                            <a href="<?= base_url('Admin/Tour_Details/tour_inclusion_delete/' . $row->tour_id) ?>" class="btn btn-danger delete-btn" onclick="return confirm('Are you sure you want to delete this record?');">
    <i class="fa fa-trash-o" aria-hidden="true"></i>
</a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
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
    

  </body>
</html>



     <script>


    $(document).ready(function() {
        $('#table').DataTable({
            responsive: true
        });
        
    });
    
    </script>

