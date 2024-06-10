<?php 
    include 'C:/xampp/htdocs/pdo_full/config.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_GET['id'] ;
        $file = $_FILES['thumbnail'];
        $fileName = $file['name'];
        $typeFile = explode(".",$fileName);
        $ext = end($typeFile) ;
        $allowType = ['png','jpg','jpeg','image','avif'];
        $thumbnail = md5(uniqid()). '.' .$ext;
        //format data
        $cat = $_POST['cat'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $title = $_POST['title'];
        echo $cat;
        if(in_array(strtolower($typeFile[1]),$allowType)){
            $successUpload = move_uploaded_file($file['tmp_name'],'C:/xampp/htdocs/pdo_full/assets/images/products/'. $cat ."/" . $thumbnail) ;
            if($successUpload){
                try{
                    $sql = 'UPDATE products SET title = ?, description = ?, price = ?, quantity = ?, thumbnail = ?, cat = ? WHERE products.id = ?';
                    $stmt = $conn->prepare($sql);
                    $success = $stmt->execute([$title, $description, $price, $quantity, $thumbnail, $cat, $id]);
                    header("location: /pdo_full/modules/admin");
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
    }
?>