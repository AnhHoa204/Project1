<?php

include "model/taikhoan.php";
include "model/pdo.php";
include "model/danhmuc.php";
include "model/sanpham.php";
include "model/binhluan.php";
include "model/cart.php";
include "global.php";

if(!isset($_SESSION['mycart'])){
    $_SESSION['mycart'] = [];
}
$spnew = loadall_sanpham_home();
$dsdm = loadall_danhmuc();
$dstop10 = loadall_sanpham_top10();
include "view/header.php";

    if(isset($_GET['act'])&&($_GET['act']!="")){
        $act=$_GET['act'];
        switch($act){
            case "sanpham":
                if(isset($_POST['keyw']) && ($_POST['keyw']) != '') {
                    $keyw = $_POST['keyw'];
                } else {
                    $keyw = '';
                }
                if(isset($_GET['iddm']) && ($_GET['iddm'] > 0)){
                    $iddm = $_GET['iddm'];
                } else {
                    $iddm = 0;
                }
                $dssp = loadall_sanpham($keyw, $iddm);
                
                include "view/sanpham.php";
                break;

            case "sanphamct":
                if(isset($_POST['guibinhluan'])) {
                    if(isset($_SESSION['user'])){
                        insert_binhluan($_POST['idpro'], $_POST['noidung']); 
                        header('Location: index.php?act=sanphamct&idsp='.$_GET['idsp'].'');
                    }
                }

                if(isset($_GET['idsp']) && $_GET['idsp'] > 0){
                    update_view($_GET['idsp']);
                    $sp = loadone_sanpham($_GET['idsp']);
                    $sp_cungloai = loadsp_cungloai($_GET['idsp'], $sp['iddm']);
                    $binhluan = load_binhluan($_GET['idsp']);
                    include "view/chitietsanpham.php";
                } else {
                    // include "view/home.php";
                }
                
                break;

            case "dangky":
                if(isset($_POST['dangky'])) {
                    $email = $_POST['email'];
                    $user = $_POST['user'];
                    $address = $_POST['address'];
                    $tel = $_POST['tel'];
                    $pass = $_POST['pass'];
                    $thongbao = insert_taikhoan($email, $user, $address, $tel, $pass);
                }
                include "view/login/dangky.php";
                break;

            case "dangnhap":
                if(isset($_POST['dangnhap'])) {
                   $loginMess = dangnhap($_POST['user'], $_POST['pass']);
                //    echo 
                //    if($_SESSION['role'] == 1) {
                    if(isset($_SESSION['role']) && $_SESSION['role'] == 1){
                       header('Location: admin/index.php');
                    } else {
                        header('Location: index.php');
                   }
                    include "view/home.php";
                }
                break;

            case "capnhat_taikhoan":
                if(isset($_SESSION['user'])) {
                    if(isset($_POST['capnhat'])) {
                        $id = $_POST['id'];
                        $email = $_POST['email'];
                        $user = $_POST['user'];
                        $address = $_POST['address'];
                        $tel = $_POST['tel'];
                        $pass = $_POST['pass'];
                        update_account($id, $email, $user, $address, $tel, $pass);
                        $thongbao = "Cập nhật thành công";
                    
                }
                } else {
                    header('Location: index.php');
                }
                include "view/taikhoan/edit_taikhoan.php";
                break;

                case "dangxuat":
                    dangxuat();
                    header('Location: index.php');
                    include "view/home.php";
                break;

                case "quenmk":
                    if(isset($_POST['guiemail'])) {
                        $mk = quen_matkhau($_POST['email']);

                        if(is_array($mk)) {
                            $thongbao = "Mật khẩu của bạn là: ".$mk['pass'];
                        } else {
                            $thongbao = "Email không tồn tại";
                        }

                    }
                    include "view/quenmatkhau.php";
                    break;
                    
                 /////////////// CARD  ///////////////
                    

                 case 'addtocart':
                    if(isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        $img = $_POST['img'];
                        $price = $_POST['price'];

                        $soluong = 1;
                        $tien = $soluong * $price;
                        $addsp = [$id, $name, $img, $price, $soluong, $tien];

                        if(isset($_SESSION['user'])){
                            
                            array_push($_SESSION['mycart'], $addsp);
                        }
                        
                    }
                    include "view/cart/viewcart.php";
                    // unset($_SESSION['mycart']);
                    break;
                
                    case 'delcart':
                        if(isset($_GET['idcart'])){
                            array_splice($_SESSION['mycart'],$_GET['idcart'],1);
                            // echo "ok";
                        } else {
                            // Xóa toàn bộ (Làm trống mảng)
                            $_SESSION['mycart'] = [];
                        }
                        header('Location: index.php?act=viewcart');
                    break;

                    case 'viewcart':
                        include 'view/cart/viewcart.php';
                        break;    

                    case 'camon':
                        include 'view/cart/camon.php';
                        break;

                        // BILL
                    case 'bill':
                        include "view/cart/bill.php";
                        break;
                        
                        // case 'billconfirm':
                        //     if(isset($_POST['dongydathang']) && ($_POST['dongydathang'])) {
                        //         $name = $_POST['name'];
                        //         $email = $_POST['email'];
                        //         $address = $_POST['address'];
                        //         $tel = $_POST['tel'];
                        //         $ngaydathang = date('Y-m-d');
                        //         $tongdonhang = tongdonhang();
                        //     }
                        //     include "view/cart/billconfirm.php";
                        
                        // break;

        }
    } else{
        include "view/home.php";
    }
   
    include "view/footer.php";
?>