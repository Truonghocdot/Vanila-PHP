<?php 
    include "C:/xampp/htdocs/pdo_full/config.php";
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        // product normal
        try{
            $title = '';
            $cat = $_GET['categories'];
            switch ($cat){
                case 'men': 
                    $title = 'NAM'  ;
                    break;
                case 'women': 
                    $title = 'NỮ'  ;
                    break;
                case 'kids': 
                    $title = 'TRẺ EM'  ;
                    break;
                case 'infant':
                    $title = 'TRẺ SƠ SINH';
                    break;
            };
            $sqlN = 'SELECT * FROM products WHERE cat = ? && role = 0';
            $stmtN = $conn->prepare($sqlN);
            $successN = $stmtN->execute([$cat]);
            if($successN){
                $dataN = $stmtN->fetchAll(PDO::FETCH_ASSOC);
                if(!isset($dataN)){
                }
            }
        }catch(PDOException $e){
            die("Have some error: ". $e);
        }
        // product normal
        try{
            $sqlS = 'SELECT * FROM products WHERE cat = ? && role = 1';
            $stmtS = $conn->prepare($sqlS);
            $successS = $stmtS->execute([$cat]);
            if($successS){
                $dataS = $stmtS->fetch();
            }
        }catch(PDOException $e){

        }
    }
?>