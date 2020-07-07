<?php

// Cek Login
if (!function_exists('isLogin')) {
  function isLogin($user_id)
  {
    if ($user_id == "") {
      redirect('auth');
    }
  }
}
