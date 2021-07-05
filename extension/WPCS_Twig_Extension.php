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
     * Returns a list of functions to add to the existing list.
     *
     * @return \Twig\TwigFunction[]
     */
    public function getFunctions(){
        return [
            new TwigFunction('scan_file', [$this, 'scan_file'])
            // or
            // new TwigFunction('scan_file', 'WPCS_Twig_Extension::scan_file'),
        ];
	}

    public function getName()
    {
        return 'wpcs_twig_extension';
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