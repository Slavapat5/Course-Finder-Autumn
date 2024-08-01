<?php
use PHPUnit\Framework\TestCase;

class SearchTest extends TestCase
{
    
    public function testSearchWithValidInput_title()
    {
        // Simulate a search with valid input
        $_POST['courseTitle'] = 'Mathematics'; // Example search query
        $_POST['university'] = ''; 
        $_POST['category'] = ''; 
        
        ob_start(); // Capture output of the search script
        include 'search.php';
        $output = ob_get_clean();

        // Assert that the output contains the expected search results
        $this->assertContains('Mathematics', $output);
    }

    public function testSearchWithInvalidInput()
    {
        // Simulate a search with invalid input (e.g., empty query)
        $_POST['courseTitle'] = ''; 
        $_POST['university'] = ''; 
        $_POST['category'] = ''; 
        
        ob_start(); 
        include 'search.php';
        $output = ob_get_clean();

        // Assert that the output contains appropriate error handling
        $this->assertContains('No results found', $output);
    }

    public function testSearchWithValidInput_university()
    {
        // Simulate a search with valid input
        $_POST['courseTitle'] = ''; 
        $_POST['university'] = 'dublin'; // Assuming university search
        $_POST['category'] = ''; 
        
        ob_start(); 
        include 'search.php';
        $output = ob_get_clean();

        // Assert that the output contains the expected search results
        $this->assertContains('dublin', $output);
    }

    public function testSearchWithValidInput_category()
    {
      
        $_POST['courseTitle'] = ''; 
        $_POST['university'] = ''; 
        $_POST['category'] = '4'; // category search
        
        ob_start(); // Capture  the search script
        include 'search.php';
        $output = ob_get_clean();

        // Assert that the output contains the expected search results
        $this->assertContains('004', $output);
    }
}
