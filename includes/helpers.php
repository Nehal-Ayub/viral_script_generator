<?php
declare(strict_types=1);

function jsonResponse(array $payload, int $status = 200): void
{
    http_response_code($status);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}

/**
 * Backward-compatible snake_case alias for API handlers.
 */
function json_response(array $payload, int $status = 200): void
{
    jsonResponse($payload, $status);
}

function randomTemplate(array $templates): string
{
    if (count($templates) === 0) {
        return '';
    }
    return $templates[array_rand($templates)];
}

function generateScriptsFromTopic(string $topic, int $count = 3): array
{
    $hooks = [
        'Stop scrolling if you care about %s.',
        'Nobody talks about this %s trick...',
        'You are one short away from better %s results.',
        'Most people get %s wrong. Do this instead.',
    ];

    $bodies = [
        'Here are 3 quick points that make your %s content more engaging and easier to create.',
        'Use this simple framework for %s: Hook, Value, and one clear next step.',
        'Try this in your next %s video: start with a myth, show proof, then reveal the process.',
    ];

    $ctas = [
        "Comment 'SCRIPT' and I will send more ideas.",
        'Follow for daily viral content formulas.',
        'Save this and share it with a creator friend.',
    ];

    $normalizedTopic = trim(strtolower($topic));
    if ($normalizedTopic === '') {
        $normalizedTopic = 'content';
    }

    $titleTopic = ucfirst($normalizedTopic);
    $scripts = [];

    for ($i = 1; $i <= $count; $i++) {
        $scripts[] = [
            'title' => sprintf('Script #%d: %s', $i, $titleTopic),
            'topic' => $titleTopic,
            'hook' => sprintf(randomTemplate($hooks), $normalizedTopic),
            'body' => sprintf(randomTemplate($bodies), $normalizedTopic),
            'cta' => randomTemplate($ctas),
        ];
    }

    return $scripts;
}
