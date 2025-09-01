<?php
include 'db.php';
 
// Featured properties (latest 3)
$featured = $conn->query("SELECT * FROM properties LIMIT 3");
?>
<!DOCTYPE html>
<html>
<head>
<title>Airbnb Clone</title>
<style>
body {font-family:Arial, sans-serif; margin:0; background:#f7f7f7;}
header {background:#FF385C; color:#fff; padding:20px; text-align:center; font-size:28px; font-weight:bold;}
.search-box {background:#fff; padding:20px; margin:20px auto; width:60%; border-radius:12px; box-shadow:0 4px 10px rgba(0,0,0,0.1);}
.search-box input {padding:12px; margin:8px; width:28%; border:1px solid #ddd; border-radius:8px;}
.search-box button {padding:12px 20px; background:#FF385C; border:none; color:#fff; border-radius:8px; cursor:pointer;}
.search-box button:hover {background:#e21e4c;}
h2 {margin-left:40px; color:#333;}
.listings {display:grid; grid-template-columns:repeat(3,1fr); gap:20px; margin:20px;}
.card {background:#fff; border-radius:12px; overflow:hidden; box-shadow:0 4px 10px rgba(0,0,0,0.1);}
.card img {width:100%; height:200px; object-fit:cover;}
.card-content {padding:15px;}
.price {color:#FF385C; font-weight:bold;}
</style>
<script>
function searchProperty(){
  var loc = document.getElementById('loc').value;
  var checkin = document.getElementById('checkin').value;
  var checkout = document.getElementById('checkout').value;
  // ✅ redirect using JS
  window.location.href="/airbnb/listings.php?location="+encodeURIComponent(loc)+"&checkin="+checkin+"&checkout="+checkout;
}
</script>
</head>
<body>
 
<header>🏠 Airbnb Clone</header>
 
<div class="search-box" align="center">
  <input type="text" id="loc" placeholder="Enter location">
  <input type="date" id="checkin">
  <input type="date" id="checkout">
  <button onclick="searchProperty()">Search</button>
</div>
 
<h2>✨ Featured Listings</h2>
<div class="listings">
<?php
if($featured && $featured->num_rows>0){
  while($row=$featured->fetch_assoc()){
    echo "<div class='card'>
            <img src='{$row['image']}'>
            <div class='card-content'>
              <h3>{$row['title']}</h3>
              <p>{$row['location']}</p>
              <p class='price'>\$ {$row['price']} / night</p>
              <button onclick=\"window.location.href='/airbnb/property.php?id={$row['id']}'\">View</button>
            </div>
          </div>";
  }
} else {
  echo "<p style='margin:20px;'>No featured properties found.</p>";
}
?>
</div>
 
</body>
</html>
 
