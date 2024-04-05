$(document).ready(function () {
    $("form").submit(function (event) {
        var formData = {
            fname: $("#fname").val(),
            lname: $("#lname").val(),
            email: $("#email").val(),
            password: $("#password").val(),
            national_code: $("#national_code").val(),
            phoneNumber: $("#phoneNumber").val(),
        };

        $.ajax({
            type: "POST",
            url: "/api/auth/register_reporter",
            data: formData,
            dataType: "json",
            encode: true,
            success:function (response){
                if (response.status == 200){
                    Swal.fire({
                        icon: 'success',
                        title: 'موفقیت امیز',
                        text: 'با موفقیت ثبت شد',
                        confirmButtonText: 'تایید',
                    }).then((result) => {
                        if (result.isConfirmed) {
                           location.href='/login'
                        }
                    })
                }else if (response.status == 401){
                    Swal.fire({
                        icon: 'error',
                        title: 'خطا',
                        text: 'متاسفم این ایمیل یک بار ثبت شده است',
                        confirmButtonText: 'تایید',
                    })
                }

            },
            error:function (error){
                var text = error.responseText;
                var obj = JSON.parse(text);
                if (obj.errors.fname === undefined) {
                    document.getElementById('NameReporter').innerHTML = " "

                } else {
                    document.getElementById('NameReporter').innerHTML = obj.errors.fname

                }
                if (obj.errors.lname === undefined) {
                    document.getElementById('FamilyReporter').innerHTML = " "

                } else {
                    document.getElementById('FamilyReporter').innerHTML = obj.errors.lname

                }
                if (obj.errors.email === undefined) {
                    document.getElementById('EmailReporter').innerHTML = " "

                } else {
                    document.getElementById('EmailReporter').innerHTML = obj.errors.email

                }
                if (obj.errors.password === undefined) {
                    document.getElementById('PasswordReporter').innerHTML = " "

                } else {
                    document.getElementById('PasswordReporter').innerHTML = obj.errors.password

                }
                if (obj.errors.national_code === undefined) {
                    document.getElementById('nationalcodeReporter').innerHTML = " "

                } else {
                    document.getElementById('nationalcodeReporter').innerHTML = obj.errors.national_code

                }
                if (obj.errors.phoneNumber === undefined) {
                    document.getElementById('phoneNumberReporter').innerHTML = " "

                } else {
                    document.getElementById('phoneNumberReporter').innerHTML = obj.errors.phoneNumber

                }
            }
        })

        event.preventDefault();
    });
    $("#btnSave").on('click',function (event) {
        var formData = {
            fname: $("#fname").val(),
            lname: $("#lname").val(),
            email: $("#email").val(),
            password: $("#password").val(),
        };

        $.ajax({
            type: "POST",
            url: "/api/auth/register_user",
            data: formData,
            dataType: "json",
            encode: true,
            success:function (response){
                if (response.status == 200){
                    Swal.fire({
                        icon: 'success',
                        title: 'موفقیت امیز',
                        text: 'با موفقیت ثبت شد',
                        confirmButtonText: 'تایید',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.href='/login'
                        }
                    })
                }else if (response.status == 401){
                    Swal.fire({
                        icon: 'error',
                        title: 'خطا',
                        text: 'متاسفم این ایمیل یک بار ثبت شده است',
                        confirmButtonText: 'تایید',
                    })
                }

            },
            error:function (error){
                var text = error.responseText;
                var obj = JSON.parse(text);
                if (obj.errors.fname === undefined) {
                    document.getElementById('NameUsers').innerHTML = " "

                } else {
                    document.getElementById('NameUsers').innerHTML = obj.errors.fname

                }
                if (obj.errors.lname === undefined) {
                    document.getElementById('FamilyUsers').innerHTML = " "

                } else {
                    document.getElementById('FamilyUsers').innerHTML = obj.errors.lname

                }
                if (obj.errors.email === undefined) {
                    document.getElementById('EmailUsers').innerHTML = " "

                } else {
                    document.getElementById('EmailUsers').innerHTML = obj.errors.email

                }
                if (obj.errors.password === undefined) {
                    document.getElementById('PasswordUsers').innerHTML = " "

                } else {
                    document.getElementById('PasswordUsers').innerHTML = obj.errors.password

                }

            }
        })

        event.preventDefault();
    });
});

