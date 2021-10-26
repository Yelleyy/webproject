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
                    $('#Tel_User').siblings("span").text("Sorry... Tel already taken");
                } else if (response == "not_taken") {
                    Tel_User_state = true;
                    $('#Tel_User').parent().removeClass();
                    $('#Tel_User').parent().addClass('form_success');
                    $('#Tel_User').siblings("span").text("Tel available");
                }
            }
        })
    });

    $('#Email_User').on('blur', function() {
        var Email_User = $('#Email_User').val();
        if (Email_User == '') {
            Email_User_state = false;
            return;
        }
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
                    $('#Email_User').siblings("span").text("Sorry... Email already taken");
                } else if (response == "not_taken") {
                    Email_User_state = true;
                    $('#Email_User').parent().removeClass();
                    $('#Email_User').parent().addClass('form_success');
                    $('#Email_User').siblings("span").text("Email available");
                }
            }
        })
    });

    $('#Pass_User, #Pass_User2').on('keyup', function() {
        if ($('#Pass_User').val() == $('#Pass_User2').val()) {
            Pass_User_state = true;

            $('#Pass_User2').siblings("span").text("Matching").css('color', 'green');
        } else
            $('#Pass_User2').siblings("span").text("No Matching").css('color', 'red');
    });

    $('#reg_btn').on("click", function(e) {
        var Tel_User = $("#Tel_User").val();
        var Email_User = $("#Email_User").val();
        var Pass_User = $("#Pass_User").val();
        var Name_User = $("#Name_User").val();
        if (Tel_User_state == false || Email_User_state == false || Pass_User_state == false) {
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
                success: function(response) {
                    alert('ลงทะเบียนสำเร็จ');
                    $('#Tel_User').val('');
                    $('#Email_User').val('');
                    $('#Pass_User').val('');
                    $('#Name_User').val('');
                    // header("location: index.php");
                }
            })
        }
    });

});