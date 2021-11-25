$(document).ready(function(){

    $('.btnMenu').click(function(e) {
        e.preventDefault();
        if($('nav').hasClass('viewMenu'))
        {
            $('nav').removeClass('viewMenu');
        }else{
            $('nav').addClass('viewMenu');
        }
    });

    $('nav ul li').click(function(){
        $('nav ul li ul').slideUp();
        $(this).children('ul').slideToggle();
    });

    //Cambiar pass
    $('.newPass').keyup(function(){
        validPass()
    });

    

});

function validPass(){
    var passNuevo = $('#txtNewPassUser').val();
    var confirmPassNuevo = $('#txtPassConfirm').val();
    if(passNuevo != confirmPassNuevo){
        $('.alertChangePass').html('<p>Las contraseñas no son iguales.</p>');
        $('.alertChangePass').slideDown();
        return false;
    }
    if(passNuevo.length < 5){
        $('.alertChangePass').html('<p>La nueva contraseña debe ser de 5 caracteres como minimo.</p>');
        $('.alertChangePass').slideDown();
        return false;
    }
}