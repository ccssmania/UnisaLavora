//Register
$(document).ready(function(){
	$(".textarea").summernote();
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