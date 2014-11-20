<?php
include ("idiomas/cas.php");
$nombre_admin=$_REQUEST['nombre_admin'];
$administrador=$_REQUEST['administrador'];
$contrasenya=$_REQUEST['contrasenya'];
$contrasenya=md5($contrasenya);
$codigo_centro=$_REQUEST['codigo_centro'];
$nombre_centro=$_REQUEST['nombre_centro'];

$codigo_fecha = date("dmyHis");
$codigo_not=$codigo_centro.md5($administrador).$codigo_fecha;



$ruta=$_REQUEST['ruta'];
$ruta='http://'.$ruta.'/secretictac';

$usuario=$_REQUEST['usuario'];
$contrasenya_mysql=$_REQUEST['contrasenya_mysql'];


$link = mysql_connect('localhost', $usuario, $contrasenya_mysql);
if (!$link) {
echo "<script>alert('$iniciotexto6');</script>";
echo "<script>location.href='index.php';</script>";
}

$base_datos='secretictac';
$sql = 'CREATE DATABASE IF NOT EXISTS '.$base_datos;
if (mysql_query($sql, $link)) {

mysql_select_db($base_datos);
include ("anyadir_tablas_datos.php");


//clse para extraer zip
class Zip_manager{

function listar($var){
$entries = array();
$zip = zip_open($var);
if (!is_resource($zip)){
die ("No se puede leer el archivo.");
}
else{
while ($entry = zip_read($zip)){
$entries[] = zip_entry_name($entry);
}
}
zip_close($zip);
return $entries;
}

function extraer($var, $destino){
$zip = new ZipArchive;
if ($zip->open($var) === TRUE) {
$zip->extractTo($destino);
$zip->close();
return true;
} else {
return false;
}
}
}

if (!file_exists('../secretictac/'))
{
mkdir('../secretictac/', 0775, true);//creamos el diretorio secretictac
}
//descomprension del archivo zip
$zip_manager = new Zip_manager();
$archivo_zip = "secretictac.zip"; // aqui el nombre del archivo a extraer
$explode_carpeta = explode(".zip", $archivo_zip);  // Es lo que hace es quitarle el .zip
$carpeta_final = '../secretictac/';//esto lo he quitado para que se forme un unico directorio .$explode_carpeta[0];  // un simple explode...
$listado = $zip_manager->listar($archivo_zip);
//print_r($listado);
$resultado = $zip_manager->extraer($archivo_zip, $carpeta_final); // aqui pirmero el nombre del archivo y despues la carpeta del destino final.
if (!$resultado){
echo "Error: no se ha podido extraer el archivo";
}
else{
echo "<br>";
}





//creo el archivo conectar
$archivo = '../secretictac/conexion.php';
$fp = fopen($archivo, "w");
$string = '<?php
function conectar()
{
	mysql_connect("localhost",'.'"'.$usuario.'"'.', "'.$contrasenya_mysql.'");
	mysql_select_db('.'"'.$base_datos.'");
}

function desconectar()
{
	mysql_close();
}
?>';
$write = fputs($fp, $string);
fclose($fp);

//creo el archivo ruta absoluta
$archivo = '../secretictac/ruta_absoluta.php';
$fp = fopen($archivo, "w");
$string = '<?php
$codigo_centro_inicial="'.$codigo_centro.'";
$ruta_absoluta="'.$ruta.'";
?>';
$write = fputs($fp, $string);
fclose($fp);



//logo conselleria
$tempFile="logo_conselleria.png";
$targetPath='../secretictac/archivos/datos_centro/'.$codigo_centro.'/';
$codigo_fecha = date("dmyHis");//paralinkmensaje
$nombre_archivo='logo_conselleria.png';
$targetFile =  $targetPath.$codigo_fecha.$nombre_archivo;
$link_documento=$codigo_fecha.$nombre_archivo;
if (!file_exists($targetPath))
{
mkdir(str_replace('//','/',$targetPath), 0777, true);
}
//move_uploaded_file($tempFile,$targetFile);
copy($tempFile,$targetFile);

//logo centro
$tempFile1='logo_centro.jpg';
$nombre_archivo1='logo_centro.jpg';
$targetFile1 =  $targetPath.$codigo_fecha.$nombre_archivo1;
$link_documento1=$codigo_fecha.$nombre_archivo1;
//move_uploaded_file($tempFile1,$targetFile1);
copy($tempFile1,$targetFile1);


$contar_usuario = "SELECT COD_CENTRO FROM usuarios where COD_CENTRO='$codigo_centro' and usuario='$administrador'";
$result = mysql_query($contar_usuario);
$numero = mysql_num_rows($result);	
if($numero==0)
{
mysql_query("insert into  usuarios(COD_CENTRO,contra,usuario,PERMISO,nombre_usuario) values
('$codigo_centro','$contrasenya','$administrador','1','$nombre_admin')");
}
else{
	mysql_query("update usuarios SET contra='$contrasenya',nombre_usuario='$nombre_admin' WHERE COD_CENTRO='$codigo_centro' and usuario='$administrador'");

	}

$contar_centro = "SELECT COD_CENTRO FROM 1_centro where COD_CENTRO='$codigo_centro'";
$result1 = mysql_query($contar_centro);
$numero1 = mysql_num_rows($result1);	
if($numero1==0)
{
mysql_query("insert into  1_centro(COD_CENTRO,NOMBRE_CENTRO,CMLOGO,CMLOGO_CONSE,FRASE1,FRASE2,FRASE3,NOMBRE_LOGO_CONSELLERIA,NOMBRE_LOGO) values
('$codigo_centro','$nombre_centro','125','20','GENERALITAT VALENCIANA','Conselleria d’Educació, Formació i Ocupació','Servei Territorial d’Alacant','$link_documento','$link_documento1')");
}



$contar_documentos = "SELECT cod_centro FROM  registro_tipo_documento where cod_centro='$codigo_centro'";
$result5 = mysql_query($contar_documentos);
$numero5 = mysql_num_rows($result5);	
if($numero5==0)
{
mysql_query("
INSERT INTO registro_tipo_documento (id_tipo_documento, nombre_val, nombre_cas, cod_centro, entrada_salida) VALUES
('030120509664af131068075341753d7849b8f443231014134551', 'Ofici ', 'Oficio', '$codigo_centro', 'd'),
('030120509664af131068075341753d7849b8f443231014134604', 'Credencial', 'Credencial', '$codigo_centro', 'd'),
('030120509664af131068075341753d7849b8f443231014134618', 'Comunicado', 'Comunicado', '$codigo_centro', 'd'),
('030120509664af131068075341753d7849b8f443231014134632', 'Instruccions', 'Instrucciones', '$codigo_centro', 'd'),
('030120509664af131068075341753d7849b8f443231014134651', 'Parte de treball', 'Parte de trabajo', '$codigo_centro', 'd'),
('030120509664af131068075341753d7849b8f443231014134709', 'Expedient escolar', 'Expediente escolar', '$codigo_centro', 'd')");
}

$contar_organismos = "SELECT cod_centro FROM  registro_organismo where cod_centro='$codigo_centro'";
$result6 = mysql_query($contar_organismos);
$numero6 = mysql_num_rows($result6);	
if($numero6==0)
{
mysql_query("INSERT INTO registro_organismo (id_organismo, nombre_val, nombre_cas, cod_centro, entrada_salida) VALUES
('030120509664af131068075341753d7849b8f443231014134744', 'Dirección Territorial de Educación', 'Dirección Territorial de Educación', '$codigo_centro', 'e'),
('030120509664af131068075341753d7849b8f443231014135110', 'Direcció General de Centres i Personal Docent', 'Dirección General de Centros y Personal Docente ', '$codigo_centro', 'e'),
('030120509664af131068075341753d7849b8f443231014135133', 'Direcció General de Innovació, Ordenació i Política Lingüística ', 'Dirección General de Innovación,  Ordenación y Política lingüística ', '$codigo_centro', 'e'),
('030120509664af131068075341753d7849b8f443231014135150', 'Alcalde/sa del Ajuntament', 'Alcalde/sa del Ayuntamiento', '$codigo_centro', 'e'),
('030120509664af131068075341753d7849b8f443231014135211', 'Unitat de Beques de menjador', 'Unidad de Becas de comedor', '$codigo_centro', 'e'),
('030120509664af131068075341753d7849b8f443231014135307', 'Direcció Territorial de Educació', 'Dirección Territorial de Educación', '$codigo_centro', 's'),
('030120509664af131068075341753d7849b8f443231014135352', 'Direcció General de Centres i Personal Docent', 'Dirección General de Centros y Personal Docente', '$codigo_centro', 's'),
('030120509664af131068075341753d7849b8f443231014135410', 'Direcció General de Innovació, Ordenació i Política Lingüística', 'Dirección General de Innovación,  Ordenación y Política lingüística', '$codigo_centro', 's'),
('030120509664af131068075341753d7849b8f443231014135424', 'Alcalde/sa del Ajuntament', 'Alcalde/sa del Ayuntamiento', '$codigo_centro', 's'),
('030120509664af131068075341753d7849b8f443231014135438', 'Unitat de Beques de menjador', 'Unidad de Becas de comedor', '$codigo_centro', 's')");

}

$contar_permisos = "SELECT cod_centro FROM 1_tipos_permisos where cod_centro='$codigo_centro'";
$result2 = mysql_query($contar_permisos);
$numero2 = mysql_num_rows($result2);	
if($numero2==0)
{
mysql_query("INSERT INTO 1_tipos_permisos (id_tipo,tipo,cod_centro) VALUES
('1', 'ADMIN', '$codigo_centro'),
('2', 'SECRETARIO', '$codigo_centro'),
('3', 'ADMINISTRATIVO', '$codigo_centro')");
}

$contar_permisos_usuario = "SELECT cod_centro FROM 1_permisos where cod_centro='$codigo_centro'";
$result3 = mysql_query($contar_permisos_usuario);
$numero3 = mysql_num_rows($result3);	
if($numero3==0)
{
mysql_query("INSERT INTO 1_permisos (id_tipo, cod_centro, administrador, tipo_permisos, permisos, crear_usuarios, definir_centro, subir_documentos, compartir_documentos, modificar_documentos, entradas, salidas, listados, configuracion, registro, imprimir_libros) VALUES
('1', '$codigo_centro', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1')");
}


echo "<script>alert('$iniciotexto7');</script>";
echo "<script>location.href='../secretictac/borrar_instalacion.php';</script>";
}
else {
echo "<script>alert('$iniciotexto8');</script>";
echo "<script>location.href='index.php';</script>";
}

?>







