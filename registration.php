<?php include_once 'database/link.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/registration.css">
    <title>Registration</title>
</head>

<body>

<form class="form-signin col-10 col-lg-8 bg-secondary p-3 rounded" action="register.php" method="post">
    <h1 class="h3 mb-3 font-weight-normal text-center">Register new account</h1>

    <p id="existingChecker" class="bg-warning text-center"></p>

    <div class="input-group input-group-lg flex-nowrap mt-3">
        <div class="input-group-prepend col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 p-0">
            <label for="email" class="input-group-text container-fluid">Email</label>
        </div>
        <input type="email" id="email" class="form-control" name="email" placeholder="Email" required autofocus>
    </div>

    <div class="input-group input-group-lg flex-nowrap mt-3">
        <div class="input-group-prepend col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 p-0">
            <label for="username" class="input-group-text container-fluid">Username</label>
        </div>
        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
    </div>

    <div class="input-group input-group-lg flex-nowrap mt-3">
        <div class="input-group-prepend col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 p-0">
            <label for="password" class="input-group-text container-fluid">Password</label>
        </div>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
    </div>

    <div class="input-group input-group-lg flex-nowrap mt-3">
        <div class="input-group-prepend col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 p-0">
            <label for="re-password" class="input-group-text container-fluid">Re-password</label>
        </div>
        <input type="password" id="re-password" class="form-control" placeholder="Rewrite password" required>
    </div>

    <button id="register" class="btn btn-lg btn-primary btn-block mt-3" type="submit">Register</button>

</form>

<?php include_once 'includes/bootstrapScripts.php' ?>
<script>
    function validateEmail() {
        var email = $("#email").val();
        var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
        if (reg.test(email)) {
            return true;
        } else {
            return false;
        }
    }

    $(document).ready(function () {

        var freeEmail = false;
        var freeUsername = false;
        $('#email').blur(function () {
            $.ajax('scripts/checkEmail.php', {
                type: 'POST',
                data: {
                    email: $('#email').val()
                },
                accepts: 'application/json; charset=utf-8',
                success: function (data) {
                    if (data.reserved) {
                        $('#existingChecker').addClass('text-danger');
                        $('#existingChecker').removeClass('text-success');
                        freeEmail = false;
                    } else {
                        $('#existingChecker').addClass('text-success');
                        $('#existingChecker').removeClass('text-danger');
                        freeEmail = true;
                    }
                    $('#existingChecker').html(data.message);
                }
            });
        });

        $('#username').blur(function () {
            $.ajax('scripts/checkUsername.php', {
                type: 'POST',
                data: {
                    username: $('#username').val()
                },
                accepts: 'application/json; charset=utf-8',
                success: function (data) {
                    if (data.reserved) {
                        $('#existingChecker').addClass('text-danger');
                        $('#existingChecker').removeClass('text-success');
                        freeUsername = false;
                    } else {
                        $('#existingChecker').addClass('text-success');
                        $('#existingChecker').removeClass('text-danger');
                        freeUsername = true;
                    }
                    $('#existingChecker').html(data.message);
                }
            });
        });

        $('#register').on('click', function () {
            var email = $('#email').val();
            var username = $('#username').val();
            var password = $('#password').val();
            var rePass = $('#re-password').val();

            if(jQuery.isEmptyObject(email) || jQuery.isEmptyObject(username) || jQuery.isEmptyObject(password)){
                event.preventDefault();
                alert("Some data is empty.");
            }
            else if (password != rePass) {
                event.preventDefault();
                $('#register').removeClass('btn-primary');
                $('#register').addClass('btn-danger');
                alert('Passwords must be equally!');
            } else if (!freeEmail || !freeUsername) {
                event.preventDefault();
                let error = "";
                if (!freeEmail) error += 'Email is already taken.';
                if (!freeUsername) error += '\nUsername is already taken.';
                alert(error);
            }
            else if(!validateEmail()){
                event.preventDefault();
                alert('Incorrect email.');
            }
            else {
                $.ajax('register.php', {
                    type: 'POST',
                    data: {
                        email: email,
                        username: username,
                        password: password
                    }
                });
            }
        });

        $('#re-password').on('keyup', function () {
            var pass = $('#password').val();
            var rePass = $('#re-password').val();
            if (pass == rePass) {
                $('#register').removeClass('btn-danger');
                $('#register').addClass('btn-primary');
            }
        });

        $('#password').on('keyup', function () {
            var pass = $('#password').val();
            var rePass = $('#re-password').val();
            if (pass == rePass) {
                $('#register').removeClass('btn-danger');
                $('#register').addClass('btn-primary');
            }
        });
    });
</script>
</body>
</html>