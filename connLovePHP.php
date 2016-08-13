<?php
	
	require_once("connMysql.php");
	function insert($id,$title,$link)
	{
		$sql = "INSERT INTO `loveart`(`articleID`,`title`,`link`) VALUES ( '$id' , '$title' , '$link');";	
 		$insertLove = mysql_query($sql);

	}	

	
  			

?>