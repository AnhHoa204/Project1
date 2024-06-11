<div class="row2">
  <div class="row2 font_title">
    <h1>DANH SÁCH BÌNH LUẬN</h1>
  </div>
  <div class="row2 form_content ">
    <form action="#" method="POST">
      <div class="row2 mb10 formds_loai">
        <table>
          <tr>

            <th>ID</th>
            <th>Nội Dung</th>
            <th>ID User</th>
            <th>Tên User</th>
            <th>ID Pro</th>
            <th>Ngày Bình Luận</th>
            <th>Trạng Thái</th>
            <th></th>
          </tr>

          <?php 
          foreach($listbinhluan as $binhluan){
            extract($binhluan);
         
            echo '
            <tr>
              
              <td>'.$id.'</td>
              <td style="max-width: 300px !important">'.$noidung.'</td>
              <td>'.$iduser.'</td>
              <td>'.$user.'</td>
              <td>'.$idpro.'</td>
              <td>'.$ngaybinhluan.'</td>
              '?>
          <?php 
              if($trangthai == 0) {
                echo '<td>Đang hiển thị</td>';
              } else {
                echo '<td>Đang ẩn</td>';
              }
              ?>

          <?php echo '<td>
                <a href="index.php?act=hidden_cmt&idcmt='.$id.'"><input type="button" value="Ẩn"></a>
                <a href="index.php?act=display_cmt&idcmt='.$id.'"><input type="button" value="Hiện"></a>
              </td>
            </tr>';


           }?>

          <!-- <tr>
            <td><input type="checkbox" name="" id=""></td>
            <td>001</td>
            <td>Đồng hồ</td>
            <td><input type="button" value="Sửa"> <input type="button" value="Xóa"></td>
          </tr> -->

        </table>
      </div>
      <!-- <div class="row mb10 ">
        <input class="mr20" type="button" value="CHỌN TẤT CẢ">
        <input class="mr20" type="button" value="BỎ CHỌN TẤT CẢ">
        <a href="admin.html"> <input class="mr20" type="button" value="NHẬP THÊM"></a>
      </div> -->
    </form>
  </div>
</div>
<td style="max-width: 300px !important"></td>
</div>