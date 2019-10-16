<?php

namespace Models;

class User
{
    private $name;
    private $age;
    private $kidsCount;
    private $baseSalary;
    private $useCompanyCar;

    public function __construct(string $name, int $age, int $kidsCount, int $baseSalary, bool $hasCompanyCar)
    {
        $this->name = $name;
        $this->age = $age;
        $this->kidsCount = $kidsCount;
        $this->baseSalary = $baseSalary;
        $this->useCompanyCar = $hasCompanyCar;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function getKidsCount(): int
    {
        return $this->kidsCount;
    }

    public function getBaseSalary(): int
    {
        return $this->baseSalary;
    }

    public function isUseCompanyCar(): bool
    {
        return $this->useCompanyCar;
    }

}
