<html>
<head>
<style type="text/css">
#navlist
{	margin: 0;
	padding: 0;}

#navlist li
{	margin: 0;
	padding: 0;
	list-style: none;
	float: left;}

#navlist li a
{	display: block;
	margin: 0 1px 0 0;
	padding: 4px 10px;
	width: 60px;
	background: #2B3990;
	color: #FFF;
	text-align: center;
	text-decoration: none}

#navlist li a:hover
{	background: #49A3FF}

#navlist div
{	position: absolute;
	visibility: hidden;
	margin: 0;
	padding: 0;
	background: #2B3990;
	border: 1px solid #5970B2}

	#navlist div a
	{	position: relative;
		display: block;
		margin: 0;
		padding: 5px 10px;
		width: auto;
		white-space: nowrap;
		text-align: left;
		text-decoration: none;
		background: #2B3990;
		color: #fff;
		font: 11px arial}

	#navlist div a:hover
	{	background: #49A3FF;
		color: #FFF}

</style>
<script type="text/javascript">

var timeout	= 500;
var closetimer	= 0;
var ddmenuitem	= 0;

// open hidden layer
function mopen(id)
{	
	// cancel close timer
	mcancelclosetime();

	// close old layer
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';

	// get new layer and show it
	ddmenuitem = document.getElementById(id);
	ddmenuitem.style.visibility = 'visible';

}
// close showed layer
function mclose()
{
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';
}

// go close timer
function mclosetime()
{
	closetimer = window.setTimeout(mclose, timeout);
}

// cancel close timer
function mcancelclosetime()
{
	if(closetimer)
	{
		window.clearTimeout(closetimer);
		closetimer = null;
	}
}

// close layer when click-out
document.onclick = mclose;
</script>

</head>

<body>
<ul id="navlist">
	<li> 
		<a href="newNavbarTop.php">Home</a>
	</li>
	<li>
		<a href="newNavbarTop.php">Menu</a>
	</li>
	<li>
		<a href="newNavbarTop.php" 
		onmouseover="mopen('n1')" 
        onmouseout="mclosetime()">Events</a>
		<div id="n1" 
			onmouseover="mcancelclosetime()"
            onmouseout="mclosetime()">
			<a href="newNavbarTop.php">Bike-Night</a>
			<a href="newNavbarTop.php">Cruise-In</a>
			<a href="newNavbarTop.php">Movie-Night</a>
			<a href="newNavbarTop.php">FUNraising</a>
		</div>
	</li>
	<li>
		<a href="newNavbarTop.php">Bike-Night</a>
	</li>
	<li>
		<a href="newNavbarTop.php">Cruise-In</a>
	</li>
	<li>
		<a href="newNavbarTop.php">T-Shirts</a>
	</li>
	<li>
		<a href="newNavbarTop.php" 
		onmouseover="mopen('n2')" 
        onmouseout="mclosetime()">About Us</a>
		<div id="n2" 
			onmouseover="mcancelclosetime()"
            onmouseout="mclosetime()">
			<a href="newNavbarTop.php">History</a>
			<a href="newNavbarTop.php">Teletray Project</a>
		</div>
	</li>
	<li>
		<a href="newNavbarTop.php">Find Us</a>
	</li>
</ul>

</body>

</html>