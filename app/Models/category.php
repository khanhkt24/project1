<?php
    namespace App\Models;

    use App\Models\DB;
    class category extends DB{
        function listAllCate(){
            $sql = "SELECT * FROM categories";
            return $this->getData($sql);
        }

    }