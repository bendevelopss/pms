<script type="text/javascript"> 
function ClearFields() {
      document.getElementById("username").value = "";
      document.getElementById("password").value = "";
      document.getElementById("lastname").value = "";
      document.getElementById("firstname").value = "";
      document.getElementById("middlename").value = "";
      document.getElementById("lastname").value = "";
      document.getElementById("contact").value = "";
      document.getElementById("email").value = "";
      document.getElementById("city").value = "";
      document.getElementById("street").value = "";


       var txtusername =  $("#username").val();
    var txtpassword =  $("#password").val();
    var txtlastname= $("#lastname").val();
    var txtfirstname = $("#firstname").val();
    var txtmiddlename =$("#middlename").val();
    var contactnum= $("#contact").val();
    var streets= $("#street").val();
    var citys = $("#city").val();
    var emails= $("#email").val();



  $("#messageemail").removeClass('fa fa-thumbs-o-up').addClass('fa fa-thumbs-o-down');
        $("#email").removeClass('w3-border-red w3-pale-green w3-leftbar w3-rightbar w3-border-green');


$("#messageemail").removeClass('fa fa-thumbs-o-down').addClass('fa fa-thumbs-o-up');
        $("#email").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red').addClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');

$("#email").removeClass('w3-border-green');
      $("#email").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#email").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messageemail").removeClass('fa fa-thumbs-o-down');
      $("#messageemail").removeClass('fa fa-thumbs-o-up');



  $("#messagemiddle").removeClass('fa fa-thumbs-o-up').addClass('fa fa-thumbs-o-down');
        $("#middlename").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');


         $("#middlename").removeClass('w3-border-red');
      $("#middlename").removeClass('w3-border-green');
      $("#middlename").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#middlename").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messagemiddle").removeClass('fa fa-thumbs-o-down');
      $("#messagemiddle").removeClass('fa fa-thumbs-o-up');
  $("#messagecontact").removeClass('fa fa-thumbs-o-up').addClass('fa fa-thumbs-o-down');
        $("#contact").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
  $("#messagecontact").removeClass('fa fa-thumbs-o-down').addClass('fa fa-thumbs-o-up');
 $("#contact").removeClass('w3-border-red');
      $("#contact").removeClass('w3-border-green');
      $("#contact").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#contact").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messagecontact").removeClass('fa fa-thumbs-o-down');
      $("#messagecontact").removeClass('fa fa-thumbs-o-up');
  $("#messagelast").removeClass('fa fa-thumbs-o-up').addClass('fa fa-thumbs-o-down');
        $("#lastname").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
$("#lastname").removeClass('w3-border-red');
      $("#lastname").removeClass('w3-border-green');
      $("#lastname").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#lastname").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messagelast").removeClass('fa fa-thumbs-o-down');
      $("#messagelast").removeClass('fa fa-thumbs-o-up');
 $("#messagefirst").removeClass('fa fa-thumbs-o-up').addClass('fa fa-thumbs-o-down');
        $("#firstname").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
  $("#firstname").removeClass('w3-border-red');
      $("#firstname").removeClass('w3-border-green');
      $("#firstname").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#firstname").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messagefirst").removeClass('fa fa-thumbs-o-down');
      $("#messagefirst").removeClass('fa fa-thumbs-o-up');
  $("#username").removeClass('w3-border-red');
      $("#username").removeClass('w3-border-green');
      $("#username").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#username").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messageuser").removeClass('fa fa-thumbs-o-down');
      $("#messageuser").removeClass('fa fa-thumbs-o-up');

  $("#username").removeClass('w3-border-red');
      $("#username").removeClass('w3-border-green');
      $("#username").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#username").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messageuser").removeClass('fa fa-thumbs-o-down');
      $("#messageuser").removeClass('fa fa-thumbs-o-up');

$("#password").removeClass('w3-border-red');
      $("#password").removeClass('w3-border-green');
      $("#password").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#password").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messagepass").removeClass('fa fa-thumbs-o-down');
      $("#messagepass").removeClass('fa fa-thumbs-o-up');

  $("#messagepass").removeClass('fa fa-thumbs-o-down').addClass('fa fa-thumbs-o-up');
  $("#password").removeClass('w3-border-red');
      $("#password").removeClass('w3-border-green');
      $("#password").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#password").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messagepass").removeClass('fa fa-thumbs-o-down');
      $("#messagepass").removeClass('fa fa-thumbs-o-up');
 $("#street").removeClass('w3-border-red');
      $("#street").removeClass('w3-border-green');
      $("#street").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#street").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messagestreet").removeClass('fa fa-thumbs-o-down');
      $("#messagestreet").removeClass('fa fa-thumbs-o-up');

  $("#messagestreet").removeClass('fa fa-thumbs-o-down').addClass('fa fa-thumbs-o-up');
 $("#street").removeClass('w3-border-red');
      $("#street").removeClass('w3-border-green');
      $("#street").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#street").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messagestreet").removeClass('fa fa-thumbs-o-down');
      $("#messagestreet").removeClass('fa fa-thumbs-o-up');
 $("#city").removeClass('w3-border-red');
      $("#city").removeClass('w3-border-green');
      $("#city").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#city").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messagecity").removeClass('fa fa-thumbs-o-down');
      $("#messagecity").removeClass('fa fa-thumbs-o-up');

 $("#messagecity").removeClass('fa fa-thumbs-o-down').addClass('fa fa-thumbs-o-up');
 $("#city").removeClass('w3-border-red');
      $("#city").removeClass('w3-border-green');
      $("#city").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#city").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messagecity").removeClass('fa fa-thumbs-o-down');
      $("#messagecity").removeClass('fa fa-thumbs-o-up');



}


$(document).ready(function () {
   $("#username, #password,  #lastname, #firstname, #middlename, #contact, #city, #street, #email").keyup(checkPasswordMatch);
});

</script>