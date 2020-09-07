<?php

namespace App\DTO;

class CurrencyDTO
{
    private string $currency;
    private ?\DateTimeInterface $date;

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    public function getDate(): ?string
    {
        return $this->date ? $this->date->format('Y-m-d') : (new \DateTime())->format('Y-m-d');
    }

    public function setDate(?\DateTimeInterface $date): void
    {
        $this->date = $date;
    }
}