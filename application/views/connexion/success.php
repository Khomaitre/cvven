<?php 
if (isset($_SESSION['idclient'])) {
    $_SESSION['loginclient'] = $_SESSION['loginclient'];
	redirect('Reservations/afficher/'.$_SESSION['idclient']);
} else {
	show_404();
}