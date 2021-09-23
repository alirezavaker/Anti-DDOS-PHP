<?php

class runDdosDefender extends antiDdosCore
{
    public function run()
    {
        // تعریف متغییر های ثابت
        define("SCRIPT_ROOT", dirname(__FILE__));
        // تعداد درخواستهای صفحه مجاز برای کاربر
        define("CONTROL_MAX_REQUESTS", 3);
        // فاصله زمانی برای شروع شمارش درخواستهای صفحه (ثانیه)
        define("CONTROL_REQ_TIMEOUT", 2);
        // ثانیه ها برای مجازات کاربرانی که در انجام درخواست ها بیش از حد مجاز عمل کرده اند
        define("CONTROL_BAN_TIME", 4);
        // دایرکتوری قابل نوشتن برای نگهداری داده های اسکریپت
        define("SCRIPT_TMP_DIR", SCRIPT_ROOT . "/repository");
        // نیازی به ویرایش در زیر این خط ندارید
        $userIP = new $this->getRealIpAddr;
        define("USER_IP",  $userIP);
        define("CONTROL_DB", SCRIPT_TMP_DIR . "/log");
        define("CONTROL_LOCK_DIR", SCRIPT_TMP_DIR . "/lock");
        define("CONTROL_LOCK_FILE", CONTROL_LOCK_DIR . "/" . md5(USER_IP));
        // مسیز ریدایرکت کاربر
        define('REDIRECT_URL_DENIDE', 'denide.php');

        // ساخت دایرکتوری
        @mkdir(CONTROL_LOCK_DIR);
        @mkdir(SCRIPT_TMP_DIR);

        session_start();
        // session_unset();

        //گرفتن آی پی و ذخیره آن در فایل

        if (isset($_SESSION['views'])) {
            $_SESSION['views'] = $_SESSION['views'] + 1;
        } else {
            $_SESSION['views'] = 1;
        }
        // 
        echo $_SESSION['views'];

        if ($_SESSION['views'] > 4 && strpos($_SERVER['REMOTE_ADDR'], "127.0.0.1") === 0) {
            echo "blocked";
            die();
        } else {
            # code...
        }
    }
}
