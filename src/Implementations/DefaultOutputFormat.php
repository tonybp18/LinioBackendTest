<?php
namespace Linio\Recruiting\Implementations;

use Linio\Recruiting\Interfaces\IOutputFormat;

/**
 * Implements the HTML output format.
 */
class DefaultOutputFormat implements IOutputFormat
{
	/**
     * @inheritdoc
     */
	public function print(array $array)
	{
		header("Content-type: text/html");

		foreach ($array as $value)
		{
			echo $value . " ";
		}
	}
}