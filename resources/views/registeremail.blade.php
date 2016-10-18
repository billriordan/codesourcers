<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">


    </head>
    <body>
        <h2>Verify your Email Address </h2>

        <div>
            <p> Thanks for signing up with CodeSourcers. Please follow the link below to verify your email address {{URL::to('register/verify/' . $confirmation_code) }}. </p>
    </body>
</html>