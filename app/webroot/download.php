<?php
/*
 * download the pdf file
 */

	$fn = "files/hello.pdf".md5(time().rand(0, 1000));
	header( 'Content-type: application/PDF' );
	header('Content-Disposition: attachment; filename="test.pdf"' );
	readfile($fn);

?>