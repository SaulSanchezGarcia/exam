
function Gologin(){
    setTimeout("location.href='../view/login.php'", 40);
}

function login(){
    let user_name = $("#user_name").val();
    let password = $("#password").val();
    let expresion = /\w/;
    console.log(user_name + "" + password);

    if(user_name == "" || password == "" || user_name == expresion || password == expresion ){
        alert("Please fill all fields");
    }else{
        $.ajax({
            url: "../controller/controller.php?accion=login",
            type: "post",
            data: {user_name:user_name,password:password},
            dataType: "JSON",
            success: function(res){
                if(res.encontrado){
                    alert(res.mensaje);
                    $("#user_name").val("");
                    $("#password").val("");
                }else{
                    alert(res.mensaje);
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                console.log(textStatus, errorThrown);
            }
        });
    }
}