document.addEventListener("DOMContentLoaded", () => {
  // id 중복검사
  const btn_id_check = document.querySelector("#btn_id_check");

  btn_id_check.addEventListener("click", () => {
    let f_id = document.querySelector("#f_id");

    if (f_id.value === "") {
      alert("아이디를 입력해 주세요");
      return;
    }

    // AJAX
    const f1 = new FormData();
    f1.append("id", f_id.value);
    f1.append("mode", "id_chk");
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "./pg/member_process.php", true);
    xhr.send(f1);

    xhr.onload = () => {
      if (xhr.status == 200) {
        const data = JSON.parse(xhr.responseText);
        console.log(data);
        if (data.result == "success") {
          alert("사용이 가능한 아이디 입니다.");
          document.input_form.id_chk.value = "1";
        } else if (data.result == "fail") {
          document.input_form.id_chk.value = "0";
          alert("이미 사용중인 아이디 입니다. \n 다른 아이디를 입력해주세요.");
          f_id.value = "";
          f_id.focus();
        }
      }
    };
  });

  // 가입확인 버튼 클릭시
  const btn_submit = document.querySelector("#btn_submit");
  btn_submit.addEventListener("click", () => {
    // 아이디 입력 확인
    const frm = document.input_form;
    if (frm.f_id.value == "") {
      alert("아이디를 입력해주세요");
      frm.f_id.focus();
      return false;
    }

    // 아이디 중복 검사 여부 확인
    if (frm.id_chk.value === "0") {
      alert("아이디 중복확인을 해주시기 바랍니다.");
      return false;
    }

    // 비밀번호 입력 확인
    if (frm.f_password.value == "") {
      alert("비밀번호를 입력해주세요");
      frm.f_password.focus();
      return false;
    }

    if (frm.f_password2.value == "") {
      alert("확인용 비밀번호를 입력해주세요");
      frm.f_password2.focus();
      return false;
    }

    // 비밀번호 일치 확인
    if (frm.f_password.value != frm.f_password2.value) {
      alert("비밀번호가 서로 일치하지 않습니다.\n다시 입력해주세요");
      frm.f_password.value = "";
      frm.f_password2.value = "";
      frm.f_password.focus();
      return false;
    }
  });
});
