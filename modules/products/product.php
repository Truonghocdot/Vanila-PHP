<?php
    include "C:/xampp/htdocs/pdo_full/config.php";
    if($_SERVER["REQUEST_METHOD"] == 'GET'){
        try{
            $id = $_GET['id'];
            // Sử dụng prepared statement để tránh SQL Injection
            $sql = "SELECT * FROM products WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id]);
            
            // Kiểm tra kết quả của câu truy vấn trước khi lấy dữ liệu
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if(!$data){
                echo "Không có dữ liệu cho id: {$id}";
                die();
            }
        }catch(PDOException $e){
            die('Query have some error: ' . $e->getMessage());
        }
    }
?>

