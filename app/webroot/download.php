<?php
/*
 * download the pdf file
 */

	$fn = "files/Resume_Wang_Ziaho.pdf";
	header( 'Content-type: application/PDF' );
	header('Content-Disposition: attachment; filename="Resume_Wang_Ziaho.pdf"' );
	readfile($fn);

?>