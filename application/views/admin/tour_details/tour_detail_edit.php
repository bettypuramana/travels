<!DOCTYPE html>
<html>
<head>
<?php include('assets/include/header.php'); ?>
<script src="https://cdn.tiny.cloud/1/YOUR_API_KEY/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: 'textarea', // Change this to your specific textarea selector
      plugins: 'advlist autolink lists link image charmap print preview hr anchor',
      toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image'
    });
  </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

                 
             <?php include('assets/include/navigation.php'); ?>
                  <!-- Content Wrapper. Contains page content -->
                  <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                      <h1>Edit Tour Details</h1>
                    </section>
<?php
// Retrieve flash data in your view
$flash_data = $this->session->flashdata('error');

if (!empty($flash_data)) {
    echo '<div class="alert alert-success">' . $flash_data . '</div>';
}
?>
                      
                    <!-- Main content -->
            <section class="content">
                <!--            <div class="row">-->
                <div class="box box-primary">

                                 <form id="form" role="form" action="<?= CUSTOM_BASE_URL . 'Admin/Tour_Details/update_tour_details/'.$list->tour_id ?>" method="post" enctype="multipart/form-data">
                                     
                              <div class="container-fluid">       
                                <div class="row">
                                      <div class="col-md-12">
    <div class="form-group">
        <label>Package Names</label>
        <select class="form-control" name="packagetitle">
            <option value="" >Select Package</option>
            <?php foreach ($packagetitle as $package): ?>
                <option value="<?php echo $package->tour_id; ?>" <?php echo ($package->tour_id == $list->tour_ref_id) ? 'selected' : ''; ?>><?php echo $package->title; ?></option>
            <?php endforeach; ?>
        </select>
        <?php echo form_error('packagetitle', '<p class="help-block error-info">', '</p>'); ?>
    </div>
</div>
                                   
                                   
                                       
                                 </div>    
                                <div class="row"> 
                                       <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea type="text" class="form-control" name="tour_detail" value="<?php echo $list->description; ?>"><?php echo $list->description; ?></textarea>
                                            <?php echo form_error('tour_detail', '<p class="help-block error-info">', '</p>'); ?>
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
     <script type="text/javascript" src="<?php echo base_url() ?>assets/crop/jquery.Jcrop.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/crop/script_products.js"></script>
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

function maxLength(el) {    
   
   if (!('maxLength' in el)) {
   
      var max = el.attributes.maxLength.value;
   
      el.onkeypress = function () {
   
          if (this.value.length >= max) return false;
   
      };
   
      }
   
   }
   
   maxLength(document.getElementById("metaDesc"));
   
   
   
   var maxAmount = 160;
   
      function textCounter(textField, showCountField) {
   
      if (textField.value.length > maxAmount) {
   
          textField.value = textField.value.substring(0, maxAmount);
   
      } else {
   
          showCountField.value = maxAmount - textField.value.length;
   
      }
   
   }
   

</script>
</body>

</html>
