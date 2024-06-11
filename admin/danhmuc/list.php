<div class="row2">
  <div class="row2 font_title">
    <h1>DANH SÁCH DANH MỤC</h1>
  </div>
  <div class="row2 form_content ">
    <form action="#" method="POST">
      <div class="row2 mb10 formds_loai">
        <table>
          <tr>

            <th>MÃ MỤC</th>
            <th>TÊN MỤC</th>
            <th></th>
          </tr>
          <?php 
                foreach($listdanhmuc as $danhmuc) {
                    extract($danhmuc);

                    $suasp = "index.php?act=suadanhmuc&iddm=".$id;
                    $hard_delete = "index.php?act=hard_delete_dm&iddm=".$id;

                    echo '
                    <tr>
                      
                      <td>'.$id.'</td>
                      <td>'.$name.'</td>
                      <td>
                        <a href="'.$suasp.'">
                          <input type="button" value="Sửa">
                        </a>
                        <a href="' . $hard_delete .'">
                          <input type ="button" value="Xóa" onclick="return confirm(\'Bạn có chắc chắn muốn xóa\')">
                        </a>
                      </td>
                    </tr>';
                }
            ?>
          <!-- <tr>
            <td><input type="checkbox" name="" id=""></td>
            <td>001</td>
            <td>Đồng hồ</td>
            <td><input type="button" value="Sửa"> <input type="button" value="Xóa"></td>
          </tr> -->
        </table>

      </div>
      <div class="row mb10 ">
        <!-- <input class="mr20" type="button" value="CHỌN TẤT CẢ">
        <input class="mr20" type="button" value="BỎ CHỌN TẤT CẢ"> -->
        <a href="index.php?act=add_danhmuc">
          <input class="mr20" type="button" value="NHẬP THÊM">
        </a>
      </div>
    </form>
  </div>
</div>