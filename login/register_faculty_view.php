<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, maximum-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="css/register.css" />
    <link rel="stylesheet" type="text/css" href="css/styleguide.css" />
    <link rel="stylesheet" type="text/css" href="css/globals.css" />
    <title>Register Faculty</title>
  </head>
  <body style="margin: 0; background: #ffffff">
    <input type="hidden" id="anPageName" name="page" value="register" />
    <div class="container-center-horizontal">
      <div class="register screen">
        <div class="rectangle-3"></div>
        <h1 class="">Register Faculty</h1>
        <form id="registerForm" action="./../actions/register_faculty_action.php" method="POST">
          <div class="overlap-group1">
            <div class="rectangle"></div>
            <div class="first-name inter-bold-white-20px">Name:</div>
          </div>
          <input type="text" id="name" name="name" required>
          <div class="overlap-group">
            <div class="rectangle"></div>
            <div class="email inter-bold-white-20px">Email:</div>
          </div>
          <input type="email" id="email" name="email" required>
          <div class="overlap-group6">
            <div class="rectangle-12"></div>
            <div class="department inter-bold-white-20px">Department:</div>
          </div>
          <div class="dropdown">
            
          </div>
          <div class="overlap-group4">
            <div class="rectangle-13"></div>
            <div class="rectangle-1"></div>
            <div class="phone inter-bold-white-20px">Password:</div>
          </div>
          <input type="password" id="password" name="password" required>
          <input type="submit" value="Register" class="place-1">
        </form>
        <p class="have-an-account-already-login inter-normal-black-24px">Have an account already? Login</p>
      </div>
    </div>
  </body>
</html>

<select name="department" id="department" required>
              <option value="" disabled selected>Select Department</option>
              <?php
              include '../functions/select_dpt_fxn.php';
              echo getDepartments();
              ?>
            </select>