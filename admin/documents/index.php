       <?php include('main_header/header.php'); ?>
       <!-- ============================================================== -->
       <!-- end navbar -->
       <!-- ============================================================== -->
       <!-- ============================================================== -->
       <!-- left sidebar -->
       <!-- ============================================================== -->
       <?php include('left_sidebar/sidebar.php'); ?>
       <!-- ============================================================== -->
       <!-- end left sidebar -->
       <!-- ============================================================== -->
       <!-- ============================================================== -->
       <!-- wrapper  -->
       <!-- ============================================================== -->
       <div class="dashboard-wrapper">
           <div class="container-fluid  dashboard-content">
               <!-- ============================================================== -->
               <!-- pagehader  -->
               <!-- ============================================================== -->
               <div class="row">
                   <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                       <div class="page-header">
                           <h2 class="pageheader-title"><i class="fa fa-fw fa-tachometer-alt"></i> Dashboard </h2>
                           <div class="page-breadcrumb">
                               <nav aria-label="breadcrumb">
                                   <ol class="breadcrumb">
                                       <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                       <li class="breadcrumb-item active" aria-current="page">Home</li>
                                   </ol>
                               </nav>
                           </div>
                       </div>
                   </div>
               </div>
               <!-- ============================================================== -->
               <!-- pagehader  -->
               <!-- ============================================================== -->
               <div class="row">
                   <!-- metric -->
                   <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                       <div class="card">
                           <div class="card-body">
                               <?php
                                $conn = new class_model();
                                $cstudent = $conn->count_allstudents();
                                ?>
                               <?php foreach ($cstudent as $row): ?>
                                   <div class="d-inline-block">
                                       <h5 class="text-muted"><b>Number of clients</b></h5>
                                       <h2 class="mb-0"><?= $row['count_students']; ?></h2>
                                   </div>
                                   <div class="float-right icon-circle-medium  icon-box-lg mt-1" style="background-color:#1269AF">
                                       <i class="fa fa-user-graduate fa-fw fa-sm text-info" style="color: white !important"></i>
                                   </div>
                               <?php endforeach; ?>
                           </div>
                           <div class="row">
                               <a href="student.php" class="btn btn-primary col-12" style="background-color:#1269AF">View Info</a>
                           </div>
                       </div>
                   </div>
                   <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                       <div class="card">
                           <div class="card-body">
                               <?php
                                $conn = new class_model();
                                $cstudent = $conn->count_complete();
                                ?>
                               <?php foreach ($cstudent as $row): ?>
                                   <div class="d-inline-block">
                                       <h5 class="text-muted"><b>Complete</b></h5>
                                       <h2 class="mb-0"><?= $row['count_complete']; ?></h2>
                                   </div>
                                   <div class="float-right icon-circle-medium  icon-box-lg mt-1" style="background-color:#1269AF">
                                       <i class="fa fa-calendar-check fa-fw fa-sm text-info" style="color:white !important"></i>
                                   </div>
                               <?php endforeach; ?>
                           </div>
                           <a href="complete.php" class="btn btn-primary" style="background-color:#1269AF">View</a>
                       </div>
                   </div>
                   <!-- /. metric -->


                   <!-- metric -->
                   <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                       <div class="card">
                           <div class="card-body">
                               <?php
                                $conn = new class_model();
                                $cstudent = $conn->count_declined();
                                ?>
                               <?php foreach ($cstudent as $row): ?>
                                   <div class="d-inline-block">
                                       <h5 class="text-muted"><b>Declined</b></h5>
                                       <h2 class="mb-0"><?= $row['count_declined']; ?></h2>
                                   </div>
                                   <div class="float-right icon-circle-medium  icon-box-lg mt-1" style="background-color:#1269AF">
                                       <i class="fa fa-calendar-check fa-fw fa-sm text-info" style="color:white !important"></i>
                                   </div>
                               <?php endforeach; ?>
                           </div>
                           <a href="declined.php" class="btn btn-primary" style="background-color:#1269AF">View</a>
                       </div>

                   </div>
               </div>
               <div class="row ">

                   <!-- metric -->
                   <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                       <div class="card">
                           <div class="card-body">
                               <?php
                                $conn = new class_model();
                                $cstudent = $conn->count_numberoftotalreceived();
                                ?>
                               <?php foreach ($cstudent as $row): ?>
                                   <div class="d-inline-block">
                                       <h5 class="text-muted"><b>New Request</b></h5>
                                       <h2 class="mb-0"><?= $row['count_received']; ?></h2>
                                   </div>
                                   <div class="float-right icon-circle-medium  icon-box-lg  mt-1" style="background-color:#1269AF">
                                       <i class="fa fa-bell fa-fw fa-sm text-info" style="color: white !important"></i>
                                   </div>
                               <?php endforeach; ?>

                           </div>
                           <a href="new-request.php" class="btn btn-primary" style="background-color:#1269AF">View</a>
                       </div>
                   </div>
                   <!-- /. metric -->

                   <!-- metric -->
                   <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                       <div class="card">
                           <div class="card-body">
                               <?php
                                $conn = new class_model();
                                $cstudent = $conn->count_numberoftotalrequest();
                                ?>
                               <?php foreach ($cstudent as $row): ?>
                                   <div class="d-inline-block">
                                       <h5 class="text-muted"><b>Number of total request</b></h5>
                                       <h2 class="mb-0"><?= $row['count_request']; ?></h2>
                                   </div>
                                   <div class="float-right icon-circle-medium  icon-box-lg mt-1" style="background-color:#1269AF">
                                       <i class="fa fa-layer-group fa-fw fa-sm text-info" style="color:white !important"></i>
                                   </div>
                               <?php endforeach; ?>
                           </div>
                           <a href="request.php" class="btn btn-primary" style="background-color:#1269AF">View</a>
                       </div>
                   </div>
                   <!-- /. metric -->
                   <!-- metric -->

                   <!-- /. metric -->
                   <!-- metric -->
                   <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                       <div class="card">
                           <div class="card-body">
                               <?php
                                $conn = new class_model();
                                $cstudent = $conn->count_numberofverified();
                                ?>
                               <?php foreach ($cstudent as $row): ?>
                                   <div class="d-inline-block">
                                       <h5 class="text-muted"><b>Processing</b></h5>
                                       <h2 class="mb-0"><?= $row['count_verified']; ?></h2>
                                   </div>
                                   <div class="float-right icon-circle-medium  icon-box-lg mt-1" style="background-color:#1269AF">
                                       <i class="fa fa-calendar-check fa-fw fa-sm text-info" style="color:white !important"></i>
                                   </div>
                               <?php endforeach; ?>
                           </div>
                           <a href="processing.php" class="btn btn-primary" style="background-color:#1269AF">View</a>
                       </div>
                   </div>
                   <!-- /. metric -->
                   <!-- metric -->

                   <!-- /. metric -->

               </div>
               <h5 class="card-header">Request Status Reports</h5>

               <div class="card-body">
                   <div class="row">
                       <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                           <div class="card">
                               <div class="card-body">
                                   <div class="chart-title">
                                       <h4>Request Status</h4>
                                   </div>
                                   <table class="table table-bordered mytable">
                                       <thead>
                                           <tr>
                                               <th>Course</th>
                                               <th>Number of Request</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                           <tr>
                                               <td>Course 1</td>
                                               <td>50</td>
                                           </tr>
                                           <tr>
                                               <td>Course 2</td>
                                               <td>55</td>
                                           </tr>
                                           <tr>
                                               <td>Course 3</td>
                                               <td>285</td>
                                           </tr>
                                           <tr>
                                               <td>Course 4</td>
                                               <td>50</td>
                                           </tr>
                                           <tr>
                                               <td>Course 5</td>
                                               <td>55</td>
                                           </tr>
                                           <tr>
                                               <td>Course 6</td>
                                               <td>285</td>
                                           </tr>
                                           <tr>
                                               <td>Course 7</td>
                                               <td>50</td>
                                           </tr>
                                           <tr>
                                               <td>Course 8</td>
                                               <td>55</td>
                                           </tr>
                                           <tr>
                                               <td>Course 9</td>
                                               <td>285</td>
                                           </tr>
                                       </tbody>
                                   </table>
                               </div>
                           </div>
                       </div>
                       <div class="col-4 col-md-4 col-lg-4 col-xl-8">
                           <div class="card">
                               <div class="card-body">
                                   <div class="chart-title">
                                       <h4>Number of Request</h4><br>
                                   </div>
                               </div>
                           </div>
                           <div class="card">
                               <h5 class="card-header">Request Status Reports</h5>
                               <div class="card-body">
                                   <div class="row">
                                       <div class="col-4 col-md-4 col-lg-4 col-xl-8">
                                           <div class="card">
                                               <div class="card-body">
                                                   <div class="chart-title">
                                                       <h4>Number of Request</h4><br>
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="card">
                                               <?php
                                                $conn = new class_model();
                                                $requestData = $conn->count_groupbycourse(); // Fetching data from database for pie chart
                                                $topCourses = $conn->get_top_courses(); // Fetching top 3 courses

                                                if (empty($requestData) && empty($topCourses)) {
                                                    echo "<p>No requests found.</p>";
                                                } else {
                                                ?>
                                                   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

                                                   <script type="text/javascript">
                                                       google.charts.load('current', {
                                                           'packages': ['corechart']
                                                       });
                                                       google.charts.setOnLoadCallback(drawChart);
                                                       google.charts.setOnLoadCallback(drawColumnChart);

                                                       function drawChart() {
                                                           var data = google.visualization.arrayToDataTable([
                                                               ['Course', 'Requests'],
                                                               <?php
                                                                $chartData = [];
                                                                foreach ($requestData as $row) {
                                                                    $chartData[] = "['" . addslashes($row['course']) . "', " . $row['count_coursename'] . "]";
                                                                }
                                                                echo implode(',', $chartData);
                                                                ?>
                                                           ]);

                                                           var options = {
                                                               title: 'Number of Requests per Course'
                                                           };

                                                           var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                                                           chart.draw(data, options);
                                                       }

                                                       function drawColumnChart() {
                                                           var data = google.visualization.arrayToDataTable([
                                                               ['Course', 'Requests'],
                                                               <?php
                                                                // Assuming $topCourses is an array containing the top 3 courses and their request counts
                                                                foreach ($topCourses as $row) {
                                                                    echo "['" . addslashes($row['course']) . "', " . $row['count_coursename'] . "],";
                                                                }
                                                                ?>
                                                           ]);

                                                           var options = {
                                                               title: 'Top 3 Most Frequently Requested Courses',
                                                               hAxis: {
                                                                   title: 'Courses',
                                                               },
                                                               vAxis: {
                                                                   title: 'Number of Requests',
                                                               },
                                                               series: {
                                                                   0: {
                                                                       color: '#1b9e77'
                                                                   },
                                                               }
                                                           };

                                                           var chart = new google.visualization.ColumnChart(document.getElementById('columnchart'));
                                                           chart.draw(data, options);
                                                       }
                                                   </script>

                                                   <div id="piechart" style="width: 500px; height: 500px;"></div>
                                                   <div id="columnchart" style="width: 800px; height: 500px;"></div>
                                               <?php } ?>
                                           </div>

                                       </div>
                                   </div>
                               </div>
                           </div>




                       </div>
                   </div>


                   <!-- ============================================================== -->
                   <!-- end responsive table -->
                   <!-- ============================================================== -->
               </div>

           </div>

       </div>
       </div>
       <!-- ============================================================== -->
       <!-- end main wrapper -->
       <!-- ============================================================== -->
       <!-- Optional JavaScript -->
       <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
       <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
       <script src="../assets/vendor/custom-js/jquery.multi-select.html"></script>
       <script src="../assets/libs/js/main-js.js"></script>
       <script src="../assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
       <script src="../assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
       <script src="../assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
       <script src="../assets/vendor/datatables/js/data-table.js"></script>
       <script type="text/javascript" src="../assets/js/loader.js"></script>
       <script type="text/javascript">
           $(document).ready(function() {
               var firstName = $('#firstName').text();
               var lastName = $('#lastName').text();
               var intials = $('#firstName').text().charAt(0) + $('#lastName').text().charAt(0);
               var profileImage = $('#profileImage').text(intials);
           });
       </script>

       </div>
       <!-- ============================================================== -->
       <!-- end wrapper  -->
       <!-- ============================================================== -->
       </div>

       <!-- ============================================================== -->
       <!-- end main wrapper  -->
       <!-- ============================================================== -->
       <!-- Optional JavaScript -->
       <!-- jquery 3.3.1 js-->
       <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
       <!-- bootstrap bundle js-->
       <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
       <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
       <!-- chartjs js-->
       <script src="../assets/vendor/charts/charts-bundle/Chart.bundle.js"></script>
       <script src="../assets/vendor/charts/charts-bundle/chartjs.js"></script>

       <!-- main js-->
       <script src="../assets/libs/js/main-js.js"></script>
       <!-- dashboard sales js-->
       <script src="../assets/libs/js/dashboard-sales.js"></script>
       <script type="text/javascript">
           $(document).ready(function() {
               var firstName = $('#firstName').text();
               var lastName = $('#lastName').text();
               var intials = $('#firstName').text().charAt(0) + $('#lastName').text().charAt(0);
               var profileImage = $('#profileImage').text(intials);
           });
       </script>

       <script>
           $(document).ready(function() {

               function load_unseen_notification(view = '') {
                   $.ajax({
                       url: "../init/controllers/fetch.php",
                       method: "POST",
                       data: {
                           view: view
                       },
                       dataType: "json",
                       success: function(data) {
                           $('.dropdown-menu_1').html(data.notification);
                           if (data.unseen_notification > 0) {
                               $('.count').html(data.unseen_notification);
                           }
                       }
                   });
               }

               load_unseen_notification();

               $(document).on('click', '.dropdown-toggle', function() {
                   $('.count').html('');
                   load_unseen_notification('yes');
               });

               setInterval(function() {
                   load_unseen_notification();;
               }, 5000);

           });
       </script>
       </body>

       </html>