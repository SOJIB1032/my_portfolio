<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Contact</title>
</head>
<body>
    <p>You have a new message from your portfolio site:</p>
    <p><strong>Name:</strong> <?php echo e($contact->name); ?></p>
    <p><strong>Email:</strong> <?php echo e($contact->email); ?></p>
    <p><strong>Phone:</strong> <?php echo e($contact->phone); ?></p>
    <p><strong>Subject:</strong> <?php echo e($contact->subject); ?></p>
    <p><strong>Message:</strong></p>
    <p><?php echo nl2br(e($contact->message)); ?></p>
</body>
</html>
<?php /**PATH C:\Users\User\OneDrive\Desktop\portfolio-full-stack\portfolio-full-stack\resources\views/emails/contact.blade.php ENDPATH**/ ?>