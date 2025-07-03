<?php
$servername = "localhost";
$username = "root";  // Your MySQL username
$password = "";      // Your MySQL password
$dbname = "application_db";
$conn = new mysqli('localhost', 'root', '', 'application_db');
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO applications (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Application submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="About.css">
    <script src="about.js"></script>
</head>
<body>
<nav>
        <div id="nav_left">
            <h3><a href="#home">Open <br> Recipe</a></h3>
        </div>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="About.php">About</a></li>
            <li><a href="Contact.html">Contact</a></li>
            <li><a href="index.php">login</a></li>
        </ul>
    </nav>
<header>
    <h1>About Our Company</h1>
    <p>We bring you the best in baking and culinary arts.</p>
</header>

<section class="section">
    <h2>Our Story</h2>
    <img src="data:image/jpeg;base64,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" alt="Delicious Cake">
    <p>
        Welcome to Recipe Delight, where we combine passion and creativity to bring you the most delectable recipes. 
        Whether you're a beginner or a pro in the kitchen, our carefully curated recipes will inspire you to create magic in your own home.
    </p>
</section>

<section class="section">
    <h2>Why Choose Us?</h2>
    <img src="data:image/jpeg;base64,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" alt="Why Choose Us">
    <p>
       We provide a diverse range of recipes tailored to your skill level. Whether you're just starting or looking to master advanced techniques, we have something for everyone.
    </p>
</section>

<section class="section">
    <h2>Design Perfection</h2>
    <p>
        Every recipe we share is a result of meticulous planning and a deep love for the art of cooking. We strive for perfection in every detail, ensuring that your culinary creations not only taste amazing but look stunning too.
    </p>
    <div class="feature">
        <div>
            <img src="Images/recipe2.webp" alt="Bake & Bakery-ready recipes">
            <h3>Bake & Bakery-ready Recipes</h3>
            <p>Enjoy our selection of bakery and dessert recipes that are sure to delight your taste buds.</p>
        </div>
        <div>
            <img src="Images/recipe.jpg" alt="Flexible 30-day curriculum">
            <h3>Flexible 30-day Curriculum</h3>
            <p>Follow our easy-to-use curriculum and learn new cooking techniques daily.</p>
        </div>
        <div>
            <img src="Images/image3.webp" alt="All levels of production">
            <h3>All Levels of Production</h3>
            <p>From simple to advanced, we have recipes that suit every level of expertise.</p>
        </div>
    </div>
</section>

<section class="testimonial-section">
    <h2>What Our Clients Say</h2>
    <div class="testimonial">
        <div class="quote">
            <img src="Images/customer-1.jpg" alt="Customer 1">
            <p>"Recipe Delight has completely transformed my baking game. The recipes are easy to follow and the results are always amazing!"</p>
        </div>
        <div class="quote">
            <img src="Images/customer-2.jpg" alt="Customer 2">
            <p>"I've tried so many new recipes thanks to Recipe Delight. My family is always impressed with what I bring to the table!"</p>
        </div>
        <div class="quote">
            <img src="Images/customer-3.jpg" alt="Customer 3">
            <p>"As a beginner, I found the step-by-step guides incredibly helpful. Now, I'm more confident in the kitchen!"</p>
        </div>
    </div>
</section>

<section class="apply-section">
    <h2>Apply Now</h2>
<form action="submit_application.php" method="POST">
    <input type="text" name="name" placeholder="Enter your name" required>
    <input type="email" name="email" placeholder="Enter your email address" required>
    <textarea name="message" rows="5" placeholder="Enter your message" required></textarea>
    <button type="submit" style="background-color: #FF874B;">Submit</button>
</form>
</section>

<script src="script.js"></script>
<script src="application.js"></script>
</body>
</html>
