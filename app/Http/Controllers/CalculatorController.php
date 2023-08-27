<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function showCalculator()
    {
        return view('calculator');
    }

    public function calculate(Request $request)
    {

        $operation = $request->input('operation');
        $operand1 = $request->input('operand1');
        $operand2 = $request->input('operand2');

        switch ($operation) {
            case 'plus':
                $result = $operand1 + $operand2;
                break;
            case 'minus':
                $result = $operand1 - $operand2;
                break;
            case 'multiply':
                $result = $operand1 * $operand2;
                break;
            case 'divide':
                $result = $operand1 / $operand2;
                break;
            default:
                $result = 'Invalid operation';
        }
        return response()->json(['result'=>$result]);
    }
}
