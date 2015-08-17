<?php
require_once("./top.php");
require_once("./bd/connection.php");

$devices_sql = "SELECT `id`, `name`, `status`, `pin` FROM `devices`";

$devices_array = mysqli_fetch_all($connection->query($devices_sql));
?>
    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <h1>Todos os dispositivos</h1>
      </div>
      <p class="lead"></p>
      <div id="mySwitchs" class="row">
<?php
$devices_array_size = count($devices_array);

if ($devices_array_size) {
  for ($i = 0; $i < $devices_array_size; $i++){
    $device_name = utf8_encode($devices_array[$i][1]);
    $status_checkbox = ($devices_array[$i][2]) ? 'checked' : '';
    $device_pin = $devices_array[$i][3];
?>
        <div class="row">
          <h2 class="h4"><?php echo $device_name; ?></h2>
            <input type="checkbox" id="<?php echo $device_pin; ?>" name="checktest" <?php echo $status_checkbox; ?>>
        </div>
<?php
  }
}
else {
  echo '<p>nenhum dispositivo cadastrado</p>';
}
?>
      </div>
    </div>
<?php
require_once("./bottom.php");
?>
