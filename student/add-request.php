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
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                             <h2 class="pageheader-title"><i class="fa fa-fw fa-file"></i> Add Request </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Request</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                 <!-- CSS for Layout -->
<style>
    .form-group {
        margin-bottom: 20px;
    }

    .section-title {
        font-size: 16px;
        font-weight: bold;
        color: #1269AF;
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
        margin-bottom: 20px;
    }

    .card-body {
        padding: 20px;
    }

    .form-control {
        padding: 5px;
        font-size: 14px;
    }

    .btn-primary {
        background-color: #1269AF;
        border-color: #1269AF;
        color: white;
    }

    .row {
        margin-left: 0;
        margin-right: 0;
    }

    .row > .col-md-6 {
        padding-left: 15px;
        padding-right: 15px;
    }

    .text-right {
        text-align: right;
    }
</style>

<div class="row justify-content-center">
    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 col-12">
        <div class="card influencer-profile-data">
            <div class="card-body">
                <div class="" id="message"></div>
                <form id="validationform" name="docu_forms" data-parsley-validate="" novalidate="" method="POST">
                    <!-- Applicant's Information Section -->
                    <div class="form-group">
                        <h4 class="section-title">Applicant's Information</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <?php
                                    $conn = new class_model();
                                    $getstudno = $conn->student_profile($student_id);
                                ?>
                                <label>Firstname</label>
                                <input type="text" name="first_name" value="<?= $getstudno['first_name']; ?>" class="form-control" readonly>
                            </div>
                            <div class="col-md-4">
                                <label>Maiden name</label>
                                <input type="text" name="middle_name" value="<?= $getstudno['middle_name']; ?>" class="form-control" readonly>
                            </div>
                            <div class="col-md-4">
                                <label>Lastname</label>
                                <input type="text" name="last_name" value="<?= $getstudno['last_name']; ?>" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label>Address</label>
                                <input type="text" name="complete_address" value="<?= $getstudno['complete_address']; ?>" class="form-control" placeholder="Enter Address" readonly>
                            </div>
                            <div class="col-md-6">
                                <label>Birthdate</label>
                                <input type="text" name="birthdate" class="form-control" placeholder="dd/mm/yyyy">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label>Course</label>
                                <select data-parsley-type="alphanum" type="text" id="course" required="" placeholder="" class="form-control">
                                                       <?php 
                                                            $conn = new class_model();  
                                                            $course = $conn->fetchAll_course();
                                                         ?>
                                                           <option value="">&larr;Select Course &rarr;</option>
                                                            <?php foreach ($course as $row) { ?>
                                                           <option value="<?= $row['course_name']; ?>"><?= $row['course_name']; ?></option>
                                                       <?php } ?>
                                                       </select>
                            </div>
                            <div class="col-md-6">
                                <label>Email Address</label>
                                <input type="text" name="email_address" class="form-control" placeholder="Enter Email">
                            </div>
                        </div>

                        <!-- Control Number Section -->
                        <?php 
                        function createRandomcnumber() {
                            $chars = "003232303232023232023456789";
                            srand((double)microtime()*1000000);
                            $i = 0;
                            $control = '';
                            while ($i <= 3) {
                                $num = rand() % 33;
                                $tmp = substr($chars, $num, 1);
                                $control = $control . $tmp;
                                $i++;
                            }
                            return $control;
                        }
                        $cNumber ='CTRL-'.createRandomcnumber();
                        ?>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label>Control Number</label>
                                <input type="text" value="<?= $cNumber.''.$_SESSION['student_id']; ?>" name="control_no" class="form-control" readonly>
                            </div>
                        </div>
                    </div>

                    <!-- Request For Section -->
                    <div class="form-group mt-4">
                        <h4 class="section-title">Request For</h4>
                        
                        <div class="row">
                            <div class="col-md-4"> <!-- First Column for Checkboxes -->
                                <label>Select Document</label> <br>
                                <?php
                                
                                $conn = new class_model();
                                $doc = $conn->fetchAll_document(); 
                                if ($doc && count($doc) > 0) {
                                    foreach ($doc as $index => $document) {
                                        // Display each document as a checkbox
                                        echo '<div class="form-check">';
                                        echo '<input class="form-check-input" type="checkbox" name="document_name[]" id="document_name' . ($index + 1) . '" value="' . $document['document_name'] . '" onchange="toggleQuantity(' . ($index + 1) . ')">';
                                        echo '<label class="form-check-label">' . $document['document_name'] . '</label>';
                                        
                                        // Hidden quantity input associated with the document
                                        echo '<div id="quantity' . ($index + 1) . '" class="mt-1 hidden" style="display:none;">';
                                        echo '<label for="' . $document['document_name'] . '">Copies:</label>';
                                        echo '<input type="number" name="no_ofcopies[]" value="1" class="form-control">';
                                        echo '</div>';
                                        echo '</div>';
                                    }
                                } else {
                                    echo "No documents found.";
                                }
                                ?> <br>
                        </div>
                    </div> 

                    <div class="form-group row" style="margin-top: -10px;">
												<label class="col-form-label col-sm-2">Date Request:</label>
												<div class="col-sm-6 col-lg-3">
														<input type="text" name="date_request" required="" class="form-control" value="<?php echo date('M d Y');?>" readonly>
												</div>
										</div>

										<div class="form-group row" style="margin-top: -10px;">
												<label class="col-form-label col-sm-2">Mode:</label>
												<div class="col-sm-2.5">
														<select name="mode_request" id="mode_request" required="" class="form-control">
																<option value="">&larr; Select Mode &rarr;</option>
																<option value="Pick Up">Pick-Up</option>
																<option value="Delivery">Delivery</option>
														</select>
												</div>
												<label class="col-form-label col-md-4" style="color: red; margin-left: 0;">Delivery Additional: ₱50</label>
										</div>

                    <!-- Purpose Section (Using Checkboxes) -->
                    <div class="form-group mt-4">
                        <h4 class="section-title">Purpose</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Select Purpose</label> <br>
                                <input type="checkbox" name="purpose[]" value="Evaluation"> Evaluation <br>
                                <input type="checkbox" name="purpose[]" value="Employment"> Employment/Promotion <br>
                                <input type="checkbox" name="purpose[]" value="Abroad"> Abroad <br>

                                <!-- Others (specify) with input field -->
                            </div>
                        </div>
                    </div>

                    <!-- Submission Section -->
                    <div class="form-group mt-4 text-right">
            <input type="hidden" name="student_id" value="<?= $_SESSION['student_id'];?>" class="form-control">
            <button type="button" id="submitForm" class="btn btn-primary btn-block">Submit</button>
        </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Payment Details Modal (add this at the bottom of your main PHP file) -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Payment Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><strong>Student Name: </strong> <span id="modalStudentName"></span></p>
        <p><strong>Control No.: </strong> <span id="modalControlNo"></span></p>
        <p><strong>Document Name: </strong> <span id="modalDocumentName"></span></p>
        <p><strong>Mode: </strong> <span id="modalMode"></span></p>
        <p><strong>Total Amount: </strong> <span id="modalTotalAmount"></span></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" id="confirmSubmit" class="btn btn-primary">Confirm</button>
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
    let formData = null; // Declare formData outside for reuse

    // Show or hide quantity input based on the checkbox selection
    $('input[type="checkbox"][name="document_name[]"]').change(function() {
        const quantityId = '#quantity' + this.id.replace('document_name', '');
        if (this.checked) {
            $(quantityId).show();
        } else {
            $(quantityId).hide();
            $(quantityId).find('input').val(''); // Clear input when unchecked
        }
    });

    // Handle form submission with modal trigger
    $('#submitForm').click(function(e) {
        e.preventDefault(); // Prevent default form submission

        formData = new FormData(document.querySelector('form[name="docu_forms"]'));

        // Validate that at least one document is selected
        let docNames = [];
        let docCopies = [];
        let isDocumentSelected = false;
        let totalAmount = 0;
        const costPerDocument = 50; // Example cost per document (adjust as needed)

        $('input[type="checkbox"][name="document_name[]"]').each(function(index) {
            if (this.checked) {
                isDocumentSelected = true;
                docNames.push(this.value); // Add selected document name
                let no_ofcopies = $(this).closest('.form-group').find('input[name="no_ofcopies[]"]').val();
                no_ofcopies = no_ofcopies ? no_ofcopies : 1; // Default to 1 if not provided
                docCopies.push(no_ofcopies);

                // Calculate total cost
                totalAmount += costPerDocument * no_ofcopies;
            }
        });

        if (!isDocumentSelected) {
            $('#message').html('<div class="alert alert-danger">Please select at least one document.</div>');
            return;
        }

        // Get the selected course value and append it to FormData
        var course = $('#course').val();
        if (course === "") {
            $('#message').html('<div class="alert alert-danger">Please select a course.</div>');
            return;
        }
        formData.append('course', course);

        // Clear previously appended values to avoid duplication
        formData.delete('document_name[]');
        formData.delete('no_ofcopies[]');

        // Append document names and copies to FormData
        docNames.forEach((doc, index) => {
            formData.append('document_name[]', doc);
            formData.append('no_ofcopies[]', docCopies[index]);
        });

        // Populate modal fields with the collected data

        // Correctly concatenate first, middle, and last names with spaces
        $('#modalStudentName').text(
            $('input[name="first_name"]').val() + ' ' +
            $('input[name="middle_name"]').val() + ' ' + 
            $('input[name="last_name"]').val()
        );

        $('#modalControlNo').text($('input[name="control_no"]').val());
        $('#modalDocumentName').text(docNames.join(', '));
        let modeValue = $('#mode_request').val(); // Correctly fetch the selected value
        console.log('Mode:', modeValue); // Debugging output
        $('#modalMode').text(modeValue);
        $('#modalTotalAmount').text('₱' + totalAmount); // Display total amount

        // Show the modal
        $('#paymentModal').modal('show');
    });

    $('.btn-secondary').click(function() {
    $('#paymentModal').modal('hide'); // Hide the modal when cancel is clicked
});
    // Confirm form submission when modal is confirmed
    $('#confirmSubmit').click(function() {
        // Check if formData exists and proceed with the AJAX submission
        if (formData !== null) {
            $.ajax({
                url: '../init/controllers/add_request.php',
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $("#message").html(response);
                    window.scrollTo(0, 0);
                    $('#paymentModal').modal('hide'); // Close modal on success
                },
                error: function(response) {
                    console.log("Failed to submit the form.");
                }
            });
        }
    });
});




// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
print_r($_POST); // This will help you inspect the incoming data
exit;
</script>


</body>
 
</html>