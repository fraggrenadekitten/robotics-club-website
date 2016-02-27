<?php include_once("functions/import_info.php") ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta name="description" content="UCC Robotics">
		<title>VEX Resources | UCC Robotics</title>
		<link rel="icon" href="css/favicon.ico" />
		<?php include_once("functions/stylesheet.php") ?>
		<script src="js/jquery.js"></script>

	</head>

	<body>
		<?php include_once("navbar.php")  ?>
		<?php include_once("footer.php")  ?>
		<div class="container">
			<?php include_once("site_wide.php") ?>
			<div class="jumbotron">
				<h1 class="page-header"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Resources <small>for VEX robotics</small></h1>
			</div>
			<div class="row">
				<div class="col-md-6">
					<h2>VEX Competition Resources</h2>
					<div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">
						<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingOne">
								<h4 class="panel-title">
								<a role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									Engineering Notebook
								</a>
								</h4>
							</div>
							<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
								<div class="panel-body">
									Documenting all the changes made to a robot is important, and dually important for the VEX Design Award. The club keeps an engineering design notebook, detailing the brainstorming processes and innovative ideas that go into the bot.
									</br>
									</br>
									Unfortunately, accessing the notebook online is a bit of a hassle (we'll work on that later); that being said, you can check out the design notebook from the club. Simply contact one of our <a href="club_contact.php">club heads</a> to check out the notebook for the day, or the weekend.
								</div>
							</div>
						</div>
						<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingTwo">
								<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								RobotC Code Bank
								</a>
								</h4>
							</div>
							<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
								<div class="panel-body">
								We keep all of our RobotC code for our robots on our <a href="https://github.com/malsf21/RobotC">GitHub Repository</a>. If you want to submit something to the repository, <a href="https://help.github.com/articles/fork-a-repo/">fork our repository</a>, make your changes, and then <a href="https://help.github.com/articles/using-pull-requests/">submit a pull request</a>. We'll review your code, and if it looks good, we'll approve the pull request. If you become a frequent contributor, we'll give you push access to the repo.
								</br>
								</br>
								Since our code is on GitHub, <b>you don't need <a href="http://www.robotc.net/">the RobotC IDE</a> to code the robot</b>. We'll test the code through the robotics Windows machine, but you can write code on a Windows computer, Mac, or even Linux! We do suggest budding coders learn or understand C, so they can self-bugfix (since the approval/vetting process will take time).
								</div>
							</div>
						</div>
						<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingThree">
								<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								Lorem Ipsum.
								</a>
								</h4>
							</div>
							<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
								<div class="panel-body">
								Lorem Ipsum.
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="thumbnail">
						<img src="img/vex_field.jpg"></img>
						<div class="caption">
							<h3>VEX Competition Field</h3>
							<p>
								This is a picture of the official VEX Nothing but Net Competition field. The Blue Alliance robots start on the two blue squares, while the two Red Alliance robots start on the two red squares. The Alliance robots need to score the balls into their respective Alliance scoring areas: scoring into the lower portion, or the higher net.
								</br>
								</br>
								Balls are placed on the field; in addition, robots can start with up to two balls pre-loaded into the bot (with four total for the Alliance). In addition, each Alliance can hand-load 24 balls into their robots during driver period.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script src="js/jquery.easing.min.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/nav-collapse.js"></script>
	</body>
</html>
