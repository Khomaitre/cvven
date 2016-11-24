<?php 
if (isset($_SESSION['idclient'])) {
	redirect('Reservations/afficher/'.$_SESSION['idclient']);
} else {
	show_404();
}