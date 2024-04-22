<?php

namespace Nip\Cookie;

use Bytic\Cookie\CookieJar;

use function Bytic\Cookie\cookieJar;

class Jar extends \Bytic\Cookie\CookieJar
{


    /**
     * Singleton.
     *
     * @return CookieJar
     */
    public static function instance()
    {
        return cookieJar();
    }
}
