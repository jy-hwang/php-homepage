document.addEventListener("DOMContentLoaded", () => {
  const btn_id_check = document.querySelector("#btn_id_check");

  btn_id_check.addEventListener("click", () => {
    let f_id = document.querySelector("#f_id");

    if (f_id.value === "") {
      alert("아이디를 입력해 주세요");
      return;
    }
    alert(f_id.value);

    // AJAX
    const f1 = new FormData();
    f1.append("abcd_id", f_id.value);
    f1.append("abcd_mode", "id_chk");
    console.log(f1);
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "./pg/member_process.php", "true");
    xhr.send();

    xhr.onload = () => {};
  });
});
