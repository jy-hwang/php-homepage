<?php

$js_array = ['js/member_success.js'];
$menu_code="member";
$g_title ="회원가입을 축하드립니다.";
$current_step = 3;

include 'inc_header.php';
?>
<main class="w-75 mx-auto border rounded-5 d-flex flex-column" style="min-height: calc(100vh - 277px);">
    <?php include 'member_stepper.php'; ?>
    <div class="p-5 d-flex gap-5 flex-grow-1 align-items-center">
        <img src="images/logo.svg" class="img-fluid align-self-center" alt="" 
             style="max-width: 400px; max-height: 300px; object-fit: contain;">
        <div>
      <h3>회원가입을 축하드립니다.</h3>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta perspiciatis reiciendis voluptate excepturi architecto saepe facilis, libero, hic sequi, distinctio quisquam odit amet accusantium iusto corporis labore ipsam sed quia?</p>
      <button type="button"class="btn btn-primary" id="btn_login">로그인 하기</button>
    </div>
  </div>
</main>
<?php
include 'inc_footer.php';
?>
