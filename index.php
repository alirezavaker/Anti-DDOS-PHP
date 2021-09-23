<?php include_once 'core/anti_ddos_main.php'; ?>
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
    <h1 class="title">
     <span class="Raleway">
          DDOS Protection
     </span>
      فعال است !
    </h1>
    <!-- Loading -->
    <div id="loading" class="loadingio-spinner-ellipsis-h9tj8pt7aoa ltr">
      <div class="ldio-a538nmc72j5">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
      </div>
    </div>
    
    <!-- Timer -->
        <div id=""></div>
        <div id=""></div>
    <!-- Timer -->

    <!-- Loading -->
    <h3 class="sub_title">IP : <span id="r_ip"><?php  $_SERVER['REMOTE_ADDR'];?></span></h3>
    <p>لطفاً برای گذراندن مرحله حفاظتی بر روی لینک زیر را کلیک کنید</p>
    <!-- آدزس همین صفحه یعنی DDOS -->
    <a href="#" id="link_pass"> ادامه </a>
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
  </body>
</html>
