function apply(button,url,method){
	$.ajax({
			url: url,
			method: method,
			beforeSend: function(){
				button.css("background-color","#ff9123").val("...");
			},
			success: function(data){
				button.css("background-color","#00c853");
				location.reload();
			},
			error: function(err){
				console.log(err);
				button.css("background-color","#d50000").val("error");
			}

			});

		return false;
}