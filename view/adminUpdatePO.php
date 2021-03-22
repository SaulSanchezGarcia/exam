<link rel="stylesheet" href="../access//bootstrap/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<!--Para abrir modales se usa bootstrap.min.js-->
<script src="../access/bootstrap/js/bootstrap.min.js"></script>
<div>
<form>
<div class="form-group">
            <!-- <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" id="name" name="" aria-describedby="emailHelp" placeholder="Name" value="">    
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="" placeholder="Last Name" value="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input type="email" class="form-control" id="email" name="" placeholder="Email" value="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Zip</label>
            <input type="text" class="form-control" id="zip" name="" placeholder="Zip Code" minlength="3" maxlength="4" value="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Phone</label>
            <input type="text" class="form-control" id="phone" name="" placeholder="Phone" minlength="10" maxlength="10" value="">
          </div>
          <input type="hidden" class="form-control" id="idHidden"  value="">
          <button class="btn btn-primary" type="button" data-toggle='modal' data-target='exampleModalLong3'>Actualizar</button> -->
            <table class="table" id ="tbody2">
          <thead>
              <tr>
                <th scope="col">PO</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Employee Name</th>
                <th scope="col">Brand</th>
                <th scope="col">Model</th>
                <th scope="col">Price</th>
                <th scope="col">Date</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <?php
                require_once("../controller/controller.php");
                $conn = new ConectarDB();
                $connection = $conn->conectar();

                $query = "SELECT sales.idS AS PO, customers.name AS Customer_Name, employees.name AS Employee_Name, 
                products.brand AS Brand, products.model AS Model, products.price AS Price, sales.date AS Date FROM sales
                INNER JOIN customers ON customers.idC = sales.CUSTOMERS_idC
                INNER JOIN employees ON employees.idE = sales.EMPLOYEES_idE
                INNER JOIN products ON products.idP = sales.PRODUCTS_idP";
                $result = mysqli_query($connection, $query);
                while($po = mysqli_fetch_array($result)){
                    $data = $po[0]."||".
                    $po[1]."||".
                    $po[2]."||".
                    $po[3]."||".
                    $po[4]."||".
                    $po[5]."||".
                    $po[6];
            ?>
            <tbody id="tableBody">
            <tr>
                <td><?php echo $po[0]?></td>
                <td><?php echo $po[1]?></td>
                <td><?php echo $po[2]?></td>
                <td><?php echo $po[3]?></td>
                <td><?php echo $po[4]?></td>
                <td><?php echo "$".$po[5]?></td>
                <td><?php echo $po[6]?></td>
                <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalLongPO" onclick="pintarDatosProd('<?php echo $data?>');">Update</button></td>
            </tr>
           
            </tbody>
            <?php
                  }
            ?>
            </table>
</form>
 
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModalLongPO" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
          <div class="form-group">
            <label for="exampleInputEmail1">Img</label>
            <input type="text" class="form-control" id="img" name="" aria-describedby="emailHelp" placeholder="../img/imgName.jpg" value="">    
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Name</label>
            <input type="text" class="form-control" id="name" name="" placeholder="Name" value="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Brand</label>
            <input type="text" class="form-control" id="brand" name="" placeholder="Brand" value="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Model</label>
            <input type="text" class="form-control" id="model" name="" placeholder="Model" value="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Stock</label>
            <input type="text" class="form-control" id="stock" name="" placeholder="Stock" value="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Price</label>
            <input type="text" class="form-control" id="price" name="" placeholder="Price" value="">
          </div>
          <input type="hidden" class="form-control" id="idP" name=""  value="">

      </form>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="actProd();">Update</button>
      </div>
    </div>
  </div>
</div>
<script src="app.js"></script>