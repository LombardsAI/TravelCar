<html>
    <head>
<script src="../../public/js/angular.min.js"></script>
    </head>
    <body>
        <?php
 function form_begin($name, $method, $action) {
            echo ("\n<!-- ============================ -->\n");
            printf("<form name='%s' method='%s' action='%s'myForm'>\n", $name, $method, $action);
        }
        
        
        
function form_input($name, $size){
       
        echo ("<h5>$name</h5>");
        echo ("<input class= 'form-control' size=$size name=$name required>");
      
       
}
function form_select($label, $name, $size, $liste) {
            echo ("<h5>$label</h5>");
            echo ("<select class= 'form-control' size=$size name=$name required>");
            foreach ($liste as $val)
                echo ("<option>$val</option>");
            echo ("</select>");

        }

        function form_input_reset($value) {
            echo ("<button class='btn btn-danger' type='reset'>$value</button>");
        }

        function form_input_submit($value) {
            echo ("<button class='btn btn-primary' type='submit'>$value</button>");
        }

        function form_input_submit_sql($value){
     echo("<button class='btn btn-primary' type='submit' onclick=''>$value</button>");
        }

function form_end() {
            echo("</form>");
        }
        ?>
    </body>
</html>
