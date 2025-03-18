<?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>

<header class="header">

   <section class="flex">

      <a href="../admin/dashboard.php" class="logo">Admin<span>Panel</span></a>

      <nav class="navbar">
         <a class="dashboard" href="../admin/dashboard.php">HOME</a>
         <a class="products" href="../admin/products.php">PRODUCTS</a>
         <a class="placed_orders" href="../admin/placed_orders.php">ORDERS</a>
         <a class="admin_accounts" href="../admin/admin_accounts.php">ADMINS</a>
         <a class="users_accounts" href="../admin/users_accounts.php">USERS</a>
         <a class="messages" href="../admin/messages.php">MESSAGES</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `admins` WHERE id = ?");
            $select_profile->execute([$admin_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p><?= $fetch_profile['name']; ?></p>
         <a href="../admin/update_profile.php" class="btn">UPDATE PROFILE</a>
         <div class="flex-btn">
            <a href="../admin/register_admin.php" class="option-btn">REGISTER</a>
            <a href="../admin/admin_login.php" class="option-btn">LOGIN</a>
         </div>
         <a href="../components/admin_logout.php" class="delete-btn" onclick="return confirm('logout from the website?');">logout</a> 
      </div>

   </section>

</header>