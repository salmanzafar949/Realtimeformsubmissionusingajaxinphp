$(document).ready(function () {
   $('#email').focus();
   $('#pass').focus();
   $('#pass1').focus();
   $('#pass1').keypress(function (event) {
       var key = (event.keyCode ? event.keyCode : event.which);
       if(key == 13 )
       {
           var email = $('#email').val();
           var pass  = $('#pass').val();
           var pass1 = $('#pass1').val();

           if(email == "" && pass == "" && pass1 =="")
           {
               alert("All Fields are Required");
           }
           else
           {
             if(pass == pass1) {
                 $.ajax({
                     method: "POST",
                     url: "action.php",
                     data: {email: email, pass: pass},
                     success: function (status) {
                         //    window.location.href = "dashboard.php";
                             $('#result').html(status);
                             $('#email').val('');
                             $('#pass').val('');
                             $('#pass1').val('');

                     },
                     error: function (xhr, ajaxoption, thrownerror) {

                         $('#result').html(xhr,status,thrownerror);
                     }
                 });
             }
             else
             {
                 alert("Password doesn't match");
             }
           }
       }
   });
});