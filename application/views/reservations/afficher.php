<h1> <?php echo "$titre (Client n° $num )";?> </h1>
<p> Liste des réservations</p>

<?php echo validation_errors(); ?>

<?php echo form_open("reservations/afficher/"); echo $_SESSION['loginclient'];?>

<table class="table table-hover">
    <tr>
    <td>num de réservation</td>
    <td>date d'arrivée</td>
    <td>date de fin</td>
    <td>nombres de personnes</td>
    <td>lieu</td>
    <td>ménage</td>
    <td>état de la réservation</td>
    <td>num client</td>
    <td>chambre</td>
    <td>tarif</td>
    <td>supprimer</td>
    </tr>
    
    <?php
        foreach($reservations as $row){
            echo "<tr>";
            
                echo "<td>". $row["idsejour"] ."</td>";
                echo "<td>". $row["datedebut"] ."</td>";
                echo "<td>". $row["datefin"] ."</td>";
                echo "<td>". $row["nbpersonnes"] ."</td>";
                echo "<td>". $row["lieusejour"] ."</td>";
                if($row["menage"] == 1){
                    echo "<td> oui </td>";
                }
                else{
                    echo "<td> non </td>";
                }
                echo "<td>". $row["etatReserv"] ."</td>";
                echo "<td>". $row["idclient"] ."</td>";
                echo "<td>". $row["idheb"] . "</td>";
                echo "<td>". $row["tarifsejour"] . "</td>";
                if($row["etatReserv"] == 't'){
                echo "<td><button disabled>supprime</button></td>";
                }
                else{
                    
                   echo "<form method ='post'>
                            <td>
                                <input type='hidden' name='numsejour' value = '". $row["idsejour"] ."' />
                                <input name = 'supp' type = 'submit' value='supprime' >
                            </td>
                        </form>";
                };

            echo "</tr>";
        }
        
    ?>
    
    
</table>
<br>