<main class="catalog  mb ">

  <div class="boxleft">

    <div class="box_title">Quên mật khẩu</div>
    <div class="box_content form_account">
      <form action="index.php?act=quenmk" method="post">
        <div>
          <p>Email</p>
          <input type="email" name="email" placeholder="email" required>
        </div>

        <input type="submit" value="Gửi" name="guiemail">
        <input type="reset" value="Nhập lại">
        <?php if(isset($sendMailMess) && sendMailMess) ?>
      </form>
    </div>
  </div>
  <?php include "view/boxright.php"; ?>
</main>