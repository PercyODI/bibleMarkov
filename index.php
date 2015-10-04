<html>
    <head>
        <?php
            ini_set('display_errors',1);
            ini_set('display_startup_errors',1);
            error_reporting(-1);
        ?>
    </head>
    <body>
        <h1 style="text-align: center;">Twenty MarkovChain Quotes from the KJV Bible</h1>
        <?php
            $i = 1;
            exec('python bibleMarkov.py', $result);
            foreach ($result as $line) {
                echo "<p>" . $i++ . ". " . ucfirst($line) . "</p>";
            }
        ?>
    </body>
</html>