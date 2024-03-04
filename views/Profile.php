<!DOCTYPE html>
<html>

<head>
  <title>Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <!--CDN Bootstrap and Jquery-->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>

  <!--Font awesome for icons-->
  <link rel="stylesheet" href="../fontawesome/css/all.css">

  <!--Sweet alert-->
  <script src="../js/sweetalert.min.js"></script>

  <!--Custom js and spinner-->
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

    img {
      border-radius: 50%;
    }
  </style>
</head>

<body>

  <!--Core and setting-->

  <!--Top Navigation-->
  <!-- get active page from the main page calling the header -->

  <!--Top Navigation-->
  <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #923D41;">
    <a class="navbar-brand" href="../">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">

        <li class="nav-item ">
          <a class="nav-link" href="./../views/Dashboard.php">
            <span>| </span>
            <span class="fas fa-industry"></span>
            <span>Dashboard</span>
          </a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="./../views/Profile.php">
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

    <div class="jumbotron">
      <div class="col-sm-12 table-responsive-sm">
        <table class="table table-sm table-borderless">
          <tbody>
            <tr>
              <td rowspan="6"><img src="../../app_server/images/2024/15-01-2024-13-28-47.png" style="width:200px"></td>
              <td><span class="fas fa-user"></span><strong> First Name: </strong></td>
              <td><i> Elikem Asudo Tsatsu </i></td>
              <td><span class="fas fa-user"></span><strong> Last Name: </strong></td>
              <td><i>Gale-Zoyiku</i></td>
            </tr>
            <tr>
              <td><span class="fas fa-building"></span><strong> Department: </strong></td>
              <td><i>Computer Science & Information Systems</i></td>
              <td><span class="fas fa-mobile-alt"></span><strong> Mobile: </strong></td>
              <td><i>0507586382</i></td>
            </tr>
            <tr>
              <td><span class="fas fa-envelope"></span><strong> Email: </strong></td>
              <td><i>elikem.gale-zoyiku@ashesi.edu.gh</i></td>
              <td><span class="fas fa-child"></span><strong> Gender: </strong></td>
              <td><i>Male</i></td>
            </tr>
            <tr>
              <td><span class="fas fa-address-card"></span><strong> ID: </strong></td>
              <td><i>56042025</i></td>
              <td><span class="fas fa-users-cog"></span><strong> Year Group: </strong></td>
              <td><i>2025</i></td>
            </tr>
            <tr>
              <td><span class="fas fa-graduation-cap"></span><strong> Degree: </strong></td>
              <td><i>B.Sc</i></td>

              <td><span class="fas fa-graduation-cap"></span><strong> Major: </strong></td>
              <td><i>Computer Science</i></td>
            </tr>
          </tbody>
        </table>
      </div>

      <!--Action Buttons-->
      <div class="text-center"><br>
        <button class="btn btn-secondary" data-toggle="modal" data-target="#editaUser"><span class="fas fa-upload"></span> Edit Profile</button>
        <a href="profile_pics.php"><button class="btn btn-secondary"><span class="fas fa-camera"></span> Change Profile Picture</button></a>
      </div>
    </div>


    <!-- The edit user Modal -->
    <div class="modal fade" id="editaUser">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Update Account</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Update Modal body -->
          <div class="modal-body">
            <!--Update Form-->
            <div>
              <form action="">

                <div class="row form-group">
                  <div class="col">
                    <input type="text" class="form-control" placeholder="First Name *" id="upufname" required="required" maxlength="20" value="Elikem Asudo Tsatsu">
                  </div>
                  <div class="col">
                    <input type="text" class="form-control" placeholder="Last Name *" id="upulname" required="required" maxlength="20" value="Gale-Zoyiku">
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col">
                    <select class="form-control" id="upugender">
                      <option value="1" selected>Male</option>
                      <option value="2">Female</option>
                    </select>
                  </div>
                  <div class="col">
                    <input type="text" class="form-control" maxlength="10" placeholder="Phone Number" id="upupho" value="0507586382">
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col">
                    <input type="text" class="form-control" placeholder="Student ID - 10152050" id="upustuid" maxlength="8" value="56042025">
                    <small class="form-text text-muted">
                      student ID
                    </small>
                  </div>

                  <div class="col">
                    <select class="form-control" id="upudeg">
                      <option value=1 selected>B.Sc</option>
                      <option value=2>M.Sc</option>
                    </select>
                  </div>

                  <div class="col scrollable-menu">
                    <select class="form-control" id="upuyrg" size="4">
                      <option value=12>2028</option>
                      <option value=11>2027</option>
                      <option value=10>2026</option>
                      <option value=9 selected>2025</option>
                      <option value=8>2024</option>
                      <option value=7>2023</option>
                      <option value=6>2022</option>
                      <option value=5>2021</option>
                      <option value=4>2020</option>
                      <option value=3>2019</option>
                      <option value=2>2018</option>
                      <option value=1>2017</option>
                    </select>
                    <small class="form-text text-muted">
                      year group
                    </small>
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col">
                    <select class="form-control" id="upudept">
                      <option value=1 selected>CSIS - Computer Science & Information Systems</option>
                      <option value=2>HSS - Humanities & Social Sciences</option>
                      <option value=3>BA - Business Administration</option>
                      <option value=4>ENG - Engineering</option>
                    </select>
                    <small class="form-text text-muted">
                      department
                    </small>
                  </div>
                  <div class="col">
                    <select class="form-control" id="upumajor">
                      <option value=1 selected>Computer Science</option>
                      <option value=2>Management Information Systems</option>
                      <option value=3>Business Administration</option>
                      <option value=4>Computer Engineering</option>
                      <option value=5>Electrical & Electronic Engineering</option>
                      <option value=6>Mechanical Engineering</option>
                    </select>
                    <small class="form-text text-muted">
                      major
                    </small>
                  </div>
                </div>


                <!--Update Error Messages-->
                <div class="alert alert-danger fade collapse" id="user_upd_fn">
                  Invalid first name.
                </div>
                <div class="alert alert-danger fade collapse" id="user_upd_ln">
                  Invalid last name.
                </div>
                <div class="alert alert-danger fade collapse" id="user_upd_ph">
                  Invalid phone number - use 10 digit: e.g. 0244112233
                </div>
                <div class="alert alert-danger fade collapse" id="user_upd_sid">
                  Invalid student ID - Expecting 8 digit: e.g. 10222030
                </div>
                <div class="alert alert-danger fade collapse" id="user_upd_part">
                  <strong>Partial Update!</strong> Some parts could not be updated. Try again later
                </div>
                <div class="alert alert-danger fade collapse" id="user_upd_fail">
                  <strong>Failed!</strong> User update failed.
                </div>

                <div class="form-group">
                  <button type="button" class="btn btn-block btn-success" id="editButton" onclick="updateStudentProfile()"><span class="fa fa-check-circle"></span> Update Profile</button>
                </div>
              </form>

              <!--Loading spinner-->
              <div class="d-flex justify-content-center">
                <div id="updateLoading" role="status">
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
    <!--End edit user Modal-->
    <br><br>



  </div>

</body>

</html>