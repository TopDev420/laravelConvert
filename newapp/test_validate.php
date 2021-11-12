<?php

require "validate.php";
$class_object = new encryption;
//encrypting and decrypting
echo $class_object->encrypt("data")."   :    ".$class_object->decrypt($class_object->encrypt("data"));

?>