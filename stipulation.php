<?php
$js_array = ['js/stipulation.js'];

$g_title = "약관";

include 'inc_header.php'; ?>

<main class="p-5 border rounded-5">
  <h1 class="text-center">회원 약관 및 개인정보 취급방침 동의</h1>
  <h4>회원약관</h4>
  <textarea name="" id="" cols="30" rows="10" class="form-control">
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis sint dignissimos expedita beatae harum veritatis maxime, officia ab quis blanditiis quae eaque totam, nulla dolor modi dolores, reprehenderit ipsum ad rerum voluptatum neque corporis illum asperiores placeat! Quisquam maxime consequatur quas, deserunt rerum alias earum natus. Pariatur culpa et, laboriosam tenetur voluptates recusandae exercitationem natus sunt provident unde dignissimos velit magni expedita. Nobis perferendis ad quae quisquam sequi nisi vitae ut. Repudiandae numquam soluta, omnis placeat optio id nisi maxime aperiam libero! Temporibus est distinctio perferendis soluta officiis, minus possimus fugit sunt molestias itaque dolore culpa ea illum repellat. Esse magni optio ducimus quibusdam assumenda maxime amet incidunt labore atque ipsum dolore minus mollitia vitae nisi, rerum, est numquam aperiam doloribus. Deserunt, architecto harum voluptatibus vero qui quibusdam ipsam numquam sapiente. Qui sequi vel obcaecati suscipit aspernatur at totam praesentium nulla fuga hic omnis optio incidunt aut nostrum, illo placeat eos quam, alias id. Esse exercitationem, eligendi quos error doloremque nisi. Nam, iure voluptatibus reiciendis explicabo fuga id autem facilis, libero dolor soluta voluptatum laudantium excepturi animi voluptatem perspiciatis ut similique quibusdam, nihil quas asperiores? Optio odit amet, repellat veniam, tenetur excepturi culpa facilis eos ipsa rem cumque exercitationem officiis rerum reiciendis neque quibusdam possimus dolorem quia quis tempore nisi! In magni quisquam fugiat eaque dolorem! Sed nulla, natus nobis saepe esse at quas doloribus debitis a vitae animi voluptatum ipsa vel fugit ea asperiores. Ullam dignissimos ducimus magni repellat aliquam repudiandae itaque, modi officia tenetur, reprehenderit ut nulla doloremque, laboriosam esse nisi! Impedit, expedita quia. Dignissimos aspernatur recusandae consequuntur earum eveniet facilis magni facere repellat illum, reiciendis expedita amet quidem deserunt explicabo alias doloremque hic saepe sit impedit similique libero, ipsa maxime? Facilis cum iste excepturi quae, voluptate iusto? Quam reiciendis expedita possimus esse facere ut enim magni voluptates?
  </textarea>

  <div class="form-check mt-2">
    <input class="form-check-input" type="checkbox" value="1" id="chk_member1" />
    <label class="form-check-label" for="chk_member1"> 위 약관에 동의하시겠습니까? </label>
  </div>

  <h4 class="mt-3">개인정보 취급방침</h4>
  <textarea name="" id="" cols="30" rows="10" class="form-control">
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis sint dignissimos expedita beatae harum veritatis maxime, officia ab quis blanditiis quae eaque totam, nulla dolor modi dolores, reprehenderit ipsum ad rerum voluptatum neque corporis illum asperiores placeat! Quisquam maxime consequatur quas, deserunt rerum alias earum natus. Pariatur culpa et, laboriosam tenetur voluptates recusandae exercitationem natus sunt provident unde dignissimos velit magni expedita. Nobis perferendis ad quae quisquam sequi nisi vitae ut. Repudiandae numquam soluta, omnis placeat optio id nisi maxime aperiam libero! Temporibus est distinctio perferendis soluta officiis, minus possimus fugit sunt molestias itaque dolore culpa ea illum repellat. Esse magni optio ducimus quibusdam assumenda maxime amet incidunt labore atque ipsum dolore minus mollitia vitae nisi, rerum, est numquam aperiam doloribus. Deserunt, architecto harum voluptatibus vero qui quibusdam ipsam numquam sapiente. Qui sequi vel obcaecati suscipit aspernatur at totam praesentium nulla fuga hic omnis optio incidunt aut nostrum, illo placeat eos quam, alias id. Esse exercitationem, eligendi quos error doloremque nisi. Nam, iure voluptatibus reiciendis explicabo fuga id autem facilis, libero dolor soluta voluptatum laudantium excepturi animi voluptatem perspiciatis ut similique quibusdam, nihil quas asperiores? Optio odit amet, repellat veniam, tenetur excepturi culpa facilis eos ipsa rem cumque exercitationem officiis rerum reiciendis neque quibusdam possimus dolorem quia quis tempore nisi! In magni quisquam fugiat eaque dolorem! Sed nulla, natus nobis saepe esse at quas doloribus debitis a vitae animi voluptatum ipsa vel fugit ea asperiores. Ullam dignissimos ducimus magni repellat aliquam repudiandae itaque, modi officia tenetur, reprehenderit ut nulla doloremque, laboriosam esse nisi! Impedit, expedita quia. Dignissimos aspernatur recusandae consequuntur earum eveniet facilis magni facere repellat illum, reiciendis expedita amet quidem deserunt explicabo alias doloremque hic saepe sit impedit similique libero, ipsa maxime? Facilis cum iste excepturi quae, voluptate iusto? Quam reiciendis expedita possimus esse facere ut enim magni voluptates?
  </textarea>

  <div class="form-check mt-2">
    <input class="form-check-input" type="checkbox" value="1" id="chk_member2" />
    <label class="form-check-label" for="chk_member2"> 위 취급방침에 동의하시겠습니까? </label>
  </div>

  <div class="mt-4 d-flex justify-content-center gap-3">
    <button class="btn btn-primary w-50" id="btn_member">회원가입</button>
    <button class="btn btn-secondary w-50">가입취소</button>
  </div>

  <form method="post" name="stipulation_form" action="member_input.php" style="display:none">
    <input type="hidden" name="chk" value="0">
  </form>
</main>

<?php include 'inc_footer.php'; ?>