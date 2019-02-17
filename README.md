# Walidacja numeru PESEL / PESEL Validation
![](https://img.shields.io/github/license/michalsroczynski/pesel.svg?style=flat)
![](https://img.shields.io/github/release/michalsroczynski/pesel.svg?style=plastic)
![](https://img.shields.io/github/repo-size/michalsroczynski/pesel.svg?style=plastic)
![](https://img.shields.io/github/downloads/michalsroczynski/pesel/total.svg?style=plastic)

Obiekt klasy waliduje numer PESEL używając oficjalnej walidacji opartej na wagach. 
Metoda `validate()` przed rozpoczęciem walidacji sprawdza poprawność znaków w numerze: 
czy jest ich 11 i czy nie zawierają innych znaków niż cyfry. Ponadto sprawdzane jest czy 
data w numerze PESEL nie jest z przyszłości. Umożliwia to sprawdzenie czy ktoś nie podał 
wygenerowanego numeru. Metoda `getBirthDate()` zwraca datę urodzenia w czasie unixowym.

---
Class' object validate PESEL number by using official validation method based on weights. 
Method `validate()` before it start validation, checks if all characters are correct: 
if there are 11 characters and only digits. More over it checks if birth date is not from 
future. Because of this you can be sure if someone didn't provide some generated PESEL number. 
Method `getBirthDate()` return birth date in unix time stamp.

## Usage

**Create object:**
```php
$peselNumber = '12345678901';
$pesel = new Pesel($peselNumber);
```

**Validate:**
```php
$pesel->validate()
```

result:
```php
array (
  'valid' => true,
  'sex' => 'Male',
  'isAdult' => true,
  'age' => '49',
  'birthDate' => 
  array (
    'year' => '1970',
    'month' => '01',
    'day' => '01',
  ),
  'error' => false,
  'errorMessage' => NULL,
)
```

**Get birth date as timestamp:**

```php
$pesel->getBirthDate()
```

result:
```
1546300800
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss 
what you would like to change.
