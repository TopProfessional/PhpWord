<?php
require_once ('Class_db.php');
$description = array('some','nice','description');
$category = array('sport','tourism','house','other');
$status = array('On sale','Not available');


$db = Database::getConnection();


for ($i=0; $i < 200; $i++) { 
    $number = rand(600000,999999);
    $name_array =  array("value ".($i+1),($i+1)." value","val".($i+1)."ue","value".($i+1),($i+1)."value","va".($i+1)."lue");
    shuffle($name_array);
    $name=$name_array[0];
    shuffle($description);
    $d = $description[0]." ".$description[1]." ".$description[2];

    $price = (mt_rand(100,100000)/100);
    shuffle($category);
    shuffle($status);

   
    //$sql="INSERT INTO mark(`num`,`name`,`description`,`category`,`price`,`kol`,`status`) values(".$number.",'".$name."','".$d."','".$category[1]."',".$price.",".mt_rand(1,5).",'".$status[1]."')";

    // $result=$db->query($sql);


    $sql="INSERT INTO market1(num,name,description,category,price,kol,status) 
    values(:num,:name,:description,:category,:price,:kol,:status)";

    $rand =mt_rand(1,5);

    $result = $db->prepare($sql);
    $result->bindParam(':num',         $number,         PDO::PARAM_INT); 
    $result->bindParam(':name',        $name,        PDO::PARAM_STR); 
    $result->bindParam(':description', $d, PDO::PARAM_STR); 
    $result->bindParam(':category',    $category[1],    PDO::PARAM_STR);  
    $result->bindParam(':price',       $price,       PDO::PARAM_INT);  
    $result->bindParam(':kol',         $rand,         PDO::PARAM_INT); 
    $result->bindParam(':status',      $status[1],      PDO::PARAM_STR); 
    $result->execute();

   }
   

 echo $sql;
    ///echo "<br>";


?>