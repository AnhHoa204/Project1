<div class="row2">
  <div class="row2 font_title">
    <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
  </div>
  <div class="row2 form_content ">
    <form action="index.php?act=listsp#" method="POST">
      <div class="row2 mb10 formds_loai">
        <form action="index.php?act=listsp" method="post">
          <input type="text" name="keyw">
          <select name="iddm">
            <option value="0" selected>Tat ca</option>
            <?php 
                foreach($listdanhmuc as $danhmuc) {
                    extract($danhmuc);
                    echo '
                    <option value="'.$id.'">'.$name.'</option>
                    ';
                }
            ?>
            <!-- <option value="0">Danh muc A</option>
            <option value="0">Danh muc B</option> -->
          </select>

          <input type="submit" name="clickOK" value="GO">
        </form>
        <table>
          <tr>

            <th>MÃ SẢN PHẨM</th>
            <th>TÊN SẢN PHẨM</th>
            <th>GIÁ</th>
            <th>HÌNH</th>
            <th>LƯỢT XEM</th>
          </tr>

          <?php 
            foreach($listsanpham as $sanpham){
                extract($sanpham);
                $hinhpath = "../upload/".$img;

                $suasp = "index.php?act=suasp&idsp=".$id;
                $hard_delete = "index.php?act=hard_delete&idsp=".$id;
                

                if(is_file($hinhpath)) {
                    $hinhpath = "<img src='".$hinhpath."' width='100px' height='100px' >";
                } else {
                    $hinhpath = "NO file img!";
                }

                echo '<tr>
                    
                    <td>'.$id.'</td>
                    <td>'.$name.'</td>
                    <td>'.$price.'</td>
                    <td>'.$hinhpath.'</td>
                    <td>'.$luotxem.'</td>
                    <td>
                      <a href="'.$suasp.'"><input type="button" value="Sửa"></a>
                      <a href="' . $hard_delete .'"><input type ="button" value="Xóa" onclick="return confirm(\'Bạn có chắc chắn muốn xóa\')"></a>
                    </td>
                    </tr> ';
            }
            
            ?>

        </table>
      </div>
      <div class="row mb10 ">
        <a href="index.php?act=addsp"> <input class="mr20" type="button" value="Nhập thêm"></a>
        <!-- <a href="index.php?act=bieudosp"><input type="button" value="Biểu đồ"></a> -->
      </div>
    </form>
  </div>
</div>




</div>