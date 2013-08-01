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
    $('#input_phoneno').focus(function() {
        $("#tip_phoneno").html("");
        $("#gp_phoneno").removeClass('error');
        $("#gp_phoneno").removeClass('success');
    });

    $('#input_phoneno').blur(function() {

        var phoneno = $(this).val().trim();
        if (phoneno != '') {
            $.get("?c=register&a=check_phoneno&phoneno=" + phoneno, null, function(response) {
                //alert(response);
                if ("no"==response) {
                    $("#tip_phoneno").html("该手机号码已被注册");
                    $("#gp_phoneno").addClass('error');
                } else {
                    $("#tip_phoneno").html("该手机号码可用");
                    $("#gp_phoneno").addClass('success');

                }
                //
            });
        }

    });

    $("#reg_btn_close").click(function() {
       $('#submitModal').modal('hide');
    });

});
