<?php

class Problem
{
    private $operation;

    public function __construct($operation)
    {
        $this->operation = $operation;
    }

    public function generateProblem()
    {
        $operators = array();

        if ($this->operation == "all") {
            $operators = array("+", "-", "*", "/");
        } elseif ($this->operation == "add") {
            $operators = array("+");
        } elseif ($this->operation == "subtract") {
            $operators = array("-");
        } elseif ($this->operation == "multiply") {
            $operators = array("*");
        } elseif ($this->operation == "divide") {
            $operators = array("/");
        } else {
            throw new Exception("Invalid operation");
        }

        $operator = $operators[array_rand($operators)];
        $num1 = rand(1, 10);
        $num2 = rand(1, 10);

        switch ($operator) {
            case "+":
                $answer = $num1 + $num2;
                break;
            case "-":
                $answer = $num1 - $num2;
                break;
            case "*":
                $answer = $num1 * $num2;
                break;
            case "/":
                $num1 = $num2 * rand(1, 10);
                $answer = $num1 / $num2;
                break;
        }

        $problemText = " {$num1} {$operator} {$num2}";

        return array($problemText, $answer);
    }
}
