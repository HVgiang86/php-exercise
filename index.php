<!DOCTYPE html>
<html>

<head>
	<title>index</title>
	<meta charset="utf-8">
	<style type="text/css">
		* {
			padding: 0px;
			margin: 0px;
			font-family: arial;
		}

		#banner {
			width: 1059px;
			height: 100px;
			background-color: green;
			margin: 0px auto;
		}

		#index {
			display: flex;
			background-color: grey;
			margin: 0px auto 50px;
		}

		#index a {
			flex: 1;
			padding: 20px 0;
		}

		#content {
			margin: 0px auto;

		}

		a:link,
		a:visited {
			background-color: blue;
			color: white;
			padding: 15px 100px;
			text-align: center;

			display: inline-block;
		}

		a:hover,
		a:active {
			background-color: #4285F4;
		}

	</style>
</head>

<body>

	<div id="header">
		<div id="index">
			<a href="index.php?page=register">Register</a>
			<a href="index.php?page=insertPage">Insert Page</a>
			<a href="index.php?page=uploadImage">Upload image</a>
		</div>
		<div id="content">
			<?php
			if (isset($_GET['page'])) {
				$page = $_GET['page'];
			} else {
				$page = 'menu';
			}
			switch ($page) {
				case 'register':
					include("pages/register.php");
					break;

				case 'insertPage':
					require("pages/insertpage.php");
					break;

				case 'uploadImage':
					require("pages/uploadImage.php");
					break;

				default:
					break;
			}
			?>
		</div>
	</div>


</body>

</html>
