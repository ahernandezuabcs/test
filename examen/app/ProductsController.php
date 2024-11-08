<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

if (!isset($_SESSION['token'])) {
	$_SESSION['token'] = 123;
}

if (isset($_POST['action'])) {
	switch ($_POST['action']) {
		case 'crear_producto':
			$name_var = $_POST['name'];
			$slug_var = $_POST['slug'];
			$description_var = $_POST['description'];
			$features_var = $_POST['features'];
			$cover_var = $_FILES['cover'];

			$productsController = new ProductsController();
			$productsController->create($name_var, $slug_var, $description_var, $features_var, $cover_var);
			break;

		case 'update_producto':
			$name_var = $_POST['name'];
			$slug_var = $_POST['slug'];
			$description_var = $_POST['description'];
			$features_var = $_POST['features'];
			$product_id = $_POST['product_id'];

			$productsController = new ProductsController();
			$productsController->update($name_var, $slug_var, $description_var, $features_var, $product_id);
			break;

		case 'delete_producto':
			$product_id = $_POST['product_id'];

			$productsController = new ProductsController();
			$productsController->delete($product_id);
			break;
	}
}

class ProductsController 
{
	public function get() {
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
		    'Authorization: Bearer ' . $_SESSION['user_data']->token
		  ),
		));

		$response = curl_exec($curl);
		curl_close($curl);
		$response = json_decode($response);

		return isset($response->code) && $response->code > 0 ? $response->data : [];
	}

	public function getBySlug($slug) {
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/slug/' . $slug,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
		    'Authorization: Bearer ' . $_SESSION['user_data']->token
		  ),
		));

		$response = curl_exec($curl);
		curl_close($curl);
		$response = json_decode($response);

		return isset($response->code) && $response->code > 0 ? $response->data : [];
	}

	public function create($name_var, $slug_var, $description_var, $features_var, $cover_var) {
		if (!isset($cover_var['tmp_name']) || !is_uploaded_file($cover_var['tmp_name'])) {
			echo 'Error: No se ha subido ningún archivo.';
			header("Location: ../home.php?status=error");
			exit();
		}

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => array(
				'name' => $name_var,
				'slug' => $slug_var,
				'description' => $description_var,
				'features' => $features_var,
				'cover' => new CURLFILE($cover_var['tmp_name'], $cover_var['type'], $cover_var['name'])
			),
			CURLOPT_HTTPHEADER => array(
				'Authorization: Bearer ' . $_SESSION['user_data']->token
			),
		));

		$response = curl_exec($curl);

		if (curl_errno($curl)) {
			echo 'Error en la solicitud cURL: ' . curl_error($curl);
			curl_close($curl);
			return;
		}

		curl_close($curl);
		$response = json_decode($response);

		if (isset($response->code) && $response->code > 0) {
			header("Location: ../home.php?status=ok");
		} else {
			echo 'Error: ' . $response->message;
			header("Location: ../home.php?status=error");
		}
	}

	public function update($name_var, $slug_var, $description_var, $features_var, $product_id) {
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'PUT',
			CURLOPT_POSTFIELDS => 'name=' . $name_var . '&slug=' . $slug_var . '&description=' . $description_var . '&features=' . $features_var . '&id=' . $product_id,
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/x-www-form-urlencoded',
				'Authorization: Bearer ' . $_SESSION['user_data']->token
			),
		));

		$response = curl_exec($curl);
		curl_close($curl);
		$response = json_decode($response);

		header("Location: ../home.php?status=" . (isset($response->code) && $response->code > 0 ? "ok" : "error"));
	}

	public function delete($product_id) {
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/' . $product_id,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'DELETE',
			CURLOPT_HTTPHEADER => array(
				'Authorization: Bearer ' . $_SESSION['user_data']->token
			),
		));

		$response = curl_exec($curl);
		curl_close($curl);
		$response = json_decode($response);

		header("Location: ../home.php?status=" . (isset($response->code) && $response->code > 0 ? "ok" : "error"));
	}
}
?>