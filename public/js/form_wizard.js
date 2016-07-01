/**
 * Created by OST on 2016-05-30.
 */
var FormWizard = function () {
    "use strict";
    var wizardContent = $('#wizard');
    var wizardForm = $('#form');
    var numberOfSteps = $('.swMain > ul > li').length;
    var initWizard = function () {
        // function to initiate Wizard Form
        wizardContent.smartWizard({
            selected: 0,
            keyNavigation: false,
            onLeaveStep: leaveAStepCallback,
            onShowStep: onShowStep,
        });
        var numberOfSteps = 0;
        initValidator();
    };


    var initValidator = function () {

        $.validator.setDefaults({
            errorElement: "span", // contain the error msg in a span tag
            errorClass: 'help-block',
            ignore: ':hidden',
            rules: {
                name: {
                    minlength: 2,
                    required: true
                },
                phone: {
                    minlength: 10,
                    required: true
                },
                company_type: {
                    required: true
                },
                company_intro: {
                    maxlength: 255,
                    required: true
                },
                area: {
                    required: true
                },
                category: {
                    required: true
                },
                project_name: {
                    required: true
                },
                duration: {
                    required: true
                }, money: {
                    required: true
                }, purpose: {
                    required: true
                }, content_detail: {
                    required: true
                }, deadline: {
                    required: true
                }, expecting_start: {
                    required: true
                }, pre_meeting: {
                    required: true
                }, experience: {
                    required: true
                }, reason: {
                    required: true
                }, project_attach: {
                    extension: "zip"
                }

                // email: {
                //     required: true,
                //     email: true
                // },
                // password: {
                //     minlength: 6,
                //     required: true
                // },
                // password2: {
                //     required: true,
                //     minlength: 5,
                //     equalTo: "#password"
                // }
            },
            messages: {
                name: "이름을 입력해 주세요.",
                phone: "연락처를 입력해 주세요.",
                company_type: "회사형태를 선택해 주세요.",
                area: "선택해 주세요",
                category: "선택해 주세요",
                project_name: "입력해 주세요",
                duration: "입력해 주세요",
                money: "입력해 주세요",
                purpose: "선택해 주세요",
                content_detail: "입력해 주세요",
                deadline: "입력해 주세요",
                expecting_start: "입력해 주세요",
                pre_meeting: "선택해 주세요",
                experience: "선택해 주세요",
                reason: "선택해 주세요",
                project_attach: "이미지 파일을 확인해 주세요"
            },
            highlight: function (element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function (element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
                // set error class to the control group
            },
            success: function (label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            }
        });
        jQuery.extend(jQuery.validator.messages, {
            extension: "이미지 파일을 확인해 주세요"
        });
    };
    var displayConfirm = function () {
        $('.display-value', form).each(function () {
            var input = $('[name="' + $(this).attr("data-display") + '"]', form);
            if (input.attr("type") == "text" || input.attr("type") == "email" || input.is("textarea")) {
                $(this).html(input.val());
            } else if (input.is("select")) {
                $(this).html(input.find('option:selected').text());
            } else if (input.is(":radio") || input.is(":checkbox")) {

                $(this).html(input.filter(":checked").closest('label').text());
            } else if ($(this).attr("data-display") == 'card_expiry') {
                $(this).html($('[name="card_expiry_mm"]', form).val() + '/' + $('[name="card_expiry_yyyy"]', form).val());
            }
        });
    };
    var onShowStep = function (obj, context) {
        if (context.toStep == numberOfSteps) {
            $('.anchor').children("li:nth-child(" + context.toStep + ")").children("a").removeClass('wait');
            displayConfirm();
        }
        $(".next-step").unbind("click").click(function (e) {
            e.preventDefault();
            wizardContent.smartWizard("goForward");
        });
        $(".back-step").unbind("click").click(function (e) {
            e.preventDefault();
            wizardContent.smartWizard("goBackward");
        });
        $(".go-first").unbind("click").click(function (e) {
            e.preventDefault();
            wizardContent.smartWizard("goToStep", 1);
        });
        $(".finish-step").unbind("click").click(function (e) {
            e.preventDefault();
            onFinish(obj, context);
        });
    };
    var leaveAStepCallback = function (obj, context) {
        return validateSteps(context.fromStep, context.toStep);
        // return false to stay on step and true to continue navigation
    };
    var onFinish = function (obj, context) {
        if (leaveAStepCallback(obj, context)) {

            var areaCnt = 0;
            $('#area :selected').each(function (i, sel) {
                areaCnt++;
            });

            if (areaCnt == 0) {
                alert("진행하길 원하는 분야를 선택해 주세요.");
                return;
            }

            /*
             swal({
             title: "등록에 성공했습니다.",
             type: "success"
             }, function(){
             window.location.href="/dashboard";
             });
             */

            if (confirm('프로젝트를 등록 하시겠습니까?')) {
                // $('.anchor').children("li").last().children("a").removeClass('wait').removeClass('selected').addClass('done').children('.stepNumber').addClass('animated tada');
                // wizardForm.submit();
                var formData = new FormData(wizardForm[0]);
                $.ajax({
                    type: 'POST',
                    url: '/p_add',
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function (data2) {
                        console.log(data2);

                        swal({
                            title: "등록에 성공했습니다.",
                            type: "success"
                        }, function () {
                            window.location.href = "/dashboard";
                        });
                    },
                    error: function (data2) {

                        console.log(data2);
                        console.log(data);
                    }
                });
            } else {
                return;
            }
        }
        //wizardContent.smartWizard("goForward");


        // $('.anchor').children("li").last().children("a").removeClass('wait').removeClass('selected').addClass('done').children('.stepNumber').addClass('animated tada');
        //
        // wizardForm.submit();
    };
    var validateSteps = function (stepnumber, nextstep) {
        var isStepValid = false;

        //console.log(stepnumber);
        //console.log(nextstep);

        if (numberOfSteps >= nextstep && nextstep > stepnumber) {

            // cache the form element selector
            if (wizardForm.valid()) { // validate the form
                wizardForm.validate().focusInvalid();
                for (var i = stepnumber; i <= nextstep; i++) {
                    $('.anchor').children("li:nth-child(" + i + ")").not("li:nth-child(" + nextstep + ")").children("a").removeClass('wait').addClass('done').children('.stepNumber').addClass('animated tada');
                }
                //focus the invalid fields
                isStepValid = true;
                return true;
            }
            ;
        } else if (nextstep < stepnumber) {
            for (i = nextstep; i <= stepnumber; i++) {
                $('.anchor').children("li:nth-child(" + i + ")").children("a").addClass('wait').children('.stepNumber').removeClass('animated tada');
            }

            return true;
        }
    };
    var validateAllSteps = function () {
        var isStepValid = true;

        wizardForm.validate({
            invalidHandler: function () {
                isStepValid = false;
            }

        });
        // all step validation logic
        return isStepValid;
    };
    return {
        init: function () {
            initWizard();
        }
    };
}();