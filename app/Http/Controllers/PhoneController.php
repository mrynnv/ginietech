<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function generateLetterCombinations(Request $request)
    {
        // Validate 
        $request->validate([
            'digits' => 'required|numeric', 
        ]);

        $digitMapping = [
            1 => [''],
            2 => ['a', 'b', 'c'],
            3 => ['d', 'e', 'f'],
            4 => ['g', 'h', 'i'],
            5 => ['j', 'k', 'l'],
            6 => ['m', 'n', 'o'],
            7 => ['p', 'q', 'r', 's'],
            8 => ['t', 'u', 'v'],
            9 => ['w', 'x', 'y', 'z'],
        ];

        $input = $request->input('digits');
        $result = [];
        $digits = str_split($input);
        $this->generateCombinations($digits, 0, '', $result, $digitMapping);
        sort($result);

        //  HTML content for the response
        $html = '<p>Input Number: ' . $input . '</p>';
        $html .= '<ul>';
        $count =  0;
        foreach ($result as $combination) {
            $count+=1;
            $html .= '<li>'  . $count. ' = ' . $combination . '</li>';
        }
        $html .= '</ul>';

        return $html;
    }

    private function generateCombinations($digits, $index, $current, &$result, $digitMapping)
    {
        if ($index == count($digits)) {
            $result[] = $current;
            return;
        }

        $digit = $digits[$index];
        $letters = $digitMapping[$digit];

        // Generate combinations for the next digit
        foreach ($letters as $letter) {
            $this->generateCombinations($digits, $index + 1, $current . $letter, $result, $digitMapping);
        }
    }
}