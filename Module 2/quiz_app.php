<?php

function evaluateQuiz(array $questions, array $answers): int {
    $score = 0;
    foreach ($questions as $index => $question) {
        if (isset($answers[$index]) && strtolower($answers[$index]) === strtolower($question['correct'])) {
            $score++;
        }
    }
    return $score;
}

$questions = [
    ['question' => 'What is 2 + 2?', 'correct' => '4'],
    ['question' => 'What is the capital of France?', 'correct' => 'Paris'],
    ['question' => 'Who wrote "Hamlet"?', 'correct' => 'Shakespeare'],
];

$answers = [];
foreach ($questions as $index => $question) {
    echo ($index + 1) . ". " . $question['question'] . "\nYour Answer: ";
    $answers[$index] = readline();
}

$score = evaluateQuiz($questions, $answers);
$totalQuestions = count($questions);

echo "\nYou scored $score out of $totalQuestions. \n";
if ($score === $totalQuestions) {
    echo "Excellent Job";
} 
elseif ($score > $totalQuestions / 2) {
    echo "Good Effort";
} 
else {
    echo "Better luck next time!";
}

?>