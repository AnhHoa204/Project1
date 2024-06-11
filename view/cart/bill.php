<div class="row2">
  <div class="row2 font_title">
    <h3>Thông tin đặt hàng</h3>
  </div>

  <div class="row2 form_content ">
    <form class="form_account" action="index.php?act=billconfirm" method="POST">
      <div class="row2 mb10 form_content_container">
        <label> Người đặt hàng </label> <br>
        <input type="text" name="maloai" value="<?php echo $_SESSION['user'];?>" placeholder="nhập thông tin">
      </div>
      <div class="row2 mb10">
        <label>Email </label> <br>
        <input type="text" name="tenloai" value="<?php echo $_SESSION['email'];?>" placeholder="nhập email">
      </div>
      <div class="row2 mb10">
        <label>Địa chỉ </label> <br>
        <input type="text" name="tenloai" value="<?php echo $_SESSION['address'];?>" placeholder="nhập địa chỉ">
      </div>
      <div class="row2 mb10">
        <label>Số điện thoại </label> <br>
        <input type="text" name="tenloai" value="<?php echo $_SESSION['tel'];?>" placeholder="nhập số điện thoại">
      </div>
      <div class="row2 font_title">
        <h3>Phương thức thanh toán</h3>
      </div>

      <form action="" method="get">
        <div class="row2 form_content mb10">
          <div class="row2 mb10 formds_loai">
            <table>
              <tr>
                <td><input type="radio" name="pttt" id="">Trả tiền khi nhận hàng</td>
                <td><input type="radio" name="pttt" id="">Chuyển khoản ngân hàng</td>
                <td><input type="radio" name="pttt" id="">Tài khoản online</td>
              </tr>
            </table>
          </div>
        </div>
      </form>

      <div class="row2 font_title">
        <h3>Thông tin giỏ hàng</h3>
      </div>
      <form action="" method="get">
        <div class="row2 form_content">
          <div class="row2 mb10 formds_loai">
            <table>
              <!-- <tr>
                <th>Hình</th>
                <th>Sản Phẩm</th>
                <th>Đơn Hàng</th>
                <th>Số Lượng</th>
                <th>Thành Tiền</th>
                <th>Thao Tác</th>
              </tr> -->
              <?php 
        viewcart(0);
        ?>

            </table>
      </form>
  </div>

  <div class="row mb10 ">
    <a href="index.php?act=camon">
      <input class="mr20" type="button" value="Tiếp tục đặt hàng" />
    </a>
    <!-- <input class="mr20" type="submit" value="Đồng ý đặt hàng" name=" dongydathang"> -->

  </div>
  </form>