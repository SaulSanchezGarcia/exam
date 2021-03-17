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
    
    // if(name == "" || last_name == "" || email == "" || zip == "" || phone == "" ){
    //     alert("Please fill all fields");
    // }else{
    //     // alert("Todo bien");
    // }
    
    // if(expresion.test(name) && expresion.test(last_name)){
    //     // alert("contine pura letra");
    // }else{
    //     alert("no contiene pura letra");
    // }
    
    // if(validacionEmail.test(email)){
    //     // alert("el email es correcto");
    // }else{
    //     alert("el email no es correcto");
    // }
    
    // if(validacionZip.test(zip)){
    //     // alert("el zip esta bien");
    // }else{
    //     alert("el zip esta mal");
    // }

    // if(validacionPhone.test(phone)){
    //     // alert("el phone estan bien");
    // }else{
    //     alert("el phone no esta bien");
    // }
    if(name == "" || last_name == "" || email == "" || zip == "" || phone == ""){
        alert("Please fill all fields");
    }else{
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

// function buscar(){

//     let search = $("#search").val();
    
//     $.ajax({
//         url: "../controller/controller.php?accion=search",
//         type: "post",
//         data: {search:search},
//         dataType: "JSON",
//         success: function(res){
          
//         },
//         error: function(jqXHR, textStatus, errorThrown){
//             console.log(textStatus, errorThrown);
//         }
//     });
// }