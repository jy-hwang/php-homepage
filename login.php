<?php
$js_array = ['js/member_login.js'];
$g_title ="로그인";
$menu_code="login";
include 'inc_header.php';
?>
<main class="mx-auto border rounded-5 p-5 d-flex gap-5" style="height:calc(100vh - 277px)">
  <form class="w-50 mt-5 m-auto" method="post" action="">
    <img src="./images/logo.svg" width="72" alt="">
    <h1 class="h3 mb-3">로그인</h1>
    <div class="form-floating mt-2">
      <input type="text" class="form-control" name="f_id" id="f_id" placeholder="아이디를 입력하세요" autocomplete="off">
      <label for="f_id">아이디</label>
    </div>
    <div class="form-floating mt-2">
      <input type="password" class="form-control" name="f_pw" id="f_pw" placeholder="비밀번호를 입력하세요">
      <label for="f_pw">비밀번호</label>
    </div>
    <button type="button" id="btn_login" class="w-100 mt-2 btn btn-lg btn-primary">로그인</button>
  </form>
</main>
<?php
include 'inc_footer.php';
?>
