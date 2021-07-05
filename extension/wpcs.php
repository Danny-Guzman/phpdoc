<?php

namespace CAWeb\Twig;

$vendorDir = dirname(dirname(dirname(__DIR__)));

require_once $vendorDir . '/autoload.php';

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use phpDocumentor\Transformer\Writer\Twig\ExtensionInterface;

class WPCS_Twig_Extension extends AbstractExtension implements ExtensionInterface
{
    /**
     * Returns the token parser instances to add to the existing list.
     *
     * @return \Twig\TokenParser\TokenParserInterface[]
     */
    public function getTokenParsers(){

	}

    /**
     * Returns the node visitor instances to add to the existing list.
     *
     * @return \Twig\NodeVisitor\NodeVisitorInterface[]
     */
    public function getNodeVisitors(){

	}

    /**
     * Returns a list of filters to add to the existing list.
     *
     * @return \Twig\TwigFilter[]
     */
    public function getFilters(){

	}

    /**
     * Returns a list of tests to add to the existing list.
     *
     * @return \Twig\TwigTest[]
     */
    public function getTests(){

	}

    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return \Twig\TwigFunction[]
     */
    public function getFunctions(){
        return [
            new TwigFunction('scan_file', ['WPCS_Twig_Extension', 'scan_file']),
            // or
            new TwigFunction('scan_file', 'WPCS_Twig_Extension::scan_file'),
        ];
	}

    /**
     * Returns a list of operators to add to the existing list.
     *
     * @return array<array> First array of unary operators, second array of binary operators
     */
    public function getOperators(){

	}
    public function getName()
    {
        return 'caweb_wpcs';
    }

    public function scan_file($file){
        return $file;
    }
}
$loader = new FilesystemLoader( $vendorDir . '\caweb\phpdoc');
$twig = new Environment($loader, [
    'debug' => true,
    'auto_reload' => true
]);

$twig->addExtension(new WPCS_Twig_Extension());
?>