jQuery(document).ready(function($) {
    "use strict";

    function getCookie(name) {
        var matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        ));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    };

    $.ajaxSetup({headers: {'X-XSRF-TOKEN': getCookie("XSRF-TOKEN")}});

    $('#message_sent').hide();

    $('#send').click(function () {

        var email = $('#email').val();
        var msg = $('#message').val();
        var current = jQuery(this);
        var url = current.data('url');

        if (emailVerify() && msgVerify()){
            $('#email-error').hide();
            $('#msg-error').hide();

            $.ajax({
                type: "POST",
                url: url,
                headers: {
                    'X-XSRF-TOKEN': getCookie("XSRF-TOKEN"),
                },
                data: {
                    email: email,
                    msg: msg
                },
                success: function (data) {
                    console.log(data);
                    var errors = '';
                    if (data.status) {
                        $('#loading').show();
                        $('#error-message').hide();
                        $('#message_sent').show();
                    } else {
                        if (data.msg){
                            let arr = Object.values(data.msg);
                            arr.forEach(function(el){
                                errors += el[0];
                            });
                        } else {
                            errors = "Sending Error!";
                        }

                        $('#loading').show();
                        $('#error-message').slideDown().html(errors);
                    }
                },
                error: function (data) {
                    console.log(data);
                    $('#error-message').slideDown().html("Error! see console.log");
                }
            });
        }
    });

    function emailVerify() {
        var email = $('#email').val();

        if ((email !== "") &&
            (/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                .test(email))) {

            return true;
        } else { $('#email-error').show(); return false; }
    }

    function msgVerify(){
        var msg = $('#message').val();
        if(msg !== "") { return true; } else { $('#msg-error').show(); return false; }
    }

});




