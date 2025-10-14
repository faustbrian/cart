<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Basket\Formatters;

use BaseCodeOy\Basket\Contracts\Formatter;
use BaseCodeOy\Basket\Contracts\Money as MoneyContract;
use BaseCodeOy\Basket\Discounts\ValueDiscount;
use Money\Money;

final class MoneyFormatter implements Formatter
{
    private static $currencies;

    /**
     * MoneyFormatter constructor.
     *
     * @param null|mixed $locale
     */
    public function __construct(
        private $locale = null,
    ) {
        if (!isset(self::$currencies)) {
            self::$currencies = json_read(__DIR__.'/../../resources/data/currencies.json');
        }
    }

    #[\Override()]
    public function format($value): string
    {
        $numberFormatter = new \NumberFormatter($this->locale(), \NumberFormatter::CURRENCY);

        if ($value instanceof MoneyContract) {
            $value = $value->toMoney();
        }

        if ($value instanceof ValueDiscount) {
            $value = $value->rate();
        }

        $code = $this->code($value);
        $divisor = $this->divisor($code);
        $amount = $this->convert($value, $divisor);

        return $numberFormatter->formatCurrency($amount, $code);
    }

    private function locale(): string
    {
        if ($this->locale) {
            return $this->locale;
        }

        return \Locale::getDefault();
    }

    private function code(Money $money): string
    {
        return $money->getCurrency()->getCode();
    }

    /**
     * @param mixed $code
     */
    private function divisor(string $code): int
    {
        return self::$currencies[$code]->subunit_to_unit;
    }

    /**
     * @param mixed $divisor
     */
    private function convert(Money $money, int $divisor): float
    {
        return (float) \number_format($money->getAmount() / $divisor, 2, '.', '');
    }
}
