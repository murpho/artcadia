var jQ_AJAX=jQuery.noConflict();


jQ_AJAX(document).ready(function(){
	jQ_AJAX('#submit').click(function() {
		var firstname = jQ_AJAX('#firstname').val(); 
		var email = jQ_AJAX('#email').val(); 
		var email2 = jQ_AJAX('#email2').val(); 
		var title = jQ_AJAX('#title').val(); 
		var filename = jQ_AJAX('#filename').val(); 

		jQ_AJAX('#waiting_ajax').show(500);
		jQ_AJAX('#demoForm').hide(0);
		jQ_AJAX('#message_ajax').hide(0);
		
		jQ_AJAX.ajax({
			type : 'POST',
			url : 'post.AJAX.php',
			dataType : 'json',
			data: "firstname="+firstname+"&email="+email+"&email2="+email2+"&title="+title+"&filename="+filename, 
			success : function(data){
				jQ_AJAX('#waiting_ajax').hide(500);
				jQ_AJAX('#message_ajax').removeClass().addClass((data.error === true) ? 'error' : 'success')
					.text(data.msg).show(500);
				jQ_AJAX('#message_firstname').removeClass().addClass((data.error_firstname === true) ? 'error_firstname' : 'success_firstname')
					.text(data.msg_firstname).show(500);
				jQ_AJAX('#message_email2').removeClass().addClass((data.error2 === true) ? 'error2' : 'success2')
					.text(data.msg2).show(500);
		        jQ_AJAX('#message_title').removeClass().addClass((data.error_title === true) ? 'error_title' : 'success_title')
					.text(data.msg_title).show(500);
				jQ_AJAX('#message_filename').removeClass().addClass((data.error_filename === true) ? 'error_filename' : 'success_filename')
					.text(data.msg_filename).show(500);
				
				//TO DO: add conditional if data.error_filename 
				//document.getElementById(in_a_flash).style.display = "none"; 
				if (data.error_filename === false)
					jQ_AJAX("#inaflash").hide(500);
				if (data.error_title === false)
	 				jQ_AJAX(".ok-check").show(500);
				//Hello world

				//if (data.error === true)
				jQ_AJAX('#demoForm').show(500);
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				jQ_AJAX('#waiting_ajax').hide(500);
				jQ_AJAX('#message_ajax').removeClass().addClass('error')
					.text('There was an error.').show(500);
			
				jQ_AJAX('#demoForm').show(500);
			}
		});
		
		return false;
	});
});