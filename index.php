<?php

require_once('PeselValidator.php');

use \pesel\PeselValidator;

$pesel = '70010187613';

$peselValidator = new PeselValidator($pesel);

$result = $peselValidator->validatePesel();
var_dump($result);
