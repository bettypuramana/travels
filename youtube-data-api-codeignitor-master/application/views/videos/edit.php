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
          <h1>Edit Video</h1>
        </section>
          
        <!-- Main content -->
<section class="content">
    <!--            <div class="row">-->
    <div class="box box-primary">
      <form id="upload_form" enctype="multipart/form-data" method="post" action="<?= CUSTOM_BASE_URL . 'youtube/update' ?>" onSubmit="return checkForm()">
         <?php foreach ($result as $rows) { ?> 
        <div class="container-fluid">
            
 <div class="container-fluid">
 

          <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <label>Title</label>
                      <input type="text" name="title" class="form-control" value="<?php echo $rows['title']; ?>">
                       <?php echo form_error('title', '<p class="help-block error-info">', '</p>'); ?>
                  </div>
              </div>

            
            <div class="col-md-12">
                <div class="form-group">
                    <label>Description</label>
                     <textarea name="description" class="form-control" rows="3"><?php echo $rows['description']; ?></textarea>
                     <?php echo form_error('description', '<p class="invaild-9-field">', '</p>'); ?>
                </div>
            </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label>Tags</label>
                      <input type="text" name="tag" class="form-control" value="<?php echo $rows['tag']; ?>">
                       <?php echo form_error('tag', '<p class="help-block error-info">', '</p>'); ?>
                  </div>
              </div>

              <div class="col-md-6">
                  <div class="form-group">
                      <label>Privacy</label>
                      <select data-live-search="true" class="form-control selectpicker" id="privacy" name="privacy" > 
                      <option value="<?php echo $rows['privacy']; ?>"><?php echo $rows['privacy']; ?></option>
                      <option value="private">Private</option>
                      <option value="public">Public</option>
                       <?php echo form_error('privacy', '<p class="help-block error-info">', '</p>'); ?>
                  </div>
              </div>

              <div class="col-md-6">
                  <div class="form-group">
                      <label>Video</label>
                      <input name="video_name" id="video_name" readonly="readonly" type="file" />
                       <?php echo form_error('video_name', '<p class="help-block error-info">', '</p>'); ?>
                  </div>
              </div>   
          
            <div class="col-md-12">
                <input type="submit" name="submit" class="btn btn-success" value="Save">
                 <input type="button" id="cancel" class="btn btn-danger" value="Cancel">
            </div>
            </div>
          
          </div>
          <input type="hidden" name="id" value="<?php echo $rows['id']; ?>">
          <?php } ?>   
            </form>
          </div>
    <!-- /.box -->

    <!-- /.row -->
</section>
<!-- /.content -->
      </div><!-- /.content-wrapper -->
        
       
        

      <footer class="main-footer clearfix">
        <div class="pull-right">
         <strong>Copyright &copy; 2019 <a target="_blank" href="http://onlister.org">Onlister</a></strong>.  All Rights Reserved.
        </div>
      </footer>
        
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->




    <!-- jQuery 2.1.4 -->
     <?php include('assets/include/footer.php'); ?>
 <script src="<?php echo base_url();?>assets/vendor/jquery-ui/jquery-ui.min.js"></script>
     <script type="text/javascript" src="<?php echo base_url() ?>assets/crop/jquery.Jcrop.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/crop/script_products.js"></script>
  
</body>

</html>
<script>

$("#cancel").click(function () {//jquery cancel function when cancel button click
window.location = '<?= CUSTOM_BASE_URL . "videos" ?>';
});



  $(function() {
    $("form").submit(function() {
      $(this).find("input[type='submit']").prop('disabled', true).val("Please wait...");
        setTimeout(function() {
        $("input[type='submit']").removeAttr("disabled").val("save");;      
        }, 500);
    });
  });
 </script>
<script type="text/javascript">
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