$(document).ready(function (){

    $("#user_autocomplete").autocomplete({
        source: "/users",
        minLength: 2,
        select: function (event, ui) {

            $("#user").val(ui.item.value);
            $("#user_autocomplete").val(ui.item.label);

            
            return false;
        }
    });

    $("#user_autocomplete").click(function () {
        $("#user").val('');
        $("#user_autocomplete").val('');
    });
});
