<?php

namespace App\Tests\Service;

use App\Service\MoneyFormatter;
use App\Service\NumberFormatter;
use PHPUnit\Framework\TestCase;

class MoneyFormatterTest extends TestCase
{
	public function testFormatEur()
	{
		$numberFormatter = $this->createMock(NumberFormatter::class);
		$numberFormatter->expects($this->once())
			->method('format')
			->with(-999.9999)
			->willReturn('-1 000');

		$moneyFormatter = new MoneyFormatter($numberFormatter);
		$this->assertEquals($moneyFormatter->formatEur(-999.9999), '-1 000 €');
	}

	public function testFormatUsd()
	{
		$numberFormatter = $this->createMock(NumberFormatter::class);
		$numberFormatter->expects($this->once())
			->method('format')
			->with(2835779)
			->willReturn('2.83M');

		$moneyFormatter = new MoneyFormatter($numberFormatter);
		$this->assertEquals($moneyFormatter->formatUsd(2835779), '$2.83M');
	}
}