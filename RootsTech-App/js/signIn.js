$(document).ready(function(){
    $('#cbPassword').attr('checked',false);
   var v=0;
    $('#cbPassword').click(function(){
        if (v==0) {
            $('#cbPassword').attr('checked',true);
            $('#pwd').attr('type','text');
            v=1;
        }
        else{
            $('#cbPassword').attr('checked',false);
            $('#pwd').attr('type','password');
            v=0;
        }        
        });
    $('#sbmt').click(function(){
         $.ajax({
            type:"POST",
        url:"php/php_login.php",
        data:{
            'mail':$('#email').val(),
            'password':$('#pwd').val()
            },
        success:function(data){
            //alert(data);
            if(data=="Invalid Credentials,Login Failed"){
                alert(data);
            }
            else{
         window.location.replace('./home.php');
     }
            },
        error:function(data){
         alert('Login Unsuccessful');
            }
        });
    });  
   
});