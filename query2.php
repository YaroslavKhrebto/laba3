<?php

  $conn = new PDO('mysql:host=localhost;dbname=lb_pdo_rent', 'root', '');
  $vendor_id = $_POST["vendor"];
  $query = "SELECT * FROM cars WHERE FID_Vendors = :vendor_id";
  $stmt = $conn->prepare($query);
  $stmt->bindValue(':vendor_id', $vendor_id);
  $stmt->execute();




  $xml = new SimpleXMLElement('<vendors/>');
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $vendor = $xml->addChild('vendor');
        $vendor->addChild('name', $row['Name']);
        $vendor->addChild('Release_date', $row['Release_date']);
        $vendor->addChild('Race', $row['Race']);
        $vendor->addChild('Price', $row['Price']);        
    }

// Установка заголовков и вывод ответа
header('Content-Type: application/xml; charset=utf-8');
echo $xml->asXML();
  
?>