<?php

include_once( 'src/PHPValidatePassword.php' );

$password = 'Passw	ord1.';

// Create object
$PC  = new PHP_Validate_password( $password );

// Check for whitespace
echo "Password: " . $password;

echo '<hr />';

// Check for whitespace
echo "Has whitespace: " . print_r( $PC->hasWhitespace, 1 );

echo '<hr />';

// Check for strength
echo "Password strength: " . $PC->getStrength();