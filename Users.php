<?php
	require_once("method.php");

	$users = new Users();
	$request_method = $_SERVER['REQUEST_METHOD'];

	switch($request_method) {
		case "GET" :
			if (!empty($_GET["id"])) {
				$id = intval($_GET['id']);

				$users->get_one_users($id);
			}
			else {
				$users->get_all_users();
			}
			break;
		case "POST" :
			if (!empty($_GET["id"])) {
				$id = intval($_GET['id']);

				$users->update_users($id);
			}
			else {
				$users->insert_users();
			}
			break;
		case "DELETE" :
			$id = intval($_GET['id']);

			$users->delete_users($id);

			break;

		default :
			header('HTTP/1.0 405 Method Not Allowed');
			break;
			break;
	}
?>