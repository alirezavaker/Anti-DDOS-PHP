<?php
class antiDdosCore
{
    private $getRealIpAddr;
    private $Redirect;
    private $checkRequestUser;
    private $antiflood_countaccess;

    public function __construct($getRealIpAddr, $Redirect, $checkRequestUser, $antiflood_countaccess)
    {
        $this->getRealIpAddr = $getRealIpAddr;
        $this->Redirect = $Redirect;
        $this->checkRequestUser = $checkRequestUser;
        $this->antiflood_countaccess = $antiflood_countaccess;
    }

    public function getRealIpAddr()
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
        return $this->getRealIpAddr;
    }
    // هدایت کاربر
    public  function Redirect($permanent = false)
    {
        $url = REDIRECT_URL_DENIDE;
        if (headers_sent() === false) {
            header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
        }

        exit();
        return $this->Redirect;
    }
    public function checkRequestUser()
    {
        if (file_exists(CONTROL_LOCK_FILE)) {
            if (time() - filemtime(CONTROL_LOCK_FILE) > CONTROL_BAN_TIME) {
                // این کاربر مجازات خود را کامل کرده است
                unlink(CONTROL_LOCK_FILE);
            } else {
                // درخواست های زیاد

                touch(CONTROL_LOCK_FILE);
                die();
            }
        }
        return $this->checkRequestUser;
    }

    public function antiflood_countaccess()
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
        return $this->antiflood_countaccess;
    }
}
