<?php

require_once('../common/common.php');

try {
     $pro_name = $_POST['name'];
     $pro_price = $_POST['price'];
     $pro_image_name = $_POST['image_name'];

     $dbh = connectDB();

     $sql = 'insert into product (name, price, image) values (?, ?, ?)';
     $stmt = $dbh->prepare($sql);

     $data[] = $pro_name;
     $data[] = intval($pro_price);
     $data[] = $pro_image_name;

     $stmt->execute($data);

     $dbh = null;

     echo $pro_name . 'を追加しました<br>';

} catch (Exception $e) {
     echo '何かしらのエラーが発生しています';
     echo $e->getMessage();
     exit();
}

echo '<a href="pro_list.php">商品一覧ページへ</a>';