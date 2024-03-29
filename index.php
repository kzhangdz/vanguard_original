<?php 
require_once 'controllers/authController.php';

//
if(isset($_GET['token']))
{
	$token = $_GET['token'];
	verifyUser($token);
}

if(!isset($_SESSION['id']))
{
	header('location: login.php');
	exit();
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	
	<!-- Bootstrap 4 CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
	<link rel="stylesheet" href="style.css">
	
	<title>Homepage</title>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4 offset-md-4 form-div login">
				
				<?php if(isset($_SESSION['message'])): ?>
					<div class="alert <?php echo $_SESSION['alert-class']; ?>">
						<?php 
						echo $_SESSION['message']; 
						unset($_SESSION['message']);
						unset($_SESSION['alert-class']);
						?>
					</div>
				<?php endif; ?>
				
				<h3>Welcome, <?php echo $_SESSION['username']?></h3>
				
				<p>
				<a href="index.php?logout=1" class="logout">logout</a>
				<br>
				</p>
				
				<?php if (!$_SESSION['verified']): ?>
					<div class="alert alert-warning">
						You need to verify your account.
						Sign into your email account 
						and click on the verification link we emailed you at
						<strong><?php echo $_SESSION['email'];?></strong>
					</div>
				<?php endif; ?>
				
				<?php if ($_SESSION['verified']): ?>
					<!-- FIXME: replace this with a redirect to a page with actual content -->
					<!-- <button class="btn btn-block btn-lg btn-primary">I am verified!</button> -->
					<button id="toBrowsePage" class="btn btn-block btn-lg btn-primary">Browse Collection</button>
				
					<script type="text/javascript">
						document.getElementById("toBrowsePage").onclick = function () {
							location.href = "browse.php";
						};
					</script>
				<?php endif; ?>
				
			</div>
		</div>
	</div>

</body>

</html>