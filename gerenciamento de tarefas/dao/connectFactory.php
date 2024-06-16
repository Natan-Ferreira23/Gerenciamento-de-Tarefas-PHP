<?php 
 class ConnectionFactory{
    static $conn; //varivael static uma variavel com um valor é igual em todos os objetos
    public Static function getConnection() {
       if(!isset($conn)){       
         $database ="gerenciamento";//coloque o nome do seu banco
         $user="root";
         $senha="1234";
         $host="localhost";
         $porta="3307";
         try{
            $conn= new PDO("mysql:host=$host;port=$porta;dbname=$database",$user,$senha); // conecta com qualquer banco de dados
               //echo"Conectado";
               return $conn;
         }catch(PDOException $ex){
               echo "Erro!" . $ex->getMessage();
               return null;
         }
    }
    return $conn;
   }
 }
?>