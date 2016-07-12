<?php

namespace Markenwerk\JsonPrettyPrinter;

/**
 * Class JsonPrettyPrinterTest
 *
 * @package Markenwerk\JsonPrettyPrinter
 */
class JsonPrettyPrinterTest extends \PHPUnit_Framework_TestCase
{

	public function testPrettyPrint()
	{
		$json = file_get_contents(__DIR__ . '/source.json');
		$object = json_decode($json);
		$jsonString = json_encode($object);
		$prettyPrinter = new JsonPrettyPrinter();
		$result = $prettyPrinter
			->setIndentationString('  ')
			->prettyPrint($jsonString);
		$expected = file_get_contents(__DIR__ . '/result.json');
		$this->assertEquals($expected, $result);
	}

}
