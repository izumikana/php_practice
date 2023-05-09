<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>四則演算の問題</title>
</head>

<body>
    <!-- 問６ -->

    <form method="post" action="answer.php">
        <?php
        require_once('QuestionsClass.php');

        $start_time = microtime(true);
        $questions = array();

        for ($i = 0; $i < 10; $i++) {
            $question = new Question();
            $questions[] = $question;
            echo "<p>" . $question->getProblem() . "<input type='text' name='answers[]'></p>";
            echo "<input type='hidden' name='correct_answers[]' value='" . $question->getAnswer() . "'>";
        }

        echo "<input type='hidden' name='start_time' value='$start_time'>";

        ?>
    </form>

</body>

</html>



<!-- <?php
        $op = ['×', '-', '÷', '＋'];
        //$opの配列から値を一つ取り出す、array_randは配列のキー（0,1,2,3...）で返ってくる
        $a_op = array_rand($op);
        // キーで返ってきたものを値で表示する
        echo $op[$a_op];
        ?> -->