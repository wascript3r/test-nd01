<?php

namespace App\Service;

class MoneyFormatter
{
	/**
	 * @var NumberFormatter $numberFormatter
	 */
	private $numberFormatter;

	/**
	 * MoneyFormatter constructor.
	 * @param NumberFormatter $numberFormatter
	 */
	public function __construct(NumberFormatter $numberFormatter)
	{
		$this->numberFormatter = $numberFormatter;
	}

	/**
	 * @param $number
	 * @return string
	 */
	public function formatEur($number)
	{
		return $this->numberFormatter->format($number) . ' €';
	}

	/**
	 * @param $number
	 * @return string
	 */
	public function formatUsd($number)
	{
		return '$' . $this->numberFormatter->format($number);
	}
}