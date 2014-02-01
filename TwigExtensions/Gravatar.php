<?php
namespace Aqarmap\Bundle\UtilityBundle\TwigExtensions;

/**
 * Gravatar
 * Extension for Twig
 *
 * @author  Khaled Attia <khaled.attia@googlemail.com>
 */
class Gravatar extends \Twig_Extension
{
    const GRAVATAR_URL = "https://www.gravatar.com/avatar/";

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('gravatar', array($this, 'getGravatarImage')),
        );
    }

    /**
     * Get Gravatar URL for a specified email address.
     *
     * @param   string  $email          The email address
     * @param   string  $size           Size in pixels, defaults to 128px [ 1 - 2048 ]
     * @param   mixed   $defaultImage   Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
     * @param   string  $rating         Maximum rating (inclusive) [ g| pg | r | x ]
     * @return  string
     */
    public function getGravatarImage($email, $size = 128, $defaultImage = NULL, $rating = 'G')
    {
        $query_data = array(
            's' => $size,
            'd' => $defaultImage,
            'r' => $rating
        );

        return self::GRAVATAR_URL . md5(trim(strtolower($email))) .'?'. http_build_query($query_data);
    }

    public function getName()
    {
        return 'gravatar';
    }
}
