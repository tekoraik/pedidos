<?php
  if(defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
    echo "Wiii, tengo CRYPT_BLOWFISH!\n";
  }
?>

<?php
    $sPassword = $argv[1];
    $salt = openssl_random_pseudo_bytes(22);
    $salt = '2a$%02d$' . 'abcdefghijklmnopqrstuv';
    
    echo crypt($sPassword, $salt);
    echo "\n";
?>
