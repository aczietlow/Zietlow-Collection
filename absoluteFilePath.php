
<html>
<head>
<link href="main.css" rel="stylesheet" type="text/css">
</head>

<body>

	<div id="main_div">
		<div id="wrapper">
	<?php include ($_SERVER['SITE_HTMLROOT'].'top-navbar.php')?>
		<br />
		<p> Problem: using relative file paths when using include statements. A relative file path needs to be updated when attempting to ref or call the same file from multiple directories.	
		</p>
		<p> Solution:  instead of using the relative path to call objects within files used in multiple directorys use an absolute path everytime. 
		</p>
		<p>This can be done using the <b>$_SERVER['SITE_HTMLROOT']</b> </p>
		<p> To reference a full absolute path use <b>$fullPath = $_SERVER['SITE_HTMLROOT'].'dir/dir/file.ext';</b> </p>
		<a href="http://php.net/manual/en/reserved.variables.server.php">PHP manual description of $_SERVER['']</a>
		</div>
	</div>
</body>
</html>