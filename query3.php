<?php


    $conn = new PDO('mysql:host=localhost;dbname=lb_pdo_rent', 'root', '');

  $date = $_POST["date"];

  $stmt = $conn->prepare("SELECT cars.Name, vendors.Name AS Vendor, cars.Price FROM cars 
                          LEFT JOIN vendors ON cars.FID_Vendors = vendors.ID_Vendors 
                          WHERE cars.ID_Cars NOT IN (SELECT FID_Car FROM rent 
                          WHERE Date_start <= :date AND Date_end >= :date)");
  $stmt->bindParam(":date", $date);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode($result);
 
  ?>