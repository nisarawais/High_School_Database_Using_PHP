<?php
// connect to aws mysql server
$db = new PDO('mysql:host=172.31.22.43;dbname=Awais1110642', 'Awais1110642', 'flA8Dz-xDy');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
