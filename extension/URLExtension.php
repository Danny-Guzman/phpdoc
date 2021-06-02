<?php
/**
 * Twig Custom Extensions for phpDocumentor
 *
 * PHP Version 7.4.9
 *
 * @package    PhpDocumentor
 * @subpackage Twig\Plugin
 * @author     Danny Guzman <guzmanjd86@gmail.com>
 */
declare(strict_types=1);

namespace caweb\phpdoc\Twig\Plugin\;

use \ArrayIterator;
use phpDocumentor\Descriptor\Collection;
use phpDocumentor\Descriptor\DescriptorAbstract;

/**
 * Custom Extension adding phpDocumentor specific functionality for Twig templates.
 *
 * Additional functions:
 * - url_get_params(): Get URL $_GET params.
 *
 *
 * @package    PhpDocumentor
 * @subpackage Twig\Plugin
 * @author     Danny Guzman <guzmanjd86@gmail.com>
 */
class CustomExtension extends \Twig\Extension\AbstractExtension
{
    /**
     * Returns a listing of all functions that this extension adds.
     *
     * This method is automatically used by Twig upon registering this extension (which is done automatically
     * by phpDocumentor) to determine an additional list of functions.
     *
     * @return \Twig_FunctionInterface[]
     */
    public function getFunctions() : array
    {
        return array(
            new \Twig\TwigFunction('url_get_params', array($this, 'url_get_params')),
        );
    }

    /**
     * Returns a list of all filters that are exposed by this extension.
     *
     * @return \Twig_SimpleFilter[]
     */
    public function getFilters() : array
    {

    }

    /**
     * Get source code with sintaxis highlight
     *
     * @param $source String Source code
     *
     * @return string Source code with sintaxis highlight
     */
    public function url_get_params($key) : array
    {
        return isset( $_GET[$key] ) ? $_GET[$key] : $_GET;
    }

}