<?php
  // Load .env file and set environment variables
  $envPath = __DIR__ . '/.env';
  if (!file_exists($envPath)) {
      die(".env file is missing! Please create one.\n");
  }
  $env = parse_ini_file($envPath);
  if (!$env) {
      die("Error parsing .env file! Check syntax.\n");
  }
  foreach ($env as $key => $value) {
      putenv("$key=$value");
  }

  // define function to get connection string to db instance.
  function getdb() {
    // obtain variables from .env file
    $dbhost = getenv("MYSQL_HOST");
    $dbuser = getenv("MYSQL_USER");
    $dbpass = getenv("MYSQL_PASSWORD");
    $dbname = getenv("MYSQL_DATABASE");

    // ensure variables are properly obtained
    if (!$dbhost || !$dbuser || !$dbname) {
      die("Environment variables are missing! Check your .env file.\n");
    }
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error . "\n");
    }
    return $conn;
  }
?>
