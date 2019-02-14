# PESEL Validation
![](https://img.shields.io/github/license/michalsroczynski/pesel.svg?style=flat)
![](https://img.shields.io/github/repo-size/michalsroczynski/pesel.svg?style=plastic)
![](https://img.shields.io/github/downloads/michalsroczynski/pesel/total.svg?style=plastic)

Class for PESEL validation.


## Usage

```php
$peselNumber = '12345678901';
$pesel = new Pesel($peselNumber);
$result = $pesel->validate();
```

```$result``` example:
```$xslt
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

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.
