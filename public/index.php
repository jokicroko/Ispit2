<?php

spl_autoload_register(function ($className) {
    $classFile = __DIR__ . '/' . $className . '.php';
    if (file_exists($classFile)) {
        require_once $classFile;
    }
});

$configFilePath = __DIR__ . '/database.php';

$configManager = new Config($configFilePath);
$dbConnection = Connection::getInstance();

$pdo = $dbConnection->getConnection();

if ($pdo) {
    echo 'Connected';
} else {
    echo 'Error with connection!';
}

?>

