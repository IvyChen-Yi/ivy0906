<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Hankaku implements ValidationRule
{
    public function __construct()
  {
  }

  public function passes($attribute, $value)
  {
    return preg_match('/^[a-zA-Z0-9]+$/', $value);
  }

  public function message()
  {
    return 'Tは半角英数字で入力してください';
  }

}
