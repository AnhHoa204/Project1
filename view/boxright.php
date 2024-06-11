<div class="boxright">

  <div class="mb">
    <div class="box_title">TÀI KHOẢN</div>
    <?php
      if(!isset($_SESSION['user'])) { ?>

    <div class="box_content form_account">
      <form action="index.php?act=dangnhap" method="POST">
        <h4>Tên đăng nhập</h4><br>
        <input type="text" name="user" id="" required>
        <h4>Mật khẩu</h4><br>
        <input type="password" name="pass" id="" required><br>
        <input type="checkbox" name="" id="">Ghi nhớ tài khoản?
        <br><input type="submit" value="Đăng nhập" name="dangnhap">
        <br>
        <?php if(isset($loginMess)){
        echo $loginMess;
      } ?>
        <li class="form_li"><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
        <li class="form_li"><a href="index.php?act=dangky">Đăng kí thành viên</a></li>
      </form>
    </div>
    <?php } else {?>
    <p>hello <?php echo $_SESSION['user']; ?></p>
    <ul>
      <?php
      if(isset($_SESSION['role']) && $_SESSION['role'] == 1) {
        echo '<li class="mb10"><a href="index.php?act=list_danhmuc">Đến trang quản trị</a></li>';
      } else {
        echo '<li class="mb10"><a href="index.php?act=addtocart">Đơn hàng của tôi</a></li>';
      }
       ?>

      <li class="mb10"><a href="index.php?act=capnhat_taikhoan">Cập nhật tài khoản</a></li>

    </ul>
    <button><a href="index.php?act=dangxuat">Dang xuat</a></button>
    <?php } ?>
  </div>

  <div class="mb">
    <div class="box_title">DANH MỤC</div>
    <div class="box_content2 product_portfolio">
      <ul>
        <?php 
          foreach($dsdm as $dm) {
            extract($dm);
            $linkdm = "index.php?act=sanpham&iddm=$id";
            echo '
              <li><a href="'.$linkdm.'">'.$name.'</a></li>
            ';
          }
        ?>

        <!-- <li><a href="">Đồng hồ </a></li>
              <li><a href="">Tivi</a></li> -->
      </ul>
    </div>
    <div class="box_search">
      <form action="index.php?act=sanpham" method="POST">
        <input type="text" name="keyw" placeholder="Từ khóa tìm kiếm">
        <input type="submit" name="timkiem" value="Tìm Kiếm">
      </form>
    </div>
  </div>

  <!-- DANH MỤC SẢN PHẨM BÁN CHẠY -->
  <div class="mb">
    <div class="box_title">SẢN PHẨM BÁN CHẠY</div>
    <div class="box_content">
      <?php
      foreach($dstop10 as $sp) {
        extract($sp);
        $linksp =  "index.php?act=sanphamct&idsp=".$id;
        $img = $img_path.$img;
        echo '
          <div class="selling_products" style="width:100%;">
            <img src="'.$img.'" alt="anh">
            <a href="'.$linksp.'">'.$name.'</a>
          </div>
        ';
      }
      
      ?>



      <!-- <div class="selling_products" style="width:100%;">
        <img src="./img/clockforgirl.jpg" alt="anh">
        <a href="">Đồng hồ đeo tay nữ</a>
      </div>
      
      <div class="selling_products" style="width:100%;">
        <img src="./img/clockforgirl.jpg" alt="anh">
        <a href="">Đồng hồ đeo tay nữ</a>
      </div> -->
    </div>
  </div>
</div>