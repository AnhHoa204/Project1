<style>
td {
  padding: 0 20px;
}
</style>
<!-- <script>
if (window.history.replaceState) {
  window.history.replaceState(null, null, window.location.href);
}
</script> -->
<main class="catalog  mb ">

  <?php 
  extract($sp);
  
?>
  <div class="boxleft">
    <div class="  mb">
      <div class="box_title"><?php echo $name; ?></div>
      <div class="box_content">
        <?php 
        $linkimg = $img_path.$img;
        echo "<img src='$linkimg'>" ;
        echo "<p>$mota</p>";
        ?>
      </div>
    </div>

    <div class="mb">
      <div class="box_title">BÌNH LUẬN</div>
      <div class="box_content2 product_portfolio binhluan ">

        <table>
          <?php foreach($binhluan as $value): 
          extract($value);
            ?>
          <tr>
            <td><?php echo $noidung; ?></td>
            <td><?php echo $user; ?></td>
            <td><?php echo date("d-m-Y", strtotime($ngaybinhluan)); ?></td>
          </tr>

          <?php endforeach; ?>



          <!-- <tr>
            <td>Sản phẩm quá đẹp</td>
            <td>Nguyễn Thành A</td>
            <td>20/10/2022</td>
          </tr> -->

        </table>
      </div>

      <?php
          if(!isset($_SESSION['user'])) {
            echo "<h1>Bạn phải đăng nhập vào tài khoản mới được bình luận !!!</h1>";
          } else {
            echo '<div class="box_search">
            <form action="" method="POST">
              <input type="hidden" name="idpro" value="'.$id.'">
              <input type="text" name="noidung">
              <input type="submit" id="btnGui" name="guibinhluan" value="Gửi bình luận">
      </form>
    </div>';
    }
    ?>



      <?php
        // if(isset($_POST['guibinhluan'])) {
        //   insert_binhluan($_POST['idpro'], $_POST['noidung']);
        // }
      ?>

    </div>

    <div class=" mb">
      <div class="box_title">SẢN PHẨM CÙNG LOẠI</div>
      <div class="box_content">

        <?php foreach($sp_cungloai as $value): ?>
        <?php extract($value); ?>

        <li><a href="index.php?act=sanphamct&idsp=<?php echo $id; ?>"><?php echo $name; ?></a></li>

        <?php endforeach; ?>

        <!-- <li><a href="">Sản phẩm 1</a></li>
        <li><a href="">Sản phẩm 1</a></li> -->
      </div>
    </div>
  </div>
  <?php
    include "view/boxright.php";
?>

</main>