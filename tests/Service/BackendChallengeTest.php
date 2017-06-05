<?php
namespace Linio\Recruiting\Service;

use Linio\Recruiting\Implementations\DefaultOutputFormat;
use Linio\Recruiting\Implementations\JsonOutputFormat;
use Linio\Recruiting\Implementations\XmlOutputFormat;

/**
 * @package Linio\Recruiting\Service
 * @coversDefaultClass \Linio\Recruiting\Service\BackendChallenge
 */
class BackendChallengeTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @covers ::__construct
	 */
	public function test_construct_not_null()
    {
    	$backendChallenge = new BackendChallenge(new DefaultOutputFormat);
    	
    	$this->assertNotNull($backendChallenge);
    }

    /**
	 * @covers ::__construct
	 * @expectedException \TypeError
	 */
	public function test_construct_must_recive_an_IOutputFormat_implementation()
    {
    	$backendChallenge = new BackendChallenge();    	
    }
}
