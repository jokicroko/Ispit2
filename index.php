<form action="check.php" method = "post">
  <label for="fname">Upišite riječ:</label><br>
  <input type="text" id="rijec" name="word"><br><br>

<input type="submit" name="name" value="Pošalji">
<br><br>

</form>

<style>
  <?php  $wordsJson = file_get_contents('words.json');
        $words = json_decode($wordsJson, true); ?>
table, th, td {
  border: 1px solid black;
}
</style>
<table style = "width:30%">
  <tr>
    <th>Riječ</th>
    <th>Broj slova</th>
    <th>Broj suglasnika</th>
    <th>Broj samoglasnika</th>
</tr>
<?php
            foreach ($words as $word) {
                echo    "<tr>";
                echo        "<td>$word[word]</td>";
                echo        "<td>$word[noLetters]</td>";
                echo        "<td>$word[noConsonants]</td>";
                echo        "<td>$word[noVowels]</td>";
                echo    "</tr>";
            }
            ?>
 
</table>

