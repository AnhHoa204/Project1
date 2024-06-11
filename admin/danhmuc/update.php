<div class="row2">
  <div class="row2 font_title">
    <h1>CẬP NHẬT SẢN PHẨM</h1>
  </div>
  <div class="row2 form_content ">
    <form action="index.php?act=update_danhmuc" method="POST" enctype="multipart/form-data">
      <?php 
         if(is_array($danhmuc)){
          extract($danhmuc);
        }
        ?>

      <div class="row2 mb10 form_content_container">
        <label> ID Danh Mục </label> <br>
        <input type="text" name="iddm" value="<?php echo $id; ?>" disabled>
      </div>

      <div class="row2 mb10">
        <label>Tên Danh Mục </label> <br>
        <input type="text" name="tendm" value="<?php echo $name; ?>">
      </div>

      <div class=" row mb10 ">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input class=" mr20" type="submit" name="capnhat_danhmuc" value="CẬP NHẬT">
        <input class="mr20" type="reset" value="NHẬP LẠI">

        <a href="index.php?act=list_danhmuc"><input class="mr20" type="button" value="DANH SÁCH"></a>
      </div>
    </form>
  </div>
</div>