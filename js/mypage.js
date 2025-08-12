document.addEventListener("DOMContentLoaded", () => {
  // 수정확인 버튼 클릭시
  const btn_submit = document.querySelector("#btn_submit");
  btn_submit.addEventListener("click", async () => {
    // 아이디 입력 확인
    const frm = document.input_form;

    // 이름 입력 확인
    if (frm.f_name.value == "") {
      alert("이름을 입력해주세요");
      frm.f_name.focus();
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
});
