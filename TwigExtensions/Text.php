<?php
namespace Aqarmap\Bundle\UtilityBundle\TwigExtensions;

/**
 * Text
 * Extension for Twig
 */
class Text extends \Twig_Extension
{

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('chunk_pad', array($this, 'chunkPad')),
        );
    }

    /**
     * Chunk Pad
     * Pad a string to a certain length with another
     * string and split it into smaller chunks.
     * example: 1453 -> 000-001-453
     *
     * @author  Khaled Attia <khaled.attia@googlemail.com>
     *
     * @param   string  $input
     * @param   int     $chunk_length
     * @param   string  $chunk_string
     * @param   int     $pad_length
     * @param   string  $pad_string
     *
     * @return  string
     */
    public function chunkPad($input, $chunk_length = 3, $chunk_string = '-', $pad_length = 9, $pad_string = '0')
    {
        $input = str_pad($input, $pad_length, $pad_string, STR_PAD_LEFT);
        $input = chunk_split($input, $chunk_length, $chunk_string);
        return rtrim($input, $chunk_string);
    }

    public function getName()
    {
        return 'string';
    }
}
