<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Bài thi trắc nghiệm Android</h1>
        <form method="post" action="result.php">
            <?php
            // Đọc file câu hỏi
            $filename = "question.txt";
            $questions = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            $current_question = [];
            $number = 0;

            foreach ($questions as $line) {
                if (strpos($line, 'ANSWER:') === 0) {
                    $current_question[] = $line; // Thêm đáp án vào câu hỏi hiện tại
                    echo generateQuestionCard($current_question, ++$number);
                    $current_question = []; // Reset câu hỏi
                } else {
                    $current_question[] = $line;
                }
            }

            // Hàm tạo card Bootstrap cho câu hỏi
            function generateQuestionCard($questionData, $number) {
                $output = "<div class='card mb-4'>";
                $output .= "<div class='card-header'><strong>Câu {$number}</strong></div>";
                $output .= "<div class='card-body'>";

                // Hiển thị câu hỏi
                $output .= "<p>" . $questionData[0] . "</p>";

                // Hiển thị các đáp án
                foreach ($questionData as $line) {
                    if (strpos($line, 'A.') === 0 || strpos($line, 'B.') === 0 || strpos($line, 'C.') === 0 || strpos($line, 'D.') === 0) {
                        $answer = substr($line, 0, 1); // A, B, C, D
                        $output .= "<div class='form-check'>";
                        $output .= "<input class='form-check-input' type='checkbox' name='question{$number}[]' value='{$answer}' id='question{$number}{$answer}'>";
                        $output .= "<label class='form-check-label' for='question{$number}{$answer}'>{$line}</label>";
                        $output .= "</div>";
                    }
                }

                $output .= "</div></div>";
                return $output;
            }
            ?>
            <button type="submit" class="btn btn-primary">Nộp bài</button>
        </form>
    </div>
</body>
</html>
