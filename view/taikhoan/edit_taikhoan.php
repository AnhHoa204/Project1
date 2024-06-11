<main class="catalog  mb ">

  <div class="boxleft">

    <div class="box_title">Cập nhật tài khoản</div>
    <div class="box_content form_account">
      <form action="index.php?act=capnhat_taikhoan" method="post">
        <div>
          <p>Email</p>
          <input type="email" name="email" placeholder="email" value="<?php echo $_SESSION['email']?>" required>
        </div>
        <div>
          Tên đăng nhập
          <input type="text" name="user" placeholder="user" value="<?php echo $_SESSION['user']?>" required>
        </div>
        <div>
          Địa chỉ
          <input type="text" name="address" placeholder="địa chỉ" value="<?php echo $_SESSION['address']?>" required>
        </div>
        <div>
          Số điện thoại
          <input type="text" name="tel" placeholder="số điện thoại" value="<?php echo $_SESSION['tel']?>" required>
        </div>
        Mật khẩu
        <div>
          <input type="password" name="pass" placeholder="mật khẩu" value="<?php echo $_SESSION['pass']?>" required>
        </div>
        <input type="hidden" name="id" value="<?php echo $_SESSION['id']?>">
        <input type="submit" value="Cập nhật" name="capnhat">
        <input type="reset" value="Nhập lại">
      </form>
      <?php 

      if(isset($thongbao) && $thongbao != "") {
        echo $thongbao;
      }
       ?>
    </div>
  </div>

  <?php include "view/boxright.php"; ?>

</main>