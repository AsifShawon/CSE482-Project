
$(".signupboxes .login").on( "click", function() {
    $( ".signupboxes" ).fadeOut( 500, function() {
        $( ".signupboxes" ).addClass("invisible");});
        $( ".loginboxes" ).removeClass("invisible");
        $( ".loginboxes" ).fadeIn( 500, function() {
          });
  });

  $(".loginboxes .signup").on( "click", function() { 
    $( ".loginboxes" ).fadeOut( 500, function() {
            $( ".loginboxes" ).addClass("invisible");});
            $( ".signupboxes" ).removeClass("invisible");
    $( ".signupboxes" ).fadeIn( "slow", function() {
        });
       
  });