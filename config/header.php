<head>
  <meta charset="UTF-8">
  <meta http-equiv=”Content-Type” content=”text/html; charset=utf-8″>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Gabriel, Gabriel e Letícia">

  <!-- favicon -->
  <link rel="icon" href="./assets/brand/favicon.svg">
  <title>iCourse</title>

  <!-- Bootstrap core CSS -->
  <link href="./assets/css/bootstrap.min.css" rel="stylesheet">

  <!-- jQuery e Bootstrap JS -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
  <script type="text/javascript" charset="utf-8" src="./assets/js/jquery-360.js"></script>
  <script type="text/javascript" charset="utf-8" src="./assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" charset="utf-8" src="./assets/js/main.js"></script>
  <script type="text/javascript" charset="utf-8" src="./assets/js/autenticacao.js"></script>


</head>

<?php 
require_once __DIR__ . '/autoload.php';

if(basename($_SERVER['PHP_SELF']) != 'registrar.php')
  include_once __DIR__ . '/navbar.php'; 

?>

