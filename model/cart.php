<?php 
function viewcart($del){
        $tong = 0;
        $i = 0;
        $img_path = "upload/";

        if($del ==1) {
          $xoasp_th = '<th>Thao tác</th>';
          $xoasp_td2 = '<td></td>';
        } else {
          $xoasp_th ='';
          $xoasp_td2 ='';
        }

        echo '
        <tr>
          <th>Hình</th>
          <th>Sản Phẩm</th>
          <th>Đơn Hàng</th>
          <th>Số Lượng</th>
          <th>Thành Tiền</th>
          '.$xoasp_th.'
        </tr> ';
        // var_dump($_SESSION['mycart']);
          foreach($_SESSION['mycart'] as $cart) {

            $hinh = $img_path.$cart[2];
            $tien = $cart[3] * $cart[4];
            $tong += $tien;

            if($del == 1) {
              $xoasp_td = '<td><a href="index.php?act=delcart&idcart='.$i.'"><input type="button" value="Xóa"></a></td>';
              // $xoasp_td2 = '<td></td>';
            } else {
              $xoasp_td = '';
            }

            
            echo '
                  
                  <tr>
                    <td><img src="'.$hinh.'" height="100px" width="150px" alt=""></td>
                    <td>'.$cart[1].'</td>
                    <td>'.number_format($cart[3], 0, ',', '.').'</td>
                    <td>'.$cart[4].'</td>
                    <td>'.$tien.'</td>
                    '.$xoasp_td.'
                  </tr>';
                  $i+=1;
          }
          echo '<tr>
                    <td colspan="4">Tổng đơn hàng</td>
                    <td>'.number_format($tong, 0, ',', '.').'</td>
                    '.$xoasp_td2.'
                </tr>';
              }

?>