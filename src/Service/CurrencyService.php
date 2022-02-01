<?php

namespace App\Service;

use App\Currency\Currency;
use App\Service\Exception\CurrencyNotFoundException;
use JetBrains\PhpStorm\NoReturn;

class CurrencyService
{
    private array $currencies;

    #[NoReturn]
    public function __construct(array $currencies)
    {
        $this->currencies = $this->createCurrencies($currencies);
    }

    /**
     * @param array $currencies
     * @return array
     */
    private function createCurrencies(array $currencies): array
    {
        $list = [];
        foreach ($currencies as $item) {
            $currency = $this->createCurrency($item);
            $list[$currency->getCode()] = $currency;
        }

        return $list;
    }

    /**
     * @param $item
     * @return Currency
     */
    private function createCurrency($item): Currency
    {
        $currency = new Currency();
        foreach ($item as $key => $value) {

            $method = 'set' . ucfirst($key);
            $currency->$method($value);
        }

        return $currency;
    }

    /**
     * @throws CurrencyNotFoundException
     */
    public function getByCode(string $cod)
    {
        if (isset($this->currencies[$cod])) {
            return $this->currencies[$cod];
        }

        throw new CurrencyNotFoundException('Currency not found in currency list.');
    }

    public function getAll()
    {
        return $this->currencies;
    }
}