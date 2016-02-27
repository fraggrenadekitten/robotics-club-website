<?php include_once("functions/import_info.php") ?>
<?php
	require("functions/common.php");
	if(empty($_SESSION['user'])){
		header("Location: login.php");
		die("Redirecting to login.php");
	}
?>
<?php
	function accountNightmode(){
		require("functions/common.php");
		require("functions/import_info.php");
		if (isset($_GET['accountNightmode'])) {
			if(empty($_POST['nightmode_state'])) {
				die("You missed a field");
				header("Location: ".$_SERVER['SCRIPT_NAME']);
			}

			$_POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

			$email = $_SESSION['user']['email'];
			$first_name = $row_info['first_name'];
			$last_name = $row_info['last_name'];
			$birthday = $row_info['birthday'];
			$nightmode = $_POST['nightmode_state'];
			$user_id = $row_info['id'];

			$query = "
			REPLACE INTO info (
				id,
				email,
				first_name,
				last_name,
				birthday,
				nightmode
			) VALUES (
				'$user_id',
				'$email',
				'$first_name',
				'$last_name',
				'$birthday',
				'$nightmode'
			);";

			try {
				$stmt = $db->prepare($query);
				$stmt->execute();

				header("Location: ".$_SERVER['SCRIPT_NAME']);
			}

			catch(PDOException $ex)
			{
				die("Failed to run query: " . $ex->getMessage());
				header("Location: ".$_SERVER['SCRIPT_NAME']);
			}
		}
	}
	accountNightmode();

	function changePassword(){
		require("functions/common.php");
		require("functions/import_info.php");
		if (isset($_GET['changePassword'])) {
			if(!empty($_POST)) {
				if(empty($_POST['password']) || empty($_POST['password_new_1']) || empty($_POST['password_new_2'])) {
					die("You missed a field");
				}

				if($_POST['password_new_1'] != $_POST['password_new_2']) {
					die("New Password Mismatch");
				}

				$salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));

				$password = hash('sha256', $_POST['password_new_1'] . $salt);

				for($round = 0; $round < 65536; $round++) {
					$password = hash('sha256', $password . $salt);
				}

				$email = $_SESSION['user']['email'];
				$admin = $_SESSION['user']['admin'];

				$query = "
				REPLACE INTO users (
					email,
					password,
					salt,
					admin
				) VALUES (
					'$email',
					'$password',
					'$salt',
					'$admin'
				);";

				try {
					$stmt = $db->prepare($query);
					$result = $stmt->execute($query_params);

					header("Location: ".$_SERVER['SCRIPT_NAME']);

					die();
				}
				catch(PDOException $ex) {
					die("Failed to run query: " . $ex->getMessage());
				}

			}

			else {
				echo "No password was submitted.";
			}
		}
	}
	changePassword();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta name="description" content="UCC Robotics">
		<title><?php echo $row_info['first_name'] ?>'s Account | UCC Robotics</title>
		<link rel="icon" href="css/favicon.ico" />
		<?php include_once("functions/stylesheet.php") ?>
		<script src="js/jquery.js"></script>
	</head>

	<body>
		<?php include_once("navbar.php")  ?>
		<?php include_once("footer.php")  ?>
		<div class="container">
			<?php include_once("site_wide.php") ?>

			<div class="modal fade" tabindex="-1" role="dialog" id="changePassword">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
							<h4 class="modal-title">Change Password</h4>
						</div>
						<div class="modal-body">
							<p>
							<form action="?changePassword" method="post">
								<h4>Old Password</h4>
								<label for="inputPassword" class="sr-only">Old Password</label>
								<input type="password" id="password" name="password" class="form-control" placeholder="Old Password" required="" autofocus="">
								<h4>New Password</h4>
								<label for="inputPassword" class="sr-only">New Password</label>
								<input type="password" id="password_new_1" name="password_new_1" class="form-control" placeholder="New Password" required="">
								<h4>Confirm New Password</h4>
								<label for="inputPassword" class="sr-only">Confirm New Password</label>
								<input type="password" id="password_new_2" name="password_new_2" class="form-control" placeholder="Confirm New Password" required="">
						</div>
						<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
								<button type="submit" class="btn btn-success" id="submitbutton" value="Login">Change Password</button>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="panel panel-primary">
				<div class="panel-heading">
				Account Features:
				</div>

				<div class="panel-body">
					<div class="row">
						<div class="col-md-4">
							<h4>Have an idea for a feature?</h4>
						</div>
						<div class="col-md-8">
							You can submit feature requests on the <a href="https://github.com/malsf21/robotics-club-website">GitHub repository</a>. You can <a href="https://github.com/malsf21/robotics-club-website">fork our repository</a> and then <a href="https://github.com/malsf21/robotics-club-website/pulls">submit a pull request</a> and we'll take a look!
						</div>
					</div>
				</div>

				<li class="list-group-item">
					<div class="row">
						<div class="col-md-4">
							Set Nightmode State:
							</br>
							</br>
						</div>
						<div class="col-md-8">
							<form class="form-signin" action="?accountNightmode" method="post">
								<div class="input-group">
									<select class="form-control" id="nightmode_state" name="nightmode_state" required="">
										<option value="0">Choose an Option.</option>
										<option value="1">Always Light Mode</option>
										<option value="2">Always Dark Mode</option>
										<option value="3">Per Session (Defaults to light mode)</option>
										<option value="4">Per Session (Defaults to dark mode)</option>
									</select>
									<span class="input-group-btn">
										<button type="submit" class="btn btn-success" id="submitbutton" value="Login" >Save Changes</button>
									</span>
								</div>
							</form>
						</div>
					</div>
				</li>
			</div>
			<div class="panel panel-danger">
				<div class="panel-heading">
				Account Settings
				</div>

				<div class="panel-body">
				</div>
				<li class="list-group-item">
					<button class="btn btn-danger" type="button" data-toggle="modal" data-target="#changePassword">Change Password</button>
				</li>
			</div>
		</div>


		<script src="js/jquery.easing.min.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/nav-collapse.js"></script>
	</body>
</html>
