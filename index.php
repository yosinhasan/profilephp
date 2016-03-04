<?php
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	session_start();
	set_include_path(get_include_path().PATH_SEPARATOR."libs".PATH_SEPARATOR."config".PATH_SEPARATOR."model");
	spl_autoload_register();
	header("Content-Type: text/html; charset=utf-8");
	// set default language 
	if  (!isset($_SESSION["lang"])) {
		$_SESSION["lang"] = Config::LANG;
	} 
	$request = new Request();	
	// connect database 
	AbstractModel::setDB(Database::getDB());
	if (isset($_POST['getCities'])) {
		$id = abs((int) $_POST['getCities']);
		$cities = AbstractModel::getOnWhere("cities", ["id","city_name"], "id_country = ?", [$id]);
		echo json_encode($cities);
		exit;
	}
	if ($request->isPost()) {
		//echo "<pre>",print_r($_POST),"</pre>";
	//	exit;
		$user = new User();
		if ($request->action == 0) {
			// authorize user
			$user->authUser();	
		} elseif ($request->action == 1) {
			// sign new user up
			if ($user->signUp()) {
				
			} else {
				header("Location: ?view=signup");
			}
		}
		
	} elseif ($request->isGet()) {
		if ($request->logout == 1) {
			// delete information about user from session
			unset($_SESSION["user"]);
		}
	}
	if ($request->view) {
		$view = $request->view;
		switch ($view) {
			case "start" :
				break;
			case "signup":
				
				$view = "registration";
				$countries = AbstractModel::getAll("countries");
				
				break;
			case "users":
				$query = "SELECT `email`, `phone`, `firstName`, `lastName`, `city_name`, `country_name`
						 FROM `users` a 
						 INNER JOIN `cities` b ON a.`id_city` = b.`id`
						 INNER JOIN `countries` c ON b.`id_country` = c.`id`";
  
				$db = Database::getDB();
				$data = $db->db->prepare($query);
				$data->execute();
				$users = $data->fetchAll(PDO::FETCH_ASSOC);
				break;
			case "invites":
				$view = "invites";
				$invites = AbstractModel::getOnWhere("invites", "invite", "status = ?", [0]);
				break;
			case "profile":
				$view = "profile";
				break;
			default:
				$view = "start";
				break;
		}
	} else {
		$view = "start";
	}
	// set language if requested
	if ($request->lang) {
		if ($request->lang == "ru" || $request->lang == "en") {
			$_SESSION["lang"] = $request->lang;
		}
	}
	require_once("lang.php");
	$langName = $_SESSION["lang"];
	require_once($view.".php");
?>
