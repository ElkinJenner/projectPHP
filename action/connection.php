<?php
class Db{
	public static function connect(){
		$host="localhost";
		$user="root";
		$password="";
		$db="bd_adminuser";
		return new mysqli($host,$user,$password,$db);
	}
}
?>