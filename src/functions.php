<?php

namespace Bytic\Cookie;


/**
 * @param $name
 * @param $value
 * @param $time
 * @param $path
 * @param $domain
 * @param $secure
 * @param $httpOnly
 * @param $raw
 * @param $sameSite
 * @return CookieJar|Cookie|\Symfony\Component\HttpFoundation\Cookie|null
 */
function cookie($name = null, $value = null, $time = null, $path = null, $domain = null, $secure = null, $httpOnly = true, $raw = false, $sameSite = null)
{
    $cookieJar = cookieJar();
    if (is_null($name)) {
        return $cookieJar;
    }
    return $cookieJar->make($name, $value, $time, $path, $domain, $secure, $httpOnly, $raw, $sameSite);
}

function cookieJar()
{
    static $cookieJar = null;
    if ($cookieJar === null) {
        $cookieJar = new CookieJar();
    }
    return $cookieJar;
}