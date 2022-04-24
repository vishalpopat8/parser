        <?php
        $tmpName = $_FILES['ufile']['tmp_name'];
        
        $handle = fopen($tmpName, "r");
        

        if (pathinfo($_FILES['ufile']['full_path'], PATHINFO_EXTENSION)=="csv") {

            $data=explode(",", str_replace('"', "",(fgets($handle)))); 
            
            ?>
            <table border="1">
                <tr>
                    <th>Sr No.</th>
                    <?php foreach ($data as $k) {
                        ?>
                        <th><?=$k?></th><?php
                    } ?>
                </tr>
                <?php 
                $number = 1;

                while (!feof($handle)) {
                    $d=explode(",", str_replace('"', "",nl2br(fgets($handle)))); 
                    echo "<tr>";
                    echo "<td><b>" . $number . "</b></td>";
                    foreach($d as $k1){
                        echo "<td>".$k1."</td>";
                    }
                    echo "</tr>";
                    $number++;
                }

                ?>

            </table>
            <?php
        }
        elseif (pathinfo($_FILES['ufile']['full_path'], PATHINFO_EXTENSION)=="tsv") {

            $data=explode("\t", str_replace('"', "",(fgets($handle)))); 

            ?>
            <table border="1">
                <tr>
                    <th>Sr No.</th>
                    <?php foreach ($data as $k) {
                        ?><th><?=$k?></th><?php
                    } ?>
                </tr>
                <?php 
                $number = 1;
                while (!feof($handle)) {
                    $d=explode("\t", str_replace('"', "",nl2br(fgets($handle)))); 
                    echo "<tr>";
                    echo "<td><b>" . $number . "</b></td>";
                    foreach($d as $k1){
                        echo "<td>".$k1."</td>";
                    }
                    echo "</tr>";
                    $number++;
                }

                ?>

            </table>
            <?php
        }
        else{
            echo "Invalid File Format";
        }


        fclose($handle);
        ?>
