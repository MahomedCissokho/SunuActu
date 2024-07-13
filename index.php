<?php
    require_once 'session_start.php';
?>


<?php
$router = require_once 'routes/useRouter.php'; // Adjust the path as necessary
// echo "Routes setup complete\n";

// Dispatch the request
$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
?>