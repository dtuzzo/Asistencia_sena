<?php

require_once('../../Conexion/conexion.php');
$obj = new conectar();
$conexion = $obj->conexion();

$fileContacts = $_FILES['fileContacts']; 
$fileContacts = file_get_contents($fileContacts['tmp_name']); 

$fileContacts = explode("\n", $fileContacts);
$fileContacts = array_filter($fileContacts); 

// preparar contactos (convertirlos en array)
foreach ($fileContacts as $contact) 
{
	$contactList[] = explode(";", $contact);
}

// insertar contactos
foreach ($contactList as $contactData) 
{
	$conexion->query("INSERT INTO REGISTRO 
						(FECHA_REGISTRO, NOMBRE_APRENDIZ,
                APELLIDO_APRENDIZ, SITUACION)
						 VALUES

						 (CURDATE(), 
						  '{$contactData[0]}', 
						  '{$contactData[1]}',
						  '{$contactData[2]}'
						   )
						 "); 
}

?>