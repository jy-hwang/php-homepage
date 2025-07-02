<?php
$js_array = ['js/member_success.js'];
$menu_code="member";
$g_title ="회원가입을 축하드립니다.";

include 'inc_header.php';
?>
<main class="w-75 mx-auto border rounded-5 p-5 d-flex gap-5" style="height:calc(100vh - 277px)">
  <img src="images/logo.svg" class="w-50" alt="">
  <div">
    <h3>회원가입을 축하드립니다.</h3>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta perspiciatis reiciendis voluptate excepturi architecto saepe facilis, libero, hic sequi, distinctio quisquam odit amet accusantium iusto corporis labore ipsam sed quia?</p>
    <button type="button"class="btn btn-primary" id="btn_login">로그인 하기</button>
  </div>
</main>
<?php
include 'inc_footer.php';
?>
