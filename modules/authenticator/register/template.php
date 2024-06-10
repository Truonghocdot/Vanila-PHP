<?php
    include '/xampp/htdocs/pdo_full/config.php';
    $errMessage = '';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nameUser = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordVerify = $_POST['password-verify'];
        if(empty($nameUser)||empty($email)||empty($password)){
            $errMessage = 'Bạn không được để trống bất kì trường nào!';
        }else{
            if($password == $passwordVerify){
                try{
                    $sql = 'SELECT * FROM clients WHERE username = ? OR email = ?';
                    $stmt = $conn->prepare($sql);
                    $stmt->execute([$nameUser, $email]);
                    $data = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($data){
                        $errMessage = 'Người dùng hoặc email đã tồn tại!';
                    }else{
                        $sql = 'INSERT INTO clients(username, email, password, role) VALUES(?, ?, ?, 0)';
                        $hashPassword = password_hash($password,PASSWORD_DEFAULT) ;
                        $stmt = $conn -> prepare($sql);
                        $stmt->execute([$nameUser, $email, $hashPassword]);
                        $data_user = $stmt->fetch(PDO::FETCH_ASSOC);
                        header('location: /pdo_full/modules/authenticator/login/');
                    }
                }catch(PDOException $e){
                    error_log("Database error: ". $e->getMessage());
                    $errMessage = 'Đã xảy ra lỗi vui lòng thử lại sau!';
                }
            }else{
                $errMessage = 'Xác thực mật khẩu phải giống nhau!';
            }
        }
    }
?>