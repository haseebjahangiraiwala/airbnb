<!DOCTYPE html>
<html>
<head>
<title>Booking Confirmed</title>
<style>
body {font-family:Arial;background:#f7f7f7;text-align:center;padding-top:100px;}
.box {background:#fff;padding:40px;border-radius:12px;width:40%;margin:auto;box-shadow:0 4px 10px rgba(0,0,0,0.1);}
h2 {color:#FF385C;}
button {padding:12px 20px;background:#FF385C;color:#fff;border:none;border-radius:8px;cursor:pointer;margin-top:20px;}
</style>
<script>
function backHome(){ 
  window.location.href="/airbnb/index.php";  // ✅ fixed redirect
}
</script>
</head>
<body>
<div class="box">
  <h2>🎉 Booking Confirmed!</h2>
  <p>Your stay has been successfully booked.</p>
  <button onclick="backHome()">Go Home</button>
</div>
</body>
</html>
