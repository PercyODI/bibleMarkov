<?php
    exec('python bibleMarkov.py', $result);
    foreach ($result as $line) {
        echo "<div class='grid-item'>" . ucfirst($line) . "</div>";
    }
?>