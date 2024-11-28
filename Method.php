<?php
	require_once "config.php";

	class Users {

		public function get_all_users() {
			global $mysqli;

			$query = "SELECT * FROM users";
			$query = $mysqli->query($query);

			$data = array();
			while($result = mysqli_fetch_array($query)) {
				$data[] = $result;
			}

			$response = array(
				'status' => 1,
				'message' => "Success",
				'data' => $data,
			);

			header('Content-Type:application/json');
			echo json_encode($response);
		}

		public function get_one_users($id = 0) {
			global $mysqli;

			if ($id == 0) {
				$response = array(
					'status' => 0,
					'message' => "Data tidak ditemukan.",
					'data' => array(),
				);
			}
			else {
				$query = "SELECT * FROM users WHERE id='$id' ";
				$query = $mysqli->query($query);

				$data = array();
				while($result = mysqli_fetch_array($query)) {
					$data[] = $result;
				}

				$response = array(
					'status' => 1,
					'message' => "Success",
					'data' => $data,
				);
			}

			header('Contect_type:application/json');
			echo json_encode($response);
		}

		public function insert_users() {
			global $mysqli;

			$insert = mysqli_query($mysqli, "INSERT INTO users (nama, jenis_kelamin, handphone, alamat) VALUES ('$_POST[nama]', '$_POST[jenis_kelamin]', '$_POST[handphone]', '$_POST[alamat]') ");

			if ($insert) {
				$response = array(
					'status' => 1,
					'message' => "Success",
				);
			}
			else {
				$response = array(
					'status' => 1,
					'message' => "Gagal tambah data",
				);
			}

			header('Content-Type:application/json');
			echo json_encode($response);
		}

		public function update_users($id) {
			global $mysqli;

			$query = mysqli_query($mysqli, "UPDATE users SET nama='$_POST[nama]', jenis_kelamin='$_POST[jenis_kelamin]', handphone='$_POST[handphone]', alamat='$_POST[alamat]' WHERE id='$id' ");

			if ($query) {
				$response = array(
					'status' => 1,
					'message' => "Success",
				);
			}
			else {
				$response = array(
					'status'=> 0,
					'message'=> "Gagal update data",
				);
			}

			header('Contect-Type:application/json');
			echo json_encode($response);
		}

		public function delete_users($id) {
			global $mysqli;

			$query = mysqli_query($mysqli, "DELETE FROM users where id='$id' ");

			if ($query) {
				$response = array(
					'status' => 1,
					'message' => "Success",
				);
			}
			else {
				$response = array(
					'status' => 1,
					'message' => "Gagal hapus data",
				);
			}

			header('Contect-Type:application/json');
			echo json_encode($response);
		}
	}
?>