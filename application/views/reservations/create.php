<h1> <?php echo "$titre";?> </h1>


<?php echo validation_errors(); ?>

<?php echo form_open("reservations/create"); ?>

<form method="post">
 <input type="hidden" name="idclient" value = '1' />
 <p>Date d'arrivé : <input type="date" name="arrive" /></p>
 <p>Date de départ : <input type="date" name="depart" /></p>
 <p>Nombres de personnes : <input type="number" name="nb" /></p>
 <p>
    Lieu :
        <select name="lieu">
            <option value="Essonne">Essonne</option>
            <option value="Isère">Isère</option>
            <option value="Paris">Paris</option>
            <option value="Seine et marne">Seine et marne</option>
            <option value="Seine saint denis">Seine saint denis</option>
            <option value="Val de marne">Val de marne</option>
            <option value="Val d'oise">Val d'oise</option>
            <option value="Yveline">Yveline</option>
        </select>
 </p>
 <p>Ménage :
    <br>
    oui <input type="radio" name="men" value="1">
    <br>
    non <input type="radio" name="men" value="0">
 </p>
 <p>Type de chambre :
     <br>
    Logement <input type="radio" name="chambre" value="1">
    <br>
    Chambre double <input type="radio" name="chambre" value="2">
    <br>
    Chambre 3 lits <input type="radio" name="chambre" value="3">
    <br>
    chambre 4 lits <input type="radio" name="chambre" value="4">
    <br>
    Chambre hadicapé <input type="radio" name="chambre" value="5">
    
 </p>
 
 <p>
    <input type="submit" value="Réserver"> 
    
 </p>
   
</form>