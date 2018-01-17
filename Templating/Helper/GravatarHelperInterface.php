<?php

namespace Ornicar\GravatarBundle\Templating\Helper;

interface GravatarHelperInterface
{
    /**
     * Returns a url for a gravatar.
     *
     * @param string $email
     * @param int    $size
     * @param string $rating
     * @param string $default
     * @param bool   $secure
     *
     * @return string
     */
    public function getUrl($email, $size = null, $rating = null, $default = null, $secure = true);

    /**
     * Returns a url for a gravatar for a given hash.
     *
     * @param string $hash
     * @param int    $size
     * @param string $rating
     * @param string $default
     * @param bool   $secure
     *
     * @return string
     */
    public function getUrlForHash($hash, $size = null, $rating = null, $default = null, $secure = true);

    /**
     * Returns a url for a gravatar profile.
     *
     * @param string $email
     * @param bool   $secure
     *
     * @return string
     */
    public function getProfileUrl($email, $secure = true);

    /**
     * Returns a url for a gravatar profile, for the given hash.
     *
     * @param string $hash
     * @param bool   $secure
     *
     * @return string
     */
    public function getProfileUrlForHash($hash, $secure = true);

    /**
     * Returns true if a avatar could be found for the email.
     *
     * @param string $email
     *
     * @return bool
     */
    public function exists($email);
}
