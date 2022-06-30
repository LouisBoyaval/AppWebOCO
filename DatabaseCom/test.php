<?php
header("Location: /AppWebOCO/Pages/configuration.php");
exec("/var/www/html/AppWebOCO/run.sh");
sleep(10);
exec("/var/www/html/AppWebOCO/stop.sh");
exit;
?>