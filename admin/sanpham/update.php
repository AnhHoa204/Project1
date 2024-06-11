<?php 
  if(is_array($sanpham)){
    extract($sanpham);
  }
  // echo $img;
  $hinhpath = "../upload/".$img;
  if(is_file($hinhpath)) {
    $hinhpath = "<img src='".$hinhpath."' width='100px' height='100px'>";
  } else {
    $hinhpath = "Lỗi";
    
  }

?>

<div class="row2">
  <div class="row2 font_title">
    <h1>CẬP NHẬT SẢN PHẨM</h1>
  </div>
  <div class="row2 form_content ">
    <form action="index.php?act=updatesp" method="POST" enctype="multipart/form-data">
      <div class="row2 mb10 form_content_container">
        <label> Danh mục </label> <br>
        <select name="iddm" id="">
          <option value="0" selected>Tat ca</option>
          <?php 
                foreach($listdanhmuc as $key=>$value) {
                  // echo $value;
                  if($iddm == $value['id']) {
                    echo '<option value =" '.$value['id'].' "selected>'.$value['name'].'</option>';
                  } else {
                    echo '<option value =" '.$value['id'].'">'.$value['name'].'</option>';
                  }
                }
            ?>

        </select>
      </div>

      <div class="row2 mb10 form_content_container">
        <label> Tên sản phẩm </label> <br>
        <input type="text" name="tensp" value="<?php echo $name; ?>">
      </div>

      <div class="row2 mb10">
        <label>Giá sản phẩm </label> <br>
        <input type="text" name="giasp" value="<?php echo $price; ?>">
      </div>

      <div class=" row2 mb10">
        <label>Hình ảnh </label> <br>
        <?php 
          echo $hinhpath;
        ?>
        <input type="file" name="hinh">

      </div>

      <div class="row2 mb10">
        <label>Mô tả </label> <br>
        <textarea name="mota" id="" cols="30" rows="10" value=""><?php echo $mota; ?></textarea>
      </div>



      <div class=" row mb10 ">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input class=" mr20" type="submit" name="capnhat" value="CẬP NHẬT">
        <input class="mr20" type="reset" value="NHẬP LẠI">

        <a href="index.php?act=listsp"><input class="mr20" type="button" value="DANH SÁCH"></a>
      </div>
    </form>
  </div>
</div>