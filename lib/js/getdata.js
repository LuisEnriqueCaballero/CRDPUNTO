$(document).ready(function(){  
	$("#radiografia").change(function() {    
		var id = $(this).find(":selected").val();
		var dataString = 'empid='+ id;    
		$.ajax({
			url: '/crrdPunto1/admin/js/getRadio.php',
			dataType: "json",
			data: dataString,  
			cache: false,
			success: function(RadioData) {
			   if(RadioData) {	
					$("#precio").text(RadioData.precio);
					$("#punto").text(RadioData.punto);
	
				}  
                console.log(RadioData)	
			} 
		});
 	})
});
