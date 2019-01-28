<?php 
  function debugger($data , $isDie = false){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    if($isDie){
        exit;
    }
  }