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
	$conexion->query("INSERT INTO APRENDIZ 
						(tipodocumento_aprendiz,
						numerodocumento_aprendiz,
						nombre_aprendiz,
						apellido_aprendiz,
						celular_aprendiz,
						correosena_aprendiz,
						correopersonal_aprendiz,
						id_estado_fk,
						id_ficha_fk)
						 VALUES

						 ('{$contactData[0]}',
						  '{$contactData[1]}', 
						  '{$contactData[2]}',
						  '{$contactData[3]}',
						  '{$contactData[4]}',
						  '{$contactData[5]}',
						  '{$contactData[6]}',
						  '{$contactData[7]}',
						   {$contactData[8]}
						   )

						 "); 
}

?>