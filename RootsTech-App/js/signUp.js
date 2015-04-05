$(document).ready(function(){
   //frm.$valid->then class="btn btn-success" disabled="false"
   var mailValid=false;
   $('#email').keyup(function(){
    //ajax check of emailid
   if ($('#email').val()!='') {
      //ajax check
      $('#mailtxt').show(1000);
      $.ajax({
            type:"POST",
        url:"php/php_mail.php",
        data:{
            'mail':$('#email').val()
            },
        success:function(data){
         if (data==0) {
            $('#mailtxt').text('Username unavailable');
            $('#bnsubmit').attr('disabled',true);
            mailValid=false;
         }
         if (data==1) {
            $('#mailtxt').text('Username available');
            $('#bnsubmit').attr('disabled',false);
            mailValid=true;
         }
        }
      });
   }
   else{
    $('#mailtxt').hide(1000);
    mailValid=false;
   }
   });
   $('#bnsubmit').click(function(){
   	//alert("asdasd");
    if($('#pwd').val().length>=8 && mailValid){
    	/*alert($('#fname').val());
    	alert($('#lname').val());
    	alert($('#email').val());
    	alert($('#pwd').val());
    	alert($('#look').val());
    	alert($('#lcn').val());
    	alert($('#ppic').val());*/
    	
    	$.ajax({
            type:"POST",
        url:"php/php_signUp.php",
        data:{
            'fname':$('#fname').val(),
			'lname':$('#lname').val(),
            'email':$('#email').val(),
            'pwd':$('#pwd').val(),
            'look':$('#look').val(),
            'lcn':$('#lcn').val(),
            'ppic':$('#ppic').val()
            },
        success:function(data){
			alert(data);        	
    	  }
  	});
    }
    else{
    	alert("Minimum Password Length is 8 Characters");
    }
    });
});