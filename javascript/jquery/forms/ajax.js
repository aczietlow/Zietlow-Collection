$(document).ready(function() {
	var submit = false;	
	
	$('form').submit(function() {
		var name = $('input#name').val();
		var age = $('input#age').val();
		$.ajax({
			type: "POST",
			url: "saveData.php",
			data: { name: name, age: age },
			success: function(response)	{
				if (response != '')	{
					submit = false;
				}
				else{
					submit = true;
					$('form').submit();
				}
			}
		});
		return submit;
	});
	
	//Collection of jQuery form events
	
	//Called when element looses focus
	$('#name').blur(function() {
		console.log('event handler for .blur was called');
	});
	
	//Called when element loosing focus and has changed states
	$('#name').change(function() {
		console.log('event handler for .change was called');
	});
	
	//Called when element comes into focus
	$('#name').focus(function() {
		console.log('event handler for focus was called');
	});
	
	//Called when user selects text [limited to textareas and text input fields]
	$('#name').select(function() {
		console.log('event handler for .select was called');
	});
	
	//called when the form is submited 
	$('input[type=submit]').submit(function() {
		console.log('event handler for .submit was called');
	});
	
	//makes an ajax request to formComplete.php
	

//	$('button#trigger').click(function() {
//		$('form#registration').submit();
//	});
	
});




