<?php

class Database{
	public static function connect(){
		$db = new mysqli('localhost', 'wp', 'wp', 'the_shop_project');
		$db->query("SET NAMES 'utf8'");
		return $db;
	}
}