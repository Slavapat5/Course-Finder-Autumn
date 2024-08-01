<?php
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Depends;

class RegistrationEmptyFieldTest extends TestCase {
    
    // Test for empty fields
    public function testEmptyFields() {
        // Simulate POST request with empty fields
        $_POST['username'] = '';
        $_POST['fname'] = '';
        $_POST['surname'] = '';
        $_POST['password'] = '';
        $_POST['password2'] = '';
        $_POST['phone'] = '';
        $_POST['address1'] = '';
        $_POST['address2'] = '';
        $_POST['city'] = '';

        // Capture output of the registration script
        ob_start();
        include 'register.php';
        $output = ob_get_clean();

        // Assert that the output contains the error message for empty fields
        $this->assertStringContainsString('ERROR: Not all fields are filled!', $output);
    }

}
?>
