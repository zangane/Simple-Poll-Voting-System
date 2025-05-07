<?php
require_once __DIR__ . "/classes/Poll.php";
require_once __DIR__ . "/classes/VoteManager.php";

$pollId = "sample"; // نام فایل JSON نظرسنجی بدون پسوند
$poll = new Poll($pollId);
$voteManager = new VoteManager($poll);

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $option = intval($_POST["option"] ?? -1);
    if ($voteManager->recordVote($option)) {
        header("Location: results.php?poll=" . urlencode($pollId));
        exit;
    } else {
        $message = "You have already voted!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Poll: <?php echo htmlspecialchars($poll->getQuestion()); ?></title>
</head>
<body>
    <h2><?php echo htmlspecialchars($poll->getQuestion()); ?></h2>

    <?php if ($message): ?>
        <p style="color:red;"><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>

    <form method="post">
        <?php foreach ($poll->getOptions() as $i => $option): ?>
            <label>
                <input type="radio" name="option" value="<?php echo $i; ?>" required>
                <?php echo htmlspecialchars($option); ?>
            </label><br>
        <?php endforeach; ?>
        <br>
        <button type="submit">Vote</button>
    </form>

    <p><a href="results.php?poll=<?php echo urlencode($pollId); ?>">View Results</a></p>
</body>
</html>
