<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>四則演算の問題</title>
</head>

<body>
    <!-- 問６ -->

    <form method="post" action="answer.php">
        <p>問６：計算して下さい。<br>
            出題はQuestionClassを作成して実装してください。
        </p>
        <?php

        class Question
        {
            private $num1;
            private $num2;
            private $operator;
            private $answer;

            public function __construct()
            {
                $this->num2 = rand(1, 10);
                $this->num1 = $this->num2 * rand(1, 10);
                $this->operator = rand(1, 4);
                $this->calculateAnswer();
            }

            private function calculateAnswer()
            {
                switch ($this->operator) {
                    case 1:
                        $this->answer = $this->num1 + $this->num2;
                        break;
                    case 2:
                        $this->answer = $this->num1 - $this->num2;
                        break;
                    case 3:
                        $this->answer = $this->num1 * $this->num2;
                        break;
                    case 4:
                        $this->answer = (int) ($this->num1 / $this->num2);
                        break;
                }
            }

            public function getProblem()
            {
                switch ($this->operator) {
                    case 1:
                        return "$this->num1 + $this->num2 = ";
                    case 2:
                        return "$this->num1 - $this->num2 = ";
                    case 3:
                        return "$this->num1 × $this->num2 = ";
                    case 4:
                        return "$this->num1 ÷ $this->num2 = ";
                }
            }

            public function getAnswer()
            {
                return $this->answer;
            }
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