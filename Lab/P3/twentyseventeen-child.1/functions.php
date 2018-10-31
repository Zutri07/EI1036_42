<?php
add_filter("the_content", "mfp_Fix_Text_Spacing");

// Automatically correct double spaces from any post
function mfp_Fix_Text_Spacing($the_Post)
{
$the_New_Post = str_replace(".* ", " ", $the_Post);
return $the_New_Post;
}


// Agregamos los campos adicionales al formulario de registro
function add_fields_to_users_register_form() {
  $user_town = ( isset( $_POST['user_town'] ) ) ? $_POST['user_town'] : '';
  $user_province = ( isset( $_POST['user_province'] ) ) ? $_POST['user_province'] : '';
  $user_phone = ( isset( $_POST['user_phone'] ) ) ? $_POST['user_phone'] : '';?>
 
  <p>
    <label for="user_town">Población<br />
    <input type="text" id="user_town" name="user_town" class="input" size="25" value="<?php echo esc_attr($user_town);?>"></label>
  </p>
 
  <p>
    <label for="user_province">Provincia<br />
    <input type="text" id="user_province" name="user_province" class="input" size="25" value="<?php echo esc_attr($user_province);?>"></label>
  </p>
 
  <p>
    <label for="user_phone">Teléfono<br />
    <input type="number" id="user_phone" name="user_phone" class="input" size="25" value="<?php echo esc_attr($user_phone);?>"></label>
  </p>
 
<?php }
add_action('register_form', 'add_fields_to_users_register_form' );
 
// Validamos los campos adicionales
function validate_user_fields ($errors, $sanitized_user_login, $user_email) {
  if ( empty( $_POST['user_town'] ) ) {
    $errors->add( 'user_town_error', __('<strong>ERROR</strong>: Por favor, introduce tu Población') );
  }
 
  return $errors;
}
add_filter('registration_errors', 'validate_user_fields', 10, 3);
 
// Guardamos los campos adicionales en base de datos
function save_user_fields ($user_id) {
  if ( isset($_POST['user_town']) ){
    update_user_meta($user_id, 'user_town', sanitize_text_field($_POST['user_town']));
  }
 
  if ( isset($_POST['user_province']) ){
    update_user_meta($user_id, 'user_province', sanitize_text_field($_POST['user_province']));
  }
 
  if ( isset($_POST['user_phone']) ){
    update_user_meta($user_id, 'user_phone', sanitize_text_field($_POST['user_phone']));
  }
}
add_action('user_register', 'save_user_fields');
?>