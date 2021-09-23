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
    <p>لطفاً برای گذراندن مرحله حفاظتی بر روی لینک زیر را کلیک کنید</p>
    <a href="#" id="link_pass"> link </a>
    <p>
        یا بعد از 5 ثانیه به صورت خودکار به صفحه درخواستی هدایت می شوید. برای
        ادامه کار با وب سایت ، لطفاً مطمئن شوید که <span class="jsred">جاوا اسکریپت</span> را فعال کرده اید.
    </p>
    <p>
        DDoS protection Created by <a href="https://github.com/attackeralireza/" class="git" target="_blank">AttackerAlireza</a>
    </p>
    <p>License MIT - copy right - <span id="year"></span></p>
    <!-- Script -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/redirect.js"></script>
</body>

</html>