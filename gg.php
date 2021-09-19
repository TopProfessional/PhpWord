<?php 
    require_once ('Model.php');
    $productsList=Model::viewAll();
?>
<meta charset="utf-8">
<link rel="stylesheet" href="moon.css">
<link rel="stylesheet" href="style.css">

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>


<form action="find.php" name="by" method="post">

    

    <input type="submit" name="submit" value="Check Errors" />
</form>


<table border="1">
    <tr>
        <th class="th__id">id</th>
        <th class="th__name">name</th>
        <th class="th__number">number</th>
        <th class="th__description">description</th>
        <th class="th__category">category</th>
        <th class="th__price">price, $</th>
        <th class="th__kol">kol</th>
        <th class="th__status">status</th>
    </tr>

    <?php foreach ($productsList as $categoryItem) :?>
    <tr>
        <td><?php echo $categoryItem['id'];?></td>
        <td><?php echo $categoryItem['name'];?></td>
        <td><?php echo $categoryItem['num'];?></td>
        <td><?php echo $categoryItem['description'];?></td>
        <td><?php echo $categoryItem['category'];?></td>
        <td><?php echo $categoryItem['price'];?></td>
        <td><?php echo $categoryItem['kol'];?></td>
        <td><?php echo $categoryItem['status'];?></td>
    </tr>
    <?php endforeach; ?>

</table>



<script src="functions.js"></script>