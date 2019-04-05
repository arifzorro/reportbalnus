<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php assets('img/favicon.png'); ?>">

    <title>Login</title>
    <link rel="stylesheet" href="<?php mix('css/app.login.css'); ?>">
</head>

<body>

<div class="container">
    <?php if (isset($message)): ?>
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $message; ?>
        </div>
    <?php endif; ?>
    <form class="form-signin" method="post" action="<?php route('autentikasi/login'); ?>">
        <h2 class="form-signin-heading">Please login</h2>
        <label for="username" class="sr-only">Username</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    </form>
</div> <!-- /container -->
<script src="<?php mix('js/app.login.js'); ?>"></script>
</body>
</html>