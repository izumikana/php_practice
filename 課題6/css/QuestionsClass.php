        <?php
        class Question
        {
            // private : 同じクラスの中でのみアクセス可能
            // public : どこからでもアクセス可能

            private $num1;
            private $num2;
            private $operator;
            private $answer;

            // コンストラクタ（初期化メソッド）
            public function __construct()
            {
                $this->num2 = rand(1, 10);
                $this->num1 = $this->num2 * rand(1, 10);
                $this->operator = rand(1, 4);
                $this->calculateAnswer();
            }
            // メソッド（関数）の定義
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
