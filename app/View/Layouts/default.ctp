<!DOCTYPE html>
<html>

<head>

	<title>
		Robotill
	</title>

</head>

<body>

	<style>
		.navbar.navbar-inverse {
			border-radius: 0;
			margin: 0;
		}

		.nav-sidebar {
			border: #ccc solid 1px;
			height: 100vh;
		}

		.nav-sidebar li a {
			border-bottom: #bbb solid 1px;
		}

		.nav-sidebar>.active>a,
		.nav-sidebar>.active>a:focus,
		.nav-sidebar>.active>a:hover {
			color: #fff;
			background-color: #428bca;
			font-weight: bold;

		}

		.nav-sub-sidebar>.active>a,
		.nav-sub-sidebar>.active>a:focus,
		.nav-sub-sidebar>.active>a:hover {
			color: #fff;
			background-color: #A7D7FF;
			font-weight: bold;
		}

		.nav.nav-sub-sidebar>li>a {
			padding: 10px 30px;
		}

		#content {
			padding: 20px 0;
		}
	</style>

	<nav class="navbar navbar-inverse">
		<div class="container-fluid" style="display: flex; justify-content: space-between">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">ROBOTILL</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="/users/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				<li><a href="/users/logout"><span class="glyphicon glyphicon-user"></span> Logout</a></li>
			</ul>
		</div>
	</nav>

	<div class="container-fluid">
		<div class="col-sm-3 col-md-2 sidebar" style="padding: 0;">
			<ul class="nav nav-sidebar">
				<li><a href="#">Home</a></li>

				<li class="active">
					<a href="#">Tickets <span class="caret"></span></a>

					<ol class="nav nav-sub-sidebar">
						<li class="active"><a href="#">List</a></li>
						<li><a href="#">New</a></li>
						<li><a href="#">Edit</a></li>
					</ol>
				</li>

				<li><a href="#">Robots <span class="caret"></span></a></li>
				<li><a href="#">Managers <span class="caret"></span></a></li>
				<li><a href="#">Users <span class="caret"></span></a></li>
			</ul>
		</div>

		<div class="col-md-9">
			<div id="content">

				<?php echo $this->Flash->render(); ?>

				<?php echo $this->fetch('content'); ?>

			</div>
		</div>

		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</body>

</html>