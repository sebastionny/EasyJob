<?php
/**
 * Description of Database.class
 *
 * @author Meryem, Am�lia, Assia et S�bastien
 */
require_once('modele/configs/config.php');
class Database
{	
	private static $instance = null;
	
	private function __construct() {}
	
	public static function getInstance()
	{
		if(self::$instance == null)
			self::$instance = new PDO(
				"mysql:host=".config::DB_HOST.";dbname=".config::DB_NAME."",
				config::DB_USER,
				config::DB_PWD);
		return self::$instance;
	}
	public static function close()
	{
		self::$instance = null;
	}
}