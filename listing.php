<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db.php';
 
$location = $_GET['location'] ?? '';
$checkin  = $_GET['checkin'] ?? '';
$checkout = $_GET['checkout'] ?? '';
?>
<!DOCTYPE html>
<html>
<head>
<title>Listings</title>
<style>
body {font-family:Arial;background:#f7f7f7;margin:0;}
header {background:#FF385C;color:#fff;padding:15px;text-align:center;}
.listings {display:grid;grid-template-columns:repeat(3,1fr);gap:20px;margin:20px;}
.card {background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 4px 10px rgba(0,0,0,0.1);}
.card img {width:100%;height:200px;object-fit:cover;}
.card-content {padding:15px;}
.price {color:#FF385C;font-weight:bold;}
</style>
</head>
<body>
<header>
Available Properties 
<?php if(!empty($location)) echo ' in "'.htmlspecialchars($location).'"'; ?>
</header>
 
<div class="listings">
<?php
$sql = "SELECT * FROM properties";
if (!empty($location)) {
    $location = $conn->real_escape_string($location);
    $sql .= " WHERE LOWER(location) LIKE LOWER('%$location%')";
}
 
$result = $conn->query($sql);
 
if($result && $result->num_rows > 0){
  while($row=$result->fetch_assoc()){
    echo "<div class='card'>
          <img src='{$row['image']}'>
          <div class='card-content'>
            <h3>{$row['title']}</h3>
            <p>{$row['location']}</p>
            <p class='price'>\$ {$row['price']} / night</p>
            <button onclick=\"window.location.href='/airbnb/property.php?id={$row['id']}'\">Book Now</button>
          </div></div>";
  }
} else {
  echo "<p style='margin:20px;'>⚠️ No properties found. Try searching 'New York', 'Miami', 'Denver' or 'Los Angeles'.</p>";
}
?>
</div>
</body>
</html>
