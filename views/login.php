<!doctype html>
<html lang="en" class="bootstap-login">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Signin for Toppers</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body class="text-center bootstap-login-body">
    <form class="form-signin" method="post" action="/home">
        <img class="mb-4" src="images/letter_t.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Sign in for Toppers</h1>
        <label for="username" class="sr-only">Email address</label>
        <input type="text" id="inputEmail" class="form-control" placeholder="username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <!-- <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p> -->
    </form>
</body>

</html>