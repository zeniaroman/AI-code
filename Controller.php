<?php
declare(strict_types=1);
namespace App\Controller;

// Class front controller for the application
class Controller
{
    // Method to render the view
    public function render(string $view, array $data = [])
    {
        // Extract the data array to variables
        extract($data);

        // Include the view file
        require __DIR__ . '/../View/' . $view . '.php';
    }
}