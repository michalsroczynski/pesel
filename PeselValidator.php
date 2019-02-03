<?php

namespace pesel;

class PeselValidator
{
    private $pesel;

    public function __construct(string $pesel)
    {
        $this->pesel = $pesel;
    }

    public function validatePesel()
    {
        return (
            $this->checkIfOnlyNumbers() &&
            $this->officialValidation()
        );
    }

    private function checkIfOnlyNumbers()
    {
        return preg_match('/^[0-9]{11}$/', $this->pesel);
    }

    /*
     * Official PESEL validation
     */
    private function officialValidation()
    {
        $weight = [1, 3, 7, 9, 1, 3, 7, 9, 1, 3];
        $sum = 0;

        foreach ($weight as $index => $value) {
            $sum += $value * $this->pesel[$index];
        }

        $checkNumber = 10 - $sum % 10;
        $checkSum = ($checkNumber == 10) ? 0 : $checkNumber;

        return $checkSum == $this->pesel[10];
    }
}
