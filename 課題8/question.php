<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>四則演算の問題</title>
</head>

<body>
    <!-- 問８ -->
    <p>問8：計算して下さい。<br>
        回答までの時間を計測して、答え合わせのページに表示してください。<br>
        何問正解したか表示してください。 例）4/10
    </p>
    <?php
    require_once './css/CustomQuestions.php';

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["operator"])) {
            $selectedOperator = $_POST["operator"];

            // 最大出題数を設定
            $max_questions = $_POST['max_questions'];

            // 最小値と最大値をフォームから受け取る
            $minValue = isset($_POST['min_value']) ? $_POST['min_value'] : $defaultMinValue;
            $maxValue = isset($_POST['max_value']) ? $_POST['max_value'] : $defaultMaxValue;

            // 問題を生成
            $problems = array();

            // 問題を生成
            $problems = array();
            for ($i = 0; $i < $max_questions; $i++) {
                $problem = new Problem($selectedOperator, $minValue, $maxValue);
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