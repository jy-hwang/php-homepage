<?php
include '../inc/db_config.php';
include '../inc/member.php';

$mem = new Member($db);

$id = $_POST['id'];

if($_POST['mode'] == 'id_chk'){
  if($mem->id_exists($id)){
    $arr = ['result' => 'fail'];
    $json = json_encode($arr);

    die($json);
  } else {
    die(json_encode(['result' => 'success']));
  }
}
