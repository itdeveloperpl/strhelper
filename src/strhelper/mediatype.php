<?php
/**
 * @author Bartosz Bielecki <bartosz.bielecki at itdeveloper.pl>
 */
namespace itdeveloperpl\strhelper;

class Mediatype
{
    const types = [
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'gif' => 'image/gif',
        'png' => 'image/png',
        'css' => 'text/css',
        'csv' => 'text/csv',
        'html' => 'text/html',
        'xhtml' => 'application/xhtml+xml',
        'otf' => 'application/vnd.ms-opentype',
        'ttf' => 'application/x-font-ttf',
        'js' => 'text/javascript',
    ];

    /**
     * @param string $string
     * @return string
     */
    public static function getMediaType($string)
    {
        $pathinfo = pathinfo($string);
        if (false === array_key_exists('extension', $pathinfo)) {
            return null;
        }
        $extension = strtolower($pathinfo['extension']);

        return array_key_exists($extension, self::types) ? self::types[$extension] : false;
    }
}
