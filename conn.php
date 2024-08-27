<?php  
    class pdf{
        public static $alerts=[];
        public static function connect(){
            $conn =new PDO("mysql:host=localhost;dbname=pdf", "root", "oreoluwa2003");
            return $conn;
        }
        public static function insert($name, $img){
            $add = pdf::connect()->prepare("INSERT INTO pdf_table(name, img) VALUES(?, ?)");
            $add->execute(array($name, $img));
            if($add){
                pdf::$alerts[] = "added!";
            } else {
                pdf::$alerts[] = "Not added!";
            }
        }
        public static function select(){
            $list=pdf::connect()->prepare("SELECT * from pdf_table");
            $list->execute();
            $fetch=$list->fetchAll(PDO::FETCH_ASSOC);
            return $fetch;
        }
    }


?>