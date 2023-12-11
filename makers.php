<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Autók</title>
    <link rel="stylesheet" href="fontawesome\css\all.css" type="text/css">
</head>
<body>
    <nav>
        <a href="index.php"><i class="fa fa-home" title="Kezdőlap"></i></a>
        <a href="makers.php"><button>Gyártók</button></a>
        <a href="models.php"><button>Modellek</button></a>
    </nav>
    <h1>Gyártók</h1>
    <?php
        require_once 'DBMaker.php';
        $carMaker = new DBMaker();
        $abc = $carMaker->getAbc();
        /*
        var_dump($abc);
        return;
        */

        echo "<div style='display: flex'>";
        foreach ($abc as $char){
            echo" 
                <form method='post' action='makers.php'>
                    <input type='hidden' name='ch' value='{$char['ch']}'>
                    <button type'submit'>{$char['ch']}</button>&nbsp;
                </form>
                ";
            
        }
        echo "</div><br>";

        if (isset($_POST['ch'])) {
            //var_dump($all);
            echo'<table>
            <thead>
                <tr>
                    <th>#</th><th>Megnevezés</th><th>Művelet</th>
                </tr>
                <tr id="editor" style="display:none">
                    <input type="hidden" id="id" name="id">
                    <th colspan="3">
                        <input type="search" id="edit-box" name="name">
                        <button id="btn-save" title="Ment">
                            <i class="fa fa-save"></i>
                        </button>
                        <button id="btn-cancel" title="Mégse">
                            <i class="fa fa-cancel"></i>
                        </button>
                    </th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            
            ';
            $ch = $_POST['ch'];
            $makers = $carMaker->getByFirstCh($ch);
            foreach ($makers as $maker) {
                $id = $maker['id'];
                $name = $maker['name'];
                echo "<tr>
                    <td>$id</td>
                    <td>$name</td>
                    <td>Mod / Del</td>
                </tr>
                ";
            }
            echo"<tfoot>
            
            </tfoot>
            </table>
            ";
        }

        
    ?>
</body>
</html>