<?php
    session_start();
    include ('includes/config.php');
    if(!(isset( $_SESSION['login_user']))){
      header('Location: login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="CodeHim">
    <title>Javascript Bootstrap Shopping Cart Example</title>
    <?php include ('includes/style.php'); ?>
    <!-- Style CSS -->
    <link rel="stylesheet" href="assets/css/cartStyle.css">
	  <!-- Demo CSS (No need to include it into your project) -->
	  <link rel="stylesheet" href="assets/css/demo.css">
  
  </head> 
  <body style="background-color: #634832;">
  <div class="page-wrapper">
    <div class="page-title-sticky d-flex justify-content-between">
      <div class="page-title ms-5 p-1">
        <h1>B.BEANS</h1>
      </div>
      <div class="main-menu ">
        <div class="menu_toggle_wrapper m-2 p-1">
          <a href="#" id="menu_wrap_toggle" class="p-2 ">Section</a>
        </div> 
        <div id="menu_item_wrap" style="display: none;" class="text-center" >
          <a href="product_list.php" type="button" class="btn menu_link_btn">Products</a>
          <a href="" type="button" class="btn menu_link_btn">LogOut</a>
        </div>
      </div>
    </div>
  </div>

 
     <div class="container-fluid"  >
      <div class="row">
        <div class="col-lg-6 ">
          <div class="left-bill-title text-center m-3 order-shadow">
            <h2>Menu</h2>
          </div>
          <div class="row">
            <?php
              $query= "SELECT * FROM items";
              $do = mysqli_query($conn,$query);
              if($do){
                while ($row= mysqli_fetch_array($do))
                {
                  $id = $row['ItemID'];
                ?>
            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
              <div class=" order-shadow card mb-3 product ">
                <div class="row">
                  <div class="col-md-6">
                    <img class="product-img order-shadow  item-img  w-100" src="assets/images/<?php echo $row['Item_Image']; ?>" alt="prd1" onmouseover="animateImg(this)"
                    onmouseout="normalImg(this)"/>
                  </div>
                  <div class="card-body col-md-6">
                    <h5 class="card-title product-name"><?php echo $row['Item_Name']; ?></h5>
                    <h6 class="card-text per-price product-price"><?php echo $row['Price_Default']; ?>mmk</h6>
                  </div>
                  <div class="text-center m-2">
                    <button class="btn add-to-bill w-50" type="button"
                      data-action="add-to-cart">Add </button>
                  </div>
                </div>
              </div>
            </div>
            <?php }
                }
            ?>
          </div>
        </div>
        <div class="col-lg-6 ">
          <div class="left-bill-title text-center m-3 order-shadow">
            <h2>Order</h2>
          </div>
          <div class="cart"></div>
        </div>
      </div>
    </div>    
     <!-- END EDMO HTML (Happy Coding!)-->

   
  <script>
  "use strict";                        
  let cart = [];
  let cartTotal = 0;
  const cartDom = document.querySelector(".cart");
  const addtocartbtnDom = document.querySelectorAll('[data-action="add-to-cart"]');

  addtocartbtnDom.forEach(addtocartbtnDom => {
    addtocartbtnDom.addEventListener("click", () => {
      const productDom = addtocartbtnDom.parentNode.parentNode;
      const product = {
        img: productDom.querySelector(".product-img").getAttribute("src"),
        name: productDom.querySelector(".product-name").innerText,
        price: productDom.querySelector(".product-price").innerText,
        quantity: 1
    };

  const IsinCart = cart.filter(cartItem => cartItem.name === product.name).length > 0;
  if (IsinCart === false) {
    cartDom.insertAdjacentHTML("beforeend",`
    <div class="d-flex flex-row shadow-sm card cart-items mt-2 mb-3 animated flipInX">
      <div class="p-2">
          <img src="${product.img}" alt="${product.name}" style="max-width: 50px;"/>
      </div>
      <div class="p-2 mt-3">
          <p class="text-dark cart_item_name">${product.name}</p>
      </div>
      <div class="p-2 mt-3">
          <p class="text-success cart_item_price">${product.price}</p>
      </div>
      <div class="p-2 mt-3 ml-auto">
          <button class="btn btn-info" type="button" data-action="increase-item">&plus;
      </div>
      <div class="p-2 mt-3">
        <p class="text-success cart_item_quantity">${product.quantity}</p>
      </div>
      <div class="p-2 mt-3 ">
        <button class="btn btn btn-info" type="button" data-action="decrease-item">&minus;
      </div>
      <div class="p-2 mt-3" >
        <button class="btn  btn-danger" type="button" data-action="remove-item">&times;
      </div>
    </div> `);

    if(document.querySelector('.cart-footer') === null){
      cartDom.insertAdjacentHTML("afterend",  `
        <div class="d-flex flex-row shadow-sm card cart-footer mt-2 mb-3 animated flipInX">
          <div class="p-2">
            <button class="btn btn-danger" type="button" data-action="clear-cart">Clear Cart
          </div>
          <div class="p-2 ml-auto">
            <button class="btn pay-btn" type="button" data-action="check-out">Total <span class="pay"></span> 
              &#10137;
          </div>
        </div>`); }

      addtocartbtnDom.innerText = "In cart";
      addtocartbtnDom.disabled = true;
      cart.push(product);

      const cartItemsDom = cartDom.querySelectorAll(".cart-items");
      cartItemsDom.forEach(cartItemDom => {

      if (cartItemDom.querySelector(".cart_item_name").innerText === product.name) {

        cartTotal += parseInt(cartItemDom.querySelector(".cart_item_quantity").innerText) 
        * parseInt(cartItemDom.querySelector(".cart_item_price").innerText);
        document.querySelector('.pay').innerText = cartTotal + " mmk.";

        // increase item in cart
        cartItemDom.querySelector('[data-action="increase-item"]').addEventListener("click", () => {
          cart.forEach(cartItem => {
            if (cartItem.name === product.name) {
              cartItemDom.querySelector(".cart_item_quantity").innerText = ++cartItem.quantity;
              cartItemDom.querySelector(".cart_item_price").innerText = parseInt(cartItem.quantity) *
              parseInt(cartItem.price) + " mmk";
              cartTotal += parseInt(cartItem.price)
              document.querySelector('.pay').innerText = cartTotal + " mmk";
            }
          });
        });

        // decrease item in cart
        cartItemDom.querySelector('[data-action="decrease-item"]').addEventListener("click", () => {
          cart.forEach(cartItem => {
            if (cartItem.name === product.name) {
              if (cartItem.quantity > 1) {
                cartItemDom.querySelector(".cart_item_quantity").innerText = --cartItem.quantity;
                cartItemDom.querySelector(".cart_item_price").innerText = parseInt(cartItem.quantity) *
                parseInt(cartItem.price) + " mmk.";
                cartTotal -= parseInt(cartItem.price)
                document.querySelector('.pay').innerText = cartTotal + " mmk";
              }
            }
          });
        });

        //remove item from cart
        cartItemDom.querySelector('[data-action="remove-item"]').addEventListener("click", () => {
          cart.forEach(cartItem => {
            if (cartItem.name === product.name) {
                cartTotal -= parseInt(cartItemDom.querySelector(".cart_item_price").innerText);
                document.querySelector('.pay').innerText = cartTotal + " mmk";
                cartItemDom.remove();
                cart = cart.filter(cartItem => cartItem.name !== product.name);
                addtocartbtnDom.innerText = "Add to cart";
                addtocartbtnDom.disabled = false;
            }
            if(cart.length < 1){
              document.querySelector('.cart-footer').remove();
            }
          });
        });

        //clear cart
        document.querySelector('[data-action="clear-cart"]').addEventListener("click" , () => {
          cartItemDom.remove();
          cart = [];
          cartTotal = 0;
          if(document.querySelector('.cart-footer') !== null){
            document.querySelector('.cart-footer').remove();
          }
          addtocartbtnDom.innerText = "Add to cart";
          addtocartbtnDom.disabled = false;
        });

        document.querySelector('[data-action="check-out"]').addEventListener("click" , () => {
          if(document.getElementById('paypal-form') === null){
            checkOut();
          }
        });
      }
    });
  }
  });
  });

  function animateImg(img) {
    img.classList.add("animated","shake");
  }

  function normalImg(img) {
    img.classList.remove("animated","shake");
  }

  function checkOut() {
    let paypalHTMLForm = `
    <form id="paypal-form" action="https://www.paypal.com/cgi-bin/webscr" method="post" >
      <input type="hidden" name="cmd" value="_cart">
      <input type="hidden" name="upload" value="1">
      <input type="hidden" name="business" value="gmanish478@gmail.com">
      <input type="hidden" name="currency_code" value="INR">`;
    
    cart.forEach((cartItem,index) => {
    ++index;
    paypalHTMLForm += ` <input type="hidden" name="item_name_${index}" value="${cartItem.name}">
      <input type="hidden" name="amount_${index}" value="${cartItem.price.replace("mmk","")}">
      <input type="hidden" name="quantity_${index}" value="${cartItem.quantity}">`;
    });
    
    paypalHTMLForm += `<input type="submit" value="PayPal" class="paypal">
    </form><div class="overlay">Please wait...</div>`;
    document.querySelector('body').insertAdjacentHTML("beforeend", paypalHTMLForm);
    document.getElementById("paypal-form").submit();
  }
  </script>  
<?php
    include ('includes/script.php');
?>
  </body>
</html>