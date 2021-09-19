<?php
require_once ('Model.php');
?>
<link rel="stylesheet" href="style.css">
<?php
$id = $_GET['id'];
$All = Model::getAllById($id);

?>




<label for="">name</label>
<br>
<br>
<label for="">number</label>
<br>
<br>
<label class="description" for="">description</label>
<br>
<br>
<label class="category" for="">category</label>
<br>
<br>
<label class="price" for="">price, $</label>
<br>
<br>
<label class="kol" for="">kol</label>
<br>
<br>
<label class="status" for="">status</label>

<br>
<form class="change-form" action="save.php" method="post">
<br>
    <br>
    <input class="hide" type="text" name="id" value="<?php echo $All['id']; ?>">
    <br>

    <br>

    <input type="text" name="name" value="<?php echo $All['name']; ?>">
    <br>
    <br>
    
    <input type="text" name="num" value="<?php echo $All['num']; ?>">
    <br>
    <br>
    
    <textarea width="173" name="description"><?php echo $All['description']; ?></textarea>
    <br>
    <br>
    
    <input  type="text" name="category" value="<?php echo $All['category']; ?>">
    <br>
    <br>
    
    <input type="text" name="price" value="<?php echo $All['price']; ?>">
    <br>
    <br>
    
    <input type="text" name="kol" value="<?php echo $All['kol']; ?>">
    <br>
    <br>
    
    <input type="text" name="status" value="<?php echo $All['status']; ?>">
    <br>
    <br>
    <input type="submit" value="OK">
</form>