<?php
session_start();

include('php/config.php');

// Fetch comments from the database
$result = mysqli_query($con, "SELECT * FROM comments ORDER BY created_at DESC");
$comments = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Wardrobe</title>
  <link rel="stylesheet" href="css/style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<header>
  <div class="header">
    <div class="navbar">
      <div class="logo">
        <h1 class="name">Wardrobe</h1>
      </div>
      <nav>
        <ul id="menuItems">
          <li><a href="#home">Home</a></li>
          <li><a href="#featured">Products</a></li>
          <li><a href="#bottom">Feedback</a></li>

          <?php if (isset($_SESSION['valid'])) : ?>
            <li><a href="user.php"><i class="fa fa-user"></i> <?php echo htmlspecialchars($_SESSION['username']); ?></a></li>
            <li><a href="logout.php">Logout</a></li>
          <?php else : ?>
            <li><a href="login.php">Login</a></li>
          <?php endif;
          ?>
        </ul>
      </nav>
      <img src="images/cart.png" alt="cart-logo" width="30px" height="30px" />
      <img class="menu-icon" src="images/menu.png" alt="cart-logo" width="30px" height="30px" onclick="menutoggle()" />
    </div>
  </div>
</header>

<body>
  <section class="home" id="home">
    <div class="row-home">
      <div class="col-2">
        <h1 class="main">Wardrobe</h1>
        <h1>
          Give YourSelf
          A New Style!
        </h1>
        <p>
          Discover the latest trends and timeless classics that define your style. At Wardrobe, we offer a curated collection of stunning dresses designed to make you feel confident and beautiful.
        </p>
        <hr>
        <p><b>Embrace elegance, embrace Wardrobe.</b></p>
        <a href="#featured" class="btn">Shop Now &#8594; </a>
      </div>
      <div class="col-2">
        <img src="images/fashion2.png" />
      </div>
    </div>
  </section>

  <!-- ---------Products--------- -->
  <section class="featured" id="featured">
    <div>
      <h2 class="title">Wardrobe</h2>
      <div class="row">
        <div class="col-4">
          <a href="https://ph.shp.ee/UkwBkiY" target="_blank">
            <img src="images/product1.jpg" alt="" title="Visit Link" />
          </a>
          <h4>Black Evening Gown Fluffy Off-Shoulder</h4>
        </div>

        <div class="col-4">
          <a href="https://ph.shp.ee/vBSFphv" target="_blank">
            <img src="images/product2.jpg" alt="" title="Visit Link" />
          </a>
          <h4>Casual Plain Black Ruched Dress</h4>
        </div>

        <div class="col-4">
          <a href="https://ph.shp.ee/vgJ9Nj3" target="_blank">
            <img src="images/product3.jpg" alt="" title="Visit Link" />
          </a>
          <h4>Glamorous Plain Feather Dress</h4>
        </div>

        <div class="col-4">
          <a href="https://ph.shp.ee/St9hMkp" target="_blank">
            <img src="images/product4.jpg" alt="" title="Visit Link" />
          </a>
          <h4>Turtle Dress</h4>
        </div>

        <div class="col-4">
          <a href="https://ph.shp.ee/4fkMjKn" target="_blank">
            <img src="images/product5.jpg" alt="" title="Visit Link" />
          </a>
          <h4>Infinity Tube Tops Croptop Halter</h4>
        </div>

        <div class="col-4">
          <a href="https://ph.shp.ee/gziDaXG" target="_blank">
            <img src="images/product6.jpg" alt="" title="Visit Link" />
          </a>
          <h4>Scoop Neck Preppy Hanky Hem Crop Top</h4>
        </div>

        <div class="col-4">
          <a href="https://ph.shp.ee/d9H6uNr" target="_blank">
            <img src="images/product7.jpg" alt="" title="Visit Link" />
          </a>
          <h4>Casual Plain Button Front Crop Tank Top</h4>
        </div>

        <div class="col-4">
          <a href="https://ph.shp.ee/2GFNjzh" target="_blank">
            <img src="images/product8.jpg" alt="" title="Visit Link" />
          </a>
          <h4>Harper Halter Boobsy Textured Croptop</h4>
        </div>

        <div class="col-4">
          <a href="https://ph.shp.ee/SJsWfts" target="_blank">
            <img src="images/product9.jpg" alt="" title="Visit Link" />
          </a>
          <h4>Crop top Letter Graphic Cami top</h4>
        </div>

        <div class="col-4">
          <a href="https://ph.shp.ee/LzfwU4m" target="_blank">
            <img src="images/product10.jpg" alt="" title="Visit Link" />
          </a>
          <h4>Off Shoulder Longsleeve Corset Crop Top</h4>
        </div>

        <div class="col-4">
          <a href="https://rb.gy/t2vipx" target="_blank">
            <img src="images/product11-1.jpg" alt="" title="Visit Link" />
          </a>
          <h4>Vintage Brown Dress</h4>
        </div>

        <div class="col-4">
          <a href="https://rb.gy/oi2zjn" target="_blank">
            <img src="images/product12.jpg" alt="" title="Visit Link" />
          </a>
          <h4>Long Sleeve Polo Shirt</h4>
        </div>

      </div>
  </section>

  <section class="bottom" id="bottom">
    <div class="footer">
      <div class="row-foot">
        <div class="footer-col-1">
          <h2>Leave a Comment</h2>
          <?php if (isset($_SESSION['valid'])) : ?>
            <form class="write" action="submit_comment.php#comments-section" method="post">
              <textarea name="comment" rows="4" cols="50" required></textarea>
              <br>
              <div class="btn-sub">
                <button type="submit" class="btn-foot">Submit</button>
              </div>

            </form>
          <?php else : ?>
            <p class="login">Please <a href="login.php">login</a> to leave a comment.</p>
          <?php endif; ?>
          <div class="col-2-2">
            <img src="images/fashion2.png" />
          </div>
        </div>
        <div class="footer-col-2" id="comments-section">
          <h2>Comments</h2>
          <hr>
          <?php if ($comments) : ?>
            <?php foreach ($comments as $comment) : ?>
              <div class="comment">
                <small><?php echo htmlspecialchars($comment['created_at']); ?></small>
                <strong><?php echo htmlspecialchars($comment['username']); ?></strong>
                <p><?php echo htmlspecialchars($comment['comment']); ?></p>

                <?php if (isset($_SESSION['valid']) && $_SESSION['username'] === $comment['username']) : ?>
                  <form class="delete-btn" action="delete_comment.php" method="post" style="display:inline;">
                    <input type="hidden" name="comment_id" value="<?php echo $comment['id']; ?>">
                    <button type="submit" class="btn-delete">Delete</button>
                  </form>
                <?php endif; ?>
              </div>
            <?php endforeach; ?>
          <?php else : ?>
            <p>No comments yet.</p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

  <!-- Js For Toggle menu -->
  <script>
    var menuItems = document.getElementById("menuItems");
    menuItems.style.maxHeight = "0px";

    function menutoggle() {
      if (menuItems.style.maxHeight == "0px") {
        menuItems.style.maxHeight = "200px";
      } else {
        menuItems.style.maxHeight = "0px";
      }
    }
  </script>
  <!-- link sa jquey -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- link sa js  -->
  <script src="js/scripts.js"></script>
</body>

</html>