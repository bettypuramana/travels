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
          <h1>Booking View</h1>
        </section>

          
        <!-- Main content -->
<section class="content">
    <!--            <div class="row">-->
    <div class="box box-primary">

                
                <div class="row">
                  <div class="container-fluid">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
    <?php if ($list): ?>
        <?php foreach ($list as $booking): ?>
            <h2>Booking Details</h2>
            <p><strong>Code:</strong> <?php echo $booking->bookingCode; ?></p>
            <p><strong>Customer Name:</strong> <?php echo $booking->customerName; ?></p>
            <p><strong>Customer Phone:</strong> <?php echo $booking->customerPhone; ?></p>
            <p><strong>Customer Email:</strong> <?php echo $booking->customerEmail; ?></p>

            <!-- Corrected the image source -->
            <img src="<?php echo base_url('uploads/tour/' . $booking->image); ?>" alt="Tour Image" style="width: 100px;">

            <p><strong>Theme:</strong> <?php echo $booking->theme; ?></p>
            <p><strong>Package Name:</strong> <?php echo $booking->title; ?></p>
            <p><strong>Description:</strong> <?php echo $booking->description; ?></p>
            <p><strong>Location:</strong> <?php echo $booking->location; ?></p>
            <p><strong>Start Date:</strong> <?php echo $booking->start_date; ?></p>
            <p><strong>End Date:</strong> <?php echo $booking->end_date; ?></p>
            <p><strong>Departure From:</strong> <?php echo $booking->departurefrom; ?></p>
            <p><strong>Adult:</strong> <?php echo $booking->adult; ?></p>
            <p><strong>Child:</strong> <?php echo $booking->child; ?></p>
            <p><strong>Per Person Amount:</strong> <?php echo $booking->perPersonAmount; ?></p>
            <p><strong>Total:</strong> <?php echo $booking->totalAmount; ?></p>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No booking found with the provided ID.</p>
    <?php endif; ?>
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


   
         <?php include('assets/include/footer.php'); ?>

    
    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url();?>assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/datatables-responsive/dataTables.responsive.js"></script>
    <script>
  
    </script>

</body>

</html>
