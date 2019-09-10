<?php
/*
Plugin Name: my_groupFinale
Description: Register group of persons.
Author URI: lola
Author Email: dllido@uji.es
Version: 2.0
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/



//Al activar el plugin quiero que se cree una tabla en la BD, que creará la función my_group_install.



//Añado action hook, de forma que cuando se realice la acción de una petición a la URL: wp-admin/admin-post.php?action=my_datos 
//se llame a mi controlador definido en la función my_datos definido en el fichero include/functions.php

//Solo activado el hook para usuarios autentificados,  



//La siguiente sentencia activaria la acción para todos los usuarios.
//add_action('admin_post_nopriv_my_datos', 'my_datos');

include(plugin_dir_path( __FILE__ ).'include/functions.php');

register_activation_hook( __FILE__, 'MPP_Ejecutar_crearT');
//add_action( 'plugins_loaded', 'Ejecutar_crearT' ); // esto se ejecuta siempre que se llama al plugin
function MPP_Ejecutar_crearT(){
    MPP_CrearT("A_GrupoCliente");
}

//add_action('admin_post_nopriv_my_datos', 'MPP_my_datos'); //no autentificados
add_action('admin_post_my_datos', 'MPP_my_datos'); 
?>