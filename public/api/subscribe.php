<?php
declare(strict_types=1);

require_once __DIR__ . '/../../includes/db.php';
require_once __DIR__ . '/../../includes/helpers.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    json_response(['success' => false, 'message' => 'Method not allowed.'], 405);
}

$payload = json_decode((string) file_get_contents('php://input'), true);
if (!is_array($payload)) {
    json_response(['success' => false, 'message' => 'Invalid request payload.'], 400);
}

$email = trim((string) ($payload['email'] ?? ''));
if ($email === '' || filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    json_response(['success' => false, 'message' => 'Please provide a valid email address.'], 422);
}

try {
    $pdo = db_connection();
    $statement = $pdo->prepare('INSERT INTO waitlist_signups (email) VALUES (:email)');
    $statement->execute(['email' => $email]);
    json_response(['success' => true, 'message' => 'Thanks! You have been added to the premium waitlist.']);
} catch (PDOException $exception) {
    if ((int) ($exception->errorInfo[1] ?? 0) === 1062) {
        json_response(['success' => true, 'message' => 'You are already on the waitlist.']);
    }

    json_response(['success' => false, 'message' => 'Could not save your email right now. Please try again later.'], 500);
}
