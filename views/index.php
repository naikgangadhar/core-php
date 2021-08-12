<h1>Main</h1>

<?php
foreach ($_GET['data'][0] as $key => $value) {
    echo "<p>" . $key . " =====> " . $value . "</p>";
}
?>