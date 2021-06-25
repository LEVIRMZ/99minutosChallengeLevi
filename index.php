<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div>
            <h3>Returns the height of a binary tree given an integers list</h3>
            <form method="POST" action="api/challenge.api.php">
                <input type="submit" class="boton" value="Get Height">
                <input type="hidden" value="GETBYN453" name="request_code">
            </form>
            <hr>
        </div>
        
        <div>
            <h3>Returns the neighbor nodes of the node that contains the given integer</h3>
            <form method="POST" action="api/challenge.api.php">
                <input type="number" name="nodo" value="2">
                <input type="submit" class="boton" value="Get Neighbor Nodes">
                <input type="hidden" value="GETNeighbor" name="request_code">
            </form>
            <hr>
        </div>
        
        <div>
            <!--  -->
            <h3>Returns the breadth-first search (BFS) of the binary tree [-3,-4,1]</h3>
            <form method="POST" action="api/challenge.api.php">
                <input type="submit" class="boton" value="BFS">
                <input type="hidden" value="GETBFS" name="request_code">
            </form>
            <hr>
        </div>
    </body>
</html>
