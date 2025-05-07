<?php
require_once __DIR__ . "/classes/Poll.php";

$pollId = $_GET["poll"] ?? "sample";

try {
    $poll = new Poll($pollId);
    $results = $poll->getResults();
} catch (Exception $e) {
    die("Poll not found.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Results: <?php echo htmlspecialchars($poll->getQuestion()); ?></title>
</head>
<body>
    <h2>Results: <?php echo htmlspecialchars($poll->getQuestion()); ?></h2>
    <ul>
        <?php foreach ($results as $item): ?>
            <li>
                <?php echo htmlspecialchars($item["label"]); ?> — 
                <?php echo $item["votes"]; ?> vote(s) 
                (<?php echo $item["percent"]; ?>%)
            </li>
        <?php endforeach; ?>
    </ul>

    <p><a href="index.php">Back to Poll</a></p>
</body>
</html>
