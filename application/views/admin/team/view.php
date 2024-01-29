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
          <h1>Team List</h1>
        </section>

          
        <!-- Main content -->
<section class="content">
    <!--            <div class="row">-->
    <div class="box box-primary">

                
                <div class="row">
                  <div class="container-fluid">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a href="<?= CUSTOM_BASE_URL .'Admin/Team/create'?>" class="btn btn-success">Add Team</a>
                            </div>
                            <div class="panel-body panel-scroll">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#Serial</th>
                                            <th>Team Name</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php $val = 1; ?>
                                    <?php foreach ($list as $row) { ?>
                                    
                                        <tr>
                                            <td><?= $val++ ?></td>
                                           <td><?= $row->name; ?></td>
        <td><?= $row->description; ?></td>
                                           
                                            <td>



                                               <a class="btn btn-warning" href="<?= CUSTOM_BASE_URL.'Admin/Team/edit/'.$row->id;?>"><i class="fa fa-edit" aria-hidden="true"></i></a>

                                           <a href="<?= base_url('Admin/Team/deleteTeam/' . $row->id) ?>" class="btn btn-danger delete-btn" onclick="return confirm('Are you sure you want to delete this record?');">
    <i class="fa fa-trash-o" aria-hidden="true"></i>
</a>

                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

   </section>
<!-- /.content -->
      </div><!-- /.content-wrapper -->
        
       
        

      <footer class="main-footer clearfix">
        <div class="pull-right">
         <strong>Copyright &copy; 2020 <a target="_blank" href="#">Lakshya Excellence</a></strong>.  All Rights Reserved.
        </div>
      </footer> 

      <!-- Control Sidebar -->
     
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>

</div>


    <!-- jQuery 2.1.4 -->
    <!-- VIEW MODAL BODY -->
     <div class="modal fade view-modal" id="view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Tax Consultance Association,Kerala</h4>
                    <span>Oct 21, 2016</span>
                </div>
                <div class="modal-body">
                    <img src="<?php echo base_url();?>assets/dist/images/news-img.jpg" class="img-responsive">
                    <p>For mountain lovers and the vertically inclined the Himalayas represent nothing less than the crowning apex of nature's grandeur. Here dramatic forested gorges rise to skylines of snow-capped glaciated peaks through a landscape that ranges from high-altitude desert to dripping rhododendron forest. <br><br>Home to some 40 million people, this is no alpine wilderness, but rather a vibrant mosaic of peoples, cultures and communities, criss-crossed by ancient trading and pilgrimage routes that offer their own unique inspiration</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- DELETE MODAL BODY -->
     <div class="modal fade del-modal" id="del-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <div class="user-dele"></div>
            </div>
        </div>
    </div>
    
    <!-- DELETE MODAL BODY -->
    <div class="modal fade sucs-modal" id="sucs-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                    <h4 class="modal-title">News updated successfully !</h4>
                    <button type="button" class="btn confirm-btn" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    
         <?php include('assets/include/footer.php'); ?>

    
    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url();?>assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/datatables-responsive/dataTables.responsive.js"></script>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });

    


    </script>

</body>

</html>
