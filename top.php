<?php
session_start();

$current_page = $_SESSION['user']['current_page'] = basename($_SERVER['SCRIPT_FILENAME']);

$array_pages = array('home.php', 'edit.php', 'logout.php');
$page_title = '';

switch ($current_page) {
    case $array_pages[0]:
        $page_title = 'Inicial';
        break;
    case $array_pages[1]:
        $page_title = 'Edi&ccedil;&atilde;o';
        break;
    default:
        $page_title = 'Login';
        break;
}

if (($current_page != 'index.php') && (empty($_SESSION['user']['login']))) {
    header('Location: ./index.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./images/favicon.ico">

    <title><?php echo $page_title; ?></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
    <link href="css/justified-nav.css" rel="stylesheet">
    <link href="css/bootstrap-switch.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
<?php
if ($current_page != 'index.php') {
?>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="<?php echo $array_pages[0]; ?>">RPI Automa&ccedil;&atilde;o</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li <?php echo ($current_page != $array_pages[0]) ?: 'class="active"'; ?> ><a href="<?php echo $array_pages[0]; ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
                <li <?php echo ($current_page != $array_pages[1]) ?: 'class="active"'; ?> ><a href="<?php echo $array_pages[1]; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></li>
                <li><a href="<?php echo $array_pages[2]; ?>"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></li>
              </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
<?php
}
?>
    <div class="container">
