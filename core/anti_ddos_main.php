<?php 
// تعریف متغییر های ثابت
define("SCRIPT_ROOT", dirname(__FILE__));
// تعداد درخواستهای صفحه مجاز برای کاربر
define("CONTROL_MAX_REQUESTS", 3);
// فاصله زمانی برای شروع شمارش درخواستهای صفحه (ثانیه)
define("CONTROL_REQ_TIMEOUT", 2);
// ثانیه ها برای مجازات کاربرانی که در انجام درخواست ها بیش از حد مجاز عمل کرده اند
define("CONTROL_BAN_TIME", 4);
// دایرکتوری قابل نوشتن برای نگهداری داده های اسکریپت
define("SCRIPT_TMP_DIR", SCRIPT_ROOT . "/core");
// !! نیازی به ویرایش در زیر این خط ندارید
define("USER_IP", getRealIpAddr());
define("CONTROL_DB", SCRIPT_TMP_DIR . "/log");
define("CONTROL_LOCK_DIR", SCRIPT_TMP_DIR . "/lock");
define("CONTROL_LOCK_FILE", CONTROL_LOCK_DIR . "/" . md5(USER_IP));
// مسیز ریدایرکت کاربر
define('REDIRECT_URL_DENIDE', 'denide.php');

// ساخت دایرکتوری
@mkdir(CONTROL_LOCK_DIR);
@mkdir(SCRIPT_TMP_DIR);

function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) //بررسی IP از اشتراک اینترنت
    {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    //to check ip is pass from proxy
    {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}