<?php 
function loadall_danhmuc () {
  $sql = "select * from danhmuc order by id desc";
  $listdanhmuc = pdo_query($sql);
  return $listdanhmuc;
}

function load_ten_danhmuc($id) {
  $sql = "select * from danhmuc WHERE id = $id";
  $danhmuc = pdo_query_one($sql);
  extract($dm);
  return $name;
}

function insert_danhmuc($danhmuc) {
  if(empty($danhmuc) || ctype_space($danhmuc)) {
    return $thongbao = "Thêm khong thanh cong";
    
  } else {
    $sql = "insert into danhmuc(name) values ('$danhmuc')";
    pdo_execute($sql);
    return $thongbao = "Thêm thanh cong";
  }
  
}

function loadone_danhmuc($id)  {
  $sql = "select * from danhmuc WHERE id = $id";
  $result = pdo_query_one($sql);
  return $result;
}

function update_danhmuc($id, $name){
//  if($name != '' || !empty(ctype_space($name))) {
  if(empty($name) || ctype_space($name)) {
    return;
  
 } else {
  $sql=  "UPDATE danhmuc SET name = '$name' WHERE id = $id";
  pdo_execute($sql);
 }
}

function hard_delete_dm($id){
  $sql = "DELETE FROM danhmuc WHERE id=" .$id;
  pdo_execute($sql);
}


?>