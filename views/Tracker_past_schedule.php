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
  <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #923D41;">
    <a class="navbar-brand" href="Dashboard.php">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">

        <li class="nav-item active">
          <a class="nav-link" href="Dashboard.php">
            <span>| </span>
            <span class="fas fa-industry"></span>
            <span>Dashboard</span>
          </a>
        </li>

        <li class="nav-item ">
          <a class="nav-link" href="Profile.php">
            <span>| </span>
            <span class="fas fa-edit"></span>
            <span>Profile</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../../login/logout.php">
            <span>| </span>
            <span class="fas fa-sign-out-alt"></span>
            <span>Logout</span>
          </a>
        </li>

      </ul>
    </div>
  </nav>
  <br> <br>

  <!--Main Body Content-->

  <div class="container mt-1">

    <h2 style="color: #923D41;"><span class="fa fa-users"></span>
      Web Technologies Attendance Tracking -
      Elikem Asudo Tsatsu Gale-Zoyiku </h2>
    <br>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#upview"><span class="fa fa-eye"></span> Upcoming Schedule</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#pastview"><span class="fa fa-eye"></span> Past Schedule</a>
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
        <ul class="list-group">

          No Course schedule found
        </ul>

      </div>

      <!-- past pane -->
      <div class="container tab-pane fade" id="pastview">
        <br>

        <div class="text-center">Total Statistics

          19/22 - P(18) L(1) </div>

        <ul class="list-group list-group-flush list-group-hover">

          <li class='list-group-item d-flex justify-content-between align-items-center'>Wed 28-Feb-2024 @ 13:15:00<span class='badge badge-danger badge-pill'>absent</span>
          </li>
          <li class='list-group-item d-flex justify-content-between align-items-center'>Mon 26-Feb-2024 @ 13:15:00<span class='badge badge-warning badge-pill'>late</span>
          </li>
          <li class='list-group-item d-flex justify-content-between align-items-center'>Fri 23-Feb-2024 @ 12:15:00<span class='badge badge-success badge-pill'>present</span>
          </li>
          <li class='list-group-item d-flex justify-content-between align-items-center'>Wed 21-Feb-2024 @ 13:15:00<span class='badge badge-success badge-pill'>present</span>
          </li>
          <li class='list-group-item d-flex justify-content-between align-items-center'>Mon 19-Feb-2024 @ 13:15:00<span class='badge badge-success badge-pill'>present</span>
          </li>
          <li class='list-group-item d-flex justify-content-between align-items-center'>Fri 16-Feb-2024 @ 12:16:00<span class='badge badge-success badge-pill'>present</span>
          </li>
          <li class='list-group-item d-flex justify-content-between align-items-center'>Wed 14-Feb-2024 @ 13:17:00<span class='badge badge-success badge-pill'>present</span>
          </li>
          <li class='list-group-item d-flex justify-content-between align-items-center'>Mon 12-Feb-2024 @ 13:15:00<span class='badge badge-danger badge-pill'>absent</span>
          </li>
          <li class='list-group-item d-flex justify-content-between align-items-center'>Fri 09-Feb-2024 @ 12:15:00<span class='badge badge-success badge-pill'>present</span>
          </li>
          <li class='list-group-item d-flex justify-content-between align-items-center'>Wed 07-Feb-2024 @ 13:15:00<span class='badge badge-success badge-pill'>present</span>
          </li>
          <li class='list-group-item d-flex justify-content-between align-items-center'>Mon 05-Feb-2024 @ 13:15:00<span class='badge badge-success badge-pill'>present</span>
          </li>
          <li class='list-group-item d-flex justify-content-between align-items-center'>Fri 02-Feb-2024 @ 12:16:00<span class='badge badge-success badge-pill'>present</span>
          </li>
          <li class='list-group-item d-flex justify-content-between align-items-center'>Wed 31-Jan-2024 @ 13:15:00<span class='badge badge-success badge-pill'>present</span>
          </li>
          <li class='list-group-item d-flex justify-content-between align-items-center'>Mon 29-Jan-2024 @ 13:15:00<span class='badge badge-success badge-pill'>present</span>
          </li>
          <li class='list-group-item d-flex justify-content-between align-items-center'>Fri 26-Jan-2024 @ 12:18:00<span class='badge badge-success badge-pill'>present</span>
          </li>
          <li class='list-group-item d-flex justify-content-between align-items-center'>Wed 24-Jan-2024 @ 13:15:00<span class='badge badge-success badge-pill'>present</span>
          </li>
          <li class='list-group-item d-flex justify-content-between align-items-center'>Mon 22-Jan-2024 @ 01:17:00<span class='badge badge-success badge-pill'>present</span>
          </li>
          <li class='list-group-item d-flex justify-content-between align-items-center'>Fri 19-Jan-2024 @ 10:23:00<span class='badge badge-danger badge-pill'>absent</span>
          </li>
          <li class='list-group-item d-flex justify-content-between align-items-center'>Wed 17-Jan-2024 @ 13:15:00<span class='badge badge-success badge-pill'>present</span>
          </li>
          <li class='list-group-item d-flex justify-content-between align-items-center'>Mon 15-Jan-2024 @ 13:20:00<span class='badge badge-success badge-pill'>present</span>
          </li>
          <li class='list-group-item d-flex justify-content-between align-items-center'>Fri 12-Jan-2024 @ 12:18:00<span class='badge badge-success badge-pill'>present</span>
          </li>
          <li class='list-group-item d-flex justify-content-between align-items-center'>Wed 10-Jan-2024 @ 13:15:00<span class='badge badge-success badge-pill'>present</span>
          </li>
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
            PIN cannot be empty
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
                  <button type="submit" class="btn btn-block btn-success" id="addbutton" onclick="verifyPin()"><i class="fa fa-user-plus"></i> Confirm Attendance</button>
                </div>
              </form>

              <!--Loading spinner-->
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

</body>

</html>