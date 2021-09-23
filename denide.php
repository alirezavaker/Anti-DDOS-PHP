 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>

    <!-- Loading -->
    <h3 class="sub_title">IP : <span id="r_ip"><?php $_SERVER['REMOTE_ADDR']; ?></span></h3>
     
    <P>
        به دلیل ارسال بیش از حد درخواست به سمت سورر به صورت موقت برای مدت معینی مسدود شده اید.
    </P>
    <p>
        لطفا بعدا تلاش کنید.
    </p>
    <div class="timer">
        <span id="minutes"></span>
        <span id="seconds"></span>
    </div>
    <p>
         
        DDoS protection Created by <a href="https://github.com/attackeralireza/" class="git" target="_blank">AttackerAlireza</a>
    </p>
    <p>License MIT - copy right - <span id="year"></span></p>
    <!-- Script -->
 
    <script src="assets/js/redirect.js"></script>
</body>

</html>
