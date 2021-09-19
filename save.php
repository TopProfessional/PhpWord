<?php
require_once ('Model.php');
//require_once ('change.php');
$id = $_POST['id'];
$name = $_POST['name'];
$number = $_POST['num'];
$description = $_POST['description'];
$category = $_POST['category'];
$price = $_POST['price'];
$kol =  $_POST['kol'];
$status = $_POST['status'];

echo $id;

$update = Model::updateById($id,$name,$number,$description,$category,$price,$kol,$status);
header("Location: find.php");
?>