<?php
function show(){
  return "test";
}

function validateData($data, $len){
  return substr(ucfirst(strtolower(trim($data))), 0, $len);
}
 ?>
