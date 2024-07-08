<?php
    namespace App\Models;

    use App\Models\DB;

    class product extends DB{
        function listPro(){
            $sql = 'SELECT pr.*,ct.name_category From product as pr INNER JOIN category as ct ON ct.id = pr.id_category';
            return $this->getData($sql);
        }
        function listAllCate(){
            $sql = "SELECT * FROM category";
            return $this->getData($sql);
        }
        function addPro($name,$image,$price,$id_category){
            $sql = "INSERT INTO product(name, image, price, id_category) VALUES ('$name','$image','$price','$id_category')";
            return $this->getData($sql);
        }
        function deleteMD($id){
            $sql = "DELETE FROM  product WHERE id = '$id'";
            return $this->getData($sql,false);
        }
        function GetProByID($id){
            $sql = "SELECT * From product where id ='$id'";
            return $this->getData($sql,false);
        }
        function updatePro($id){
            $sql = "SELECT pr.*,ct.name_category From product as pr INNER JOIN category as ct ON ct.id = pr.id_category Where pr.id = '$id'";
            return $this->getData($sql,false);
        }
        function updateProduct($id,$name,$image,$price,$id_category){
            $sql = "UPDATE product SET name='{$name}',  image='{$image}',price='{$price}', id_category='{$id_category}' WHERE id='{$id}'";
            return $this->getData($sql,false);
        }

        /**
         * CATEGOORY
         */

        function addCategory($name_category){
            $sql = "insert into category(id,name_category) value(null,'$name_category')";
            return $this->getData($sql,false);
        }

        function deleteOneCategory($id_cate){
            $sql = "DELETE FROM category where id='$id_cate'";
            return $this->getData($sql, false);
        }
        
        function getcategory($id_cate){
            $sql = "SELECT * FROM category WHERE id='$id_cate'";
            return $this->getData($sql,false);
        }
        
        function updatecategoryMD($id_cate,$name_category){
            $sql = "UPDATE category SET name_category='$name_category' WHERE id='$id_cate'";
            return $this->getData($sql);
        }
        /**
         * LOGIN
         */
        function checkUser($user,$pass){
            $sql = "SELECT * FROM account where user = '$user' and pass= '$pass'";
            return $this->getData($sql);
        }
        function getUser($user){
            $sql = "SELECT * FROM account where user = '$user'";
            return $this->getData($sql,false);
        }
        function Exit() {
            if (isset($_SESSION['user'])) {
                unset($_SESSION['role']);
                unset($_SESSION['user']);
            }
        }
    }
?>