<?php
// classic-php-site/includes/header.php
// Shared header include for every page.
if (!isset($pageTitle)) {
    $pageTitle = 'Classic PHP Site';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?> | Classic PHP Site</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="page-shell">
        <header class="site-header">
            <div class="brand-block">
                <p class="brand-label">Classic PHP Site</p>
                <p class="brand-subtitle">Professional · Minimal · Classic</p>
            </div>
            <nav class="site-nav">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
        </header>
        <div class="content">
