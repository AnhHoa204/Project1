<?php 
session_start();

  function insert_taikhoan($email, $user, $address, $tel, $pass){
    if($email == "" || $user == "" || $address == "" || $tel == "" || $pass == "") {
      return "Bạn nhập thiếu dữ liệu";
    }
    $sql = "INSERT INTO taikhoan(user, email, pass, address, tel, role) VALUES ('$user', '$email', '$pass', '$address', '$tel', 2) ";
    pdo_execute($sql);
    return "Đăng ký thành công";
  }

  function dangnhap($user, $pass) {
    $sql = "SELECT * FROM taikhoan WHERE user = '$user' and pass = '$pass'";
    $taikhoan = pdo_query_one($sql);
    // print_r($taikhoan);
    // echo $taikhoan['id'];
    // die();
    
    if($taikhoan != false) {
      $_SESSION['id'] = $taikhoan['id'];
      $_SESSION['user'] = $user;
      $_SESSION['email'] = $taikhoan['email'];
      $_SESSION['address'] = $taikhoan['address'];
      $_SESSION['tel'] = $taikhoan['tel'];
      $_SESSION['role'] = $taikhoan['role'];
      $_SESSION['pass'] = $pass;

    } else {
      return "Thong tin tai khoan sai";
    }
  }

  function dangxuat() {
    if(isset($_SESSION['user'])) {
      // unset($_SESSION['user']);
      // unset($_SESSION['id']);
      // unset($_SESSION['email']);
      // unset($_SESSION['address']);
      // unset($_SESSION['tel']);
      session_unset(); 
    }
  }

  function update_account($id, $email, $user, $address, $tel, $pass) {
    $sql = "UPDATE `taikhoan` SET `user`='$user',`pass`='$pass',`email`='$email',
    `address`='$address',`tel`='$tel' WHERE id =  $id";

    $_SESSION['user'] = $user;
    $_SESSION['email'] = $email;
    $_SESSION['address'] = $address;
    $_SESSION['tel'] = $tel;
    $_SESSION['pass'] = $pass;

     pdo_execute($sql);
  }

  function quen_matkhau($email) {
      $sql = "SELECT * FROM taikhoan WHERE email = '$email'";
      $pass = pdo_query_one($sql);
      return $pass;
  }

  function loadall_user() {
    $sql = "select * from taikhoan where role = 2 order by id desc";
    $listuser = pdo_query($sql);
    return $listuser;
  }



?>