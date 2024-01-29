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

                                 <form id="form" role="form" action="<?= CUSTOM_BASE_URL . 'Team/create' ?>" method="post" enctype="multipart/form-data">
                                     
                              <div class="container-fluid">       
                                <div class="row">
                                   
                                    
              
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Job</label>
                                            <select name="job" class="selectpicker form-control">
   <option value="" selected> - Select Job Number - </option>
   <?php foreach ($job_number as $row) { ?>
      <option value="<?= $row['id'] ?>" <?= ($row['id'] == set_value('job') || $row['id'] == $defaultSelectedJobId) ? 'selected' : '' ?>>
         <?= $row['job_number']; ?>
      </option>
   <?php } ?>
</select>
                                                <?php echo form_error('job', '<p class="help-block error-info">', '</p>'); ?>
                                        </div>
                                    </div>
                                   </div>
                                     <div class="row">
                                   <div class="col-md-6">
    <div class="form-group">
        <label>Team</label>
        <select name="team" class="selectpicker form-control">
            <option value="" selected> - Select Team - </option>
            <?php foreach ($team_names as $row) : ?>
                <option value="<?= $row['id'] ?>" <?php if ($row['id'] == set_value('team')) : ?> selected<?php endif; ?>>
                    <?= $row['name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?php echo form_error('team', '<p class="help-block error-info">', '</p>'); ?>
    </div>
</div>
</div>
                                <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Date</label>
                                            <input type="date" class="form-control" name="date" value="<?php echo set_value('date'); ?>">
                                            <?php echo form_error('date', '<p class="help-block error-info">', '</p>'); ?>
                                        </div>
                                    </div>
                                 </div>    
                                <div class="row"> 
                                       <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Remarks</label>
                                            <textarea class="form-control" name="remarks" value="<?php echo set_value('remarks'); ?>"></textarea>
                                            <?php echo form_error('remarks', '<p class="help-block error-info">', '</p>'); ?>
                                        </div>
                                    </div>
                                 </div>    
                                     
                                    
                                   
                                    
                               
                                
                                <input type="submit" class="btn btn-success" value="Save">
                                <input type="button" id="cancel" class="btn btn-danger" value="Cancel">
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
        $("#datepicker").datepicker({
            dateFormat: "M dd,yy"
        });

        //jquery cancel function when cancel button click
        $("#cancel").click(function () {
            window.location = '<?= CUSTOM_BASE_URL . "user" ?>';
        });



$(document).ready(function(){
   $('#password').bind("cut copy paste",function(e) {
      e.preventDefault();
   });
});



</script>
</body>

</html>
