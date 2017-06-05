<?php
namespace Linio\Recruiting\Interfaces;

/**
 * (Strategy Pattern Design)
 * The implementation is responsible for formatting the data and printing it.
 */
interface IOutputFormat
{
	/**
	 * Prints the array data in a specific format.
     * @param array $array Array to print.
     */
    public function print(array $array);
}