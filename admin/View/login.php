<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--
    <link rel="stylesheet" href="http://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    -->
    
    <title>Login CMS</title>
    <link rel="stylesheet" href="/cms.wolf/admin/Assets/css/bootstrap.css">

    <script src=""></script>
    
</head>
<body>
    <div class="container" style="width: 30em;">
        <br><br>
        <form class="form-signin" role="form" method="POST" action="/cms.wolf/admin/auth/">
            <h2 class="form-signin-heading">Login to Wolf CMS</h2>
            <br>
            <input name="email" placeholder="Email" type="email" class="form-control" require autofocus value="">
            <br>
            <input name="pass" id="email" placeholder="Password" type="password" class="form-control" require value="">
            <br> 
            <label class="checkbox">
                <input type="checkbox" value="remem">
                Remember me
            </label>
            <br>
            <button type="submit" class="btn btn-lg btn-block btn-primary">Login</button>
        </form>
    </div>
</body>
</html>