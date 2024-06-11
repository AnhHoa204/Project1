<?php
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/binhluan.php";
include "../model/thongke.php";
include "../model/taikhoan.php";

    include "header.php";
    if(isset($_GET['act'])&&($_GET['act']!="")){
        $act=$_GET['act'];
        switch($act){
            
            case "listsp":
                if(isset($_POST['clickOK']) && ($_POST['clickOK'])){
                    $keyw = $_POST['keyw'];
                    $iddm = $_POST['iddm'];
                } else {
                    $keyw = "";
                    $iddm = 0;
                }
                $listdanhmuc = loadall_danhmuc();
                $listsanpham = loadall_sanpham($keyw, $iddm);
                include "sanpham/list.php";
                break;
                
            case "addsp":
                if(isset($_POST['themmoi']) && ($_POST['themmoi'])){
                    $iddm = $_POST['iddm'];
                    $tensp = $_POST['tensp'];
                    $giasp = $_POST['giasp'];
                    $mota = $_POST['mota'];

                    $hinh = $_FILES['hinh']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir.basename($_FILES['hinh']['name']);

                    if(move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)){
                        // echo "thanh cong";
                    } else {
                        // echo "That bai";
                    }
                     $thongbao = insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm);
                     
                }
                $listdanhmuc = loadall_danhmuc();
                include "sanpham/add.php";
                break;  
                
                case 'suasp':
                    if(isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                        $sanpham = loadone_sanpham($_GET['idsp']);
                    }
                    $listdanhmuc = loadall_danhmuc();
                    include "sanpham/update.php";
                    break;
    
                case 'updatesp':
                    if(isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                        $iddm = $_POST['iddm'];
                        $id = $_POST['id'];
                        $tensp = $_POST['tensp'];
                        $giasp = $_POST['giasp'];
                        $mota = $_POST['mota'];
                        $hinh = $_FILES['hinh']['name'];
                        $target_dir = "../upload/";
                        $target_file = $target_dir.basename($_FILES['hinh']['name']);
                        
                        // if(move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)) {
                        //     // echo 'thanh cong';
                        // } else {
                        //     // echo 'loi';
                        // }
    
                       update_sanpham($id, $iddm, $tensp, $giasp, $mota, $hinh);
                    }
                    $listdanhmuc = loadall_danhmuc();
                    $listsanpham = loadall_sanpham("", 0);
                    include "sanpham/list.php";
                    break;
                    
                    // User
                    case 'list_user':
                        $listuser = loadall_user();
                        include "taikhoan/list.php";
                        break;



                    case 'add_danhmuc':
                        if(isset($_POST['themmoi_danhmuc']) && ($_POST['themmoi_danhmuc'])){
                            $danhmuc = $_POST['danhmuc'];
                            $thongbao = insert_danhmuc($danhmuc);
                            
                        }
                        include "danhmuc/add.php";
                        break;
                        
                    case 'list_danhmuc':
                        $listdanhmuc = loadall_danhmuc();
                        include "danhmuc/list.php";
                        break;
                        
                    case 'suadanhmuc':
                        if(isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                            $danhmuc = loadone_danhmuc($_GET['iddm']);
                            // print_r($danhmuc);
                        }
                        // $listdanhmuc = loadall_danhmuc();
                        include "danhmuc/update.php";
                        break;

                    case 'update_danhmuc':
                    if(isset($_POST['capnhat_danhmuc']) && ($_POST['capnhat_danhmuc'])) {
                        
                        $id = $_POST['id'];
                        $tendm = $_POST['tendm'];

                        update_danhmuc($id, $tendm);
                    }
                        $listdanhmuc = loadall_danhmuc();
                        include "danhmuc/list.php";
                        break;
                    
                    
                case"hard_delete":
                    if(isset($_GET['idsp'])){
                        delete_sp_bl($_GET['idsp']);
                    }
                    $listsanpham=loadall_sanpham("",0);
                    include "sanpham/list.php";
                break;

                case"hard_delete_dm":
                    if(isset($_GET['iddm'])){
                        hard_delete_dm($_GET['iddm']);
                    }
                    $listdanhmuc = loadall_danhmuc();
                        include "danhmuc/list.php";
                break;

                // case "soft_delete":
                //     if(isset($_GET['idsp'])){
                //         soft_delete($_GET['idsp']);
                //     }
                //     $listsanpham=loadall_sanpham("",0);
                //     $listdanhmuc=loadall_danhmuc();
                //     include "sanpham/list.php";
                // break;  
                
                case 'list_binhluan':
                    $listbinhluan = loadall_binhluan();
                    include 'binhluan/list.php';
                    break;
                
                    // ẨN COMMENT  CỦA USER
                case 'hidden_cmt':
                    if(isset($_GET['idcmt']) && ($_GET['idcmt'] > 0)) {
                        $hidden = 1;
                        hidden_cmt($_GET['idcmt'], $hidden);
                        header('Location: index.php?act=list_binhluan');
                    }
                    break;

                    // HIỂN THỊ COMMENT CỦA USER
                    case 'display_cmt':
                        if(isset($_GET['idcmt']) && ($_GET['idcmt'] > 0)) {
                            $display = 0;
                            display_cmt($_GET['idcmt'], $display);
                            header('Location: index.php?act=list_binhluan');
                        }
                        break;  

                case "bieudosp":
                    $dsthongke = load_thongke_sanpham_danhmuc();
                    include "sanpham/bieudo.php";
                   break; 
            
        }
    }else{
        include "home.php";
    }
    include "footer.php";
?>