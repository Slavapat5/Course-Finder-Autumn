<?php
// Import necessary classes for PHPUnit testing
use PHPUnit\Framework\TestCase;

// Include the PHP file containing the login functionality
require_once 'index.php';

class LoginTest extends TestCase {

    // Test for valid login credentials
    public function testValidLogin() {
        $_POST['username'] = 'test_user';
        $_POST['password'] = 'password123';
        $_POST['submit_button'] = true;

        ob_start();
        include 'index.php';
        $output = ob_get_clean();

        // Assert that the output contains "LOGGED IN"
        $this->assertStringContainsString('LOGGED IN', $output);
    }

    // Test for invalid login credentials
    public function testInvalidLogin() {
        $_POST['username'] = 'invalid_user';
        $_POST['password'] = 'invalid_password';
        $_POST['submit_button'] = true;

        ob_start();
        include 'index.php';
        $output = ob_get_clean();

        // Assert that the output contains "ERROR: Invalid credentials"
        $this->assertStringContainsString('ERROR: Invalid credentials', $output);
    }

    // Test for empty fields
    public function testEmptyFields() {
        $_POST['username'] = '';
        $_POST['password'] = '';
        $_POST['submit_button'] = true;

        ob_start();
        include 'index.php';
        $output = ob_get_clean();

        // Assert that the output contains "ERROR: All fields are required!"
        $this->assertStringContainsString('ERROR: All fields are required!', $output);
    }
}
?>
