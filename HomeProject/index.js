
$(document).ready(function(){

  function verifyifnotempty(){

      var result=$("input").filter(function () {
        if($.trim($(this).val()).length == 0){
          $(this).css("border-color","red");
        }
        else{
            $(this).css("border","1px solid #ced4da");
        }
        return $.trim($(this).val()).length == 0
    }).length == 0;

    return result;
  }

$("#submitform").off().on("click",function(){

  var name=$("#name").val();
  var lastname=$("#lastname").val();
  var email=$("#email").val();
  var age=$("#age").val();

if(verifyifnotempty()==false){
  return 0;
}


// Verify If Email Contains a "." for adddress
  let emailaddress = email.split("@")[1];
  // Try To Catch if the length is valid or not after the ".", if not, alert Invalid Email
  try{
    emailaddress.split(".")[1].length > 2;
  }
  catch(ex){
    alert("Please Enter a valid Email");
    $("#email").css("border-color", "red");
  }

//if(email=="" || email.indexOf("@")==-1 || email.indexOf(".com")==-1) or
  if(email=="" || !email.includes("@") || !emailaddress.includes(".") || !(emailaddress.split(".")[1].length>=2)){

    alert("Please Enter a valid Email");
    $("#email").css("border-color","red");
    return 0;
  }
  else if(!$.isNumeric(age)){
    alert("Please Enter An Integer");
    $("#age").css("border-color","red");
    return 0;
  }
  else{

    if ($("#verifynorobot").is(":checked"))
    {

    $.ajax({
              type: "GET",
              url: 'file.php',
              data:({name:name,lastname:lastname,email:email,age:age}),
              success: function(data)
              {

                  console.log(data);
              }
         });

        }

      else{
        alert("Please Check The CheckBox");
      }

  }


});


// Age
  $("#age").keypress(function (e) {
    var keyCode = e.which;
    /*
    8 - (backspace)
    32 - (space)
    48-57 - (0-9)Numbers
    */
    if ((keyCode != 8 || keyCode == 32) && (keyCode < 48 || keyCode > 57) || $("#age").val().length>=3) {
      return false;
    }
  });

// Name And Last Name
  $("#name,#lastname").keypress(function (e) {
    var keyCode = e.which;

    /* 
    48-57 - (0-9)Numbers
    65-90 - (A-Z)
    97-122 - (a-z)
    8 - (backspace)
    32 - (space)
    */
    // Not allow special and numbers
    if (!((keyCode >= 65 && keyCode <= 90)
      || (keyCode >= 97 && keyCode <= 122))
      && keyCode != 8 && keyCode != 32) {
      e.preventDefault();
    }
  });

});
