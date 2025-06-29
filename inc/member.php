
<?php
// Member  Class file

class Member {
  private $conn;

  public function __construct($db) { 
    $this->conn = $db;

  }

  // id 중복 체크용 멤버 함수, 메서드
   public function id_exists($m_id){
    $sql = " SELECT * FROM member WHERE id=:m_id ";
    $stmt = $this -> conn -> prepare($sql);
    $stmt -> bindParam(':m_id', $m_id);
    $stmt -> execute();

    return $stmt -> rowCount() ?  true : false;
   }

  // email 중복 검사용 멤버 함수, 메서드
   public function email_exists($m_email){
    $sql = " SELECT * FROM member WHERE email=:m_email ";
    $stmt = $this -> conn -> prepare($sql);
    $stmt -> bindParam(':m_email', $m_email);
    $stmt -> execute();

    return $stmt -> rowCount() ?  true : false;
   }
}
