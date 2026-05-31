<?php
require 'app/Core/Database.php';
$db = \App\Core\Database::getInstance()->getConnection();
$stmt = $db->query('DESCRIBE nguoi_dung');
print_r($stmt->fetchAll(PDO::FETCH_ASSOC));
