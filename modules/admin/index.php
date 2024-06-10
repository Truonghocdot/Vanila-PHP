<?php
    include 'C:/xampp/htdocs/pdo_full/config.php';
    $errMessage = '';
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $pagination = isset($_GET['pagination'])? $_GET['pagination']:''  ;
        switch ($pagination) {
            case '' :
            case 'products':
                try{
                    $sql = 'SELECT * FROM products ';
                    $stmt =  $conn->prepare($sql);
                    $success = $stmt->execute();
                    if($success){
                        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    }else{
                        $errMessage = 'Have some error when query';
                    }
                }catch(PDOException $e){
                    $errMessage = "Database have some invalid ". $e->getMessage();
                }                
                try{
                    $sql = 'SELECT * FROM categories ';
                    $stmt =  $conn->prepare($sql);
                    $success = $stmt->execute();
                    if($success){
                        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    }else{
                        $errMessage = 'Have some error when query';
                    }
                }catch(PDOException $e){
                    $errMessage = "Database have some invalid ". $e->getMessage();
                }
                break;
            case 'user':
                try{
                    $sql = 'SELECT * FROM clients WHERE role = 0 ';
                    $stmt =  $conn->prepare($sql);
                    $success = $stmt->execute();
                    if($success){
                        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    }else{
                        $errMessage = 'Have some error when query';
                    }
                }catch(PDOException $e){
                    $errMessage = "Database have some invalid ". $e->getMessage();
                }
                break;
            case 'orders':
                try{
                    $sql = 'SELECT * FROM orders WHERE role = 0 ';
                    $stmt =  $conn->prepare($sql);
                    $success = $stmt->execute();
                    if($success){
                        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    }else{
                        $errMessage = 'Chưa có đơn hàng nào';
                    }
                }catch(PDOException $e){
                    $errMessage = "Database have some invalid ". $e->getMessage();
                }
                break;
            default:
                $errMessage = 'Not found';
                break;
        }
    }
    include './views/admin.php';
?>