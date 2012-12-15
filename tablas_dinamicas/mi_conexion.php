<?php
$dbhost = 'host';
$dbuser = 'user';
$dbpass = 'pass';
$dbname = 'dbname';
$link_id = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
if ($link_id ->connect_error) {
echo "Error de Connexion ($link_id->connect_errno)
$link_id->connect_error\n";
exit;
}
?>