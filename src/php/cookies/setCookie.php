<?php
    // Set cookie

    // Check if cookies are accepted by user
    if ($_POST['name'] == "cookieAccepted" || isset($_COOKIE["cookieAccepted"])) {
        $name = $_POST['name'];
        $value = $_POST['value'];

        $options = array(
            'expires' => 0,
            'path' => '/',
            'domain' => '',
            'secure' => true,
            'httponly' => false,
            'samesite' => 'None'
        );
    
        setcookie($name, $value, $options);
    }
?>