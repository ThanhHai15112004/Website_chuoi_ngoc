<?php
try {
    $db = new PDO('mysql:host=127.0.0.1;port=3307;dbname=shop_chuoi_ngoc;charset=utf8mb4', 'root', '');
    $stmt = $db->query('DESCRIBE loai_da');
    if ($stmt) {
        print_r($stmt->fetchAll(PDO::FETCH_ASSOC));
    } else {
        echo "Table does not exist.";
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
