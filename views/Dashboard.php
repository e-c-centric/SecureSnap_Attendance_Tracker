<!DOCTYPE html>
<html>

<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Dashboard">

  <!-- boxicon -->
  <link href="./../css/boxicons.min.css" rel="stylesheet">

  <!--CDN Bootstrap and Jquery-->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script type="text/javascript" src="./../js/jquery-3.4.1.min.js"></script>
  <script src="./../js/bootstrap.min.js"></script>

  <!--Font awesome for icons-->
  <link rel="stylesheet" href="../fontawesome/css/all.css">

  <!--Custom CSS-->
  <style type="text/css" media="screen">
    a:link {
      color: white;
      text-decoration: none;
    }

    a:visited {
      color: white;
      text-decoration: none;
    }

    a:hover {
      color: white;
      text-decoration: none;
    }

    a:active {
      color: white;
      text-decoration: none;
    }

    * {
      box-sizing: border-box;
    }

    body {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    /* Float five columns side by side */
    .column {
      float: left;
      /*change the width to change the number of apps per row (20, 25, 40)*/
      width: 20%;
      padding: 10px;
    }

    /* Remove extra left and right margins, due to padding */
    .row {
      margin: 0 -5px;
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    /* Style the counter cards */
    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      padding: 10px;
      text-align: center;
      background-color: #f1f1f1;
      text-decoration: none;
      border-radius: 15px;
      color: white;
      transform: scale(0.95);
      border: none;
      /*height:15rem;*/
    }

    h3 {
      font-size: 1.17em;
    }

    .bx {
      font-size: 20pt;
      margin-top: 10px;
    }

    footer {
      margin: 10px;
      width: 100%;
      height: 20px;
      text-align: center;
      color: #923D41;
      font-size: small;
    }

    .topnav {
      overflow: hidden;
    }


    .topnav input[type=text] {
      float: right;
      padding: 8px;
      border: none;
      outline: none;
      margin-top: 8px;
      margin-right: 16px;
      font-size: 15px;
      background-color: #F1F1F1;
      border-radius: 8px;
      color: #898989;
      width: 20%;
      -webkit-transition: width 0.15s ease-in-out;
      transition: width 0.15s ease-in-out;
    }
  </style>
</head>

<body>

  <!--Core and setting-->

  <!--Top Navigation-->
  <!-- get active page from the main page calling the header -->

  <!--Top Navigation-->
  <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #923D41;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">

        <li class="nav-item active">
          <a class="nav-link" href="dashboard.php">
            <span>| </span>
            <span class="fas fa-industry"></span>
            <span>Dashboard</span>
          </a>
        </li>

        <li class="nav-item ">
          <a class="nav-link" href="profile.php">
            <span>| </span>
            <span class="fas fa-edit"></span>
            <span>Profile</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="./../login/logout.php">
            <span>| </span>
            <span class="fas fa-sign-out-alt"></span>
            <span>Logout</span>
          </a>
        </li>

      </ul>
    </div>
  </nav>
  <br>
  <div class="topnav">
    <input id="search" type="text" placeholder="Search for course..">
  </div>

  <!--Main Body Content-->
  <div class="container">
    <div class="row">

      <div class='col-lg-3 col-md-4 col-sm-6'>
        <div class='card h-100' style='background-color:#5F9EA0'>
          <a href='student_attendance?cid=73'>
            <i class='bx bx-badge-check'></i>
            <h5>CS341</h5>
            <h3><b>Web Technologies</b></h3>
            <h5>2nd Semester (Spring)</h5>
            <h6>2023/2024</h6>
            <h6>Cohort_A</h6>
        </div>
      </div>
      <div class='col-lg-3 col-md-4 col-sm-6'>
        <div class='card h-100' style='background-color:#5F9EA0'>
          <a href='student_attendance?cid=64'>
            <i class='bx bx-badge-check'></i>
            <h5>CS221</h5>
            <h3><b>Discrete Structures and Theories</b></h3>
            <h5>2nd Semester (Spring)</h5>
            <h6>2022/2023</h6>
            <h6>Cohort_A</h6>
        </div>
      </div>
      <div class='col-lg-3 col-md-4 col-sm-6'>
        <div class='card h-100' style='background-color:#5F9EA0'>
          <a href='student_attendance?cid=48'>
            <i class='bx bx-badge-check'></i>
            <h5>CS213</h5>
            <h3><b>Object Oriented Programming</b></h3>
            <h5>2nd Semester (Spring)</h5>
            <h6>2022/2023</h6>
            <h6>Cohort_A</h6>
        </div>
      </div>
      <div class='col-lg-3 col-md-4 col-sm-6'>
        <div class='card h-100' style='background-color:#5F9EA0'>
          <a href='student_attendance?cid=14'>
            <i class='bx bx-badge-check'></i>
            <h5>CS212</h5>
            <h3><b>Computer Programming for CS </b></h3>
            <h5>1st Semester (Fall)</h5>
            <h6>2022/2023</h6>
            <h6>Cohort_C</h6>
        </div>
      </div>
      <div class='col-lg-3 col-md-4 col-sm-6'>
        <div class='card h-100' style='background-color:#5F9EA0'>
          <a href='student_attendance?cid=13'>
            <i class='bx bx-badge-check'></i>
            <h5>CS211</h5>
            <h3><b>Computer Programming for Engineers</b></h3>
            <h5>1st Semester (Fall)</h5>
            <h6>2022/2023</h6>
            <h6>Cohort_C</h6>
        </div>
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function() {
      //search app list 
      $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".row .column").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>

</body>

</html>