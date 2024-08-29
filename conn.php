<?php  
    class pdf{
        public static $alerts=[];
        public static function connect(){
            $conn =new PDO("mysql:host=localhost;dbname=cancelledinvoices", "root", "oreoluwa2003");
            return $conn;
        }
        public static function insert($cancelled, $replace, $client, $amount, $vat, $img, $reason, $user){
            $add = pdf::connect()->prepare("INSERT INTO invoices(invoiceNoCancelled, invoiceNoReplacement, client, totalAmount, VAT, invoiceImg, Reason, user) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
            $add->execute(array($cancelled, $replace, $client, $amount, $vat, $img, $reason, $user));
            if($add){
                pdf::$alerts[] = "added!";
            } else {
                pdf::$alerts[] = "Not added!";
            }
        }
        public static function select(){
            $list=pdf::connect()->prepare("SELECT * from invoices");
            $list->execute();
            $fetch=$list->fetchAll(PDO::FETCH_ASSOC);
            return $fetch;
        }
    }


?>