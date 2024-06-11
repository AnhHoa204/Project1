<main class="catalog  mb ">

  <div class="boxleft">
    <div class="banner">
      <img id="banner" src="./img/anh0.jpg" alt="">
      <button class="pre" onclick="pre()">&#10094;</button>
      <button class="next" onclick="next()">&#10095;</button>
    </div>

    <div class="items">
      <?php 
        

      $i = 0;
         foreach($spnew as $sp) { 
            
            extract($sp);
            $hinh = $img_path.$img;
            $link = "index.php?act=sanphamct&idsp=$id";
            if($i == 2 || $i == 5 || $i == 8) {
               $mr = "";
            } else {
               $mr = "mr";
            }
            // <div class="add" href="">ADD TO CART</div>
            echo '
            
              <div class="box_items '.$mr.'">
                <div class="box_items_img">
                <img src="'.$hinh.'" alt=""> 
                </div>
                <a class="item_name" href="'.$link.'">'.$name.'</a>
                <p class="price">'.$price.'</p>
                <form action="index.php?act=addtocart" method="POST">
                  <input type="hidden" name="id" value="'.$id.'">
                  <input type="hidden" name="name" value="'.$name.'">
                  <input type="hidden" name="img" value="'.$img.'">
                  <input type="hidden" name="price" value="'.$price.'">
                  <input type="submit" name="addtocart" value="Mua">
                </form>  
              </div>
         ';
       } 
       ?>

      <!-- <div class="box_items">
        <div class="box_items_img">
          <img src="img/iphoneX.jpg" alt="">
          <div class="add" href="">ADD TO CART</div>
        </div>
        <a class="item_name" href="">SamSung J4</a>
        <p class="price">$4000</p>
      </div> -->


    </div>
  </div>
  <?php
        include_once "view/boxright.php";
    ?>

</main>
<!-- BANNER 2 -->