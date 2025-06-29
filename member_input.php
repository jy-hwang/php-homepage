<?php

if(!isset($_POST['chk']) or $_POST['chk'] != 1){
//die("<script>  alert('약관 등을 동의 하시고 접근하시기 바랍니다.');  self.location.href='./stipulation.php'</script>");
}

$js_array = ['js/member_input.js'];

include 'inc_header.php';

?>

<main class="w-50 mx-auto border rounded-5 p-5">
  <h1 class="text-center">회원가입</h1>
  <form name="input_form" method="post" enctype="multipart/form-data" action="pg/member_process.php">
    <input type="hidden" name="mode" value="input">
    <input type="hidden" name="id_chk" value="0">
    <div class="form-group d-flex gap-2 align-items-end">
      <div>
        <label for="f_id" class="form-label">아이디</label>
        <input type="text" class="form-control" name="" id="f_id" placeholder="아이디를 입력해주세요">
      </div>
      <button class="btn btn-secondary" id="btn_id_check">아이디 중복확인</button>
    </div>

    <div class="form-group mt-3 d-flex gap-2 justify-content-between">
      <div class="w-50">
        <label for="f_password" class="form-label">비밀번호</label>
        <input type="password" class="form-control" name="" id="f_password" placeholder="비밀번호를 입력해주세요">
      </div>

      <div class="w-50">
        <label for="f_password2" class="form-label">비밀번호 확인</label>
        <input type="password" class="form-control" name="" id="f_password2" placeholder="비밀번호를 입력해주세요">
      </div>
    </div>

    <div class="form-group d-flex gap-2 align-items-end">
      <div class="flex-grow-1">
        <label for="f_email" class="form-label">이메일</label>
        <input type="email" class="form-control" name="" id="f_email" placeholder="이메일을 입력해주세요">
      </div>
      <button class="btn btn-secondary">이메일 중복확인</button>
    </div>

    <div class="d-flex mt-3 gap-2 align-items-end">
      <div class="">
        <label for="f_zipcode" class="form-label" >우편번호</label>
        <input type="text" class="form-control" name="zipcode" id="zipcode" minlength="5" maxlength="5">
      </div>
      <button class="btn btn-secondary">우편번호찾기</button>
    </div>

    <div class="form-group mt-3 d-flex gap-2 justify-content-between">
      <div class="w-50">
        <label for="f_addr1" class="form-label">주소</label>
        <input type="text" class="form-control" name="" id="f_addr1" placeholder="">
      </div>

      <div class="w-50">
        <label for="f_addr2" class="form-label">상세 주소</label>
        <input type="text" class="form-control" name="" id="f_addr2" placeholder="상세주소를 입력해주세요">
      </div>
    </div>

    <div class="mt-3 d-flex gap-5">
      <div class="">
        <label for="f_photo" class="form-label">프로필 이미지</label>
        <input type="file" class="form-control" name="photo" id="f_photo">
      </div>
      <img src="images/person.jpg" class="w-25" alt="profile image" srcset="">
    </div>

    <div class="mt-3 d-flex gap-2">
      <button class="btn btn-primary flex-grow-1">가입확인</button>
      <button class="btn btn-secondary flex-grow-1">가입취소</button>
    </div>
  </form>
</main>

<?php include 'inc_footer.php'; ?>
