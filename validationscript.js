/**CONTACT FORM START **/

jQuery(document).ready(function(e) {
    	
	jQuery("#contactenquiryform").on('submit',function(e){
				e.preventDefault();
				var valid;	
				valid = validateContact();
				
				if(valid) {
					$("#btnsub").attr("disabled", true);
					jQuery.ajax({
					url: "requestform.php",
					type: "POST",
					data:  new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success: function(data){
                        $("#mail-status").html(data);
						document.getElementById("contactenquiryform").reset();
						window.location.href="thankyou.jpg";
						/*$('#loader-icon').hide();*/
					},
					error: function(){} 
					});
				}
			
		})
});	
function validateContact() {
	var valid = true;	
	jQuery("#contactenquiryform").css('border-color','black');
	jQuery(".info").html('');
	
	if(!jQuery("#fname").val()) {
		jQuery("#fname-info").html("Please Enter Name");
		jQuery("#fname").css('border-color','red');
		valid = false;
	}
	if(!jQuery("#fname").val().match(/^[a-zA-Z\s]+$/)) {
		jQuery("#fname-info").html("Please Enter Valid Name");
		jQuery("#fname").css('border-color','red');
		valid = false;
	}
	if(!jQuery("#lname").val()) {
		jQuery("#lname-info").html("Please Enter Name");
		jQuery("#lname").css('border-color','red');
		valid = false;
	}
	if(!jQuery("#lname").val().match(/^[a-zA-Z\s]+$/)) {
		jQuery("#lname-info").html("Please Enter Valid Name");
		jQuery("#lname").css('border-color','red');
		valid = false;
	}
	
	if(!jQuery("#cemail").val()) {
		jQuery("#Email-info").html("Please Enter Email");
		jQuery("#cemail").css('border-color','red');
		valid = false;
	}
	if(!jQuery("#cemail").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
		jQuery("#Email-info").html("Please Enter Valid Email");
		jQuery("#cemail").css('border-color','red');
		valid = false;
	}
	
	
	if(!jQuery("#cmessage").val().match(/^[a-zA-Z\s]+$/)) {
		jQuery("#cMessage-info").html("Please Enter Characters");
		jQuery("#cmessage").css('border-color','red');
		valid = false;
	}
	
	return valid;
}
$(function(){
  $('#btnsub').attr('disabled', false);
});




