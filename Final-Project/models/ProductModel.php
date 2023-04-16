<?php

    class ProductModel {

        private static $_table = "resources";

        public static function findAll () {
            $table = self::$_table;
            $conn = get_connection();
            $sql = "SELECT * FROM {$table}";

            $products = $conn->query($sql)->fetchAll(PDO::FETCH_OBJ);
            $conn = null;
            return $products;
        }

        public static function find ($id) {
                $table = self::$_table;
                $conn = get_connection();
                $sql = "SELECT
                    users.id,name, email, password  as status 
                FROM {$table}
                JOIN model_name ON brand_name.id = model_name.id
                WHERE todos.id = :id";
    
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                $stmt->execute();
    
                $todo = $stmt->fetch(PDO::FETCH_OBJ);
                $conn = null;
                return $todo;
            }
        }
    

      
    

?>