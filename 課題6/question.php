<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>四則演算の問題</title>
</head>

<body>
    <!-- 問６ -->
    <p>問６：計算して下さい。<br>
        回答までの時間を計測して、答え合わせのページに表示してください。<br>
        何問正解したか表示してください。 例）4/10
    </p>
    <form method="post" action="answer.php">
        <?php
        require_once('./css/QuestionsClass.php');

        $questions = array();

        for ($i = 0; $i < 10; $i++) {
            // インスタンス化（実体化）
            $question = new Question();
            $questions[] = $question;
            echo "<p>" . $question->getProblem() . "<input type='text' name='answers[]'></p>";
            echo "<input type='hidden' name='correct_answers[]' value='" . $question->getAnswer() . "'>";
        }
        ?>
        <input type="submit" value="回答する">
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