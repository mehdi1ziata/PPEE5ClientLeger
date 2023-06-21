$(window).scroll(function() {
    $(".hr_bt").css("margin-left", Math.max(0, 100 - $(this).scrollTop()) + "px");
  });

  document.querySelector('.scroll-down').addEventListener('click', function(event) {
          event.target.classList.add('disappear');
  });




  $(document).ready(function() {
        $("bouton1").click(function() {
          $('html,body').animate({
            scrollTop: $(".PRESENTATION_h3").offset().top},
            'slow');
        });
      });