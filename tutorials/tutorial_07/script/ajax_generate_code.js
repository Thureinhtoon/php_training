$(document).ready(function() {
	$("#codeForm").submit(function(){
		$.ajax({
			url:'generate_code.php',
			type:'POST',
			data: {formData:$("#content").val()},
			success: function(response) {
				$(".showQRCode").html(response);  
			},
		 });
	});
});