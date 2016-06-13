/**
 * Created by OST on 2016-05-12.
 */

$("#loginForm").submit(function (event) {
    event.preventDefault();
    var $form = $(this),
        data = $form.serialize(),
        url = "/login";

    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        success: function (data) {
            if (data["try"] == "Success") {
                document.location = "/dashboard";
            }
            else {
                $("#error").html(data);
            }


        },

    });


});


$("#signupForm").submit(function (event) {
    event.preventDefault();
    var $form = $(this),
        data = $form.serialize(),
        url = "/register";

    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        success: function (data) {

            if (data["try"] == "Success") {
                alert("회원가입에 성공했습니다");
                document.location = "/dashboard";
            }
            else {
                $("#errorSignup").html(data);
            }
            
        },
        error: function (data) {

            try {

                $("#PorCError").html("둘 중 하나를 선택해 주세요");

            } catch (ex) {
                $("#PorCError").html("");
            }


            try {

                $("#nameError").html(data.responseJSON.name[0]);

            } catch (ex) {$("#nameError").html("");}

            try {

                $("#emailError").html(data.responseJSON.email[0]);
            } catch (ex) {$("#emailError").html("");}

            try {

                $("#passwordError").html(data.responseJSON.password[0]);
            } catch (ex) {$("#passwordError").html("");}




            // try{
            //     $("#nameError").html(data.responseJSON.name[0]);
            // }


//             $("#emailError").html(data.responseJSON.email[0]);
//             $("#passwordError").html(data.responseJSON.password[0]);
//             $("#passwordconfirmErrorError").html(data.responseJSON.passwordconfirm[0]);

        }

    });


});