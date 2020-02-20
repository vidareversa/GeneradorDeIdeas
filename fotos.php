<?php

$images = array();
if ($handle = opendir('images/')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            $images [] = $entry;
        }
    }
    closedir($handle);
}

?>


<html>
    
    <head>
        <script>
            
            var p = prompt("Ingrese key", "");
            
            if (p == '123321123321') {
                var imagenes = [<?php echo '"'.implode('","', $images).'"'; ?>];            
                console.log(imagenes);
            }
            function rotarImagenes () {
                
                var index=Math.floor((Math.random()*imagenes.length));                
                document.getElementById("imagen").src="images/"+imagenes[index];
            }
            
            onload = function() {
                rotarImagenes();
                setInterval(rotarImagenes,250);
            }
          
        </script>
    </head>
    <body>
        <div style="width:800px;height:800px;margin:5px auto; border:1px solid black;">
            <img src="" id="imagen" style="min-width: 100%;min-height: 100%;max-width: 100%;max-height:100%;">
        </div>
    </body>
</html>