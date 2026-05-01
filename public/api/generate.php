<?php
declare(strict_types=1);

require_once __DIR__ . '/../../includes/helpers.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    json_response(['success' => false, 'message' => 'Method not allowed.'], 405);
}

$payload = json_decode((string) file_get_contents('php://input'), true);
if (!is_array($payload)) {
    json_response(['success' => false, 'message' => 'Invalid request payload.'], 400);
}

$topic = strtolower(trim((string) ($payload['topic'] ?? '')));
if ($topic === '') {
    json_response(['success' => false, 'message' => 'Topic is required.'], 422);
}

$scripts = generateScriptsFromTopic($topic, 3);

json_response([
    'success' => true,
    'topic' => $topic,
    'scripts' => $scripts,
]);
