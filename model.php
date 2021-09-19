<?php
require_once ('Class_db.php');

Class Model{
    public static function viewAll(){
        $db = Database::getConnection();
        $result = $db->query('SELECT * FROM market1');
        $i = 0;
            while ($row = $result->fetch()) {
                $productsList[$i]['id'] = $row['id'];
                $productsList[$i]['num'] = $row['num'];
                $productsList[$i]['name'] = $row['name'];
                $productsList[$i]['description'] = $row['description'];
                $productsList[$i]['category'] = $row['category'];
                $productsList[$i]['price'] = $row['price'];
                $productsList[$i]['kol'] = $row['kol'];
                $productsList[$i]['status'] = $row['status'];
                $i++;
            }
            return $productsList;
    }

    public static function viewName(){
        $db = Database::getConnection();
        $result = $db->query('SELECT id,name FROM market1');
        $i = 0;
            while ($row = $result->fetch()) {
                $Names[$i]['id'] = $row['id'];
                $Names[$i]['name'] = $row['name'];
                $i++;
            }
            return $Names;
    }

    public static function viewNumbers(){
        $db = Database::getConnection();
        $result = $db->query('SELECT id,num FROM market1');
        $i = 0;
            while ($row = $result->fetch()) {
                $Numbers[$i]['id'] = $row['id'];
                $Numbers[$i]['num'] = $row['num'];
                $i++;
            }
            return $Numbers;
    }

    public static function viewDescription(){
        $db = Database::getConnection();
        $result = $db->query('SELECT id,description FROM market1');
        $i = 0;
            while ($row = $result->fetch()) {
                $Descriptions[$i]['id'] = $row['id'];
                $Descriptions[$i]['description'] = $row['description'];
                $i++;
            }
            return $Descriptions;
    }

    public static function viewCategory(){
        $db = Database::getConnection();
        $result = $db->query('SELECT id,category FROM market1');
        $i = 0;
            while ($row = $result->fetch()) {
                $Categories[$i]['id'] = $row['id'];
                $Categories[$i]['category'] = $row['category'];
                $i++;
            }
            return $Categories;
    }

    public static function viewPrice(){
        $db = Database::getConnection();
        $result = $db->query('SELECT id,price FROM market1');
        $i = 0;
            while ($row = $result->fetch()) {
                $Prices[$i]['id'] = $row['id'];
                $Prices[$i]['price'] = $row['price'];
                $i++;
            }
            return $Prices;
    }

    public static function viewKol(){
        $db = Database::getConnection();
        $result = $db->query('SELECT id,kol FROM market1');
        $i = 0;
            while ($row = $result->fetch()) {
                $Kol[$i]['id'] = $row['id'];
                $Kol[$i]['kol'] = $row['kol'];
                $i++;
            }
            return $Kol;
    }

    public static function viewStatus(){
        $db = Database::getConnection();
        $result = $db->query('SELECT id,status FROM market1');
        $i = 0;
            while ($row = $result->fetch()) {
                $Status[$i]['id'] = $row['id'];
                $Status[$i]['status'] = $row['status'];
                $i++;
            }
            return $Status;
    }

    public static function getAllById($id){
        $db = Database::getConnection();
        $result = $db->query('SELECT * FROM market1 WHERE id='.$id);
        
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetch();
    }

    

    public static function updateById($id,$name,$number,$description,$category,$price,$kol,$status){
        $db = Database::getConnection();

        $sql = "UPDATE market1
            SET 
                name = :name, 
                num = :num,
                description = :description,
                category = :category,
                price = :price,
                kol = :kol,
                status = :status
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':num', $number, PDO::PARAM_INT);
        $result->bindParam(':description', $description, PDO::PARAM_STR);
        $result->bindParam(':category', $category, PDO::PARAM_STR);
        $result->bindParam(':price', $price, PDO::PARAM_INT);
        $result->bindParam(':kol', $kol, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_STR);
        return $result->execute();
    }

    public static function deleteById($id){
        $db = Database::getConnection();

        $sql = 'DELETE  from market1 where id = :id';
        $result = $db->prepare($sql);

        $result->bindParam(':id', $id, PDO::PARAM_INT);
        
        return $result->execute();
    }
}

?>