<?php

function consonants_vowels($word){
    $word = strtolower($word);
    $consonants = 0;
    $vowels = 0;
    $allVowelLetters = ["a", "e", "i", "o", "u"];

    for ($i=0; $i < strlen($word); $i++) {
        if (in_array($word[$i], $allVowelLetters)) {
            $vowels++;
        } elseif ($word[$i] >= 'a' && $word[$i] <= 'z') {
            $consonants++;
        }
    }
    return [$consonants, $vowels];
}

$_SESSION['error_message'] = NULL;


$word = $_POST['word'];
$noCharacters = strlen($word);
[$noConsonants, $noVowels] = consonants_vowels($_POST['word']);

if ($noCharacters == 0) {
    $_SESSION['error_message'] = 'Empty';
} elseif ($noCharacters > $noConsonants + $noVowels) {
    $_SESSION['error_message'] = 'NonLetterUsed';
} else {
    $wordsJson = file_get_contents('words.json');
    $words = json_decode($wordsJson, true);
    $words[] = [
        'word' => $word,
        'noLetters' => $noCharacters,
        'noConsonants' => $noConsonants,
        'noVowels' => $noVowels
    ];

    $wordsJson = json_encode($words);
    file_put_contents('words.json', $wordsJson);
    
}

require 'index.php';
?>
