 <?php
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

    function lockUser()
    {
        session_start();
        if (isset($_SESSION['views'])) {
            $_SESSION['views'] = $_SESSION['views'] + 1;
        } else {
            $_SESSION['views'] = 1;
        }
        // 
        if ($_SESSION['views'] >= 4) {
            echo "aaaaaaaaaaaaaaaaaaa";
        }else {
            echo "sssssssssssssssssssss";
        }
    }
lockUser();