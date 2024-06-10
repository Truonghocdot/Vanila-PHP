<?php
    session_start();
    session_unset(); // Xóa tất cả các biến session
    header('location: /pdo_full/')
?>