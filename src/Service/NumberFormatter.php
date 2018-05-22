<?php

namespace App\Service;

class NumberFormatter
{
	/**
	 * @param $number
	 * @return string
	 */
	public function format($number)
	{
		if (!is_int($number) && !is_float($number))
			throw new \InvalidArgumentException();

		$prefix = '';
		if ($number < 0) {
			$prefix = '-';
			$number = abs($number);
		}
		if ($number >= 999500) {
			$number = sprintf('%0.2f', round($number / 1000000, 2)) . 'M';
		} elseif ($number >= 99950) {
			$number = round($number / 1000) . 'K';
		} elseif ($number >= 1000) {
			$number = $this->formatThousands(round($number));
		} elseif ($number >= 0 && (int)$number !== $number) {
			$number = round($number, 2);
			$number = $number == 1000 ? $this->formatThousands($number) : sprintf('%0.2f', $number);
		}
		return $prefix . $number;
	}

	/**
	 * @param $number
	 * @return string
	 */
	private function formatThousands($number)
	{
		return number_format($number, 0, '.', ' ');
	}
}