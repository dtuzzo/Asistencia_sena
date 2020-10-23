 <?php
	class conectar{
		public function conexion(){
			$conexion=mysqli_connect('127.0.0.1:3307','root','','asistenciasena');
	
			$conexion->set_charset("utf8"); //Para mostrar bien las letras á,é,í,ó,ú,ñ ETC.
			return $conexion;
		}
    }

	
?>