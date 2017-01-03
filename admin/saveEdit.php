<?php
require('../config.php');

if(!$_admin->is_LoggedIn()){
    header('location: adminLogin.php');
}

if (Input::get("editAdmin") != null)
{
  $editedValues = array('adminID' => Input::get('adminID'),
                        'username'=> Input::get('username'),
                        'access'=>Input::get('access'));

  if ($_admin->update_admin( $editedValues , Input::get('username')))
  {
    echo "<script> 
    	alert('Edit Success'); 
    	location.href = 'admin-page.php?cek=user';
    </script>";
  }else{
    echo '
      <script>
        alert("Fail!");
        location.href = "edit_admin.php?username='. Input::get('username') .'";
      </script>
    ';
  }
}else{
  echo '<h3>Unauthorized access!</h3>';
}

?>
