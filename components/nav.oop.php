<?php
include '../root/CSS/component/header-navbar.css.php';
class Navbar
{
    private $navItems;
    private $class;

    public function __construct($navItems, $class)
    {
        $this->navItems = $navItems;
        $this->class = $class;
    }

    public function generateNavbar()
    {
        echo "<nav>";
        echo "<ul class='{$this->class}'>";

        foreach ($this->navItems as $item) {
            echo '<li>';

            // Check if $item is an array
            if (is_array($item)) {
                echo '<a href="' . $item["url"] . '">' . $item["label"] . '</a>';
            } else {
                // If it's not an array, assume it's a string
                echo '<a href="#">' . $item . '</a>';
            }
            echo '</li>';
        }
        echo '</ul>';
        echo '</nav>';
    }
}

// Usage
$array_navbar_1 = [
    ["label" => "Home", "url" => ""],
    ["label" => "About", "url" => ""],
    ["label" => "Menu", "url" => ""],
    ["label" => "Pages", "url" => ""],
    ["label" => "Contact", "url" => ""],
];

$array_navbar_2 = [
    ["label" => "Home", "url" => ""],
    ["label" => "About", "url" => ""],
    ["label" => "Menu", "url" => ""],
    ["label" => "Pricing", "url" => ""],
    ["label" => "Blog", "url" => ""],
    ["label" => "Contact", "url" => ""],
    ["label" => "Delivery", "url" => ""]
];

$array_navbar_3 = [
    ["label" => "Start here", "url" => ""],
    ["label" => "Styleguide", "url" => ""],
    ["label" => "Password Protected", "url" => ""],
    ["label" => "404 Not Found", "url" => ""],
    ["label" => "Licenses", "url" => ""],
    ["label" => "Changelog", "url" => ""],
    ["label" => "View More", "url" => ""]
];

$navbar1 = new Navbar($array_navbar_1, '');

$navbar1->generateNavbar();


?>