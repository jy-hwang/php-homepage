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
if($mode == 'id_chk'){

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
} else if($mode == 'email_chk'){

   if($email == ''){
    die(json_encode(['result' => 'empty_email']));
  }
  
  // 이메일 형식 검사
  if($mem-> email_format_check($email) === false){
    die(json_encode(['result' => 'email_format_wrong']));
  };

  if($mem->email_exists($email)){
    die(json_encode(['result' => 'fail']));
  } else {
    die(json_encode(['result' => 'success']));
  }
} else if($mode == 'input'){

  // Profile Image 처리
  $photo = '';
  if(isset($_FILES['photo']) && $_FILES['photo']['name'] != ''){
    $tempArray = explode('.', $_FILES['photo']['name']);
    $ext = end($tempArray);
    $photo = $id .'.'. $ext;
    
    copy($_FILES['photo']['tmp_name'], "../data/profile/". $photo);
  }

  $arr =[
    'id'       => $id,
    'name'     => $name,
    'password' => $password,
    'email'    => $email,
    'zipcode'  => $zipcode,
    'addr1'    => $addr1,
    'addr2'    => $addr2,
    'photo'    => $photo
  ];

  $mem -> input($arr);

  echo "
  <script>
    self.location.href='../member_success.php'
  </script>
  ";
} else if($mode == 'edit'){

  // Profile Image 처리
  $old_photo = (isset($_POST['old_photo']) && $_POST['old_photo'] != '') ? $_POST['old_photo'] : '';
  if(isset($_FILES['photo']) && $_FILES['photo']['name'] != ''){
    // old image 삭제
    if($old_photo != ''){
      unlink(filename: "../data/profile/".$old_photo);
    }
    
    $tempArray = explode('.', $_FILES['photo']['name']);
    $ext = end($tempArray);
    $photo = $id .'.'. $ext;
    
    copy($_FILES['photo']['tmp_name'], "../data/profile/". $photo);
    $old_photo = $photo;
  }

  session_start();

  $arr =[
    'id'       => $_SESSION['ses_id'],
    'name'     => $name,
    'password' => $password,
    'email'    => $email,
    'zipcode'  => $zipcode,
    'addr1'    => $addr1,
    'addr2'    => $addr2,
    'photo'    => $old_photo
  ];

  $mem -> edit($arr);

  echo "
  <script>
    alert('수정되었습니다.');
    self.location.href='../index.php'
  </script>
  ";
}