<?php
namespace Linio\Recruiting\Implementations;

use Linio\Recruiting\Interfaces\IOutputFormat;

/**
 * Implements the XML output format.
 */
class XmlOutputFormat implements IOutputFormat
{
	/**
     * @inheritdoc
     */
	public function print(array $array)
	{
		header("Content-type: text/xml");

		$domDocument = new \DOMDocument('1.0', "UTF-8");
		
		//$domDocument->formatOutput = true;

		$root = $domDocument->createElement('root');
		$root = $domDocument->appendChild($root);

		foreach ($array as $key => $value)
		{
			$itemTag = $domDocument->createElement('item');
			$itemTag = $root->appendChild($itemTag);

			$domAttribute = $domDocument->createAttribute('key');
			$domAttribute->value = $key;
			$itemTag->appendChild($domAttribute);

			$text = $domDocument->createTextNode($value);
			$text = $itemTag->appendChild($text);
		}

		echo $domDocument->saveXML();
	}
}