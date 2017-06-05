<?php
namespace Linio\Recruiting;

// Require composer autoloader
require __DIR__ . '/vendor/autoload.php';

use Linio\Recruiting\Service\BackendChallenge;

use Linio\Recruiting\Interfaces\IOutputFormat;

use Linio\Recruiting\Implementations\DefaultOutputFormat;
use Linio\Recruiting\Implementations\JsonOutputFormat;
use Linio\Recruiting\Implementations\XmlOutputFormat;

// Query string definition "limit" 
$_GET += array('limit' => 100);

// Query string definition "output_format" 
$_GET += array('output_format' => null);

// Choosing an output format according to the "output_format" query string 
switch( $_GET['output_format'] )
{
	case "json":
		$outputFormat = new JsonOutputFormat;
		break;

	case "xml":
		$outputFormat = new XmlOutputFormat;
		break;

	default:
		$outputFormat = new DefaultOutputFormat;
}

$backendChallenge = new BackendChallenge($outputFormat);

$backendChallenge->printChallenge($_GET['limit']);

?>