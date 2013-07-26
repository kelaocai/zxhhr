$(document).ready(function() {

    $('#reg_form').ajaxForm({
        // target identifies the element(s) to update with the server response
        target : '#reg_submit_result',

        // success identifies the function to invoke when the server response
        // has been received; here we apply a fade-in effect to the new content
        success : function() {
            $('#submitModal').modal('show');
        }
    });

    //check email available
    $('#input_email').focus(function() {
        $("#tip_email").html("");
        $("#gp_email").removeClass('error');
        $("#gp_email").removeClass('success');
    });

    $('#input_email').blur(function() {

        var email = $(this).val().trim();
        if (email != '') {
            $.get("?c=register&a=check_email&email=" + email, null, function(response) {
                if (response != "ok") {
                    $("#tip_email").html("该邮箱已被注册");
                    $("#gp_email").addClass('error');
                } else {
                    $("#tip_email").html("此邮箱可用");
                    $("#gp_email").addClass('success');

                }
                //
            });
        }

    });

    $("#reg_btn_close").click(function() {
       $('#submitModal').modal('hide');
    });

});
