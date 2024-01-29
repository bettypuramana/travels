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
                      <h1>Edit Tour Inclusion</h1>
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

                                 <form id="form" role="form" action="<?= CUSTOM_BASE_URL . 'Admin/Tour_Details/update_tour_inclusion/'.$list->tour_id ?>" method="post" enctype="multipart/form-data">
                                     
                              <div class="container-fluid">       
                                <div class="row">
                                    <div class="col-md-12">
    <div class="form-group">
        <label>Package Names</label>
        <select class="form-control" name="packagetitle">
              <option value=""> Select PAckage</option>
            <?php foreach ($packagetitle as $package): ?>
                <option value="<?php echo $package->tour_id; ?>" <?php echo ($package->tour_id == $list->tour_ref_id) ? 'selected' : ''; ?>>
                    <?php echo $package->title; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?php echo form_error('packagetitle', '<p class="help-block error-info">', '</p>'); ?>
    </div>
</div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <input type="text" class="form-control" name="category" value="<?php echo $list->inclusion_categorey; ?>">
                                                <?php echo form_error('category', '<p class="help-block error-info">', '</p>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" class="form-control" name="title" value="<?php echo $list->title; ?>">
                                                <?php echo form_error('title', '<p class="help-block error-info">', '</p>'); ?>
                                        </div>
                                    </div>
                                   
                                   <div class="col-md-6">
                                    <div class="form-group"> <label>Included</label><br>
                                      <?php
// Explode the $list->options string into an array
$selectedOptions = explode(",", $list->options);

// List of all available options
$allOptions = [
    "Taxi transfer from airport",
    "Welcome drinks at hotel",
    "Buffet dinner",
    "Guided city tour"
];
?>
 <?php foreach ($allOptions as $option): ?>
        <?php
        // Trim each option for consistency
        $trimmedOption = trim($option);

        // Check if the trimmed option exists in the selected options array
        $isChecked = in_array($trimmedOption, array_map('trim', $selectedOptions));
        $checkedAttribute = $isChecked ? 'checked' : '';
        ?>

        <input type="checkbox" id="<?= strtolower(str_replace(' ', '_', $trimmedOption)) ?>"
               name="options[]" value="<?= $trimmedOption ?>" <?= $checkedAttribute ?>>
        <label for="<?= strtolower(str_replace(' ', '_', $trimmedOption)) ?>"><?= $trimmedOption ?></label><br>
    <?php endforeach; ?>
                                            <?php echo form_error('options', '<p class="help-block error-info">', '</p>'); ?>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Day</label>
                                            <input type="text" class="form-control" name="day" value="<?php echo $list->day; ?>">
                                            <?php echo form_error('phone', '<p class="help-block error-info">', '</p>'); ?>
                                        </div>
                                    </div>
                                
                                 </div>    
                                <div class="row"> 
                                       <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea type="text" class="form-control" name="description" value="<?php echo $list->description; ?>"><?php echo $list->description; ?></textarea>
                                            <?php echo form_error('description', '<p class="help-block error-info">', '</p>'); ?>
                                        </div>
                                    </div>
                                
                                       <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Image</label>
                                           <!--  <input type="file" class="form-control" name="userfile" value="<?php echo set_value('person'); ?>">-->
                                            <input accept="image/x-png,image/jpeg" type="file"  name="image_file2" id="image_file2"  class="form-control"/>
                                            <?php echo form_error('image_file', '<p class="help-block error-info">', '</p>'); ?>
                                            <img src="<?= CUSTOM_BASE_URL . 'uploads/tour_details/' . $list->image; ?>" alt="tour image" class="img-fluid" height="100">
                                            <input type="hidden" id="old" name="old" value="<?php echo $list->image; ?>" />
                                        </div>
                                    </div>
                                 </div>  
                                    <div class="modal fade" id="cropModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog modal-md" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <button type="button" class="close font-size-28 color-white opacity-1" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span></button>
                                       <h4 class="modal-title color-white font-weight-600" id="myModalLabel">Image Croping</h4>
                                    </div>
                                    <div class="modal-body">
                                       <div class="form-group margin-bottom-0">
                                          <label class="font-size-16 color-black font-weight-400">Image</label>
                                          <input type="hidden" id="x1" name="x1" />
                                          <input type="hidden" id="y1" name="y1" />
                                          <input type="hidden" id="x2" name="x2" />
                                          <input type="hidden" id="y2" name="y2" />
                                          <input type="hidden" id="admin_url" name="admin_url" value=" <?= CUSTOM_BASE_URL.'assets/images/loading.gif';?> " />
                                          <div  class="form-group margin-bottom-0">
                                             <input accept="image/x-png,image/jpeg" type="file"  name="image_file" id="image_file" onChange="fileSelectHandler()"  class="form-control"/>
                                          </div>
                                          <div id="loading"></div>
                                          <div class="error"></div>
                                          <img id="preview" />  
                                          <div class="step2">
                                             <h5>Please select a crop region</h5>
                                             <div class="info">
                                                 <!--<h4><a class="btn btn-primary" data-dismiss="modal">Add Image</a></h4>   -->
                                                <input type="hidden" id="filesize" name="filesize" />
                                                <input type="hidden" id="filetype" name="filetype" />
                                                <input type="hidden" id="filedim" name="filedim" />
                                                <input type="hidden" id="w" name="w" />
                                                <input type="hidden" id="h" name="h" />
                                                <input type="hidden" id="admin_url" value="<?= CUSTOM_BASE_URL.'assets/images/loading.gif';?>">
                                             </div>
                                             <a class="btn btn-primary" data-dismiss="modal">Add Image</a>
                                          </div>
                                       </div>
                                    </div>
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
