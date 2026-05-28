<?php
// classic-php-site/index.php
// This is the landing page for the classic PHP website.
$pageTitle = 'Home';
include 'includes/header.php';
?>

<main>
    <section>
        <?php
        $welcomeMessage = 'Welcome to the Classic PHP Site!';
        $currentDateTime = date('l, F j, Y \a\t g:i A');
        ?>
        <h1><?php echo htmlspecialchars($welcomeMessage); ?></h1>
        <p>Current date and time: <strong><?php echo htmlspecialchars($currentDateTime); ?></strong></p>
        <p>This simple site uses a clean PHP structure with separate header and footer includes.</p>
        <p>Use the navigation above to visit the About and Contact pages.</p>
    </section>
</main>

<?php include 'includes/footer.php';
