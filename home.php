<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/wishlist_cart.php';

?>



<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/styleHome.css">
   
 <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

<style>


header.header section.flex nav.navbar a.home {
	
  background-color: #2980b9;
  border-radius: 40px;
  color: white;
  width: 30rem;
  padding:1rem;
}

</style>

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<div class="home-bg">

<section class="home">

   <div class="swiper home-slider">
   
   <div class="swiper-wrapper">

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/h1.png" alt="">
         </div>
         <div class="content">
            <span>Upto 50% off</span>
            <h3> MENS' FOOTWEAR</h3>
            <a href="gender.php?gender=Gents"  class="btn">shop now</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/special2.png" alt="">
         </div>
         <div class="content">
            <span>Upto 50% off</span>
            <h3> WOMENS' FOOTWEAR</h3>
            <a href="gender.php?gender=Ladies"   class="btn">shop now</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/special3.png" alt="">
         </div>
         <div class="content">
            <span>Upto 50% off</span>
            <h3>KIDS' FOOTWEAR</h3>
            <a href="gender.php?gender=Kids"   class="btn">shop now</a>
         </div>
      </div>

   </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

</div>

<section class="category">

   <h1 class="heading">shop by Brands</h1>

   <div class="swiper category-slider">

   <div class="swiper-wrapper">

   <a href="brands.php?brands=Nike" class="swiper-slide slide">
      <img src="images/1.png" alt="">
      <h3>Nike</h3>
   </a>

   <a href="brands.php?brands=Adidas" class="swiper-slide slide">
      <img src="images/2.png" alt="">
      <h3>Adidas</h3>
   </a>

   <a href="brands.php?brands=Puma" class="swiper-slide slide">
      <img src="images/25.png" alt="">
      <h3>Puma</h3>
   </a>

   <a href="brands.php?brands=Reebok" class="swiper-slide slide">
      <img src="images/5.png" alt="">
      <h3>Reebok</h3>
   </a>

   <a href="brands.php?brands=Champion" class="swiper-slide slide">
      <img src="images/6.png" alt="">
      <h3>Champion</h3>
   </a>

   <a href="brands.php?brands=Timberland" class="swiper-slide slide">
      <img src="images/26.png" alt="">
      <h3>Timberland</h3>
   </a>

   <a href="brands.php?brands=Under armour" class="swiper-slide slide">
      <img src="images/27.png" alt="">
      <h3>Under armour</h3>
   </a>

   </div>

   <div class="swiper-pagination"></div>

   </div>
<section class="category">

   <h1 class="heading">shop by Categories</h1>

   <div class="swiper category-slider">

   <div class="swiper-wrapper">

   <a href="category.php?category=Deck Shoes" class="swiper-slide slide">
      <img src="images/l1.png" alt="">
      <h3>Deck Shoes</h3>
   </a>

   <a href="category.php?category=Sandals" class="swiper-slide slide">
      <img src="images/l2.png" alt="">
      <h3>Sandals</h3>
   </a>

   <a href="category.php?category=Flip flops" class="swiper-slide slide">
      <img src="images/l3.png" alt="">
      <h3>Flip flops</h3>
   </a>

   <a href="category.php?category=Heels" class="swiper-slide slide">
      <img src="images/l4.png" alt="">
      <h3>Heels</h3>
   </a>

   <a href="category.php?category=Office Wear" class="swiper-slide slide">
      <img src="images/l5.png" alt="">
      <h3>Office Wear</h3>
   </a>

   

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>
</section>

<section class="home-products">

   <h1 class="heading">latest products</h1>

   <div class="swiper products-slider">

   <div class="swiper-wrapper">

   <?php
     $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
	?>
   <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
	  <input type="hidden" name="Size" value="<?= $fetch_product['Size']; ?>">
	  <input type="hidden" name="Category" value="<?= $fetch_product['Category']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
	  
      <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
	  
      <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>" >
	  <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
	  </a>
      
      <div class="name"><b><big><?= $fetch_product['name']; ?></b></big></div>  
	  <div class="name"><span>Size = </span><?= $fetch_product['Size']; ?><span><br></span></div>
	  <div class="name"><?= $fetch_product['Category']; ?><span><br></span></div>
	  
      <div class="flex">
         <div class="price"><span>LKR </span><?= $fetch_product['price']; ?><span>/-</span></div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
      <input type="submit" value="add to cart" class="btn" name="add_to_cart">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?>

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>









<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script src="js/script.js"></script>

<script>
  // Initialize Swiper sliders with autoplay
  var homeSwiper = new Swiper(".home-slider", {
    loop: true,
    spaceBetween: 20,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    autoplay: {
      delay: 5000, // Adjust delay time (in milliseconds) as needed
    },
  });

  var categorySwiper = new Swiper(".category-slider", {
    loop: true,
    spaceBetween: 20,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      0: { slidesPerView: 2 },
      650: { slidesPerView: 3 },
      768: { slidesPerView: 4 },
      1024: { slidesPerView: 5 },
    },
    autoplay: {
      delay: 3000, // Adjust delay time (in milliseconds) as needed
    },
  });

  var productsSwiper = new Swiper(".products-slider", {
    loop: true,
    spaceBetween: 20,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      550: { slidesPerView: 2 },
      768: { slidesPerView: 2 },
      1024: { slidesPerView: 3 },
    },
    autoplay: {
      delay: 3000, // Adjust delay time (in milliseconds) as needed
    },
  });
</script>

</body>
</html>