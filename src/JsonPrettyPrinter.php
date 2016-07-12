<?php

namespace Markenwerk\JsonPrettyPrinter;

/**
 * Class JsonPretyPrinter
 *
 * Near mint solution for PHP < 5.4 found at [Stackoverflow](http://stackoverflow.com/a/9776726)
 *
 * @package Markenwerk\JsonPrettyPrinter
 */
class JsonPrettyPrinter
{

	/**
	 * @var string
	 */
	private $indentationString = "\t";

	/**
	 * @return string
	 */
	public function getIndentationString()
	{
		return $this->indentationString;
	}

	/**
	 * @param string $indentationString
	 * @return $this
	 */
	public function setIndentationString($indentationString)
	{
		$this->indentationString = $indentationString;
		return $this;
	}

	/**
	 * @param string $jsonString
	 * @return string
	 */
	public function prettyPrint($jsonString)
	{
		set_time_limit(20);
		$result = '';
		$pos = 0;
		$strLen = mb_strlen($jsonString);
		$newLine = PHP_EOL;
		$prevChar = '';
		$outOfQuotes = true;
		for ($i = 0; $i < $strLen; $i++) {
			// Grab the next character in the string
			$char = mb_substr($jsonString, $i, 1);

			if ($char == '"' && $prevChar != '\\') {
				// Are we inside a quoted string?
				$outOfQuotes = !$outOfQuotes;
			} else if (($char == '}' || $char == ']') && $outOfQuotes) {
				// If this character is the end of an element,
				// output a new line and indent the next line
				$result .= $newLine;
				$pos--;
				for ($j = 0; $j < $pos; $j++) {
					$result .= $this->indentationString;
				}
			} else if ($outOfQuotes && false !== mb_strpos(" \t\r\n", $char)) {
				// eat all non-essential whitespace in the input as we do our own here and it would only mess up
				// our process
				continue;
			}

			// Add the character to the result string
			$result .= $char;
			// always add a space after a field colon:
			if ($char == ':' && $outOfQuotes) {
				$result .= ' ';
			}

			// If the last character was the beginning of an element,
			// output a new line and indent the next line
			if (($char == ',' || $char == '{' || $char == '[') && $outOfQuotes) {
				$result .= $newLine;
				if ($char == '{' || $char == '[') {
					$pos++;
				}
				for ($j = 0; $j < $pos; $j++) {
					$result .= $this->indentationString;
				}
			}
			$prevChar = $char;
		}
		return $result;
	}

}
