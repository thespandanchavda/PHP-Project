<?php

    class ModelModel {

        private static $_table = "model";

        public static function findAll () {
            $table = self::$_table;
            $conn = get_connection();
            $sql = "SELECT * FROM {$model_name}";

            $model_name = $conn->query($sql)->fetchAll(PDO::FETCH_OBJ);
            $conn = null;
            return $model_name;
        }

        public static function find ($id) {
            $table = self::$_table;
            $conn = get_connection();
            $sql = "SELECT * FROM {$model_name} WHERE id = :id";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();

            $status = $stmt->fetch(PDO::FETCH_OBJ);
            $conn = null;
            return $status;
        }

        public static function create ($package) {
            $table = self::$_table;
            $conn = get_connection();
            $sql = "INSERT INTO {$model_name} (
                name
            ) VALUES (
                :name
            )";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":name", $package["name"], PDO::PARAM_STR);

            $stmt->execute();
            $conn = null;
        }

        public static function update ($package) {
            $table = self::$_table;
            $conn = get_connection();
            $sql = "UPDATE {$table} SET
                name = :name
            WHERE id = :id";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":name", $package['name'], PDO::PARAM_STR);
            $stmt->bindParam(":id", $package['id'], PDO::PARAM_INT);
            
            $stmt->execute();
            $conn = null;
        }

        public static function delete ($id) {
            $table = self::$_table;
            $conn = get_connection();
            $sql = "DELETE FROM {$table} WHERE id = :id";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            $stmt->execute();
            $conn = null;
        }

    }

?>