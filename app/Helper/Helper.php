<?php

function generateRandomString($alpha_length = 2, $num_length = 4) {
  $alpha = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $number = '0123456789';
  $alphaLength = strlen($alpha);
  $numberLength = strlen($number);
  $randomString = '';
  for ($i = 0; $i < $alpha_length; $i++) {
      $randomString .= $alpha[rand(0, $alphaLength - 1)];
  }
  for ($i = 0; $i < $num_length; $i++) {
      $randomString .= $number[rand(0, $numberLength - 1)];
  }
  return $randomString;
}

function getRoleByGuard($guardName)
{
    switch ($guardName) {
        case 'teacher':
            return \App\Enums\User\Type::TEACHER;
        case 'parent':
            return \App\Enums\User\Type::PARENT;
        case 'student':
            return \App\Enums\User\Type::STUDENT;
        default:
            return '';
    }
}