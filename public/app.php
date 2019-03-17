<?php

require_once("vendor/autoload.php");

use Spatie\Ssr\Renderer;
use Spatie\Ssr\Engines\Node;


$engine = new Node("node", "/var/www/html/vue-ssr/temp");

$renderer = new Renderer($engine);

$context = [
    'message' => 'Test Prerendered Content!'
];


$rendered = $renderer
    ->context($context)
    ->entry(__DIR__."/js/main.js")
    ->render()
;
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/css/main.css">
    </head>
    <body>
        <?php echo $rendered; ?>
        <script type="text/javascript">
            var context = <?php echo json_encode($context) ?>;
        </script>
        <script type="text/javascript" src="/js/main.js"></script>
    </body>
</html>

