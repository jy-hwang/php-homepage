<?php
$config = parse_ini_file("config.ini");

$serverName = $config['db_host'];
$serverPort = $config['db_port'];
$dbUser = $config['db_user'];
$dbPassword = $config['db_pass'];
$dbName = $config['db_database'];




try{
  
  $db = new PDO("mysql:host={$serverName};port={$serverPort};dbname={$dbName}",$dbUser, $dbPassword);
  
  // Prepared Statement  를 지원하지 않는 경우, 데이터베이스의 기능을 사용
  $db -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false); 
  
   // 쿼리 버퍼링을 활성화
  $db -> setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
   
  // PDO 객체가 에러를 처리하는 방식
  $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  echo "DB 연결 성공";
} catch(PDOException $e){
  
  echo $e -> getMessage();
}
