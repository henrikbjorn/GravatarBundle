<?php

namespace Ornicar\GravatarBundle\Templating\Helper;

interface GravatarHelperInterface
{
    /**
     * Returns a url for a gravatar.
     *
     * @param string  $email
     * @param int     $size
     * @param string  $rating
     * @param string  $default
     * @param Boolean $secure
     *
     * @return string
     */
    public function getUrl($email, $size = null, $rating = null, $default = null, $secure = null);

    /**
     * Returns a url for a gravatar for a given hash.
     *
     * @param string  $hash
     * @param int     $size
     * @param string  $rating
     * @param string  $default
     * @param Boolean $secure
     *
     * @return string
     */
    public function getUrlForHash($hash, $size = null, $rating = null, $default = null, $secure = null);

    /**
     * Returns a url for a gravatar profile.
     *
     * @param string  $email
     * @param Boolean $secure
     *
     * @return string
     */
    public function getProfileUrl($email, $secure = null);

    /**
     * Returns a url for a gravatar profile, for the given hash.
     *
     * @param string  $hash
     * @param Boolean $secure
     *
     * @return string
     */
    public function getProfileUrlForHash($hash, $secure = null);

    /**
     * Returns true if a avatar could be found for the email.
     *
     * @param string $email
     *
     * @return Boolean
     */
    public function exists($email);
}
