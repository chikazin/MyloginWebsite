<?php
function passwdCrypt($psw)
{
    $psw = md5($psw);
    $salt = substr($psw, -2, 6);
    $psw = crypt($psw, $salt);
    return $psw;
}
