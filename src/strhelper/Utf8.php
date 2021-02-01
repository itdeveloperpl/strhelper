<?php
/**
 * @author Bartosz Bielecki <bartosz.bielecki at itdeveloper.pl>
 */
namespace itdeveloperpl\strhelper;

class Utf8
{

    public static function ucfirst($str)
    {
        if (mb_check_encoding($str, 'UTF-8')) {
            return mb_convert_case($str, MB_CASE_TITLE, "UTF-8");
        } else {
            return $str;
        }
    }

    public static function stripped_string_to_url_path(string $str): string
    {
        $replace = [
            '/\'||\,|\!|\@|\?|\#|\$|\%|\^|\&|\*|\(|\)|(\r\n)|\:|\;|\[|\]/' => '',
            '/ /' => '_',
            '/ /' => '_',
            '/ę/' => 'e',
            '/ó/' => 'o',
            '/ą/' => 'a',
            '/ś/' => 's',
            '/ł/' => 'l',
            '/ż/' => 'z',
            '/ź/' => 'z',
            '/ć/' => 'c',
            '/ń/' => 'n',
            '/ń/' => 'n'
        ];

        return preg_replace(array_keys($replace), array_values($replace), $str);
    }

    /**
     * Converts string with stripping from special characters and from polish
     * characters
     * @param string $str
     * @return string
     */
    public static function stripped_string_to_alfanum(string $str): string
    {
        $replace = [
            '/\'|\.|\,|\!|\@|\?|\#|\$|\%|\^|\&|\*|\(|\)|(\r\n)|\:|\;|\[|\]/' => '',
            '/ /' => '_',
            '/ /' => '_',
            '/ę/' => 'e',
            '/ó/' => 'o',
            '/ą/' => 'a',
            '/ś/' => 's',
            '/ł/' => 'l',
            '/ż/' => 'z',
            '/ź/' => 'z',
            '/ć/' => 'c',
            '/ń/' => 'n',
            '/ń/' => 'n'
        ];

        return preg_replace(array_keys($replace), array_values($replace),
            mb_strtolower($str));
    }

    /**
     * Converts string with stripping from special characters and from polish
     * characters and from numbers
     * @param string $str
     * @return string
     */
    public static function stripped_string_to_alfa($str): string
    {
        $replace = [
            '/\'|\.|\,|\!|\@|\?|\#|\$|\%|\^|\&|\*|\(|\)|(\r\n)|\:|\;|\[|\]/' => '',
            '/ /' => '_',
            '/ /' => '_',
            '/ę/' => 'e',
            '/ó/' => 'o',
            '/ą/' => 'a',
            '/ś/' => 's',
            '/ł/' => 'l',
            '/ż/' => 'z',
            '/ź/' => 'z',
            '/ć/' => 'c',
            '/ń/' => 'n',
            '/ń/' => 'n',
            '/1/' => '',
            '/2/' => '',
            '/3/' => '',
            '/4/' => '',
            '/5/' => '',
            '/6/' => '',
            '/7/' => '',
            '/8/' => '',
            '/9/' => '',
            '/0/' => '',
        ];

        return preg_replace(array_keys($replace), array_values($replace),
            mb_strtolower($str));
    }

    /**
     * Converts string with stripping from special characters and from polish
     * characters and from numbers
     * @param string $str
     * @return string
     */
    public static function strip_tags($str): string
    {
        $replace = [
            // '/\<p\>/' => '<br/>',
            // '/\<\/p\>/'=>'',
            '/\&nbsp\;/' => '',
            '/\&ndash\;/' => '-',
            '/\&oacute\;/' => 'ó',
        ];
        return preg_replace(array_keys($replace), array_values($replace),
            $str);
    }
}
