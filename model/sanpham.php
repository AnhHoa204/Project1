<?php 
// Render 9 san pham moi nhat
function loadall_sanpham_home() {
  $sql = "select * from sanpham WHERE 1 order by id desc limit 0, 9";
  $listsanpham = pdo_query($sql);
  return $listsanpham;

}

// Hien thi top 10 san pham co luot xem cao nhat 
function loadall_sanpham_top10() {
  $sql = "select * from sanpham WHERE 1 order by luotxem desc limit 0, 10";
  $listsanpham = pdo_query($sql);
  return $listsanpham;
  
}

function loadall_sanpham($keyw="",$iddm=0){
  $sql="select * from sanpham where iddm > 0 ";
  // where 1 tức là nó đúng
  if($keyw!=""){
      $sql.="and name like '%$keyw%' ";
  }
  
  if($iddm>0){
      $sql.=" and iddm ='$iddm'";
  }
  $sql.=" order by id desc";
  $listsanpham=pdo_query($sql);
  return $listsanpham;
}


function loadone_sanpham($id)  {
  $sql = "select * from sanpham WHERE id = $id";
  $result = pdo_query_one($sql);
  return $result;
}

function loadsp_cungloai($id, $iddm) {
  $sql = "select * from sanpham WHERE iddm = $iddm and id <> $id";  
  // <>: khác
  $result =  pdo_query($sql);
  return $result;
}

function insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm) {
  if($tensp == "" || $giasp == "" || $hinh == "" || $mota == "" || is_string($giasp)) {
    // if(empty($danhmuc) || ctype_space($danhmuc)) {
    return "Vui lòng nhập đủ các trường";
  }
  $sql = "insert into sanpham(name, price, img, mota, iddm) values ('$tensp', $giasp, '$hinh', '$mota', $iddm)";
  pdo_execute($sql);
  return "Thêm thành công";
}

function update_sanpham($id,$iddm,$tensp,$giasp,$mota,$hinh){
  if(empty($tensp) || ctype_space($tensp) || empty($giasp) || ctype_space($giasp) || empty($mota) || ctype_space($mota) || is_string($giasp)) {
    return "Vui lòng nhập đủ và đúng thông tin sản phẩm";
  }

  if($hinh!=""){
      // $sql="update sanpham set iddm='".$iddm."',name='".$tensp."',price='".$giasp."',mota='".$mota."',img='".$hinh."' where id=".$id;
      $sql=  "UPDATE sanpham SET name = '$tensp', price = $giasp, mota = '$mota', img = '$hinh', iddm = $iddm WHERE id = $id";
  }else{
      //  $sql="update sanpham set iddm='".$iddm."',name='".$tensp."',price='".$giasp."',mota='".$mota."' where id=".$id;
      // $sql=  "UPDATE `sanpham` SET `name` = '{$tensp}', `price` = '{$giasp}', `mota` = '{$mota}', `iddm` = '{$iddm}' WHERE `sanpham`.`id` = $id";

      $sql=  "UPDATE sanpham SET name = '$tensp', price = $giasp, mota = '$mota',  iddm = $iddm WHERE id = $id";
  }
  pdo_execute($sql);
}

function update_view($id) {
  $sql = "UPDATE sanpham SET luotxem = luotxem + 1 WHERE id = $id";
  pdo_execute($sql);
}

// Câu truy vấn xóa cứng
function hard_delete($id){
  $sql = "DELETE FROM sanpham WHERE id=" .$id;
  pdo_execute($sql);
}

// Test xóa sp + bình luận của user theo sp
function delete_sp_bl($id) {
  // $sql = "DELETE sp.id, sp.name, sp.price, sp.img, sp.mota, sp.luotxem, sp.iddm, sp.trangthai,"
  // $sql1 = "DELETE a.*, b.* FROM sanpham a LEFT JOIN binhluan b ON a.id = b.idpro WHERE a.id = $id";

  $sql = "DELETE FROM binhluan WHERE idpro = $id";
  $sql1 = "DELETE FROM sanpham WHERE id = $id";

  pdo_execute($sql);
  pdo_execute($sql1);

}

?>