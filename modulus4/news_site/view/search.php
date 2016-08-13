<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>jQuery UI Autocomplete - Remote datasource</title>
        <link rel="stylesheet" href="../style/jquery.ui.all.css">
        <script src="../js/jquery-1.7.1.js"></script>
        <script src="../js/jquery.ui.core.js"></script>
        <script src="../js/jquery.ui.widget.js"></script>
        <script src="../js/jquery.ui.position.js"></script>
        <script src="../js/jquery.ui.autocomplete.js"></script>
        <link rel="stylesheet" href="../style/demos.css">
        <style>
            .ui-autocomplete-loading { background: white url('../style/images/ui-anim_basic_16x16.gif') right center no-repeat; }
        </style>
        <script>
            $(function() {
                function log( message ) {
                    $( "<div/>" ).text( message ).prependTo( "#log" );
                    $( "#log" ).scrollTop( 0 );
                }

                $( "#birds" ).autocomplete({
                    source: "search.php",
                    minLength: 2,
                    select: function( event, ui ) {
                        log( ui.item ?
                        "Selected: " + ui.item.value + " aka " + ui.item.id :
                        "Nothing selected, input was " + this.value );
                    }
                });
            });
        </script>
    </head>
    <body>
            <div id="main">
                <div class="demo">
                    <div class="ui-widget">
                        <label for="birds">Авто: </label>
                        <input id="birds" />
                    </div>
                    <div class="ui-widget" style="margin-top:2em; font-family: Arial">
                        Результат:
                        <div id="log" style=" border: 1px solid lightgrey; height: 200px; width: 300px; overflow: auto;" class="ui-widget-content"></div>
                    </div>
                </div><!-- End demo -->
            </div>
        </div>
    </body>
</html>
