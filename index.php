<?php
include ("base.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title></title>
<script type="text/javascript" src="java.js"></script>
<script>
function valida_codigo(){
  if (document.Form1.nombre_admin.value.length==0){
       alert('<?php echo "$iniciotexto9"; ?>')
       document.Form1.nombre_admin.focus()
       return 0;
       }
       
         if (document.Form1.administrador.value.length==0){
       alert('<?php echo "$iniciotexto9"; ?>')
       document.Form1.administrador.focus()
       return 0;
       }

         if (document.Form1.contrasenya.value.length==0){
       alert('<?php echo "$iniciotexto9"; ?>')
       document.Form1.contrasenya.focus()
       return 0;
       }
                if (document.Form1.codigo_centro.value.length==0){
       alert('<?php echo "$iniciotexto9"; ?>')
       document.Form1.codigo_centro.focus()
       return 0;
       }
       if (document.Form1.ruta.value.length==0){
       alert('<?php echo "$iniciotexto9"; ?>')
       document.Form1.ruta.focus()
       return 0;
       }
        if (document.Form1.usuario.value.length==0){
       alert('<?php echo "$iniciotexto9"; ?>')
       document.Form1.usuario.focus()
       return 0;
       }
       

       document.Form1.submit();
 }

</script>

</head>

<div id="container">

<div id="contenedor">

<form  name="Form1" method="post" action="crear_base.php " id="Form1" >
<div id="campo_formulario" align="justify">
<?php echo "$iniciotexto10";?>
</div>

<div id="campo_formulario" align="left">
<?php echo "$iniciotexto14";?> &nbsp;&nbsp;&nbsp;
<input type="text" autocomplete="off" maxlength="255"  style="width:200px;" name="nombre_admin" value='' />
</div>
<div id="campo_formulario" align="left">
<?php echo "$iniciotexto11";?> &nbsp;&nbsp;&nbsp;
<input type="text" autocomplete="off" maxlength="20"  style="width:200px;" name="administrador" value='' />
</div>

<div id="campo_formulario" align="left">
<?php echo "$iniciotexto12";?> &nbsp;&nbsp;&nbsp;
<input type="password" maxlength="10"  style="width:200px;" name="contrasenya" value='' />
</div>

<div id="campo_formulario" align="left">
<?php echo "$iniciotexto13";?> &nbsp;&nbsp;&nbsp;
<input type="text" autocomplete="off" maxlength="20"  style="width:200px;" name="codigo_centro" value='' />
</div>

<div id="campo_formulario" align="left">
<?php echo "$iniciotexto15";?> &nbsp;&nbsp;&nbsp;
<input type="text" autocomplete="off" maxlength="255"  style="width:200px;" name="nombre_centro" value='' />
</div>

<div id="campo_formulario" align="left">
<?php echo "$iniciotexto1";?>&nbsp;&nbsp;&nbsp;
<input type="text" autocomplete="off" maxlength="255"  style="width:200px;" name="ruta" value='' />
</div>


<!--
<div id="campo_formulario" align="left">
<b><?php echo "$iniciotexto2";?>&nbsp;&nbsp;&nbsp;
<input type="text" maxlength="255"  style="width:20%;" onkeypress="return validar(event)" name="base_datos" value='' />
</div>
-->

<div id="campo_formulario" align="left">
<?php echo "$iniciotexto3";?> &nbsp;&nbsp;&nbsp;
<input type="text" autocomplete="off" maxlength="255"  style="width:200px;" name="usuario" value='' />
</div>



<div id="campo_formulario" align="left">
<?php echo "$iniciotexto4";?> &nbsp;&nbsp;&nbsp;
<input type="password" autocomplete="off" maxlength="255"  style="width:200px;" name="contrasenya_mysql" value='' />
</div>


<!--
<div id="campo_formulario" align="left">
<b><?php echo "$iniciotexto5";?>&nbsp;&nbsp;&nbsp;
<input type="text" maxlength="255"  style="width:40%;" name="nombre_web" value='' />
</div>
-->
<div id="campo_formulario" align="left">
<input type="button" onclick="valida_codigo()" value="<?php echo "$boton_crear";?>" ; >
</div>
</form>

</div> <!--termina centrar contenedor-->



</div>

</HTML>
