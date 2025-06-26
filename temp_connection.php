<?php

include 'inc/db_config.php';
include 'inc/member.php';

$id = 'user11';

$mem = new Member($db);
if($mem->id_exist($id)){
  echo "아이디가 중복됩니다.";
} else {
  echo "사용할 수 있는 아이디 입니다.";
}
