$('document').ready(function() {

    var Tel_User_state = false;
    var Email_User_state = false;
    var Pass_User_state = false;

    $('#Tel_User').on('blur', function() {
        var Tel_User = $('#Tel_User').val();
        if (Tel_User == '') {
            Tel_User_state = false;
            return;
        }
        var filter = /^0[1-9]{9}$/;
        if (!filter.test(Tel_User)) {
            $('#Tel_User').parent().removeClass();
            $('#Tel_User').parent().addClass('form_error');
            $('#Tel_User').siblings("span").text("รูปแบบไม่ถูกต้อง เบอร์โทร 10 หลัก");
            $('#reg_btn').attr('disabled', 'disabled');
        } else {

            $.ajax({
                url: 'register.php',
                type: 'post',
                data: {
                    'Tel_User_check': 1,
                    'Tel_User': Tel_User
                },
                success: function(response) {
                    if (response == 'taken') {
                        Tel_User_state = false;
                        $('#Tel_User').parent().removeClass();
                        $('#Tel_User').parent().addClass('form_error');
                        $('#Tel_User').siblings("span").text("เบอร์โทรนี้ถูกใช้แล้ว");
                    } else if (response == "not_taken") {
                        Tel_User_state = true;
                        $('#Tel_User').parent().removeClass();
                        $('#Tel_User').parent().addClass('form_success');
                        $('#Tel_User').siblings("span").text("เบอร์โทรนี้สามารถใช้งานได้");
                    }
                }
            })
        }
    });

    $('#Email_User').on('blur', function() {
        var Email_User = $('#Email_User').val();
        if (Email_User == '') {
            Email_User_state = false;
            return;

        }
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!filter.test(Email_User)) {
            $('#Email_User').parent().removeClass();
            $('#Email_User').parent().addClass('form_error');
            $('#Email_User').siblings("span").text("รูปแบบอีเมลไม่ถูกต้อง");

            $('#reg_btn').attr('disabled', 'disabled');
        } else {


            $.ajax({
                url: 'register.php',
                type: 'post',
                data: {
                    'Email_User_check': 1,
                    'Email_User': Email_User
                },
                success: function(response) {
                    if (response == 'taken') {
                        Email_User_state = false;
                        $('#Email_User').parent().removeClass();
                        $('#Email_User').parent().addClass('form_error');
                        $('#Email_User').siblings("span").text("อีเมลนี้ถูกใช้แล้ว");
                    } else if (response == "not_taken") {
                        Email_User_state = true;
                        $('#Email_User').parent().removeClass();
                        $('#Email_User').parent().addClass('form_success');
                        $('#Email_User').siblings("span").text("อีเมลนี้สามารถใช้งานได้");


                    }
                }
            })
        }
    });

    $('#Pass_User, #Pass_User2').on('keyup', function() {
        // if (!($('#Pass_User').val() == '') && !($('#Pass_User').val() == '')) {
        //     $('#Pass_User2').parent().removeClass();

        if ($('#Pass_User').val() == $('#Pass_User2').val()) {
            Pass_User_state = true;
            $('#Pass_User2').parent().removeClass();
            $('#Pass_User2').parent().addClass('form_success');
            $('#Pass_User2').siblings("span").text("รหัสผ่านตรงกัน");
        } else {
            // // Pass_User_state = false;
            $('#Pass_User2').parent().removeClass();
            $('#Pass_User2').parent().addClass('form_error');
            $('#Pass_User2').siblings("span").text("รหัสผ่านไม่ตรงกัน");
        }

        // }
    });

    $('#reg_btn').on("click", function(e) {
        var Tel_User = $("#Tel_User").val();
        var Email_User = $("#Email_User").val();
        var Pass_User = $("#Pass_User").val();
        var Name_User = $("#Name_User").val();
        if (Tel_User_state == false || Email_User_state == false || Pass_User_state == false || (!(Name_User))) {
            e.preventDefault();
            $("#error_msg").text("กรอกข้อมูลให้ครบถ้วน");
        } else {
            $.ajax({
                url: 'register.php',
                type: 'post',
                data: {
                    'save': 1,
                    'Email_User': Email_User,
                    'Tel_User': Tel_User,
                    'Pass_User': Pass_User,
                    'Name_User': Name_User
                },
                success: function() {
                    alert('ลงทะเบียนสำเร็จ');
                    $('#Tel_User').val('');
                    $('#Email_User').val('');
                    $('#Pass_User').val('');
                    $('#Name_User').val('');
                    window.location.href = "index.php";
                }

            })
        }
    });

});