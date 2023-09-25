<?php 

function dump_($print, $exit = true){
  echo "<pre>";
  print_r($print);
  echo "</pre>";
  if($exit) exit();
}
