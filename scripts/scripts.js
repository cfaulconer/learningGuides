    $(document).ready(function () {
        var msgText = $("#errorMessageText").text();

        if (msgText.trim().length>0){
            $("#errorMessage").addClass("alert alert-warning");
            $("#errorMessage").html(msgText+'<a href="#" class="close" data-dismiss="alert">&times;</a>');
        }else{
            $("#errorMessage").html("");
        }

    });