<?php

namespace App\Currency;

class Currency
{
    private string $code;
    private string $symbol;
    private string $englishName;

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): self
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getSymbol(): string
    {
        return $this->symbol;
    }

    /**
     * @param string $symbol
     */
    public function setSymbol(string $symbol): self
    {
        $this->symbol = $symbol;
        return $this;
    }

    /**
     * @return string
     */
    public function getEnglishName(): string
    {
        return $this->englishName;
    }

    /**
     * @param string $englishName
     */
    public function setEnglishName(string $englishName): self
    {
        $this->englishName = $englishName;
        return $this;
    }


}