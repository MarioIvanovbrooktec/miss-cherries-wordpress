jQuery(function($){
console.log("hooola");

  function validateEmail(email){
      var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      return regex.test(email);
  }

  $("#sign-up-button").on("click",function() {

      var email = $("#email-input-form").val();
      if(!email){
          $("#invalid-email").hide();
          $("#empty-email").show();
      }else{
          if(validateEmail(email)){
              $("#empty-email").hide();
              $("#invalid-email").hide();
              $("#myModal").modal("show");
          }else{
              $("#empty-email").hide();
              $("#invalid-email").show();
          }
      }
  })

})
