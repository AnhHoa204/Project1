<div class="row2">
  <div class="row2 font_title">
    <h1>Thêm Danh Mục</h1>
  </div>
  <div class="row2 form_content ">
    <form action="index.php?act=add_danhmuc" method="POST" enctype="multipart/form-data">

      <div class="row2 mb10 form_content_container">
        <label>ID sản phẩm</label> <br>
        <input type="text" name="" placeholder="Tự động" disabled>

      </div>

      <div class="row2 mb10">
        <label>Tên Danh Mục</label> <br>
        <input type="text" name="danhmuc" placeholder="Nhập tên danh mục">
      </div>

      <div class="row mb10 ">
        <input class="mr20" type="submit" name="themmoi_danhmuc" value="THÊM MỚI">
        <input class="mr20" type="reset" value="NHẬP LẠI">

        <a href="index.php?act=list_danhmuc">
          <input class="mr20" type="button" value="DANH SÁCH">
        </a>
      </div>
      <?php 
      if(isset($thongbao) && ($thongbao != '')){
        echo $thongbao;
      }
       ?>
    </form>
  </div>
</div>