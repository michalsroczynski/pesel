# PESEL Validation / Walidacja PESEL
![](https://img.shields.io/github/license/michalsroczynski/pesel.svg?style=flat)
![](https://img.shields.io/github/repo-size/michalsroczynski/pesel.svg?style=plastic)
![](https://img.shields.io/github/downloads/michalsroczynski/pesel/total.svg?style=plastic)

## Usage

###Create object:
```php
$peselNumber = '12345678901';
$pesel = new Pesel($peselNumber);
```

###Validate:
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

###Get birth date as timestamp:

```php
$pesel->getBirthDate()
```

result:
```
1546300800
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.
