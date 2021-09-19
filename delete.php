<?php
require_once ('Model.php');
$id = $_GET['id'];
//$All = Model::getAllById($id);
echo "id: ".$id;

Model::deleteById($id);
header("Location: find.php");
?>