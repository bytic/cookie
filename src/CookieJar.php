<?php

namespace Bytic\Cookie;

use Nip\Cookie\Cookie;

/**
 *
 */
class CookieJar
{
    /**
     * The default path (if specified).
     *
     * @var string
     */
    protected $path = '/';

    /**
     * The default domain (if specified).
     *
     * @var string|null
     */
    protected $domain;

    /**
     * The default secure setting (defaults to null).
     *
     * @var bool|null
     */
    protected $secure;

    protected $expireTimer = 6 * 60 * 60;

    /**
     * The default SameSite option (defaults to lax).
     *
     * @var string
     */
    protected $sameSite = 'lax';

    public function __construct()
    {
        $this->initDefaults();
    }

    /**
     * @return Cookie
     * @deprecated use make
     */
    public function newCookie($name = null, $value = null)
    {
        $name = $name ?: 'cookie' . microtime();
        return $this->make($name, $value);
    }

    /**
     * Create a new cookie instance.
     *
     * @param string $name
     * @param string $value
     * @param int $time
     * @param string|null $path
     * @param string|null $domain
     * @param bool|null $secure
     * @param bool $httpOnly
     * @param bool $raw
     * @param string|null $sameSite
     * @return \Symfony\Component\HttpFoundation\Cookie
     */
    public function make(
        $name,
        $value,
        $time = 0,
        $path = null,
        $domain = null,
        $secure = null,
        $httpOnly = true,
        $raw = false,
        $sameSite = null
    ) {
        $path = $path ?: $this->path;
        $domain = $domain ?: $this->domain;
        $secure = is_bool($secure) ? $secure : $this->secure;
        $sameSite = $sameSite ?: $this->sameSite;
        $time = $time ?: time() + $this->expireTimer;
        return new Cookie($name, $value, $time, $path, $domain, $secure, $httpOnly, $raw, $sameSite);
    }

    public function initDefaults()
    {
        $this->domain = $_SERVER['SERVER_NAME'];
    }

    /**
     * @param $defaults
     * @return void
     */
    public function setDefaults($defaults)
    {
        foreach ($defaults as $name => $value) {
            $this->setDefault($name, $value);
        }
    }

    /**
     * @param $name
     * @param $value
     * @return void
     */
    public function setDefault($name, $value = null)
    {
        if ($value !== null) {
            $this->{$name} = $value;
        }
    }
}
