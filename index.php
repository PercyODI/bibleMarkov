<!DOCTYPE html>
<html>
    <head>
        <?php
            ini_set('display_errors',1);
            ini_set('display_startup_errors',1);
            error_reporting(-1);
        ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        
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
            
            .loading {
                text-align: center;
            }
        </style>
        
        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.2/masonry.pkgd.js"></script>
        <script>
            var is_loading = false;
            
            function loadChains() {
                if($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
                    if(is_loading == false) {
                        $('.loading').show('fast');
                        is_loading = true;
                        // alert("Scrolled!");
                        console.log("Scrolling...");
                        // console.log("Window ScrollTop: " + $(window).scrollTop());
                        // console.log("Window Height: " + $(window).innerHeight());
                        // console.log("Document Height: " + $(document).height());
                        $.get("oneMarkov.php", function(data, status) {
                            var jData = $(data);
                            $('.grid').append(jData);
                            $('.grid-item').width(($('.container').width() / 3) - 22);
                            $('.grid').masonry('appended', jData);
                            $('.loading').hide('fast');
                            is_loading = false;
                        });
                    }
                }
            }
            $(document).ready(function () {
                $('.loading').hide();
                loadChains();
                $('.grid-item').width(($('.container').width() / 3) - 22);
                
                $('.grid').masonry({
                    itemSelector: '.grid-item'
                });
                
            });
            
            $(window).resize(function() {
                $('.grid-item').width(($('.container').width() / 3) - 22);
            });
            
            $(window).scroll(function() {
                loadChains();
            });
            
            // setInterval(function() {
            //     $.get("oneMarkov.php", function(data, status) {
            //         var jData = $(data);
            //         $('.grid').append(jData);
            //         $('.grid-item').width(($('.container').width() / 3) - 22);
            //         $('.grid').masonry('appended', jData);
            //     });
                
            // }, 3000);
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
            <div class="loading well">
                <h3>Loading More Chains</h3>
                <i class="fa fa-spinner fa-pulse fa-3x"></i>
            </div>
        </div>
    </body>
</html>