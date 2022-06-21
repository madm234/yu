<?php
function pr($arr)
{
    echo "<pre";
    print_r($arr);
}

function prx($arr)
{
    echo "<pre";
    print_r($arr);
    die();
}

function get_safe_value($str)
{
    global $con;
    if($str!='')
    return mysqli_real_escape_string($con,$str);
}

function redirect($link)
{
    ?>
    <script>
        window.location.href='<?php echo $link?>'
        </script>
    <?php

}

function auth()
{
    if(!isset($_SESSION['QR_USER_LOGIN']))
    {
        redirect("index.php");
    }
}

function admin_auth()
{
    if($_SESSION['QR_USER_ROLE']==1)
    {
        redirect("profile.php");
    }
}
 ?>