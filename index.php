<?php
require_once("./top.php");

$alert_message = '';

if (!empty($_SESSION['user']['login'])) {
  header('Location: ./home.php');
  die();
}
else if (!empty($_SESSION['alerts'])) {
  $alert_message = (!empty($_SESSION['alerts']['login'])) ? $_SESSION['alerts']['login'] : '';
  session_unset();
  session_destroy();
}
?>
      <form class="form-signin" method="post" action="login.php">
        <h2 class="form-signin-heading">RPI Automa&ccedil;&atilde;o</h2>
        <label for="inputLogin" class="sr-only">Login</label>
        <input type="login" id="inputLogin" name="login" class="form-control" placeholder="Usuário" required autofocus pattern="^[^.]([.0-9A-Za-z]{2,18})[^.]$">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Senha" required minlength="3" maxlength="25">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>

<?php
if(!empty($alert_message)) {
?>
        <div class="alert alert-danger" role="alert">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Error:</span>
          <?php echo $alert_message; ?>
        </div>
<?php
}
?>
      </form>
<?php
require_once("./bottom.php");
?>