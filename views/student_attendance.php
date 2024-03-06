<?php
$courseID = $_GET['courseID'];
include './../settings/config.php';
include './../settings/core.php';
?>

<!DOCTYPE html>
<html>

<head>
  <title>Schedule</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <!--CDN Bootstrap and Jquery-->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
  <!-- <script src="../js/bootstrap.min.js"></script> -->

  <!--Font awesome for icons-->
  <link rel="stylesheet" href="../fontawesome/css/all.css">

  <!--Sweet alert-->
  <script src="../js/sweetalert.min.js"></script>

  <!--Custom js and spinner-->
  <script type="text/javascript" src="../js/loader.js"></script>
  <script type="text/javascript" src="../js/jsfunctions.js"></script>

  <!--Custom CSS-->
  <style type="text/css" media="screen">
    a:link {
      color: black;
      text-decoration: none;
    }

    a:visited {
      color: black;
      text-decoration: none;
    }

    a:hover {
      color: #923D41;
      text-decoration: none;
    }

    a:active {
      color: #923D41;
      text-decoration: none;
    }

    /*menu dropdown link color*/
    a.dropdown-item:link {
      color: white;
      text-decoration: none;
    }

    a.dropdown-item:visited {
      color: white;
      text-decoration: none;
    }

    a.dropdown-item:hover {
      color: black;
      text-decoration: none;
    }

    a.dropdown-item:active {
      color: white;
      text-decoration: none;
    }

    /*sweet alert button color*/
    .swal-button {
      background-color: #923D41;
      padding: 7px 19px;
      box-shadow: none !important;
    }

    .swal-button:not([disabled]):hover {
      background-color: #923D41;
    }

    /*tool tip flicker ussie resolve*/
    .tooltip {
      pointer-events: none;
    }

    /*tab manu style*/
    .nav-tabs .nav-link.active {
      background-color: #923D41;
      color: white;
    }

    /*scrollable list*/
    .list-group {
      max-height: 350px;
      margin-bottom: 5px;
      overflow: auto;
      -webkit-overflow-scrolling: touch;
    }
  </style>
</head>

<body>

  <!--Core and setting-->

  <!--Top Navigation-->
  <!-- get active page from the main page calling the header -->

  <!--Top Navigation-->
  <?php
  include 'head.php';
  ?>
  <!--Main Body Content-->

  <div class="container mt-1">

    <h2 style="color: #923D41;" id="courseName"><span class="fa fa-users"></span>
      loading</h2>
    <br>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#upview"><span class="fa fa-eye"></span> Upcoming Schedule</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#pastview" id="pastView"><span class="fa fa-eye"></span> Past Schedule</a>
      </li>
    </ul>

    <!-- Tab pane -->
    <div class="tab-content">

      <!-- upcoming pane -->
      <div class="container tab-pane active" id="upview"><br>

        <small class="text-muted">Only take your attendance under the following circumstances:
          <ul>
            <li>You are physically present in class: not on your way or you intend to attend</li>
            <li>You are virtually present in class: not about to join or facing internet issues</li>
            <li>Honor code applies</li>
            <li><strong style='color:red;'>Do NOT share the PIN/CODE. This is considered a break of policy and will be escalated to AJC</strong></li>
          </ul>
        </small>
        <ul class="list-group" id="upSchedules">
        </ul>

      </div>

      <!-- past pane -->
      <div class="container tab-pane fade" id="pastview">
        <br>

        <div class="text-center">Total Statistics
          <p>
            <span>Total - </span><span id="totalStats" class="badge badge-pill badge-primary">0</span>
            <span>Present - </span><span id="presentStats" class="badge badge-pill badge-success">0</span>
            <span>Late - </span><span id="lateStats" class="badge badge-pill badge-warning">0</span>
            <span>Absent - </span><span id="absentStats" class="badge badge-pill badge-danger">0</span>
          </p>
        </div>

        <ul class="list-group list-group-flush list-group-hover" id="pastSchedules">
        </ul>

      </div>
    </div>


    <!-- The add Modal -->
    <div class="modal fade" id="addModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Verify Attendace By PIN</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!--Add Error Messages-->
          <div class="alert alert-danger fade collapse" id="pin_empty">
            PIN failed. Try again.
          </div>
          <div class="alert alert-danger fade collapse" id="pin_invalid">
            <strong>Failed!</strong> invalid PIN.
          </div>
          <div class="alert alert-danger fade collapse" id="pin_failed">
            <strong>Failed!</strong> Try again later.
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <!--Register Form-->
            <div>
              <form action="">

                <div class="form-group d-none">
                  <input type="text" class="form-control" id="aschid" readonly="true">
                </div>

                <div class="form-group">
                  <input type="password" class="form-control" placeholder="attendance pin" id="apin" required="required" maxlength="4">
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-block btn-success" id="addbutton" onclick="verifyPin(event)"><i class="fa fa-user-plus"></i> Confirm Attendance</button>
                </div>
              </form>

              <div class="d-flex justify-content-center">
                <div id="addLoading" role="status">
                </div>
              </div>

            </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>
    <!--End add Modal-->



  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var course_id = <?php echo $courseID; ?>;
      var userName = "<?php echo $_SESSION['Name']; ?>";
      $.ajax({
        url: './../actions/get_course_details.php?course_id=' + course_id,
        type: 'GET',
        success: function(data) {
          var parsedData = JSON.parse(data);
          var courseCode = parsedData[0].CourseCode;
          var courseName = parsedData[0].CourseName;
          document.getElementById('courseName').innerText = courseCode + ": " + courseName + " Attendance Tracking: " + userName;

        },

        error: function() {
          alert('Error fetching data.');
        }

      });
      upcomingSchedules();
    });

    function upcomingSchedules() {
      var course_id = <?php echo $courseID; ?>;
      $.ajax({
        url: './../actions/get_upcoming_schedules.php?courseID=' + course_id,
        type: 'GET',
        success: function(data) {
          var parsedData = JSON.parse(data);
          if (parsedData.success) {
            var day = parsedData.day;
            var time = parsedData.time;
            var schedules = "<li class='list-group-item d-flex justify-content-between align-items-center'>Today: " + day + " Time <div id ='times'>" + time + "</div><button type='button' class='btn btn - primary' data-toggle='modal' data-target='#addModal'>Take Attendance</button></li >";
            document.getElementById('upSchedules').innerHTML = schedules;
          } else {
            document.getElementById('upSchedules').innerHTML = parsedData.message;
          }
        },
        error: function() {
          alert("Error fetching data.");
        }
      });
    };


    document.getElementById('pastView').addEventListener('click', pastRecords);

    function pastRecords() {
      var course_id = <?php echo $courseID; ?>;
      var student_id = <?php echo $_SESSION['UserID']; ?>;
      $.ajax({
        url: './../actions/get_student_attendance_records.php?course_id=' + course_id + '&student_id=' + student_id,
        type: 'GET',
        success: function(data) {
          console.log(data["StatisticsData"]);
          var list = $('#pastSchedules');
          list.empty();

          $.each(data["attendanceRecords"], function(index, record) {
            if (record.Status == 'present') {
              var listItem = "<li class='list-group-item d-flex justify-content-between align-items-center'>" +
                record.AttendanceDateTime +
                "<span class='badge badge-pill badge-success'>" +
                record.Status +
                "</span></li>";
            } else if (record.Status == 'Late') {
              var listItem = "<li class='list-group-item d-flex justify-content-between align-items-center'>" +
                record.AttendanceDateTime +
                "<span class='badge badge-pill badge-warning'>" +
                record.Status +
                "</span></li>";
            } else {
              var listItem = "<li class='list-group-item d-flex justify-content-between align-items-center'>" +
                record.AttendanceDateTime +
                "<span class='badge badge-pill badge-danger'>" +
                record.Status +
                "</span></li>";
            }

            list.append(listItem);
            document.getElementById('totalStats').innerText = data["StatisticsData"].total;
            document.getElementById('presentStats').innerText = data["StatisticsData"].present;
            document.getElementById('lateStats').innerText = data["StatisticsData"].late;
            document.getElementById('absentStats').innerText = data["StatisticsData"].absent;
          });
        },
        error: function() {
          alert('Error fetching data.');
        }
      });
    }

    function verifyPin(event) {
      event.preventDefault();
      var course_id = <?php echo $courseID; ?>;
      var pin = document.getElementById('apin').value;
      if (pin == "" || isNaN(pin) || pin.length < 4 || pin.length > 4) {
        document.getElementById('pin_empty').classList.remove('collapse');
        setTimeout(function() {
          document.getElementById('pin_empty').classList.add('collapse');
        }, 3000);
      } else {
        $.ajax({
          url: './../actions/verify_attendance_pin.php?courseID=' + course_id + '&pin=' + pin + '&times=' + document.getElementById('times').innerText,
          type: 'GET',
          success: function(data) {
            if (data == "success") {
              swal("Success!", "Attendance verified", "success");
              document.getElementById('apin').value = "";
              $('#addModal').modal('hide');
            } else {
              document.getElementById('pin_invalid').classList.remove('collapse');
              setTimeout(function() {
                document.getElementById('pin_invalid').classList.add('collapse');
              }, 3000);
            }
          },
          error: function() {
            document.getElementById('pin_failed').classList.remove('collapse');
            setTimeout(function() {
              document.getElementById('pin_failed').classList.add('collapse');
            }, 3000);
          }
        });
      }
    }
  </script>
</body>

</html>