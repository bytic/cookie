<?php

namespace Nip\Cookie;

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
     * @return self
     */
    public static function instance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
