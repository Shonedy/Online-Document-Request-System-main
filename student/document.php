       <?php include('main_header/header.php');?>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
         <?php include('left_sidebar/sidebar.php');?>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->

         <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                             <h2 class="pageheader-title"><i class="material-icons" style="font-size:36px" ></i> Send Proof of Payment </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Document</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
               
                <!-- This is a comment -->
                   <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Document  Information</h5>
                                <div class="card-body">
                                     <div id="message"></div>
                                    <div class="table-responsive">
                                        <a href="add-document.php" class="btn btn-sm" style="background-color:#1269AF !important; color:white"><i class="fa fa-fw fa-plus"></i> Add Screenshot</a><br><br>
                                        <table class="table table-striped table-bordered first">
                                            <thead>
                                                <tr>
                                                    <th scope="col"> Date Created</th>
                                                    <th scope="col">Document Name</th>
                                                    <th scope="col">Description</th>
                                                    <th scope="col">File Size</th>
                                                    <th scope="col">View Image</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                            <?php 
                                                $student_id = $_SESSION['student_id'];
                                                $conn = new class_model();
                                                $docu = $conn->fetchAll_document($student_id);
                                               ?>
                                               <?php foreach ($docu as $row) { ?>
                                                <tr>
                                                    <td><?= date("M d, Y",strtotime($row['date_created'])); ?></td>
                                                    <td><?= $row['document_name']; ?></td>
                                                    <td><?= $row['document_decription']; ?></td>
                                                    <td><?php echo floor($row['image_size']/ 1000) . ' KB'; ?></td>
                                                    
                                                    <td><a href="../student/<?php echo $row['document_name']?>" target="_blank"><img src="../student/<?php echo $row['document_name']?>" width=75></a></td>
                                                    <td class="align-right">
                                                    <a href="../student/<?php echo $row['document_name']?>" target="_blank" class="text-secondary font-weight-bold text-xs" onlclick="show">
                                                          <i class="fa fa-eye"></i> |
                                                        <a href="edit-document.php?document=<?= $row['document_id']; ?>&document-name=<?php echo $row['document_name']; ?>"  class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                          <i class="fa fa-edit"></i>
                                                        </a> |
                                                        <a href="javascript:;" data-id="<?= $row['document_id']; ?>" class="text-secondary font-weight-bold text-xs delete" data-toggle="tooltip" data-original-title="Edit user">
                                                          <i class="fa fa-trash-alt"></i>
                                                        </a>
                                                      </td>
                                                </tr>
                                             <?php }?>
                                            </tbody>
                                        </table>
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
    <script src="../asset/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../asset/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../asset/vendor/custom-js/jquery.multi-select.html"></script>
    <script src="../asset/libs/js/main-js.js"></script>
    <script src="../asset/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../asset/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="../asset/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="../asset/vendor/datatables/js/data-table.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
          var firstName = $('#firstName').text();
          var lastName = $('#lastName').text();
          var intials = $('#firstName').text().charAt(0) + $('#lastName').text().charAt(0);
          var profileImage = $('#profileImage').text(intials);
        });
    </script>
    <script>
    $(document).ready(function() {

        load_data();

        var count = 1;

        function load_data() {
            $(document).on('click', '.delete', function() {

                var document_id = $(this).attr("data-id");
                // console.log("================get course_id================");
                // console.log(course_id);
                if (confirm("Are you sure want to remove this data?")) {
                    $.ajax({
                        url: "../init/controllers/delete_document.php",
                        method: "POST",
                        data: {
                            document_id: document_id
                        },
                      success: function(response) {

                          $("#message").html(response);
                          },
                          error: function(response) {
                            console.log("Failed");
                          }
                    })
                }
            });
        }

    });
</script>
</body>
 
</html>