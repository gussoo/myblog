<?php 
//Author: Augusto Principe
// With mysql_real_escape_string() we can avoid SQL injection
session_start();
//Create conexion
$conexion = mysql_connect("localhost", "root", "") or die(mysql_error());
if (!$conexion) 
    die('Error trying to connect : ' . mysql_error());

$bd_selected = mysql_select_db("myblog", $conexion);
//Select myblog database
if (!$bd_selected)
    die ('database not found : ' . mysql_error());

$key ='AAAAB3NzaC1yc2EAAAABJQAAAQEAhXE7fn4YC18mtBSulxK3BmU1ifK3xW4wRw9E';

//delete the session variable
if(isset($_POST['logout']))
{
	unset($_SESSION['usuari_sl']);
	echo '<meta http-equiv="refresh" content="0; url=http://myblog/admin" />';
}
//md5 for hashed passwords
if(isset($_POST['login'])){ 
	$usuari = mysql_query("SELECT * FROM muser WHERE uname = '".$_POST['usuari']."' AND upass = '".md5($_POST['pass'])."'", $conexion) or die(mysql_error());
	if(mysql_fetch_object($usuari))
				$_SESSION['usuari_sl'] = 'AAAAB3NzaC1yc2EAAAABJQAAAQEAhXE7fn4YC18mtBSulxK3BmU1ifK3xW4wRw9E';	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="/admin/myblog.css">
	<meta name="author" content="Augusto Principe">
</head>
<body>
	<div id="content">
<?php if(!isset($_SESSION['usuari_sl']))
		{?>
		<div id="login">
			<form method="post">
				<table>
					<tr><td colspan="2">Login Access</td></tr>
					<tr>
						<td>Usuario:</td>
						<td><input type="text" name="usuari" /></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><input type="password" name="pass" /></td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" name="login" id="login" /></td>
					</tr>
					<tr>
						<td colspan="2"><b id="incorrect" style=" <?php if(!isset($_POST['login'])) echo "display: none;";?> color: red;">User or password incorrect, please try again!</b></td>
					</tr>
				</table>
			</form>
		</div>
<?php }else{
	if($_SESSION['usuari_sl'] == $key)
	{
		//Select all posts
		$qposts = mysql_query("SELECT * FROM mpost ORDER BY id DESC", $conexion) or die(mysql_error());
		
		//Check post values
		if(isset($_POST['del'])) mysql_query("DELETE FROM mpost WHERE id='".$_POST['pid']."'", $conexion) or die(mysql_error());
		
		if(isset($_POST['edit'])) mysql_query("UPDATE mpost SET ptitle='".mysql_real_escape_string($_POST['ptitle'])."', pbody='".mysql_real_escape_string($_POST['pbody'])."' WHERE id='".$_POST['pid']."'", $conexion) or die(mysql_error());
		
		if(isset($_POST['add'])) if(($_POST['addTitle']!= '') && ($_POST['addBody']!= '')) mysql_query("INSERT INTO mpost (id, ptitle, pbody) VALUES ('', '".mysql_real_escape_string($_POST['addTitle'])."', '".mysql_real_escape_string($_POST['addBody'])."') ", $conexion) or die(mysql_error());
			
		if((isset($_POST['del'])) || (isset($_POST['edit'])) || (isset($_POST['add'])))echo '<meta http-equiv="refresh" content="0; url=http://myblog/admin" />';	
?>		
				<form method="post"><input type="submit" name="logout" value="LogOut" /></form>
				<h1>Admin Area</h1>
				<br />
				<h2>Add a post</h2>
				<form id="addPost" method='post'>
					<label>Title: </label><input type="text" name="addTitle" /><br /><br />
					<label>Body:</label><textarea name="addBody"></textarea><br /><br />
					<input type="submit" name="add" value="add" />
				</form>
				<br />
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
								echo '<td><input type="text" name="ptitle" value="'.$dposts->ptitle.'" /></td>';
								echo '<td><textarea style="width:250px;height:50px;" name="pbody">'.$dposts->pbody.'</textarea></td>';
								echo "<td>".$dposts->pdate."</td>";
								echo "<td>";
								echo '<input type="hidden" name="pid" value="'.$dposts->id.'" />';
								echo '<input type="submit" name="del" value="X" />';
								echo '<input type="submit" name="edit" value="edit" />';
								echo "</td></form></tr>";		
							}
					?>
				</table>
	<?php }
	}?>
	</div>
</body>

</html>