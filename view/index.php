<link rel="stylesheet" href="../access/bootstrap/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
<!--Para abrir modales se usa bootstrap.min.js-->
<script src="../access/bootstrap/js/bootstrap.min.js"></script>



<nav class="navbar navbar-expand-lg navbar-light">
<div class="container">
  <a class="navbar-brand" href="#">NBA SHOES</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModalLong">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal">Contact</a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li> -->
      <li class="nav-item">
        <button type="button" class="btn btn-primary" onclick="Gologin();">LOGIN</button>
      </li>
    </ul>
  </div>
  </div>
</nav>

<table class="table" id ="tbody">
          <thead>
              <tr>
                <th scope="col">Img</th>
                <th scope="col">Acronym</th>
                <th scope="col">Brand</th>
                <th scope="col">Model</th>
                <th scope="col">Price</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody >
                <?php
                  require_once("../controller/controller.php");
                  foreach($show as $index){
                    echo "<tr class='item'><td><img class='itemImg' src=".$index['img'].
                    "><td class='itemName'>".$index['name']."</td>".
                    "<td class='itemBrand'>".$index['brand']."</td>".
                    "<td class='itemModel'>".$index['model']."</td>".
                    "<td class='itemPrice'>"."$".$index['price'].".00"."</td>".
                    "<td><button type='button' class='btn btn-success addToCartButtons' >Add to Cart</button></td></td></tr>";
                  }
                ?>
            </tbody>
            </table>

            <table class="table">
          <thead>
              <tr>
                <th scope="col">CART</th>
                
              </tr>
            </thead>
            <tbody class="tbody">
             
            </tbody>
            </table>

            <div class="cart-total">
                <p>Total</p>
                <p>$0</p>
            </div>
            
<script src="app.js"></script>
