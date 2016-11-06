<?php
namespace Aqarmap\Bundle\UtilityBundle\Text;

class Text
{
    public static function toList($list, $and = 'and', $separator = ', ')
    {
        if( count($list) > 1 ) {
            return implode($separator, array_slice($list, NULL, -1)) .' '. $and .' '. array_pop($list);
        }
        else {
            return array_pop($list);
        }
    }
}
