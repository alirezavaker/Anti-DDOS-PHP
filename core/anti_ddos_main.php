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
define("SCRIPT_TMP_DIR", SCRIPT_ROOT . "/repository");
// نیازی به ویرایش در زیر این خط ندارید
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
// هدایت کاربر
function Redirect($permanent = false)
{
    $url = REDIRECT_URL_DENIDE;
    if (headers_sent() === false) {
        header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }

    exit();
}

if (file_exists(CONTROL_LOCK_FILE)) {
    if (time() - filemtime(CONTROL_LOCK_FILE) > CONTROL_BAN_TIME) {
        // این کاربر مجازات خود را کامل کرده است
        unlink(CONTROL_LOCK_FILE);
    } else {
        // درخواست های زیاد
        Redirect();
        touch(CONTROL_LOCK_FILE);
        die();
    }
}

function antiflood_countaccess()
{
    //شمارش درخواست ها و آخرین زمان دسترسی
    $control = array();

    if (file_exists(CONTROL_DB)) {
        $fh = fopen(CONTROL_DB, "r");
        $control = array_merge($control, unserialize(fread($fh, filesize(CONTROL_DB))));
        fclose($fh);
    }

    if (isset($control[USER_IP])) {
        if (time() - $control[USER_IP]["t"] < CONTROL_REQ_TIMEOUT) {
            $control[USER_IP]["c"]++;
        } else {
            $control[USER_IP]["c"] = 1;
        }
    } else {
        $control[USER_IP]["c"] = 1;
    }
    $control[USER_IP]["t"] = time();

    if ($control[USER_IP]["c"] >= CONTROL_MAX_REQUESTS) {
        // این کاربر درخواستهای زیادی را در مدت زمان بسیار کوتاهی انجام داد
        $fh = fopen(CONTROL_LOCK_FILE, "w");
        fwrite($fh, USER_IP);
        fclose($fh);
    } 

    //نوشتن جدول کنترل به روز شده
    $fh = fopen(CONTROL_DB, "w");
    fwrite($fh, serialize($control));
    fclose($fh);
    
}
antiflood_countaccess();
