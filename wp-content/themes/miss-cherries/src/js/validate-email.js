jQuery(function($){

  $('.owl-carousel').owlCarousel({
    loop:false,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})

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
  });

  $("#dropdown-header-menu-button").on("click", function() {
    if( !$("#header-nav-div").is(":visible")) {
      $("#header-nav-div").show();
    }else {
      $("#header-nav-div").hide();
    }
  });


 $(".menu-item-has-children").each(function() {
      $(this).children("a").after('<i class="fa-solid fa-chevron-down chevron"></i>');
  });

  $(".chevron").on("click", function() {
    if( !$(this).parent(  ).children("ul").is(":visible")) {
      $(this).parent().children("ul").show();
    }else {
      $(this).parent().children("ul").hide();
    }
  });
})
