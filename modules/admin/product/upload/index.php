<?php
    include 'C:/xampp/htdocs/pdo_full/config.php';
    // Kiểm tra xem form đã được gửi chưa
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //upload file
        $file = $_FILES['thumbnail'];
        $fileName = $file['name'];
        $typeFile = explode(".",$fileName);
        $ext = end($typeFile) ;
        $allowType = ['png','jpg','jpeg','image','avif'];
        $thumbnail = md5(uniqid()). '.' . $typeFile[1];
        //upload content product
        $title = $_POST['title'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $description = $_POST['description'];
        $cat = $_POST['cat'];
        $role = 0;
        if(in_array(strtolower($typeFile[1]),$allowType)){
            $successUpload = move_uploaded_file($file['tmp_name'],'C:/xampp/htdocs/pdo_full/assets/images/products/'. $cat ."/" . $thumbnail) ;
            if($successUpload){
                try{
                    $sql = 'INSERT INTO products(title, description, role, price, quantity, thumbnail, cat) VALUES (?, ?, ?, ?, ?, ?, ?)';
                    $stmt = $conn->prepare($sql);
                    $success = $stmt->execute([$title, $description,$role ,$price, $quantity, $thumbnail, $cat]);
                    header("location: /pdo_full/modules/admin/");
                    exit();
                }catch(PDOException $e){
                    echo "Have some error when query: " . $e->getMessage();
                }                
            }else{
                echo('có lỗi khi uploads');
                exit;
            }
        }else{
                $errMessage = 'File không đúng định dạng';
        }
        
    } else {
        // Nếu không phải là phương thức POST, có thể xử lý hoặc chuyển hướng ở đây
        echo "Lỗi: Dữ liệu không được gửi đi bằng phương thức POST.";
    }
?>
