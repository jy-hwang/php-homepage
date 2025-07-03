
<?php
// Member  Class file

class Member {
  private $conn;

  public function __construct($db) { 
    $this -> conn = $db;
  }

  // id 중복 체크용 멤버 함수, 메서드
  public function id_exists($m_id){
    $sql = " SELECT id
               FROM member
              WHERE id = :m_id ";

    $stmt = $this -> conn -> prepare($sql);
    $stmt -> bindParam(':m_id', $m_id);
    $stmt -> execute();

    return $stmt -> rowCount() ?  true : false;
  }

public function email_format_check($m_email){
  return filter_var($m_email, FILTER_VALIDATE_EMAIL);
}

  // email 중복 검사용 멤버 함수, 메서드
  public function email_exists($m_email){
    $sql = " SELECT email
               FROM member
              WHERE email = :m_email ";

    $stmt = $this -> conn -> prepare($sql);
    $stmt -> bindParam(':m_email', $m_email);
    $stmt -> execute();

    return $stmt -> rowCount() ?  true : false;
  }

   // 회원정보 입력
  public function input($marray){
    // 단방향 암호화
    $new_hash_password = password_hash($marray['password'], PASSWORD_DEFAULT);

    $sql = " INSERT
               INTO member (id, name, password, email, zipcode, addr1, addr2, photo, create_at, ip)
             VALUES (:id, :name, :password, :email, :zipcode, :addr1, :addr2, :photo, NOW(), :ip) ";
    
    $stmt = $this -> conn -> prepare($sql);
    $stmt -> bindParam(':id'      , $marray['id']);
    $stmt -> bindParam(':name'    , $marray['name']);
    $stmt -> bindParam(':password', $new_hash_password);
    $stmt -> bindParam(':email'   , $marray['email']);
    $stmt -> bindParam(':zipcode' , $marray['zipcode']);
    $stmt -> bindParam(':addr1'   , $marray['addr1']);
    $stmt -> bindParam(':addr2'   , $marray['addr2']);
    $stmt -> bindParam(':photo'   , $marray['photo']);
    $stmt -> bindParam(':ip'      , $_SERVER['REMOTE_ADDR']);
    $stmt -> execute();
  }

  //로그인
  public function login($id, $pw){
    $sql = " SELECT password FROM member WHERE id = :id ";
    
    $stmt = $this -> conn -> prepare($sql);
    $stmt -> bindParam(':id' , $id);
    $stmt -> execute();

    if($stmt -> rowCount()){
      $row = $stmt -> fetch();
      if(password_verify($pw, $row['password'])){
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }
}
