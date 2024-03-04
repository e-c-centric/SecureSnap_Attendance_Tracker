//take my attendance
function recordMyAttendance(schid){
	
	//prevent form submission and alert error
    event.preventDefault();

    //leslie loading spinner.
    Loader();

    //show spinner
    Loader.show();

    //check for pin
    //run ajax to check for pid
    $.post("../actions/check_pin", {sid:schid}, function(data, status)
    {        
        //check pin
        if(data == 'PIN')
        {
            //hide spinner
            Loader.hide();

            //disable button
            //document.getElementById('addbutton').disabled = true;

            //form element
            $('#aschid').val(schid); //set id
        
            //show modal
            $('#addModal').modal();

        }
        else if(data == 'NOPIN')
        {
            //hide spinner
            Loader.hide();

            //take attendance
            //disable button
            //document.getElementById('addbutton').disabled = true;


            //confirm delete
            if (confirm("kindly confirm attendance? ")) 
            {
                //show spinner
                Loader.show();

                //run ajax to approve permission request
                $.post("../actions/take_my_attendance", {sid:schid}, function(data, status){
                    
                    //hide spinner
                    Loader.hide();

                    //alert and relod after hiding the modal
                    swal("Attendance Taken", "", "success").then(function(){
                        location.reload();
                    });

                });
            }

            //enable button: user cancelled action
            //document.getElementById('addbutton').disabled = false;

        }
        else
        {

            //hide spinner
            Loader.hide();

            //alert and relod after hiding the modal
            swal("Attendance Failed", "Try again later", "success").then(function(){
                //location.reload();
            });
        }

    });

}

//veify attendance by PIN
function verifyPin(){
  
  //disable button
  document.getElementById('addbutton').disabled = true;

  //grab form data
  var regsche = document.getElementById('aschid').value;
  var vpin = document.getElementById('apin').value;
  

  //test for empty
  if(vpin == ""){

    //alert error
    $("#pin_empty").fadeTo(5000, 50).slideUp(500, function(){
        $("#pin_empty").slideUp(500);
    });
    document.getElementById('addbutton').disabled = false;
    return false;

  }
  else{
    
    //prevent form submission and alert error
    event.preventDefault();

    //show loadin
    $("#addLoading").addClass("spinner-border text-primary");

    $.post("../actions/take_my_attendance_with_pin",
      {
        sid:regsche,
        upin:vpin
      },
      function(data, status)
      {    
        if (data == "failed") 
        {
          
          //alert and return false
          $("#pin_failed").fadeTo(10000, 50).slideUp(500, function(){
              $("#pin_failed").slideUp(500);
          });

          //remove loading and enable button
          $("#addLoading").removeClass("spinner-border text-primary");

          //enable button
          document.getElementById('addbutton').disabled = false;

          return false;
        }else if(data == "invalid")
        {
            //alert and return false
            $("#pin_invalid").fadeTo(10000, 50).slideUp(500, function(){
                  $("#pin_invalid").slideUp(500);
            });

            //remove loading and enable button
            $("#addLoading").removeClass("spinner-border text-primary");

            //enable button
            document.getElementById('addbutton').disabled = false;

            return false;
        }

        else
        {

            //remove loading and enable button
            $("#addLoading").removeClass("spinner-border text-primary");

            //enable button
            document.getElementById('addbutton').disabled = false;

            //hide modal
            $('#addModal').modal('hide');

            //alert success
            swal("Attendance Taken", "", "success").then(function(){
                
                location.reload();
            });
        }

      });
  }
}

//function for a user to update their own profile
function updateStudentProfile(){

    //disable button
    document.getElementById('editButton').disabled = true;
    
    //grab form data
    var oldfname = document.getElementById('upufname').value;
    var oldlname = document.getElementById('upulname').value;
    var oldupho = document.getElementById('upupho').value;
    var oldugen = document.getElementById('upugender').value;
    var oldustuid = document.getElementById('upustuid').value;
    var oldustudeg = document.getElementById('upudeg').value;
    var oldustuyrg = document.getElementById('upuyrg').value;
    var oldudep = document.getElementById('upudept').value;
    var oldlstumaj = document.getElementById('upumajor').value;

    //define regex for name
    var ufnamereg = /^[a-zA-Z]{1,50}/gm;
    var ulnamereg = /^[a-zA-Z]{1,50}/gm;
    var uphreg = /^[0-9]{9,15}$/gm;
    var ustudidreg = /^[0-9]{8,8}$/gm;
    
    //test for first name
    if (!ufnamereg.test(oldfname)) {
    
        //prevent form submission and alert error
        event.preventDefault();
        //alert error
        $("#user_upd_fn").fadeTo(5000, 50).slideUp(500, function(){
            $("#user_upd_fn").slideUp(500);
        });
        document.getElementById('editButton').disabled = false;
    }//test for last name
    else if (!ulnamereg.test(oldlname)) {

        //prevent form submission and alert error
        event.preventDefault();
        //alert error
        $("#user_upd_ln").fadeTo(5000, 50).slideUp(500, function(){
            $("#user_upd_ln").slideUp(500);
        });
        document.getElementById('editButton').disabled = false;
    }//test for phone
    else if (!uphreg.test(oldupho)) {

        //prevent form submission and alert error
        event.preventDefault();
        //alert error
        $("#user_upd_ph").fadeTo(5000, 50).slideUp(500, function(){
            $("#user_upd_ph").slideUp(500);
        });
        document.getElementById('editButton').disabled = false;
    }//test for student id 
    else if (!ustudidreg.test(oldustuid)) {

        //prevent form submission and alert error
        event.preventDefault();
        //alert error
        $("#user_upd_sid").fadeTo(5000, 50).slideUp(500, function(){
            $("#user_upd_sid").slideUp(500);
        });
        document.getElementById('editButton').disabled = false;
    }
    else{
        //all good. procees with ajax
        //show loadin
        $("#updateLoading").addClass("spinner-border text-primary");

         //prevent form submission
         event.preventDefault();

        $.post("../actions/student_update_profile",
          {
            newfname:oldfname,
            newlname:oldlname,
            newupho:oldupho,
            newugen:oldugen,
            newustid:oldustuid,
            newustdeg:oldustudeg,
            newuyrg:oldustuyrg,
            newudept:oldudep,
            newumaj:oldlstumaj,
          },
          function(data, status)
          {
             if (data == "failed") {

                //alert error
                $("#user_upd_fail").fadeTo(10000, 50).slideUp(500, function(){
                    $("#user_upd_fail").slideUp(500);
                });
                //remove loading and enable button
                $("#updateLoading").removeClass("spinner-border text-primary");

                document.getElementById('editButton').disabled = false;
                return false;
             }
             else if (data == "partial") {

                //alert error
                $("#user_upd_part").fadeTo(10000, 50).slideUp(500, function(){
                    $("#user_upd_part").slideUp(500);
                });
                //remove loading and enable button
                $("#updateLoading").removeClass("spinner-border text-primary");

                document.getElementById('editButton').disabled = false;
                return false;
             }
             else{
                    //close modal and sweet alert
                    $("#editaUser").on('hidden.bs.modal', function()
                    {
                        //alert and relod after hiding the modal
                        swal("Profile Updated", "", "success").then(function(){
                            location.reload();
                        });
                    });

                    //hide modal
                    $('#editaUser').modal('hide');
                }
          });
    }
}