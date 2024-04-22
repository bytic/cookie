<?php

namespace Nip\Cookie;

use Bytic\Cookie\CookieJar;

use function Bytic\Cookie\cookieJar;

class Jar extends \Bytic\Cookie\CookieJar
{
    /**
     * @return Cookie
     * @deprecated use make
     */
    public function newCookie($name, $value)
    {
        return $this->make($name, $value);
    }

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
