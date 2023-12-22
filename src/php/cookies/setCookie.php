<?php
    // Set cookie

    $name = $_POST['name'];
    $value = $_POST['value'];

    $options = array(
        'expires' => 0,
        'path' => '/',
        'domain' => '', // leading dot for compatibility or use subdomain
        'secure' => true,
        'httponly' => false,
        'samesite' => 'None'
    );

    echo setcookie($name, $value, $options);
?>