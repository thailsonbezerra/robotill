<!DOCTYPE html>
<html>

<head>

	<title>
		Robotill
	</title>

</head>

<body>

	<style>
		.nav-sidebar>.active>a {
			color: #fff;
			background-color: #428bca;
		}

		.nav-sidebar>li>a:hover{
			color: #000 ;
		}

		
	</style>

	<nav class="navbar navbar-inverse" style="border-radius: 0">
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
				<li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
				<li><a href="#">Reports</a></li>
				<li><a href="#">Analytics</a></li>
				<li><a href="#">Export</a></li>
			</ul>
			<ul class="nav nav-sidebar">
				<li><a href="">Nav item</a></li>
				<li><a href="">Nav item again</a></li>
				<li><a href="">One more nav</a></li>
				<li><a href="">Another nav item</a></li>
				<li><a href="">More navigation</a></li>
			</ul>
			<ul class="nav nav-sidebar">
				<li><a href="">Nav item again</a></li>
				<li><a href="">One more nav</a></li>
				<li><a href="">Another nav item</a></li>
			</ul>
		</div>

		<div class="col-md-9">
			<div id="content">

				<?php echo $this->Flash->render(); ?>

				<?php echo $this->fetch('content'); ?>

			</div>
		</div>




		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</body>

</html>