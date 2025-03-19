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
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>quick view</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

	    <link rel="stylesheet" href= 
"https://cdnjs.cloudflare.com/ajax/libs/magnify/2.3.3/css/magnify.min.css"
        integrity= 
"sha512-wzhF4/lKJ2Nc8mKHNzoFP4JZsnTcBOUUBT+lWPcs07mz6lK3NpMH1NKCKDMarjaw8gcYnSBNjjllN4kVbKedbw=="
        crossorigin="anonymous" 
        referrerpolicy="no-referrer" /> 
<style>

  .image-container img {
    transition: transform 0.3s ease;
  }
  .image-container:hover img {
    transform: scale(1.2); /* Adjust the scale factor for the zoom effect */
  }
</style>



</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="quick-view">

   <h1 class="heading">quick view</h1>

   <?php
     $pid = $_GET['pid'];
     $select_products = $conn->prepare("SELECT * FROM `products` WHERE id = ?"); 
     $select_products->execute([$pid]);
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="box">
      <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
	  <input type="hidden" name="Size" value="<?= $fetch_product['Size']; ?>">
	  <input type="hidden" name="Category" value="<?= $fetch_product['Category']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
      <div class="row">
         <div class="image-container">
            <div class="main-image" id="imageContainer">
			
			
				<div class="container">
					<div class="image-container">
					
						<img id="image" src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
			   
			       </div>
				</div>
			   
			    <div class="magnifying-glass" id="magnifyingGlass"></div>
            </div>
            <div class="sub-image">
               <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
               <img src="uploaded_img/<?= $fetch_product['image_02']; ?>" alt="">
               <img src="uploaded_img/<?= $fetch_product['image_03']; ?>" alt="">
            </div>
         </div>
         <div class="content">
            <div class="name"><b><big><?= $fetch_product['name']; ?></big></b></div>

            <div class="flex">
               <div class="price"><span>LKR </span><?= $fetch_product['price']; ?><span>/-</span></div>
               <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
            </div>
			<div class="name" ><span>Size = <?= $fetch_product['Size']; ?></span></div>
			<div class="name"><?= $fetch_product['Category']; ?></div>
            <div class="details"><?= $fetch_product['details']; ?></div>
            <div class="flex-btn">
               <input type="submit" value="add to cart" class="btn" name="add_to_cart">
               <input class="option-btn" type="submit" name="add_to_wishlist" value="add to wishlist">
            </div>
         </div>
      </div>
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?>

</section>

<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>
<script>
const image = document.getElementById('image');
const magnifier = document.getElementById('magnifier');

const magnifyArea = { x: 100, y: 100, width: 100, height: 100 }; // Define magnification area

image.addEventListener('mouseover', function(event) {
  magnifier.style.display = 'block';
});

image.addEventListener('mousemove', function(event) {
  const posX = event.offsetX;
  const posY = event.offsetY;

  const bgPosX = -((posX - magnifyArea.x) * (image.width / magnifyArea.width));
  const bgPosY = -((posY - magnifyArea.y) * (image.height / magnifyArea.height));

  magnifier.style.backgroundImage = url(${this.src});
  magnifier.style.backgroundPosition = ${bgPosX}px ${bgPosY}px;
  magnifier.style.left = ${posX}px;
  magnifier.style.top = ${posY}px;
});

image.addEventListener('mouseout', function() {
  magnifier.style.display = 'none';
});
</script>

</body>
</html>