<?php
include 'connect.php';
session_start();
$userID=$_SESSION['id'];
$query_sel = "SELECT * FROM Application, add_wish WHERE '$userID'= add_wish.u_id and Application.id = add_wish.app_id";
#$query_sel = "SELECT id, n_name, description,  price, dl_count, version FROM Application, add_wish WHERE 45= add_wish.u_id and Application.id = add_wish.app_id";
$result =  mysqli_query($con,$query_sel);
$data = "";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
	$data .= "<table><tr><th width=\"20%\">Application Name</th>
	<th width=\"20%\">Description</th>
	<th width=\"20%\">price</th>
	<th width=\"20%\">dl_count</th>
	<th width=\"20%\">version</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
		$data .= "<tr><td style=\"text-align:center\" width=\"20%\">" . $row["n_name"]. 
		"</td><td style=\"text-align:center\" width=\"20%\">" . $row["description"]. 
		"</td><td style=\"text-align:center\" width=\"20%\">" . number_format($row["price"]). 
		"</td><td style=\"text-align:center\" width=\"20%\">" . number_format($row["dl_count"]). 
		"</td><td style=\"text-align:center\" width=\"20%\">" . number_format($row["version"]).
		"</td><td style=\"text-align:center\" width =\"20%\"><a href=\"deletewish.php?ap_id=" . $row["id"]."\">Delete From Wishlist</a></td></tr>";
    }
    $data .= "</table>";
} 
else {
    $data .= "You don't have any wished app";
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Zebra</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
  </head>
  <body>

    <p></p>

    <style type="text/css">
      body { background-color:white; color:black; }
      p { font-family: Tahoma, Verdana; font-size: 19px; }
    </style>

    <h1 class="ui header" style="margin-left: 166px">
      <i class="th list icon"></i>
      <div class="content">
        Wishlist
      </div>
    </h1>

    <div class="ui inverted vertical labeled icon ui overlay left thin visible sidebar menu">
		<a class="item" onclick="window.location='home.php';">
		<i aria-hidden="true" class="home icon"></i>
		Home
		</a>
		<a class="item" onclick="window.location='wallet.php';">
		<i aria-hidden="true" class="credit card icon"></i>
		Wallet
		</a>
		<a class="item" onclick="window.location='wishlist.php';">
		<i aria-hidden="true" class="list icon"></i>
		Wishlist
		</a>
		<a class="item" onclick="window.location='devices.php';">
		<i aria-hidden="true" class="computer icon"></i>
		Device
		</a>
		<a class="item" onclick="window.location='purchased.php';">
		<i aria-hidden="true" class="archive icon" ></i>
		Purchased
		</a>
		<a class="item" onclick="window.location='update.php';">
		<i aria-hidden="true" class="upload icon" ></i>
		Update
		</a>
		<a class="item" onclick="window.location='index.html';">
		<i aria-hidden="true" class="sign-out icon" ></i>
		Log-out
		</a>
    </div>

    <div class="ui five column stackable grid" style="margin-left: 156px; margin-right: 10px;">

            <div>
                <p><b style="font-size:24px;"></b></p>
                <?=$data?>
			</div>	

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>

  </body>
</html>

<?php

function alert($msg){
  echo "<script type='text/javascript'>
    alert('$msg');
    window.location.href='loadmoney.php';
    </script>";
} ?>
