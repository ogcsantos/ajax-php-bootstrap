<?php

session_start();

header_remove('X-Powered-By');
header("X-XSS-Protection: 1; mode=block");
header("X-WebKit-CSP: policy");
header('Content-Type: text/html; charset=utf-8');

# locality
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');



// DEBUG
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Toast bootstrap with Ajax and PHP (basic)</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <!-- Required JavaScript -->
  <script src="assets/js/jquery/min.js"></script>
  <script src="assets/js/jquery/ui.min.js"></script>

  <style>
  button[disabled],
  input[disabled] {
    cursor: not-allowed !important;
  }
  </style>
</head>

<body>
  <div style="position: absolute; top: 20px; right: 20px;">
    <div class="toast fade show" id="alert-card" style="min-width: 300px; display: none;">
      <div class="toast-header">
        <strong class="mr-auto"><i class="fa fa-globe"></i><span class="toast-type"
            style="margin-left: 5px"></span></strong>
        <small class="text-muted">just now</small>
      </div>
      <div class="toast-body"></div>
    </div>
  </div>

  <div class="container"
    style="width: 500px; margin: 0 auto; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">

    <form id="notification">
      <div class="form-group">
        <label for="name">Your name</label>
        <input type="text" class="form-control" name="name" aria-describedby="name">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <br><br><br>

    <button style="width: max-content; margin: 0 auto; display: block;" class="btn btn-primary" type="button"
      id="notification" notification_name="gmoehra">click notify</button>
  </div>

  <!-- Required JavaScript -->
  <script src="https://kit.fontawesome.com/29d2220d6a.js"></script>
  <script src="assets/js/jquery/min.js"></script>
  <script src="assets/js/jquery/ui.min.js"></script>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>

  <script src="assets/js/geral.js"></script>
  <script src="assets/js/functions.js"></script>

</body>

</html>