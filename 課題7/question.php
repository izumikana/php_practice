<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>四則演算の問題</title>
</head>

<body>
    <!-- 問７ -->
    <p>問7：計算して下さい。<br>
        回答までの時間を計測して、答え合わせのページに表示してください。<br>
        何問正解したか表示してください。 例）4/10
    </p>
    <?php
    require_once './css/CustomQuestions.php';

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["operator"])) {
            $selectedOperator = $_POST["operator"];

            // 問題を生成
            $problems = array();
            for ($i = 0; $i < 10; $i++) {
                $problem = new Problem($selectedOperator);
                list($problemText, $answer) = $problem->generateProblem();

                // 問題と答えを配列に追加
                $problems[] = array($problemText, $answer);
            }
    ?>
            <form action="answer.php" method="POST">
                <?php
                foreach ($problems as $index => $problem) {
                    $problemText = $problem[0];
                    $answer = $problem[1];
                ?>
                    <p><?php echo $problemText; ?> = <input type='text' name='answers[]'></p>
                    <input type="hidden" name="problem<?php echo $index; ?>" value="<?php echo $problemText; ?>">
                    <input type="hidden" name="answer[]<?php echo $index; ?>" value="<?php echo $answer; ?>">
                <?php
                }
                ?>
                <input type="submit" value="回答する">
            </form>
    <?php
        }
    }
    ?>


</body>

</html>



<!-- <?php
        $op = ['×', '-', '÷', '＋'];
        //$opの配列から値を一つ取り出す、array_randは配列のキー（0,1,2,3...）で返ってくる
        $a_op = array_rand($op);
        // キーで返ってきたものを値で表示する
        echo $op[$a_op];
        ?> -->