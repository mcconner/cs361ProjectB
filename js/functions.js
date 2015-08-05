var response = '';
//This from http://stackoverflow.com/questions/14449118/php-ajax-login
//I modified to make it appropriate for what I'm doing in this example.

$(document).ready(function() {
  $('#register').submit(function(e) {
    e.preventDefault();
    $.ajax({
       type: 'POST',
       url: 'register.php',
       data: $(this).serialize(),
       success: function(data)
       {
          if (data === 'OK') {
            window.location = 'main.php';
          }
          else {
            $('#r-alerts').html(data);
          }
       }
   });
 });

  $('#login').submit(function(e) {
    e.preventDefault();
    $.ajax({
       type: 'POST',
       url: 'login.php',
       data: $(this).serialize(),
       success: function(data)
       {
          if (data === 'OK') {
            window.location = 'main.php';
          }
          else {
            $('#l-alerts').html(data);
          }
       }
    });
  });
});
