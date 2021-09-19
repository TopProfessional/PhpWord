<?php 
    require_once ('Model.php');
    
    /*
    $Names = Model::viewName();
    $Numbers = Model::viewNumbers();
    $Descriptions = Model::viewDescription();
    $Categories = Model::viewCategory();
    $Prices = Model::viewPrice();
    $Kol = Model::viewKol();
    $Status = Model::viewStatus();
    */
    $All = Model::viewAll();
   
    
?>
    <head>
        <title></title>
        <link rel="stylesheet" href="style.css"> 
    </head>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<?php $allError=0; ?>


    <label>id</label>
    <br>
    <label>name</label>
    <br>
    <label>number</label>
    <br>
    <label>description</label>
    <br>
    <label>category</label>
    <br>
    <label>price</label>
    <br>
    <label>kol</label>
    <br>
    <label>status</label>
    <br>

<form action="index.php" name="by" method="post">
<div class="find-checkbox">
    <input type="checkbox" id="id" checked name="1">
    <br>
    <input type="checkbox" id="name" checked name="2">
    <br>
    <input type="checkbox" id="number" checked name="3">
    <br>
    <input type="checkbox" id="description" checked name="4">
    <br>
    <input type="checkbox" id="category" checked name="5">
    <br>
    <input type="checkbox" id="price" checked name="6">
    <br>
    <input type="checkbox" id="kol" checked name="7">
    <br>
    <input type="checkbox" id="status" checked name="8">
</div>

    <input class="generate" type="submit" value="document" onclick="You()"> 

</form>

        <table border="1" class="find-table">
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

        <?php
            
            foreach ($All as $AllItem) : 
                $colorname="colora";
                $colornum="colora";
                $colordesc="colora";
                $colorcategory="colora";
                $colorprice="colora";
                $colorkol="colora";
                $colorstat="colora";
        ?>

            <tr>


               <td><?php echo $AllItem['id'];?></td>

                <?php 
                    if((preg_match('/[0-9.-?<>+!=][a-zA-Z]/',$AllItem['name'])) || 
                    (preg_match('/[a-zA-Z][0-9.-?<>+!=]/',$AllItem['name'])))
                    {
                        $colorname="colorb";
                        $allError++;
                    }
                    if($AllItem['name']=='')  
                    {
                        $colorname="colorb";
                    }   
                    
                ?>

               <td class="<?php echo $colorname;?>">
                   <?php 
                        echo $AllItem['name'];
                   ?>
               </td>
                <?php 
                    if(preg_match('/[^[:digit:]]/',$AllItem['num']))
                    {
                        $colornum="colorb";
                    }
                    if($AllItem['num']=='')  
                    {
                        $colornum="colorb";
                    } 
                    
                ?>
               <td class="<?php echo $colornum;?>">
               <?php echo $AllItem['num'];?>
               </td>

               <?php 
                    if((preg_match('/[0-9.-?<>+!=][a-zA-Z]/',$AllItem['description'])) || 
                    (preg_match('/[a-zA-Z][0-9.-?<>+!=]/',$AllItem['description'])))
                    {
                        $colordesc="colorb";
                        $allError++;
                    }
                    if($AllItem['description']=='')  
                    {
                        $colordesc="colorb";
                    } 
                    
                ?>
               <td  class="<?php echo $colordesc;?>">
               <?php echo $AllItem['description'];?>
               </td>
               <?php 
                    if(($AllItem['category'] != 'tourism') &&
                       ($AllItem['category'] != 'house') &&
                       ($AllItem['category'] != 'other') &&
                       ($AllItem['category'] != 'sport'))
                       {
                        $colorcategory="colorb";
                        $allError++;
                       }
                       if($AllItem['category']=='')  
                        {
                            $colorcategory="colorb";
                        }
                    
                ?>
               <td class="<?php echo $colorcategory;?>">
               <?php echo $AllItem['category'];?>
               </td>

               <?php 
                    if(preg_match('/[^[:digit:]]\./',$AllItem['price']))
                       {
                        $colorprice="colorb";
                        $allError++;
                       }
                       if($AllItem['price']=='')  
                        {
                            $colorprice="colorb";
                        }
                    
                ?>        
               <td class="<?php echo $colorprice;?>">
               <?php echo $AllItem['price'];?>
               </td>

               <?php 
                    if(preg_match('/[^[:digit:]]/',$AllItem['kol'])) 
                    {
                        $colorkol="colorb";
                    }
                    if($AllItem['kol']=='')  
                        {
                            $colorkol="colorb";
                        }
                ?>
               <td class="<?php echo $colorkol;?>">
                    <?php echo $AllItem['kol'];?>
                </td>
                
                <?php 
                    if(($AllItem['status'] != 'Not available') &&
                       ($AllItem['status'] != 'On sale'))
                       {
                        $colorstat="colorb";
                        $allError++;
                       }
                       if($AllItem['status']=='')  
                        {
                            $colorstat=="colorb";
                        }
                    
                ?>     
               <td class="<?php echo $colorstat;?>">
               <?php echo $AllItem['status'];?>
               </td>

               <td>
               <a href="change.php?id=<?php echo $AllItem['id']?>"><button>change</button></a>
               </td>
               <td>
               <a href="delete.php?id=<?php echo $AllItem['id']?>"><button>delete</button></a>
               </td>

          </tr>
          

           <?php
                endforeach; 
            ?>

        </table>
        <script src="functions.js"></script>
        
