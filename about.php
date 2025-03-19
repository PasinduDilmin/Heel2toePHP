<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   
<style>
header.header section.flex nav.navbar a.about {
	
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

<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/why.png" alt="">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p>At Heel 2 Toe, we offer quality footwear crafted with premium materials for lasting comfort and style. With a wide selection of trendy sneakers, elegant heels, and rugged boots, we cater to every taste and occasion. Our knowledgeable staff provides expert guidance to help you find the perfect pair. We prioritize customer satisfaction, offering competitive prices and hassle-free shopping experiences. Plus, we actively engage with the community, giving back and making a positive impact. Experience the difference at Your Shoe Shop Name, where quality, style, and customer care converge for an unparalleled shopping experience.</p>
         <a href="contact.php" class="btn">contact us</a>
      </div>

   </div>

</section>

<section class="reviews">
   
   <h1 class="heading">client's reviews</h1>

   <div class="swiper reviews-slider">

   <div class="swiper-wrapper">

      <div class="swiper-slide slide">
         <img src="images/pic-1.png" alt="">
         <p>"I recently visited Heel2 Toe and was blown away by their excellent service! The staff was incredibly helpful in finding the perfect pair of sneakers for my workouts. The quality of the shoes is top-notch, and I've never felt more comfortable during my gym sessions. I highly recommend this shop to anyone looking for both style and functionality in their footwear."</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>john deo</h3>
      </div>

      <div class="swiper-slide slide">
         <img src="images/pic-2.png" alt="">
         <p>I've been a loyal customer of Heel 2 toe for years, and they never disappoint! Whether I need chic heels for a night out or sturdy boots for hiking, they have it all. Their wide selection, combined with their knowledgeable staff, makes shopping here a breeze. Plus, their commitment to quality means I always leave with shoes that not only look great but also last."</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Michlle more</h3>
      </div>

      <div class="swiper-slide slide">
         <img src="images/pic-3.png" alt="">
         <p>I stumbled upon Heel 2 toe while looking for work boots, and I'm so glad I did. The staff went above and beyond to help me find the perfect pair that met all my requirements. From safety features to comfort, they ensured I got exactly what I needed. The boots have been holding up exceptionally well, even in the toughest conditions. I'll definitely be coming back for more!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Saman Edirimuni</h3>
      </div>

      <div class="swiper-slide slide">
         <img src="images/33.jpeg" alt="">
         <p>What a fantastic experience shopping at Heel 2 toe! Not only do they have an incredible selection of shoes, but their customer service is exceptional. I was greeted with a warm welcome and received personalized attention throughout my visit. The staff listened to my preferences and helped me find a beautiful pair of sandals that I absolutely love. I can't wait to show them off this summer</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Lasith Malinga</h3>
      </div>

      

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>









<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".reviews-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
        slidesPerView:1,
      },
      768: {
        slidesPerView: 2,
      },
      991: {
        slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>