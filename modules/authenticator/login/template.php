<?php
    $errMessage = '';
    include 'C:/xampp/htdocs/pdo_full/config.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['user-name'];
        $password = $_POST['password'];
        if(!empty($email)||!empty($password)){
            try{
                $sql = 'SELECT * FROM clients WHERE email = ?';
                $stmt = $conn -> prepare($sql);
                $stmt ->execute([$email]);
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if($data){
                    if($data['role']== 1){
                        header('location: /pdo_full/modules/admin');
                    }else{
                        if(password_verify($password, $data['password'])){
                            $_SESSION['username'] = $data['username'];
                            $_SESSION['email'] = $data['email'];
                            $_SESSION['role'] = $data['role'];
                            header('location: /pdo_full/');
                            exit;
                        }else{
                            $errMessage = 'Email hoặc mật khẩu sai, vui lòng thử lại';
                        }
                    }
                }else{
                    $errMessage = 'Email hoặc mật khẩu sai, vui lòng thử lại';
                }
            }catch(PDOException $e){
                error_log("Database error". $e -> getMessage());
                $errMessage = 'Đã xảy ra lỗi vui lòng thử lại sau!';
            }
        }else{
            $errMessage = 'Vui lòng nhập đầy đủ thông tin!' ;
        }
    }
?>
