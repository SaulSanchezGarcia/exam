$('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
})

function Gologin(){
    setTimeout("location.href='../view/login.php'", 40);
}

function login(){
    let user_name = $("#user_name").val();
    let password = $("#password").val();

    if(user_name == "" || password == "" ){
        alert("Please fill all fields");
    }else{
        $.ajax({
            url: "../controller/controller.php?accion=login",
            type: "post",
            data: {user_name:user_name,password:password},
            dataType: "JSON",
            success: function(res){
                if(res.encontrado && res.mensaje == "Welcome you are the admin"){
                    alert(res.mensaje);
                    $("#user_name").val("");
                    $("#password").val("");
                    setTimeout("location.href='../view/adminView.php'", 40);
                }else if(res.encontrado && res.mensaje == "Welcome you are an a employee"){
                    alert(res.mensaje);
                    $("#user_name").val("");
                    $("#password").val("");
                    setTimeout("location.href='../view/employeeView.php'", 40);
                }else{
                    alert(res.mensaje);
                    $("#user_name").val("");
                    $("#password").val("");
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                console.log(textStatus, errorThrown);
            }
        });
    }
}

function insert(){
    
    let name = $("#name").val();
    let last_name = $("#last_name").val();
    let email = $("#email").val();
    let zip = $("#zip").val();
    let phone = $("#phone").val();

    let expresion = /^[a-z ,.'-]+$/i;
    let validacionEmail = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
    let validacionPhone = /^((\d{10})|(\d{13}))$/;
    let validacionZip = /^((\d{3})|(\d{4}))$/;
  
    if(name == "" || last_name == "" || email == "" || zip == "" || phone == ""){
        alert("Please fill all fields");
    }else{
        if(expresion.test(name) && expresion.test(last_name)){
            if(validacionEmail.test(email)){
                if(validacionZip.test(zip)){
                    if(validacionPhone.test(phone)){
                        $.ajax({
                            url: "../controller/controller.php?accion=insert",
                            type: "post",
                            data: {name:name, last_name:last_name, email:email, zip:zip, phone:phone},
                            dataType: "JSON",
                            success: function(res){
                                if(res.good){
                                    alert(res.mensaje);
                                    $("#name").val("");
                                    $("#last_name").val("");
                                    $("#email").val("");
                                    $("#zip").val("");
                                    $("#phone").val("");
                                    
                                    $("#tbody").load(" #tbody");
                                }else{
                                    alert(res.mensaje);
                                }
                                // alert("Successful registration");
                               
                            },
                            error: function(jqXHR, textStatus, errorThrown){
                                console.log(textStatus, errorThrown);
                            }
                        });
                    }else{
                        alert("El telefono esta mal");
                    }
                 
                }else{
                    alert("El zip no esta correcto");
                }
             
            }else{
                alert("El email no esta bien");
            }
          
        }else{
            alert("El nombre o apellido no esta bien");
        }
    } 
}

function del(idC){
   
    $.ajax({
        url: "../controller/controller.php?accion=delete",
        type: "post",
        data: {idC:idC},
        dataType: "JSON",
        success: function(res){
          if(res.eliminado){
            alert(res.mensaje);
            $("#tbodyDel").load(" #tbodyDel");
          }else{
            alert(res.mensaje);
          }
        },
        error: function(jqXHR, textStatus, errorThrown){
            console.log(textStatus, errorThrown);
        }
    });
}

function delProd(idP){
    
    $.ajax({
        url: "../controller/controller.php?accion=deleteProd",
        type: "post",
        data: {idP:idP},
        dataType: "JSON",
        success: function(res){
          if(res.eliminado){
            alert(res.mensaje);
            $("#tbodyDelP").load(" #tbodyDelP");
          }else{
            alert(res.mensaje);
          }
        },
        error: function(jqXHR, textStatus, errorThrown){
            console.log(textStatus, errorThrown);
        }
    });
}

function pintarDatos(datos){
   d = datos.split('||');
   $("#idC").val(d[0]);
   $("#name").val(d[1]);
   $("#last_name").val(d[2]);
   $("#email").val(d[3]);
   $("#zip").val(d[4]);
   $("#phone").val(d[5]);
}

function act(){

    let idC = $("#idC").val();
    let name = $("#name").val();
    let last_name = $("#last_name").val();
    let email = $("#email").val();
    let zip = $("#zip").val();
    let phone = $("#phone").val();

    $.ajax({
        url: "../controller/controller.php?accion=update",
        type: "post",
        data: {idC:idC, name:name, last_name:last_name, email:email, zip:zip, phone:phone},
        dataType: "JSON",
        success: function(res){
            
            if(res.actualizado){
                alert(res.mensaje);
                location.reload("adminUpdate.php");
            }else{
                alert(res.mensaje);
            }
        },
        error: function(jqXHR, textStatus, errorThrown){
            console.log(textStatus, errorThrown);
        }
    });
}

function actProd(){
    let idP = $("#idP").val();
    let img = $("#img").val();
    let name = $("#name").val();
    let brand = $("#brand").val();
    let model = $("#model").val();
    let stock = $("#stock").val();
    let price = $("#price").val();

    $.ajax({
        url: "../controller/controller.php?accion=updateProduct",
        type: "post",
        data: {idP:idP, img:img, name:name, brand:brand, model:model, stock:stock, price:price},
        dataType: "JSON",
        success: function(res){
            
            if(res.actualizado){
                alert(res.mensaje);
                location.reload("adminUpdateProduct.php");
            }else{
                alert(res.mensaje);
            }
        },
        error: function(jqXHR, textStatus, errorThrown){
            console.log(textStatus, errorThrown);
        }
    });
}

function pintarDatosProd(data){
    dat = data.split('||');
    $("#idP").val(dat[0]);
    $("#img").val(dat[1]);
    $("#name").val(dat[2]);
    $("#brand").val(dat[3]);
    $("#model").val(dat[4]);
    $("#stock").val(dat[5]);
    $("#price").val(dat[6]);
}

function insertProduct(){

    let img = $("#img").val();
    let name2 = $("#name2").val();
    let brand = $("#brand").val();
    let model = $("#model").val();
    let stock = $("#stock").val();
    let price = $("#price").val();
  
    
    $.ajax({
        url: "../controller/controller.php?accion=insertProduct",
        type: "post",
        data: {img:img, name:name2, brand:brand, model:model, stock:stock, price:price},
        dataType: "JSON",
        success: function(res){
            if(res.insert){
                alert(res.mensaje);
                $("#img").val("");
                $("#name2").val("");
                $("#brand").val("");
                $("#model").val("");
                $("#stock").val("");
                $("#price").val("");

                $("#tbodyP").load(" #tbodyP");
          
            }else{
                alert(res.mensaje);
            }
            // alert("Successful registration");
           
        },
        error: function(jqXHR, textStatus, errorThrown){
            console.log(textStatus, errorThrown);
        }
    });
}

function insertOrder(){
    let date = $("#date").val();
    let idC = $("#idC").val();
    let idE = $("#idE").val();
    let idP = $("#idP").val();
    let idO = $("#idO").val();

    $.ajax({
        url: "../controller/controller.php?accion=insertOrder",
        type: "post",
        data: {date:date, idC:idC, idE:idE, idP:idP, idO:idO},
        dataType: "JSON",
        success: function(res){
            if(res.insert){
                alert(res.mensaje);
                $("#date").val("");
                $("#idC").val("");
                $("#idE").val("");
                $("#idP").val("");
                $("#idO").val("");

                $("#tablePO").load(" #tablePO");
          
            }else{
                alert(res.mensaje);
            }
            // alert("Successful registration");
           
        },
        error: function(jqXHR, textStatus, errorThrown){
            console.log(textStatus, errorThrown);
        }
    });
}

function delPO(idS){
    $.ajax({
        url: "../controller/controller.php?accion=delPO",
        type: "post",
        data: {idS:idS},
        dataType: "JSON",
        success: function(res){
          if(res.eliminado){
            alert(res.mensaje);
            $("#tbodyDelPO").load(" #tbodyDelPO");
          }else{
            alert(res.mensaje);
          }
        },
        error: function(jqXHR, textStatus, errorThrown){
            console.log(textStatus, errorThrown);
        }
    });
}

let addToCartButtons = document.querySelectorAll(".addToCartButtons");

addToCartButtons.forEach(addToCartButton => {
    addToCartButton.addEventListener("click", addToCartClick);
});

function addToCartClick(evt){
    let boton = evt.target;
    let item = boton.closest(".item");
    let itemImg = item.querySelector(".itemImg").src;
    let itemName = item.querySelector(".itemName").textContent;
    let itemBrand = item.querySelector(".itemBrand").textContent;
    let itemModel = item.querySelector(".itemModel").textContent;
    let itemPrice = item.querySelector(".itemPrice").textContent;

    console.log(itemImg, itemName, itemBrand, itemModel, itemPrice);
    addItemToShoppingCart(itemImg, itemName, itemBrand, itemModel, itemPrice);
}

function addItemToShoppingCart(itemImg, itemName, itemBrand, itemModel, itemPrice){
    let containerRow = document.createElement("div");
    let tbody = document.querySelector(".tbody");
    let addCartHTML = `<tr><td><img src='${itemImg}'></td>
                           <td>${itemName}</td>
                           <td>${itemBrand}</td>
                           <td>${itemModel}</td>
                           <td>${itemPrice}</td></tr>`;

    containerRow.innerHTML = addCartHTML;
    tbody.append(containerRow);
}
