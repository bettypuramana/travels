<!DOCTYPE html>
<html>
<head>
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
                      <h1>Add Team</h1>
                    </section>

                      
                    <!-- Main content -->
            <section class="content">
                <!--            <div class="row">-->
                <div class="box box-primary">

                               <form id="form" role="form" action="<?= CUSTOM_BASE_URL . 'Admin/Team/update'?>" method="post" enctype="multipart/form-data">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="name" value="<?= set_value('name',  !empty($edit) ? $edit->name : '') ?>">
                    <?php echo form_error('name', '<p class="help-block error-info">', '</p>'); ?>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description"><?= set_value('description', !empty($edit) ? $edit->description : '') ?></textarea>
                    <?php echo form_error('description', '<p class="help-block error-info">', '</p>'); ?>
                </div>  <input type="hidden" name="id" value="<?= !empty($edit) ? $edit->id : '' ?>">
            </div>
        </div>
        <input type="submit" class="btn btn-success" value="Save">
       
    </div>
</form>

                          </div>
    <!-- /.box -->

    <!-- /.row -->
</section>
<!-- /.content -->
      </div><!-- /.content-wrapper -->
        
       
      <footer class="main-footer clearfix">
        <div class="pull-right">
         <strong>Copyright &copy; 2020 <a target="_blank" href="#">Lakshya Excellence</a></strong>.  All Rights Reserved.
        </div>
      </footer>


      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->




    <!-- jQuery 2.1.4 -->
     <?php include('assets/include/footer.php'); ?>
<script>
      






</script>
</body>

</html>
