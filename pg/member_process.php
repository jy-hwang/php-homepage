<?php
include '../inc/db_config.php';
include '../inc/member.php';

$mem = new Member($db);

$id      = (isset($_POST['f_id'      ]) && $_POST['f_id'      ] != '') ? $_POST['f_id'      ] : '';
$name    = (isset($_POST['f_name'    ]) && $_POST['f_name'    ] != '') ? $_POST['f_name'    ] : '';
$password= (isset($_POST['f_password']) && $_POST['f_password'] != '') ? $_POST['f_password'] : '';
$email   = (isset($_POST['f_email'   ]) && $_POST['f_email'   ] != '') ? $_POST['f_email'   ] : '';

$zipcode = (isset($_POST['f_zipcode' ]) && $_POST['f_zipcode' ] != '') ? $_POST['f_zipcode' ] : '';
$addr1   = (isset($_POST['f_addr1'   ]) && $_POST['f_addr1'   ] != '') ? $_POST['f_addr1'   ] : '';
$addr2   = (isset($_POST['f_addr2'   ]) && $_POST['f_addr2'   ] != '') ? $_POST['f_addr2'   ] : '';

$mode    = (isset($_POST['mode'      ]) && $_POST['mode'    ] != '') ? $_POST['mode'    ] : '';

// 아이디 중복 확인
if($_POST['mode'] == 'id_chk'){

  if($id == ''){
    die(json_encode(['result' => 'empty_id']));
  }

  if($mem->id_exists($id)){
    $arr = ['result' => 'fail'];
    $json = json_encode($arr);

    die($json);
  } else {
    die(json_encode(['result' => 'success']));
  }
  // 이메일 중복 확인
} else if($_POST['mode'] == 'email_chk'){

   if($email == ''){
    die(json_encode(['result' => 'empty_email']));
  }

  if($mem->email_exists($email)){
    die(json_encode(['result' => 'fail']));
  } else {
    die(json_encode(['result' => 'success']));
  }
} else if($_POST['mode'] == 'input'){

  $arr =[
    'id' => $id,
    'name' => $name,
    'password' => $password,
    'email' => $email,
    'zipcode' => $zipcode,
    'addr1' => $addr1,
    'addr2' => $addr2,
  ];

$mem -> input($arr);

}
