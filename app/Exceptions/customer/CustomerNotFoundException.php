<?php

namespace App\Exceptions\customer;

use Exception;

class CustomerNotFoundException extends Exception
{
    protected $message = 'Customer not found';
}
