<?php

namespace pesel;

class Pesel
{
    protected $pesel, $month, $year, $day, $age, $sex, $birthDate, $now;
    protected $isAdult = false;

    public function __construct(string $pesel)
    {
        $this->pesel = $pesel;
        $this->year = substr($pesel, 0, 2);
        $this->month = substr($pesel, 2, 2);
        $this->day = substr($pesel, 4, 2);
        $this->birthDate = date_create($this->getCentury() . $this->year . '-' . $this->month . '-' . $this->day);
        $this->now = date_create();
        $this->sex = $this->setSex(substr($pesel, 9, 1));
    }

    public function validate(): object
    {
        try {
            if ($this->checkIfOnlyNumbers()
                && $this->checkLength()
                && $this->officialValidation()
                && $this->verifyBirthDate()
            ) {
                return json_encode([

                ]);
            }

        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    protected function checkIfOnlyNumbers(): bool
    {
        if (!preg_match('/^\d+$/', $this->pesel)) {
            throw new \Exception('PESEL has invalid characters!');
        }

        return true;
    }

    protected function checkLength(): bool
    {
        if (strlen($this->pesel) != 11) {
            throw  new \Exception('PESEL has incorrect length!');
        }

        return true;
    }

    /*
     * Official PESEL validation
     */
    protected function officialValidation(): bool
    {
        $weight = [1, 3, 7, 9, 1, 3, 7, 9, 1, 3];
        $sum = 0;

        foreach ($weight as $index => $value) {
            $sum += $value * $this->pesel[$index];
        }

        $checkNumber = 10 - $sum % 10;
        $checkSum = ($checkNumber == 10) ? 0 : $checkNumber;

        if (!$checkSum == $this->pesel[10]) {
            throw new \Exception('Invalid PESEL!');
        }

        return true;
    }

    protected function verifyBirthDate(): bool
    {
        $dateDifferance = $this->getDateDiff('%R%a');
        if ($dateDifferance > 0) {
            throw new \Exception('Birth date from future!');
        }

        $this->age = $this->getDateDiff('%Y');
        $this->isAdult = $this->age >= 18;

        return true;
    }

    protected function getDateDiff(string $format): string
    {
        return date_diff($this->now, $this->birthDate)->format($format);
    }

    protected function getCentury(): string
    {
        $allCorrectMonths = [
            18 => ['81', '82', '83', '84', '85', '86', '87', '88', '89', '90', '91', '92'],
            19 => ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'],
            20 => ['21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31', '32'],
            21 => ['41', '42', '43', '44', '45', '46', '47', '48', '49', '50', '51', '52'],
            22 => ['61', '62', '63', '64', '65', '66', '67', '68', '69', '70', '71', '72'],
        ];

        foreach ($allCorrectMonths as $century => $correctMonths) {
            if (false !== $key = array_search($this->month, $correctMonths)) {
                $this->month = ++$key;
                return $century;
            }
        }
        throw new \Exception('Invalid month!');
    }

    protected function setSex($number): string
    {
        return $number % 2 == 0 ? 'Female' : 'Male';
    }
}
