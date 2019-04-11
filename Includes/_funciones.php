<?php
require_once("con_db.php");
//Recibir variable post
	switch ($_POST["accion"]) {
	//USUARIOS
		case 'login':
			login();
			break;
		case 'consultar_usuarios':
			consultar_usuarios();
			break;
		case 'insertar_usuarios':
			insertar_usuarios();
			break;
		case 'eliminar_usuarios';
			eliminar_usuarios($_POST['id']);
			break;
		case 'editar_usuarios':
			editar_usuarios();
			break;
		case 'consultar_registro_usuarios':
			consultar_registro_usuarios($_POST['id']);
			break;
		case 'carga_foto':
			carga_foto();
			break;
	//HEADER
		case 'consultar_header':
			consultar_header();
			break;
		case 'insertar_header':
			insertar_header();
			break;
		case 'editar_header';
			editar_header($_POST['id']);
			break;
		case 'editar_registroh';
			editar_registroh($_POST['id']);
			break;
		case 'eliminar_header';
			eliminar_header($_POST['id']);
			break;
	//FEATURES
		case 'consultar_features':
			consultar_features();
			break;
		case 'insertar_features':
			insertar_features();
			break;
		case 'eliminar_features';
			eliminar_features($_POST['id']);
			break;
		case 'editar_features':
			editar_features();
			break;
		case 'consultar_registro_features':
			consultar_registro_features($_POST['id']);
			break;	
	//WORKS
		case 'consultar_works';
			consultar_works();
			break;
		case 'insertar_works';
			insertar_works();
			break;
		case 'editar_works';
			editar_works($_POST['id']);
			break;
		case 'editar_registrow';
			editar_registrow($_POST['id']);
			break;
		case 'eliminar_works';
			eliminar_works($_POST['id']);
			break;
	//TESTIMONIALS
		case 'consultar_tes':
			consultar_tes();
			break;
		case 'insertar_testimonials':
			insertar_testimonials();
			break;
		case 'eliminar_testimonials';
			eliminar_testimonials($_POST['id']);
			break;
		case 'consultar_registro_testimonials';
			consultar_registro_testimonials($_POST['id']);
			break;
		case 'editar_testimonials':
			editar_testimonials();
			break;
		default:
			# code...
			break;
	}
	//------------------------------FUNCIONES MODULO USUARIOS------------------------------//
	function login(){
		//echo "Tu usuario es: ".$_POST["usuario"]. ", Tu contraseña es: ".$_POST["password"];
		//Conectar a la BD
		global $mysqli;
		$email = $_POST["usuario"];
		$pass = $_POST["password"];
		//Si el usuario y pass están vacios imprimir 3
		if (empty($email) && empty($pass)) {
			echo "3";
		//Si no están vacios consultar a la bd que el usuario exista.
		}else {
			$sql = "SELECT * FROM usuarios WHERE correo_usr = '$email'";
			$rsl = $mysqli->query($sql);
			$row = $rsl->fetch_assoc();
			//Si el usuario no existe, imprimir 2
			if ($row == 0) {
				echo "2";
			//Si hay resultados verificar datos
			}else{
				$sql = "SELECT * FROM usuarios WHERE correo_usr = '$email' AND password_usr = '$pass'";
				$rsl = $mysqli->query($sql);
				$row = $rsl->fetch_assoc();
				//Si el password no es correcto, imprimir 0
				if ($row["password_usr"] != $pass) {
					echo "0";
				//Si el usuario es correcto, imprimir 1
				}elseif ($email == $row["correo_usr"] && $pass == $row["password_usr"]) {
					echo "1";
					session_start();
					error_reporting(0);
					$_SESSION['usuario'] = $email;
				}
			}
		} 	
	}
	function consultar_usuarios(){
		//Conectar a la BD
		global $mysqli;
		//Realizar consulta
		$sql = "SELECT * FROM usuarios";
		$rsl = $mysqli->query($sql);
		$array = [];
		while ($row = mysqli_fetch_array($rsl)) {
			array_push($array, $row);
		}
		echo json_encode($array); //Imprime Json encodeado		
	}
	function insertar_usuarios(){
		//Conectar a la bd
		global $mysqli;
		$nombre = $_POST['nombre_usr'];
		$correo = $_POST['correo_usr'];
		$img_usr = $_POST['img_usr'];
		$telefono = $_POST['telefono_usr'];
		$pass = $_POST['password_usr'];
		$expresion = '/^[9|9|5][0-10]{8}$/';
		//Validacion de campos vacios
		if (empty($nombre) && empty($correo) && empty($telefono) && empty($pass)) {
			echo "0";
		}elseif (empty($nombre)) {
			echo "2";
		}elseif (empty($correo)) {
			echo "3";
		}elseif ($correo != filter_var($correo, FILTER_VALIDATE_EMAIL)) {
			echo "4";
		}elseif (empty($img_usr)) {
			echo "10";
		}elseif (empty($telefono)) {
			echo "5";
		}elseif (preg_match($expresion, $telefono)) {
			echo "6";
		}elseif (empty($pass)) {
			echo "7";
		}else{
			$sql = "INSERT INTO usuarios VALUES('', '$nombre', '$correo', '$img_usr', '$pass', '$telefono')";
			echo $sql;
			$rsl = $mysqli->query($sql);
			echo "1";
		}
	}
	function eliminar_usuarios($id){
		global $mysqli;
		$sql = "DELETE FROM usuarios WHERE id_usr = $id";
		$rsl = $mysqli->query($sql);
		if ($rsl) {
			echo "Se elimino correctamente";
		}else{
			echo "Se genero un error, intenta nuevamente";
		}
	}
	function editar_usuarios(){
		global $mysqli;
		extract($_POST);
		$expresion = '/^[9|9|5][0-10]{8}$/';
		//Validacion de campos vacios
		if (empty($nombre_usr) && empty($correo_usr) && empty($telefono_usr) && empty($pass_usr)) {
			echo "0";
		}elseif (empty($nombre_usr)) {
			echo "2";
		}elseif (empty($correo_usr)) {
			echo "3";
		}elseif ($correo_usr != filter_var($correo_usr, FILTER_VALIDATE_EMAIL)) {
			echo "4";
		}elseif (empty($img_usr)) {
			echo "10";
		}elseif (empty($telefono_usr)) {
			echo "5";
		}elseif (preg_match($expresion, $telefono_usr)) {
			echo "6";
		}elseif (empty($password_usr)) {
			echo "7";
		}else{
			$sql = "UPDATE usuarios SET nombre_usr = '$nombre_usr', correo_usr = '$correo_usr', foto_usr = '$img_usr', password_usr = '$password_usr', telefono_usr = '$telefono_usr'
			WHERE id_usr = '$id'";
			$rsl = $mysqli->query($sql);
			if ($rsl) {
				echo "8";
			}else{
				echo "9";
			}
		}
	}
	function consultar_registro_usuarios($id){
		global $mysqli;
		$sql = "SELECT * FROM usuarios WHERE id_usr = $id";
		$rsl = $mysqli->query($sql);
		$fila = mysqli_fetch_array($rsl);
		echo json_encode($fila); //Imprime Json encodeado	
	}
	function carga_foto(){
		if (isset($_FILES["foto"])) {
			$file = $_FILES["foto"];
			$nombre = $_FILES["foto"]["name"];
			$temporal = $_FILES["foto"]["tmp_name"];
			$tipo = $_FILES["foto"]["type"];
			$tam = $_FILES["foto"]["size"];
			$dir = "../img/usuarios/";
			$respuesta = [
				"archivo" => "img/usuarios/logotipo.png",
				"status" => 0
			];
			if(move_uploaded_file($temporal, $dir.$nombre)){
				$respuesta["archivo"] = "img/usuarios/".$nombre;
				$respuesta["status"] = 1;
			}
			echo json_encode($respuesta);
		}
	}
	//------------------------------FUNCIONES MODULO HEADER---------------------------------//
	function consultar_header(){
		global $mysqli;
		$consulta = "SELECT * FROM header";
		$resultado = mysqli_query($mysqli,$consulta);
		$arreglo = [];
		while($fila = mysqli_fetch_array($resultado)){
			array_push($arreglo, $fila);
		}
		echo json_encode($arreglo); //Imprime el JSON ENCODEADO
	}
	function insertar_header(){
		global $mysqli;
		$texto_h = $_POST['texto_h'];
		$logo_h = $_POST['logo_h'];
		if ($texto_h == "") {
			echo "Llena el campo Texto";
		}elseif ($logo_h == "") {
			echo "Llena el campo Imagen";
		}else{
		$consulta = "INSERT INTO header VALUES ('','$texto_h','$logo_h')";
		$resultado = mysqli_query($mysqli,$consulta);
		echo "Se inserto el header en la BD ";
		}
	}
	
	function eliminar_header($id){
		global $mysqli;
		$consulta = "DELETE FROM header WHERE id_h = $id";
		$resultado = mysqli_query($mysqli,$consulta);
		if ($resultado) {
			echo "Se elimino correctamente";
		}else{
			echo "Se genero un error, intenta nuevamente";
		}
		
	}
	function editar_registroh($id){
		global $mysqli;
		$consulta = "SELECT * FROM header WHERE id_h = '$id'";
		$resultado = mysqli_query($mysqli,$consulta);
		
		$fila = mysqli_fetch_array($resultado);
		echo json_encode($fila);
	}
	
	function editar_header($id){
		global $mysqli;
		$texto_h = $_POST['texto_h'];
		$logo_h = $_POST['logo_h'];
		if ($texto_h == "") {
			echo "Llene el campo Texto";
		}elseif ($logo_h == "") {
			echo "Llene el campo Img";
		}else{
		echo "Se edito el header correctamente";
		$consulta = "UPDATE header SET texto_h = '$texto_h', logo_h = '$logo_h' WHERE id_h = '$id'";
		$resultado = mysqli_query($mysqli,$consulta);
		
			}
	}
	//------------------------------FUNCIONES MODULO NOTIFY------------------------------//
	function consultar_notify(){
		//Conectar a la BD
		global $mysqli;
		//Realizar consulta
		$sql = "SELECT * FROM notify";
		$rsl = $mysqli->query($sql);
		$array = [];
		while ($row = mysqli_fetch_array($rsl)) {
			array_push($array, $row);
		}
		echo json_encode($array); //Imprime Json encodeado
	}
	function insertar_notify(){
		//Conectar a la bd
		global $mysqli;
		$titulo = $_POST['titulo_n'];
		$texto = $_POST['texto_n'];
		//Validacion de campos vacios
		if (empty($titulo) && empty($texto)) {
			echo "0";
		}elseif (empty($titulo)) {
			echo "2";
		}elseif (empty($texto)) {
			echo "3";
		}else{
			$sql = "INSERT INTO notify VALUES('', '$titulo', '$texto')";
			$rsl = $mysqli->query($sql);
			echo "1";
		}	
	}
	function eliminar_notify($id){
		global $mysqli;
		$sql = "DELETE FROM notify WHERE id_n = $id";
		$rsl = $mysqli->query($sql);
		if ($rsl) {
			echo "Se elimino correctamente";
		}else{
			echo "Se genero un error, intenta nuevamente";
		}
	}
	function consultar_registro_notify($id){
		global $mysqli;
		$sql = "SELECT * FROM notify WHERE id_n = $id";
		$rsl = $mysqli->query($sql);
		$fila = mysqli_fetch_array($rsl);
		echo json_encode($fila); //Imprime Json encodeado	
	}
	
	function editar_notify(){
		//Conectar a la bd
		global $mysqli;
		$titulo = $_POST['titulo_n'];
		$texto = $_POST['texto_n'];
		$id = $_POST['id'];
		//Validacion de campos vacios
		if (empty($titulo) && empty($texto)) {
			echo "0";
		}elseif (empty($titulo)) {
			echo "2";
		}elseif (empty($texto)) {
			echo "3";
		}else{
			$sql = "UPDATE notify SET titulo_n = '$titulo', texto_n = '$texto'WHERE id_n = '$id'";
			$rsl = $mysqli->query($sql);
			if ($rsl) {
				echo "5";
			}else{
				echo "6";
			}
		}	
	}
	//------------------------------FUNCIONES MODULO FEATURES------------------------------//
	function consultar_features(){
		//Conectar a la BD
		global $mysqli;
		//Realizar consulta
		$sql = "SELECT * FROM features";
		$rsl = $mysqli->query($sql);
		$array = [];
		while ($row = mysqli_fetch_array($rsl)) {
			array_push($array, $row);
		}
		echo json_encode($array); //Imprime Json encodeado
	}
	function insertar_features(){
		//Conectar a la bd
		global $mysqli;
		$titulo = $_POST['titulo_f'];
		$texto = $_POST['texto_f'];
		//Validacion de campos vacios
		if (empty($titulo) && empty($texto)) {
			echo "0";
		}elseif (empty($titulo)) {
			echo "2";
		}elseif (empty($texto)) {
			echo "3";
		}else{
			$sql = "INSERT INTO features VALUES('', '$titulo', '$texto')";
			$rsl = $mysqli->query($sql);
			echo "1";
		}	
	}
	function eliminar_features($id){
		global $mysqli;
		$sql = "DELETE FROM features WHERE id_f = $id";
		$rsl = $mysqli->query($sql);
		if ($rsl) {
			echo "Se elimino correctamente";
		}else{
			echo "Se genero un error, intenta nuevamente";
		}
	}
	function consultar_registro_features($id){
		global $mysqli;
		$sql = "SELECT * FROM features WHERE id_f = $id";
		$rsl = $mysqli->query($sql);
		$fila = mysqli_fetch_array($rsl);
		echo json_encode($fila); //Imprime Json encodeado	
	}
	
	function editar_features(){
		//Conectar a la bd
		global $mysqli;
		$titulo = $_POST['titulo_f'];
		$texto = $_POST['texto_f'];
		$id = $_POST['id'];
		//Validacion de campos vacios
		if (empty($titulo) && empty($texto)) {
			echo "0";
		}elseif (empty($titulo)) {
			echo "2";
		}elseif (empty($texto)) {
			echo "3";
		}else{
			$sql = "UPDATE features SET titulo_f = '$titulo', texto_f = '$texto'WHERE id_f = '$id'";
			$rsl = $mysqli->query($sql);
			if ($rsl) {
				echo "5";
			}else{
				echo "6";
			}
		}	
	}
	//------------------------------FUNCIONES MODULO TESTIMONIALS------------------------------//
	function consultar_tes(){
		//Conectar a la BD
		global $mysqli;
		//Realizar consulta
		$sql = "SELECT * FROM testimonials";
		$rsl = $mysqli->query($sql);
		$array = [];
		while ($row = mysqli_fetch_array($rsl)) {
			array_push($array, $row);
		}
		echo json_encode($array); //Imprime Json encodeado
	}
	function insertar_testimonials(){
		//Conectar a la bd
		global $mysqli;
		$nombre = $_POST['nombre'];
		$mensaje = $_POST['mensaje'];
		$foto_tes = $_POST['foto_tes'];
		//Validacion de campos vacios
		if (empty($nombre) && empty($mensaje) && empty($foto_tes)) {
			echo "0";
		}elseif (empty($nombre)) {
			echo "2";
		}elseif (empty($mensaje)) {
			echo "4";
		}elseif (empty($foto_tes)) {
			echo "7";
		}else{
			$sql = "INSERT INTO testimonials VALUES('', '$nombre', '$mensaje', '$foto_tes')";
			$rsl = $mysqli->query($sql);
			echo "1";
		}	
	}
	function eliminar_testimonials($id){
		global $mysqli;
		$sql = "DELETE FROM testimonials WHERE id_tes = $id";
		$rsl = $mysqli->query($sql);
		if ($rsl) {
			echo "Se elimino correctamente";
		}else{
			echo "Se genero un error, intenta nuevamente";
		}
	}
	function consultar_registro_testimonials($id){
		global $mysqli;
		$sql = "SELECT * FROM testimonials WHERE id_tes = $id";
		$rsl = $mysqli->query($sql);
		$fila = mysqli_fetch_array($rsl);
		echo json_encode($fila); //Imprime Json encodeado	
	}
	function editar_testimonials(){
		//Conectar a la bd
		global $mysqli;
		$nombre = $_POST['nombre'];
		$mensaje = $_POST['mensaje'];
		$foto_tes = $_POST['foto_tes'];
		$id = $_POST['id'];
		//Validacion de campos vacios
		if (empty($nombre) && empty($mensaje) && empty($foto_tes)) {
			echo "0";
		}elseif (empty($nombre)) {
			echo "2";
		}elseif (empty($mensaje)) {
			echo "4";
		}elseif (empty($foto_tes)) {
			echo "7";
		}else{
			$sql = "UPDATE testimonials SET nombre_tes = '$nombre', mensaje_tes = '$mensaje', foto_tes = '$foto_tes' WHERE id_tes = '$id'";
			$rsl = $mysqli->query($sql);
			if ($rsl) {
				echo "5";
			}else{
				echo "6";
			}
		}	
	}
?>