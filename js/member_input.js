document.addEventListener("DOMContentLoaded", () => {
  // id 중복검사
  const btn_id_check = document.querySelector("#btn_id_check");

  btn_id_check.addEventListener("click", () => {
    let f_id = document.querySelector("#f_id");

    if (f_id.value === "") {
      alert("아이디를 입력해 주세요");
      f_id.focus();
      return;
    }

    // AJAX
    const f1 = new FormData();
    f1.append("f_id", f_id.value);
    f1.append("mode", "id_chk");
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "./pg/member_process.php", true);
    xhr.send(f1);

    xhr.onload = () => {
      if (xhr.status == 200) {
        const data = JSON.parse(xhr.responseText);
        if (data.result == "success") {
          alert("사용이 가능한 아이디 입니다.");
          document.input_form.id_chk.value = "1";
        } else if (data.result == "fail") {
          document.input_form.id_chk.value = "0";
          alert("이미 사용중인 아이디 입니다. \n다른 아이디를 입력해주세요.");
          f_id.value = "";
          f_id.focus();
        } else if (data.result == "empty_id") {
          alert("아이디가 비어있습니다. \n아이디를 입력해주세요.");
          f_id.value = "";
          f_id.focus();
        }
      }
    };
  });

  // 이메일 중복검사
  const btn_email_check = document.querySelector("#btn_email_check");

  btn_email_check.addEventListener("click", () => {
    let f_email = document.querySelector("#f_email");

    if (f_email.value === "") {
      alert("이메일을 입력해 주세요");
      f_email.focus();
      return;
    }

    // AJAX
    const f1 = new FormData();
    f1.append("f_email", f_email.value);
    f1.append("mode", "email_chk");
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "./pg/member_process.php", true);
    xhr.send(f1);

    xhr.onload = () => {
      if (xhr.status == 200) {
        const data = JSON.parse(xhr.responseText);
        if (data.result == "success") {
          alert("사용이 가능한 이메일 입니다.");
          document.input_form.email_chk.value = "1";
        } else if (data.result == "fail") {
          document.input_form.email_chk.value = "0";
          alert("이미 사용중인 이메일 입니다. \n다른 이메일을 입력해주세요.");
          f_email.value = "";
          f_email.focus();
        } else if (data.result == "empty_email") {
          document.input_form.email_chk.value = "0";
          alert("이메일이 비어있습니다. \n이메일를 입력해주세요.");
          f_email.value = "";
          f_email.focus();
        } else if (data.result == "email_format_wrong") {
          document.input_form.email_chk.value = "0";
          alert("이메일이 형식에 맞지 않습니다.");
          f_email.value = "";
          f_email.focus();
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

    // 이름 입력 확인
    if (frm.f_name.value == "") {
      alert("이름을 입력해주세요");
      frm.f_name.focus();
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

    // 이메일 입력확인
    if (frm.f_email.value == "") {
      alert("이메일을 입력해주세요");
      frm.f_email.focus();
      return false;
    }

    // 이메일 중복 검사 여부 확인
    if (frm.email_chk.value === "0") {
      alert("이메일 중복확인을 해주시기 바랍니다.");
      return false;
    }

    //우편번호 && 주소1 입력 확인
    if (frm.f_zipcode.value == "" || frm.f_addr1 == "") {
      alert("우편번호 검색을 해주세요");
      return false;
    }

    // 상세 주소 입력 확인
    if (frm.f_addr2.value == "") {
      alert("상세주소를 입력해주세요");
      frm.f_addr2.focus();
      return false;
    }

    frm.submit();
  });

  // 우편번호 찾기
  const btn_zipcode = document.querySelector("#btn_zipcode");

  btn_zipcode.addEventListener("click", () => {
    new daum.Postcode({
      oncomplete: function (data) {
        let addr = "";
        let extra_addr = "";
        if (data.userSelectedType == "J") {
          addr = data.jibunAddress;
        } else if (data.userSelectedType == "R") {
          addr = data.roadAddress;
        }

        if (data.bname != "") {
          extra_addr = data.bname;
        }

        if (data.buildingName != "") {
          if (extra_addr == "") {
            extra_addr = data.buildingName;
          } else {
            extra_addr += ", " + data.buildingName;
          }
        }

        if (extra_addr != "") {
          extra_addr = " (" + extra_addr + ")";
        }

        const f_addr1 = document.querySelector("#f_addr1");
        f_addr1.value = addr + extra_addr;

        const f_zipcode = document.querySelector("#f_zipcode");
        f_zipcode.value = data.zonecode;

        const f_addr2 = document.querySelector("#f_addr2");
        f_addr2.focus();
      },
    }).open();
  });

  const f_photo = document.querySelector("#f_photo");

  f_photo.addEventListener("change", (event) => {
    const reader = new FileReader();
    reader.readAsDataURL(event.target.files[0]);
    reader.onload = function (e) {
      // console.log(e);
      // const imgEl = document.createElement("img");
      // imgEl.setAttribute("src", e.target.result);
      // document.querySelector("#f_preview").appendChild(imgEl);

      const f_preview = document.querySelector("#f_preview");
      f_preview.setAttribute("src", e.target.result);
    };
  });
});
