<?php
      if(isset($_SESSION['user'])) { ?>
<div class="row2 font_title">
  <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
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
        viewcart(1);
        ?>

        <!-- <tr>
          <td><input type="checkbox" name="" id="" /></td>
          <td>001</td>
          <td>Đồng hồ</td>
          <td>
            <input type="button" value="Sửa" />
            <input type="button" value="Xóa" />
          </td>
        </tr> -->
      </table>
    </div>
    <?php } else {?>
    <h1>Bạn phải đăng nhập vào tài khoản mới có thể mua hàng</h1>

    <?php } ?>

    <?php
      if(isset($_SESSION['user'])) {
        if(count($_SESSION['mycart']) >= 1){ ?>
    <div class="row mb10">
      <a href="index.php?act=bill">
        <input class="mr20" type="button" value="Tiếp tục đặt hàng" />
      </a>
    </div>
    <?php }};?>
</form>