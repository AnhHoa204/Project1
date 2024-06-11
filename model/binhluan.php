<?php 
function load_binhluan($idsp) {
  $sql = "
    SELECT binhluan.noidung, taikhoan.user, binhluan.ngaybinhluan FROM `binhluan` 
    INNER JOIN taikhoan ON binhluan.iduser = taikhoan.id
    INNER JOIN sanpham ON binhluan.idpro = sanpham.id
    WHERE sanpham.id = $idsp and binhluan.trangthai = 0;
  ";
  $result =  pdo_query($sql);
  return $result;
}

function insert_binhluan($idpro, $noidung){
  $date = date('Y-m-d');
  $iduser = $_SESSION['id'];
  $sql = "
      INSERT INTO binhluan(noidung, iduser, idpro, ngaybinhluan, trangthai) 
      VALUES ('$noidung', $iduser, $idpro, '$date', 0)";
      
  pdo_execute($sql);
}

function loadall_binhluan() {
  $sql = "select binhluan.*, taikhoan.user from binhluan
   inner join taikhoan on binhluan.iduser = taikhoan.id order by id desc";
  $result = pdo_query($sql);
  return $result;
}

function hidden_cmt($id, $hidden) {
  $sql=  "UPDATE binhluan SET trangthai = $hidden WHERE id = $id";
  pdo_execute($sql);
}

function display_cmt($id, $hidden) {
  $sql=  "UPDATE binhluan SET trangthai = $hidden WHERE id = $id";
  pdo_execute($sql);
}

// function getname_user($iduser) {
//   $sql = "select taikhoan.user from binhluan inner join taikhoan on binhluan.iduser = taikhoan.id where $iduser = taikhoan.id";
//   $result = pdo_query($sql);
//   return $result;
// }


?>