
$(document).ready(function(){
	console.log($("#id"),$("#dni"))
	$("#id").removeAttr('required');
	$("#dni").removeAttr('required');
});
function student_company(){

	if($("#select option:selected").val() == 2)
	{
		
		$("#company_label").hide();
		$("#company_div").hide();
		$("#student_label").show();
		$("#student_div").show();
		$("#id").prop('required', true);
	}else if($("#select option:selected").val() == 1){
		$("#company_label").show();
		$("#company_div").show();
		$("#student_label").hide();
		$("#student_div").hide();
		$("#dni").prop('required', true);
	}
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