$(document).ready(function(){
	$("#form_delete").on("submit", function(ev){
		ev.preventDefault();

		var $form = $(this);
		
		var $button =  $form.find("[type = 'submit']");

		//peticion AJAX
		
		$.ajax({
			url: $form.attr("action"),
			method: $form.attr("method"),
			data: $form.serialize(),
			dataType: "JSON",
			beforeSend: function(){
				$button.val("Cargando...");
			},
			success: function(data){
				$button.css("background-color","#00c853").val("Agregado");
				$(".circle-shopping-cart").html(data.products_count).addClass("highlight");
				setTimeout(function(){
					restartButton($button);
				},2000);
			},
			error: function(err){
				console.log(err);
				$button.css("background-color","#d50000").val("Hubo un error.");
				setTimeout(function(){
					restartButton($button);
				},2000);
			}

			});

		return false;
	});
});

function addSkill(){
	var div = $("#experiences_fix");
	var add = '<div class="col-md-6"><input  class="form-control" placeholder="name" name="skills_name[]" type="text"> </div>';
	var add1 = '<div class="col-md-6"><input class="form-control" placeholder="file" name="skills_file[]" type="file"> </div>';
	div.show();
	div.append(add);
	div.append(add1);
}

function deleteSkill(button,method,url,id){
	$.ajax({
			url: url,
			method: method,
			success: function(data){
				button.css("background-color","#00c853");
				setTimeout(function(){
					removetags(button,id);
				},500);
			},
			error: function(err){
				console.log(err);
				button.css("background-color","#d50000").val("error");
			}

			});

		return false;
}

function removetags(button, id){
	$("#exp_name"+id).empty();
	$("#exp_file"+id).empty();
	button.remove();
}