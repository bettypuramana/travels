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
                      <h1>Edit</h1>
                    </section>

                      
                    <!-- Main content -->
            <section class="content">
                <!--            <div class="row">-->
                <div class="box box-primary">

                                 <form id="form" role="form" action="<?= CUSTOM_BASE_URL . 'Team/updateData' ?>" method="post" enctype="multipart/form-data">
                                     
                              <div class="container-fluid">       
                                <div class="row">
                                   
                                    
              
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Job</label>
                                            <select name="job" class="selectpicker form-control">
   <option value="" selected> - Select Job Number - </option>
   <?php foreach ($job_number as $row) { ?>
     <option value="<?= $row['id'] ?>" <?= ($row['id'] == $list->job_id) ? 'selected' : '' ?>>
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
                <option value="<?= $row['id'] ?>"  <?= ($row['id'] == $list->team) ? 'selected' : '' ?>>
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
                                            <input type="date" class="form-control" name="date" value="<?php echo $list->date; ?>">
                                            <input type="hidden" class="form-control" name="editid" value="<?php echo $list->id; ?>">
                                            <?php echo form_error('date', '<p class="help-block error-info">', '</p>'); ?>
                                        </div>
                                    </div>
                                 </div>    
                                <div class="row"> 
                                       <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" name="remarks" value="<?php echo set_value('remarks'); ?>"><?php echo  $list->remarks; ?></textarea>
                                            <?php echo form_error('remarks', '<p class="help-block error-info">', '</p>'); ?>
                                        </div>
                                    </div>
                                 </div>    
                                  <div class="row"> 
    <div class="col-md-6">
        <div class="form-group">
            <label></label>
            <?php if ($list->status == 1): ?>
                <label>Status: Approved</label>
            <?php else: ?>
                <label>Status: Pending</label>
            <?php endif; ?>
        </div>
    </div>
</div>

                                    
                                   
                                    
                               
                                
                                <input type="hidden" id="buttonValue" name="buttonValue" value="">

                                <!-- Buttons -->
                                <?php
if ($list->status == 1) {
    // Display and disable "Approve" button
    echo '<input type="button" class="btn btn-success" value="Approve" onclick="setButtonValue(\'1\')" disabled>';
    // Display and disable "Pending" button
    echo '<input type="button" class="btn btn-primary" value="Pending" onclick="setButtonValue(\'0\')" >';
} else {
    // Display "Approve" button without disabling
    echo '<input type="button" class="btn btn-success" value="Approve" onclick="setButtonValue(\'1\')">';
    // Display "Pending" button without disabling
    echo '<input type="button" class="btn btn-primary" value="Pending" onclick="setButtonValue(\'0\')" disabled>';
}
?>

                                <input type="submit" name="generate" id="submitButton" class="btn btn-primary" value="Submit" style="display: none;">
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

 function setButtonValue(value) {
      var confirmationMessage = (value === '1') ? 'Are you sure you want to approve?' : 'Are you sure you want to mark as pending?';

    if (confirm(confirmationMessage)) {
        document.getElementById('buttonValue').value = value;
        // Automatically submit the form after setting the value
        document.getElementById('submitButton').click();
    } else {
        // User clicked cancel, do nothing
    }
       
    }


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
