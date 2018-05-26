//Register
$(document).ready(function(){
	$(".textarea").summernote();
	$('.datepicker').datepicker({
		format : 'yyyy-mm-dd',
	    autoclose : true,
	});
	$('.datepicker_year').datepicker({
		format : 'yyyy',
	    autoclose : true,
	    viewMode: "years", 
    	minViewMode: "years"
	});
	$('.datepicker_month').datepicker({
		format : 'mm',
	    autoclose : true,
	    viewMode: "months", 
    	minViewMode: "months"
	});
	$('.datepicker_day').datepicker({
		format : 'dd',
	    autoclose : true,
	    viewMode: "days", 
    	minViewMode: "days"
	});
	$(".accept").on("submit",function(ev){
		ev.preventDefault();
		var $form = $(this);
		
		var $button =  $form.find("[type = 'submit']");
		if($(".valid").val() != ''){

			$.ajax({
				url : $form.attr('action'),
				method : $form.attr('method'),
				data : $form.serialize(),
				dataType : 'JSON',
				beforeSend: function(){
					$button.css("background-color","#ff9123").val("...");
				},
				success: function(data){
					$button.css("background-color","#00c853");
					location.reload();
				},
				error: function(err){
					console.log(err);
					$button.css("background-color","#d50000").val("error");
				}
			});
		}
		else{
			return alert("Select date");
		}
		return false;
	});
});
function company_student($obj){
	console.log($obj);
}

function registerIdError(obj){
	if(obj == "id"){
		$("#student_label").show();
		$("#student_div").show();
	}else if(obj == "dni"){
		$("#company_label").show();
		$("#company_div").show();
	}
}