<?php
declare(strict_types=1);

require_once __DIR__ . '/../../includes/helpers.php';

$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$topic = '';

if ($method === 'GET') {
    $topic = trim((string) ($_GET['topic'] ?? ''));
} elseif ($method === 'POST') {
    $payload = json_decode((string) file_get_contents('php://input'), true);
    if (is_array($payload) && array_key_exists('topic', $payload)) {
        $topic = trim((string) $payload['topic']);
    } elseif (isset($_POST['topic'])) {
        $topic = trim((string) $_POST['topic']);
    } else {
        // Fallback for urlencoded payloads not auto-populated in some environments.
        $rawBody = (string) file_get_contents('php://input');
        parse_str($rawBody, $parsedBody);
        $topic = trim((string) ($parsedBody['topic'] ?? ''));
    }
} else {
    json_response(['success' => false, 'message' => 'Method not allowed. Use GET or POST.'], 405);
}

$topic = strtolower($topic);
if ($topic === '') {
    json_response(['success' => false, 'message' => 'Topic is required. Pass ?topic=... or send { "topic": "..." }.'], 422);
}

$scripts = generateScriptsFromTopic($topic, 3);

json_response([
    'success' => true,
    'topic' => $topic,
    'scripts' => $scripts,
]);
