<?php
namespace Linio\Recruiting\Implementations;

use Linio\Recruiting\Interfaces\IOutputFormat;

/**
 * Implements the JSON output format.
 */
class JsonOutputFormat implements IOutputFormat
{
	/**
     * @inheritdoc
     */
	public function print(array $array)
	{
		header("Content-type: application/json");

		echo json_encode($array, null);
	}
}