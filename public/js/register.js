//student

function student_company(){
	if($("#select option:selected").val() == 2)
	{
		var div = $("#users_rolls");
		div.empty();
		var label = $('<label  class="col-md-4 control-label">Student ID</label>');
		var div2 = $('<div class="col-md-6 "> <input type="text" class="form-control" name="id" required> </div>');
		div.append(label);
		div.append(div2);
	}else if($("#select option:selected").val() == 1){
		var div = $("#users_rolls");
		div.empty();
		var label = $('<label  class="col-md-4 control-label">Company DNI</label>');
		var div2 = $('<div class="col-md-6 "> <input type="text" class="form-control" name="dni" required> </div>');
		div.append(label);
		div.append(div2);
	}
}