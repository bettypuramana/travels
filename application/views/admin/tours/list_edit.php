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
                      <h1>Add Tour</h1>
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

                                 <form id="form" role="form" action="<?= CUSTOM_BASE_URL . 'Admin/Tour/update/'.$list->tour_id ?>" method="post" enctype="multipart/form-data">
                                     
                              <div class="container-fluid">       
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" class="form-control" name="title" value="<?php echo $list->title; ?>">
                                                <?php echo form_error('title', '<p class="help-block error-info">', '</p>'); ?>
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Theme</label>
                                            <input type="text" class="form-control" name="theme" value="<?php echo $list->theme; ?>">
                                                <?php echo form_error('theme', '<p class="help-block error-info">', '</p>'); ?>
                                        </div>
                                    </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Departure From</label>
                                            <input type="text" class="form-control" name="deptfrom" value="<?php echo $list->departurefrom; ?>">
                                                <?php echo form_error('deptfrom', '<p class="help-block error-info">', '</p>'); ?>
                                        </div>
                                    </div>
                                     <div class="col-md-6">
    <div class="form-group">
        <label>Start Date</label>
        <input type="date" class="form-control" name="start_date" value="<?php echo $list->start_date; ?>">
        <?php echo form_error('start_date', '<p class="help-block error-info">', '</p>'); ?>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label>End Date</label>
        <input type="date" class="form-control" name="end_date" value="<?php echo $list->end_date; ?>">
        <?php echo form_error('end_date', '<p class="help-block error-info">', '</p>'); ?>
    </div>
</div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Region</label>
                                            <select class="form-control" name="region">
                                                <option value="">Select Region</option>
                                                <?php foreach ($regions as $region) { ?>
                                                    <option value="<?php echo $region->region_id; ?>" <?php echo ($list->region == $region->region_id) ? 'selected' : ''; ?>><?php echo $region->region_name; ?></option>
                                                <?php } ?>
                                            </select>
                                            <?php echo form_error('region', '<p class="help-block error-info">', '</p>'); ?>
                                        </div>
                                    </div>
                                   <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Location</label>
                                        <input type="text" class="form-control" name="location" value="<?php echo $list->location; ?>">
                                        <?php echo form_error('location', '<p class="help-block error-info">', '</p>'); ?>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="text" class="form-control" name="phone" value="<?php echo $list->phone; ?>">
                                            <?php echo form_error('phone', '<p class="help-block error-info">', '</p>'); ?>
                                        </div>
                                    </div>
                                
                                       <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Per Person Amount</label>
                                            <input type="text" class="form-control" name="person" value="<?php echo $list->person; ?>">
                                            <?php echo form_error('person', '<p class="help-block error-info">', '</p>'); ?>
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
                                            <img src="<?= CUSTOM_BASE_URL . 'uploads/tour/' . $list->image; ?>" alt="tour image" class="img-fluid" height="100">
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
