document.addEventListener("DOMContentLoaded", () => {
  const f_photo = document.querySelector("#f_photo");

  f_photo.addEventListener("change", (event) => {
    const reader = new FileReader();
    reader.readAsDataURL(event.target.files[0]);
    reader.onload = function (e) {
      const f_preview = document.querySelector("#f_preview");
      f_preview.setAttribute("src", e.target.result);
    };
  });
});
