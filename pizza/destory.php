<?php
session_start();
if(session_unset()){
print('session destroyed');

}
var_dump($_SESSION['orders']);
?>