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

  function categoryWrap() {
    var count = $(".category").length;
    var categories = $("#first-container").children();
    var slides = count / 4;
    var mod = count % 4;
    if(mod != 0) {
      slides++;
    }

    var start=0;
    var end=0;
    for(var i=0; i < slides; i++){
      start = i * 4;
      end = start + 4;
      categories.slice(start, end).wrapAll('<div class="item" />')
    }
  }

  function postsCarousel() {
    var checkWidth = $(window).width();
    var owlPost = $("#first-container");
    if (checkWidth > 767) {
      if (typeof owlPost.data('owl.carousel') != 'undefined') {
        owlPost.data('owl.carousel').destroy();
        $(".category").unwrap();
      }
      owlPost.attr("class", "grid-container");
    } else if (checkWidth < 768) {
      owlPost.attr("class", "owl-carousel owl-theme");
      categoryWrap();

      owlPost.owlCarousel({
        items: 1,
        nav: false,
        loop: false
      });
    }
  }

  postsCarousel();
  $(window).resize(postsCarousel);
})

