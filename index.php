<html>
    <head>
        <?php
            ini_set('display_errors',1);
            ini_set('display_startup_errors',1);
            error_reporting(-1);
        ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <style>
            .jumbotron {
                text-align: center;
            }
            
            body {
                background-image: url('images/background.png');
            }
            
            .grid {
                margin: auto;
            }
            
            .grid-item {
                float: left;
                /*height: 75px;*/
                padding: 5px;
                margin: 0px 5px 5px 5px;
                border: 1px solid black;
                background-color: #E8E8E8;
                border-radius: 5px;
                box-shadow: 7px 3px 3px;
            }
        </style>
        
        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.2/masonry.pkgd.min.js"></script>
        <script>
            $(document).ready(function () {
                
                // $('.grid-item').width(this.innerHTML.length);
                // $('.grid-item').each(function(index, value){
                //     console.dir($(this)[0].innerHTML.length);
                //     $(this).height($(this)[0].innerHTML.length);
                // });
                $('.grid-item').width(($('.container').width() / 3) - 22);
                
                $('.grid').masonry({
                    itemSelector: '.grid-item'
                });
                
            });
            
            $(window).resize(function() {
                $('.grid-item').width(($('.container').width() / 3) - 22);
            });
        </script>
    </head>
    <body>
        <div class="container">
            <h1 class="jumbotron">MarkovChain Quotes from the Bible</h1>
            <div class="grid">
                <?php
                    $i = 1;
                    exec('python bibleMarkov.py', $result);
                    foreach ($result as $line) {
                        echo "<div class='grid-item'>" . ucfirst($line) . "</div>";
                    }
                ?>
            </div>
        </div>
    </body>
</html>