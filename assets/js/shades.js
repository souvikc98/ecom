$(document).ready(function(){
	var addshadesForm = $("#shades");

	var validator = addshadesForm.validate({
		
		rules:{
			type :{ required : true, selected : true},
			title :{ required : true },
			// code :{ required : true },
			image :{ required : true }
		},
		messages:{
			type :{ required : "The Shades Card Type is required", selected : "Please select atleast one option" },
			title :{ required : "The Title is required" },
			// code :{ required : "The Code is required" },
			image :{ required : "The Image is required" }
		}
	});
});