<?php
echo "<table border=1 align=center>";

echo "<tr><th rowspan=1></th>";

for($th=0; $th <= 12; $th++) {
    echo "<th>$th</th>";
}
echo "</tr>";

for ($tr=0; $tr <= 12; $tr++) {
    echo "<tr><th>$tr</th>";

    for ($td=0; $td <= 12; $td++) {
        $m = $tr*$td;
        echo "<td>$m</td>";
    }
    echo "</tr>";
}

echo "</table>";
?>