<html>
    <body>
<table>
    <tbody>

    </tbody>
</table>        
    </body>
</html>
<script>
function shuffleArray(array) {
  for (var i = array.length - 1; i > 0; i--) {
    var j = Math.floor(Math.random() * (i + 1));
    var temp = array[i];
    array[i] = array[j];
    array[j] = temp;
  }
}

function generateCombinations(sequence, currentCombination, startIndex, results) {
  if (currentCombination.length === 6) {
    results.push(currentCombination.slice());
    return;
  }

  for (var i = startIndex; i < sequence.length; i++) {
    currentCombination.push(sequence[i]);
    generateCombinations(sequence, currentCombination, i + 1, results);
    currentCombination.pop();
  }
}

var sequence = [];
for (var i = 1; i <= 45; i++) {
  sequence.push(i);
}

shuffleArray(sequence);

var combinations = [];
generateCombinations(sequence, [], 0, combinations);

// Shuffle numbers within each combination
for (var j = 0; j < combinations.length; j++) {
  shuffleArray(combinations[j]);
}

// Display the first 100 combinations in a table
var table = document.createElement('table');
var tbody = document.createElement('tbody');

for (var j = 0; j < 500 && j < combinations.length; j++) {
  var combination = combinations[j];
  var row = document.createElement('tr');

  var cell = document.createElement('td');
  cell.textContent = combination.join('-');
  row.appendChild(cell);

  tbody.appendChild(row);
}

table.appendChild(tbody);
document.body.appendChild(table);


</script>