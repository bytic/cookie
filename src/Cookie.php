<?php

namespace Bytic\Cookie;

class Cookie extends \Symfony\Component\HttpFoundation\Cookie
{
    /**
     * @param $value
     * @return $this
     */
    public function setValue($value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @param $domain
     * @return $this
     */
    public function setDomain($domain): self
    {
        $this->domain = $domain;

        return $this;
    }

    public function setPath($path): self
    {
        $this->path = $path;

        return $this;
    }

    public function setExpire($expire)
    {
        $this->expire = $expire;

        return $this;
    }

    /**
     * @return int
     */
    public function getExpire()
    {
        return $this->getExpiresTime();
    }

    public function setExpireTimer($expires)
    {
        $this->expire = time() + $expires;

        return $this;
    }

    public function setSecured($secured)
    {
        $this->secure = $secured;

        return $this;
    }

    /**
     * @return bool
     */
    public function isExpired(): bool
    {
        if (is_int($this->expire) && $this->expire < time()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return bool
     */
    public function save(): bool
    {
        $domain = ($this->getDomain() != 'localhost') ? $this->getDomain() : false;

        return setcookie(
                $this->getName(),
                $this->getValue(),
                $this->getExpire(),
                $this->getPath(),
                $domain,
                $this->isSecure());
    }
}
