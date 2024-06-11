<div class="row2">
  <div class="row2 font_title">
    <h1>DANH SÁCH KHÁCH HÀNG</h1>
  </div>
  <div class="row2 form_content ">
    <form action="index.php?act=listsp#" method="POST">
      <div class="row2 mb10 formds_loai">
        <form action="index.php?act=listsp" method="post">
          <!-- <input type="text" name="keyw">
          <select name="iddm">
            <option value="0" selected>Tat ca</option>
            <?php 
                // foreach($listdanhmuc as $danhmuc) {
                //     extract($danhmuc);
                //     echo '
                //     <option value="'.$id.'">'.$name.'</option>
                //     ';
                // }
            ?>
          </select> -->

          <!-- <input type="submit" name="clickOK" value="GO"> -->
        </form>
        <table>
          <tr>
            <!-- <th></th> -->
            <th>ID</th>
            <th>User</th>
            <th>Email</th>
            <th>Address</th>
            <th>Tel</th>
          </tr>

          <?php 
            foreach($listuser as $user){
                extract($user);

                echo '<tr>
                    <td>'.$id.'</td>
                    <td>'.$user.'</td>
                    <td>'.$email.'</td>
                    <td>'.$address.'</td>
                    <td>'.$tel.'</td>
                    
                    </tr> ';
            }
            
            ?>

        </table>
      </div>
      <!-- <div class="row mb10 ">
        <a href="index.php?act=addsp"> <input class="mr20" type="button" value="Nhập thêm"></a>
        <a href="index.php?act=bieudosp"><input type="button" value="Biểu đồ"></a>
      </div> -->
    </form>
  </div>
</div>




</div>