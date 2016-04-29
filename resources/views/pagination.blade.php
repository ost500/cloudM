<?php
for ($i = (int)$start; $i <= (int)$end; $i++) {
    echo "<a id = \"id" . ($i - (5 * ($start / 5)) + 1) . "\" style = \"cursor: pointer\" >" . $i . "</a >";
}
?>
