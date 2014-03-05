<html>
<head>
	<title>404 Page Not Found</title>
    <meta charset="UTF-8" />
</head>
<style>
	.mainpannel{
		width:60%;
		margin-left:auto;
		margin-right:auto;
		text-align:center;
		-webkit-box-shadow:2px 2px 5px #333333;
	}
	.show{
		text-align:left;
		width:180px;
		margin-left:auto;
		margin-right:auto;
		-webkit-box-shadow:2px 2px 5px #333333;
	}
	hr{width:90%}
</style>
<body>

<p>
<div class="mainpannel">
	<h1>404 Page Not Found</h1>
	<hr/>
	<h2>Incorrect URL. Please verify the URL and try again !</h2>
	<div class="show">
		<?php echo $errinfo; ?>
	</div>
	<br/>
	
</div>
</p>

</body>
</html>