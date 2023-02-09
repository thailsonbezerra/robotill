<!DOCTYPE html>
<html>

<head>

	<title>
		Robotill
	</title>
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>

<body>

	<style>
		.navbar.navbar-inverse {
			border-radius: 0;
			margin: 0;
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

		.glyphicon-menu-down,
		.glyphicon-menu-up {
			margin-right: 0 !important;
		}

		#content {
			padding: 20px 0;
		}
	</style>

	<nav class="navbar navbar-inverse">
		<div>
			<div class="navbar-header">
				<a class="navbar-brand" href="#">ROBOTILL</a>
			</div>
			<ul class="nav navbar-nav navbar-right" style="margin-right: 0;">
				<li><a href="/users/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				<li><a href="/users/logout"><span class="glyphicon glyphicon-user"></span> Logout</a></li>
			</ul>
		</div>
	</nav>

	<div style="display: flex;">
		<div class="col-sm-2 sidebar" style="padding: 0;">
			<ul class="nav nav-sidebar">
				<li><a href="/">Home</a></li>

				<li class="active">
					<a href="#" data-toggle="collapse" data-target="#nav-tickets">Tickets <span class="glyphicon glyphicon-menu-down navbar-right"></span></a>
				</li>
				<ol id="nav-tickets" class="nav nav-sub-sidebar collapse out">
					<li class=" active"><a href="/">List</a></li>
					<li><a href="/tickets/add">New</a></li>
				</ol>
				<li>
					<a href="#" data-toggle="collapse" data-target="#nav-robots">Robots <span class="glyphicon glyphicon-menu-down navbar-right"></span></a>
				</li>
				<ol id="nav-robots" class="nav nav-sub-sidebar collapse out">
					<li><a href="/robots">List</a></li>
					<li><a href="/robots/add">New</a></li>
				</ol>
				<li><a href="#" data-toggle="collapse" data-target="#nav-managers">Managers <span class="glyphicon glyphicon-menu-down navbar-right"></span></a></li>
				<ol id="nav-managers" class="nav nav-sub-sidebar collapse out">
					<li><a href="/managers">List</a></li>
					<li><a href="/managers/add">New</a></li>
				</ol>
				<li><a href="#" data-toggle="collapse" data-target="#nav-users">Users <span class="glyphicon glyphicon-menu-down navbar-right"></span></a></li>
				<ol id="nav-users" class="nav nav-sub-sidebar collapse out">
					<li><a href="/users">List</a></li>
					<li><a href="/users/add">New</a></li>
				</ol>
			</ul>
		</div>

		<div class="col-md-9" style="border-left: #ccc solid 1px; height: 100vh">
			<div id="content">

				<?php echo $this->Flash->render(); ?>

				<?php echo $this->fetch('content'); ?>

			</div>
		</div>
	</div>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<script>
		$('.nav.nav-sidebar > li').click(function() {
			const span = $(this).children().children()
			span.toggleClass('glyphicon-menu-down glyphicon-menu-up')
		});
	</script>
</body>

</html>