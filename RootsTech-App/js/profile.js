$(document).ready(function(){
    var mail=$('#prfl').text();
    //alert(mail);
    $.ajax({
            type:"POST",
        url:"php/php_profpic.php",
        data:{
            'mail':mail
            },
        success:function(data){
        	   $('#profpic').attr('src',data);
            },
        error:function(data){
         alert('No Image');
            }
        });
});