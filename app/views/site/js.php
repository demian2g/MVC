<?php
?>

<script>

    function Point(x,y){
        this.x = x;
        this.y = y;
        this.print = function () {
            document.write(this.x + this.y);
        }
    }

    Point.MaxPoint = 100;

    var p1 = new Point(20,20);
//    p1.print();
//    document.write(Point.MaxPoint);

    var p2 = new Date();
    document.write(typeof p2.toString());

</script>
