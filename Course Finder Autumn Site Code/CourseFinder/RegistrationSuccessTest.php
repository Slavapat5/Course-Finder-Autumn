<?php
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Depends;

class RegistrationSuccessTest extends TestCase {
    // Test for successful registration
    public function testSuccessfulRegistration() {
        // Simulate POST request data
        $_POST['username'] = 'test_user_3';
        $_POST['fname'] = 'John';
        $_POST['surname'] = 'Doe';
        $_POST['password'] = 'password123';
        $_POST['password2'] = 'password123';
        $_POST['phone'] = '1234567890';
        $_POST['address1'] = '123 Main St';
        $_POST['address2'] = '123 Address';
        $_POST['city'] = 'City';

        // Capture output of the registration script
        ob_start();
        include 'register.php';
        $output = ob_get_clean();

        // Assert that the output contains the success message
        $this->assertStringContainsString('You have now registered', $output);        
    }
}
?>