<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login'])) 
  {
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $sql ="SELECT ID FROM tblclient WHERE Email=:email and Password=:password";
    $query=$dbh->prepare($sql);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
{
foreach ($results as $result) {
$_SESSION['clientmsuid']=$result->ID;
}
$_SESSION['login']=$_POST['username'];
echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
} else{
echo "<script>alert('Invalid Details');</script>";
}
}

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Quản Lí Khách Hàng</title>

	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- Bootstrap Core CSS -->
	<link rel="shortcut icon" href="https://media.istockphoto.com/id/1473149698/vi/anh/%C4%91%E1%BB%93-th%E1%BB%8B-ph%C3%A2n-t%C3%ADch-d%E1%BB%AF-li%E1%BB%87u-t%C3%A0i-ch%C3%ADnh-doanh-nghi%E1%BB%87p-c%E1%BB%91-v%E1%BA%A5n-s%E1%BB%AD-d%E1%BB%A5ng-kpi-dashboard-tr%C3%AAn-m%C3%A0n-h%C3%ACnh-%E1%BA%A3o.jpg?s=612x612&w=is&k=20&c=uYafHnfdG671k7mVVh3FiBQ45ayPSq36T5tPMYJyLYU=" type="image/x-icon">
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<!-- Graph CSS -->
	<link href="css/font-awesome.css" rel="stylesheet"> 
	<!-- jQuery -->
	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
	<!-- lined-icons -->
	<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
	<!-- //lined-icons -->
	<script src="js/jquery-1.10.2.min.js"></script>
	<!--clock init-->
</head> 
<body>
	<div class="error_page">

		<div class="error-top">
			<h2 class="inner-tittle page"></h2>
			<div class="login">
				
				<div class="buttons login">
					<h3 class="inner-tittle t-inner" style="color: #002561">Đăng Nhập</h3>
				</div>
				<form id="login" method="post" name="login"> 
					<input type="text" class="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-mail address';}" name="email" required="true">
					<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" name="password" required="true">
					<div class="submit"><input type="submit" onclick="myFunction()" value="Login" name="login" ></div>
					<div class="clearfix"></div>

					<div class="new">
						<p><a href="forgot-password.php">Quên Mật Khẩu</a></p><br />
						<p><a href="../index.php">Trở Lại</a></p>
						<!-- <div class="clearfix">hello</div> -->
					</div>
				</form>
			</div>


		</div>


		<!--//login-top-->
	</div>

	<!--//login-->
	<!--footer section start-->

	<div class="footer">
		<?php include_once('includes/footer.php');?>
	</div>
	<!--footer section end-->
	<!--/404-->
	<!--js -->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>