jQuery(function($){


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

  $("#dropdown-header-menu-button").on("click", function() {
    if( !$("#header-nav-div").is(":visible")) {
      $("#header-nav-div").show();
    }else {
      $("#header-nav-div").hide();
    }
  })

  var tags = $("li").filter(function() {
    if( $(this).children("ul").length !== 0) {
      $(this).children("a").css("pointer-events", "none");
      $(this).children("a").after('<i class="fa-solid fa-chevron-down"></i>');
    }
  });

  $("li").on("click", function() {
    if( $(this).children("ul").length !== 0) {
      if( !$(this).children("ul").is(":visible")) {
        $(this).children("ul").show();
      }else {
        $(this).children("ul").hide();
      }
    }
  })

})
