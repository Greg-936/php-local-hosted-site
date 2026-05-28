<?php
// classic-php-site/contact.php
// The Contact page includes a basic contact form with PHP validation.
$pageTitle = 'Contact';
$errors = [];
$success = '';
$name = '';
$email = '';
$message = '';

include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name === '') {
        $errors[] = 'Please enter your name.';
    }
    if ($email === '') {
        $errors[] = 'Please enter your email address.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address.';
    }
    if ($message === '') {
        $errors[] = 'Please enter a message.';
    }

    if (empty($errors)) {
        if (isset($mysqli) && $mysqli instanceof mysqli) {
            $stmt = $mysqli->prepare('INSERT INTO messages (name, email, message) VALUES (?, ?, ?)');
            if ($stmt) {
                $stmt->bind_param('sss', $name, $email, $message);
                if ($stmt->execute()) {
                    $success = 'Thank you, ' . htmlspecialchars($name) . '! Your message has been saved successfully.';
                    $name = '';
                    $email = '';
                    $message = '';
                } else {
                    $errors[] = 'Unable to save your message. Please try again later.';
                }
                $stmt->close();
            } else {
                $errors[] = 'Database error: unable to prepare statement.';
            }
        } else {
            $errors[] = 'Database connection is not available. Please check the setup.';
        }
    }
}

include 'includes/header.php';
?>

<main>
    <section>
        <h1>Contact Us</h1>
        <p>If you have questions, feel free to reach out using the form below.</p>

        <?php if (!empty($errors)): ?>
            <div class="form-message error">
                <p><strong>Please fix the following:</strong></p>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php elseif ($success !== ''): ?>
            <div class="form-message success">
                <p><?php echo $success; ?></p>
            </div>
        <?php endif; ?>

        <form method="post" action="">
            <div class="form-field">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>">
            </div>
            <div class="form-field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
            </div>
            <div class="form-field">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="5"><?php echo htmlspecialchars($message); ?></textarea>
            </div>
            <button type="submit">Send Message</button>
        </form>
    </section>
</main>

<?php include 'includes/footer.php';
