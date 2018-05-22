<?php

namespace App\Tests\Service;

use App\Service\NumberFormatter;
use PHPUnit\Framework\TestCase;

class NumberFormatterTest extends TestCase
{
	/**
	 * @dataProvider getFormatData
	 * @param $number
	 * @param $expected
	 */
	public function testFormat($number, $expected)
	{
		$numberFormatter = new NumberFormatter();
		if ($expected instanceof \InvalidArgumentException)
			$this->expectException(\InvalidArgumentException::class);
		$formatted = $numberFormatter->format($number);
		$this->assertEquals($formatted, $expected);
	}

	public function getFormatData()
	{
		echo (new NumberFormatter())->format(999.9999);
		return [
			[2835779, '2.84M'],
			[999500, '1.00M'],
			[535216, '535K'],
			[99950, '100K'],
			[27533.78, '27 534'],
			[999.99, '999.99'],
			[999.9999, '1 000'],
			[533.1, '533.10'],
			[66.6666, '66.67'],
			[12.00, '12'],
			[-123654.89, '-124K'],
			[-2835779, '-2.84M'],
			[-999500, '-1.00M'],
			[-535216, '-535K'],
			[-99950, '-100K'],
			[-27533.78, '-27 534'],
			[-999.99, '-999.99'],
			[-999.9999, '-1 000'],
			[-533.1, '-533.10'],
			[-66.6666, '-66.67'],
			[-12.00, '-12'],
			[-99951, '-100K'],
			['asdasd', new \InvalidArgumentException()],
			[true, new \InvalidArgumentException()],
		];
	}
}