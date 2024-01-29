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
                      <h1>BOOK NOW</h1>
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

                                 <form id="form" role="form"  method="post" enctype="multipart/form-data">
                                     
                              <div class="container-fluid">       
                             <div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Package Names</label>
            <select class="form-control" name="packagetitle" id="packagetitle">
                <option value="">Select Package</option>
                <?php foreach ($packagetitle as $package): ?>
                    <option value="<?php echo $package->tour_id; ?>"><?php echo $package->title; ?></option>
                <?php endforeach; ?>
            </select>
         <div id="packagetitleError"></div>
        </div>
    </div>

  <div class="col-md-6">
    <div class="form-group" id="packagecontainer">
       
    </div>
</div>

</div>

                               
                 <div class="row">
                      <div class="col-md-6">
        <div class="form-group">
    <label>Customer Name</label>
    <input type="text" class="form-control" name="name" id="customerName" placeholder="Enter Customer Name">
   <div id="customerNameError"></div>
</div>

<div class="form-group">
    <label>Customer Phone</label>
    <input type="text" class="form-control" name="phone" id="customerPhone" placeholder="Enter Customer Phone">
  <div id="customerPhoneError"></div>
</div>

<div class="form-group">
    <label>Customer Email</label>
    <input type="text" class="form-control" name="email" id="customerEmail" placeholder="Enter Customer Email">
   <div id="customerEmailError"></div>
</div>

    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Adult</label>
            <select class="form-control" name="adult" id="adult">
                <option value="">Select Adult</option>
                <?php for ($i = 1; $i <= 10; $i++) : ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
            <?php echo form_error('adult', '<p class="help-block error-info">', '</p>'); ?>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label>Child</label>
            <select class="form-control" name="child" id="child">
                <option value="">Select Child</option>
                <?php for ($i = 1; $i <= 10; $i++) : ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
            <?php echo form_error('child', '<p class="help-block error-info">', '</p>'); ?>
        </div>
    </div>
</div>
                 
             <div class="col-md-6">
        <div class="form-group">
            <label></label>
            <p id="totalLabel">Total: $0.00</p>
        </div>
    </div>                  
                                
                                <input type="submit" id="save" class="btn btn-success" value="Book">
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

<script>
    $(document).ready(function() {
        $('#packagetitle').on('change', function() {
            var tourId = $(this).val();
            if (tourId !== '') {
                $.ajax({
                    url: '<?php echo base_url('Admin/Booking/fetchDetails'); ?>',
                    type: 'POST',
                    data: {tourId: tourId},
                    dataType: 'json',
                    success: function(response) {
                        var startDate = new Date(response.start_date);
                        var endDate = new Date(response.end_date);
                        var duration = calculateDuration(startDate, endDate);
                        $('#packagecontainer').html(
                            '<div class="row">' +
                                 '<div class="col-md-4 col-sm-6">' +
                                    '<img src="<?php echo base_url('uploads/tour/'); ?>' + response.image + '" alt="cruise" style="width: 100px;">' +
                                '</div>' +
                                '<div class="col-md-8 col-sm-6">' +
                                    '<h4>' + response.title + '</h4>' +
                                    '<div class="row">' +
                                        '<div class="col-md-6 col-sm-6 col-xs-6">' +
                                            '<p>START</p>' +
                                            '<p><i class="fa fa-calendar"></i> ' + response.start_date + '</p>' +
                                        '</div>' +
                                        '<div class="col-md-6 col-sm-6 col-xs-6">' +
                                            '<p>END</p>' +
                                            '<p><i class="fa fa-calendar"></i> ' + response.end_date + '</p>' +
                                        '</div>' +
                                    '</div>' +
                                    '<p><span>Duration</span> - ' + duration + '</p>' +
                                    '<p><span>Theme</span> - ' + response.theme + '</p>' +
                                     '<p id="personAmount"><span>Per/Person</span> - ' + '$'+response.person + '</p>' +
                                '</div>' +
                            '</div>'
                        );
                    }
                });
            } else {
                // Clear the details container if no package is selected
                $('#packagecontainer').html('');
            }
        });
        function calculateDuration(startDate, endDate) {
            var diffInMilliseconds = endDate - startDate;
            var days = Math.floor(diffInMilliseconds / (1000 * 60 * 60 * 24));
            return days + ' days';
        }
    });
</script>
<script>
    $(document).ready(function() {
        $('#adult, #child').on('change', function() {
              calculateTotal();
        });

        function calculateTotal() {
            var adultCount = $('#adult').val() || 0;
            var childCount = $('#child').val() || 0;

            var packageAmount = parseFloat($('#personAmount').text().replace('Per/Person - $', '')) || 0;


             var totalAmount = (adultCount * packageAmount) + (childCount * (packageAmount / 2));


           $('#totalLabel').html('<strong>Total: $' + totalAmount.toFixed(2) + '</strong>');

        }
    });
    $(document).ready(function() {
    $('#cancel').on('click', function() {
      location.reload();
    });
});

// Attach event listeners to input fields to remove error messages when typing
$('#customerName, #customerPhone, #customerEmail, #packagetitle').on('input', function() {
    var fieldId = '#' + $(this).attr('id');
    $(fieldId + 'Error').empty();
});

$('#save').on('click', function(event) {
  
    event.preventDefault();


    var customerName = $('#customerName').val();
    var customerPhone = $('#customerPhone').val();
    var customerEmail = $('#customerEmail').val();
    var packagetitle = $('#packagetitle').val();
    var adult = $('#adult').val();
    var child = $('#child').val();
    var perPersonAmount = parseFloat($('#personAmount').text().replace('Per/Person - $', '')) || 0;
    var totalAmount = parseFloat($('#totalLabel').text().replace('Total: $', '')) || 0;

    // Validate data
    var isValid = true;

    // Function to show error message and return false if the value is empty
    function showErrorAndReturnFalse(elementId, errorMessage) {
        var value = $(elementId).val();
        if (!value) {
            $(elementId + 'Error').html('<p class="help-block error-info">' + errorMessage + '</p>');
            return false;
        } else {
            $(elementId + 'Error').empty();
            return true;
        }
    }

  
    isValid = showErrorAndReturnFalse('#customerName', 'Please enter customer name.') && isValid;
    isValid = showErrorAndReturnFalse('#customerPhone', 'Please enter customer phone.') && isValid;
    isValid = showErrorAndReturnFalse('#customerEmail', 'Please enter customer email.') && isValid;
    isValid = showErrorAndReturnFalse('#packagetitle', 'Please select a package title.') && isValid;

    // If all data is valid, proceed to save
    if (isValid) {
        
        $.ajax({
            url: '<?php echo base_url('Admin/Booking/saveBooking'); ?>', 
            type: 'POST',
            data: {
                customerName: customerName,
                customerPhone: customerPhone,
                customerEmail: customerEmail,
                packagetitle: packagetitle,
                adult: adult,
                child: child,
                perPersonAmount: perPersonAmount,
                totalAmount: totalAmount
            },
            success: function(response) {
    // Parse the JSON response
    var data = JSON.parse(response);

    if (data.status === 'success') {
        // Show success alert
        alert('Booking saved successfully!');
        
        // Reload the page (you can use location.reload() or redirect to a specific URL)
        location.reload();
    } else {
        // Show error alert
        alert('Failed to save booking. ' + data.message);
    }
},
            error: function(error) {
                console.error(error);
            }
        });
    }
});


</script>


</body>

</html>
