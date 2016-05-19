<?php 
//Author: Augusto Principe

//Create conexion
$conexion = mysql_connect("localhost", "root", "") or die(mysql_error());
if (!$conexion) 
    die('Error trying to connect : ' . mysql_error());

$bd_selected = mysql_select_db("myblog", $conexion);
//Select myblog database
if (!$bd_selected)
    die ('database not found : ' . mysql_error());

//Select all posts
$qposts = mysql_query("SELECT * FROM mpost ORDER BY id DESC LIMIT 5", $conexion) or die(mysql_error());
?>

<!DOCTYPE html>
<html lang="ca">
<head>
	<link rel="stylesheet" type="text/css" href="/admin/myblog.css">
	<meta name="author" content="Augusto Principe">
</head>
<body>
	<div id="content">
		<h1>User Area</h1><br />
	<?php
	//Check 
	if(isset($_POST['view']))
	{
		$qpost = mysql_query("SELECT * FROM mpost WHERE id='".$_POST['pid']."'", $conexion) or die(mysql_error());
		$dpost = mysql_fetch_object($qpost);
		echo "<h2>View post</h2>";
		echo "<p><b>Title: </b>".$dpost->ptitle."</p>";
		echo "<p><b>Body: </b>".$dpost->pbody."</p>";
		echo "<p><b>Date: </b>".$dpost->pdate."</p>";
		echo '<button onclick="history.go(-1);">Go Back </button>';
	}else{
	?>
		<h2>List of posts</h2>
			<table border="1">
				<tr>
					<th>Post Title</th>
					<th>Body</th>
					<th>Date</th>
					<th>Action</th>
				</tr>
				<?php
					while($dposts = mysql_fetch_object($qposts))
						{
							echo "<tr><form method='post'>";
							echo '<td>'.$dposts->ptitle.'</td>';
							echo '<td>'.substr($dposts->pbody, 0, 100).'</td>';
							echo "<td>".$dposts->pdate."</td>";
							echo "<td>";
							echo '<input type="hidden" name="pid" value="'.$dposts->id.'" />';
							echo '<input type="submit" name="view" value="View Post" />';
							echo "</td></form></tr>";		
						}
				?>
			</table>
	<?php }?>
</div>
</body>

</html>