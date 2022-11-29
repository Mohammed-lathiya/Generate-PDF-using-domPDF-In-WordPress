<?php

add_action('wp_ajax_create_pdf_certificate', 'create_pdf_certificate');

use Dompdf\Dompdf;

function create_pdf_certificate(){
	
	ob_start();

	require_once(PC_PATH . '/dompdf/autoload.inc.php'); ?>

	<!DOCTYPE html>
	<html>

	<head>
		<meta charset='utf-8'>
		<style>
			@page {
				size: 850pt 700pt;
			}

			@font-face {
				font-family: spartanSemiBold;
				src: url(<?php echo PC_URI; ?>'/dompdf/lib/fonts/spartanSemiBold.ttf');
			}

			@font-face {
				font-family: sanchezRegular;
				src: url(<?php echo PC_URI; ?>'/dompdf/lib/fonts/sanchezRegular.ttf');
			}

			body,
			html {
				padding: 0;
				margin: 0;
				background-color: #fffff9;
				font-family: myFontName;
			}

			.wrapper_main {
				height: auto;
				width: 100%;
				background-color: #fff;
				position: relative;
				color: #30231a;
				font-size: 25px
			}

			.wrapper_main::after {
				content: "";
				position: absolute;
				width: 0;
				height: 0;
				top: 0;
				left: 0;
				border-top: 400px solid #ffde59;
				border-right: 400px solid transparent;
				z-index: 1
			}

			.wrapper_main::before {
				content: "";
				position: absolute;
				width: 0;
				height: 0;
				bottom: 0;
				right: 0;
				border-bottom: 400px solid #ffde59;
				border-left: 400px solid transparent;
				z-index: 1
			}

			.top_section {
				position: absolute;
				width: 400px;
				height: 400px;
				left: 15px;
				top: 15px;
				z-index: 2
			}

			.top_section img {
				width: 100%;
				height: 100%
			}

			.bottom_section {
				position: absolute;
				width: 380px;
				height: 300px;
				right: 15px;
				bottom: 15px;
				z-index: 2
			}

			.bottom_section img {
				width: 100%;
				height: 100%
			}

			.content {
				display: block;
				position: relative;
				top: 150px;
				width: 100%;
				float: right;
				margin-right: 100px;
				margin-left: 400px
			}

			.content p.h2 {
				font-family: spartanSemiBold;
				font-size: 35px;
				color: #30231a;
				text-transform: uppercase;
				border-bottom: 10px solid #058ed0;
				letter-spacing: 0px;
				padding: 0 0 10px;
				margin: 0
			}

			.content p.strong {
				font-family: sanchezRegular;
				font-size: 24px;
				color: #30231a;
				text-transform: uppercase;
				letter-spacing: 1.5px;
				padding: 40px 0 0;
				margin: 0;
				display: block
			}

			.content p.h1 {
				font-family: sanchezRegular;
				font-size: 75px;
				color: #30231a;
				padding: 0;
				margin: 0px 0 35px
			}

			.content p.p {
				font-family: sanchezRegular;
				font-size: 22px;
				color: #0e4573;
				max-width: 500px;
				padding: 0;
				margin: 0 0 50px;
				line-height: 24px
			}

			.content p.h3 {
				font-family: spartanSemiBold;
				font-size: 22px;
				color: #30231a;
				padding: 0;
				text-transform: uppercase;
				border-top: 7px solid #0e4573;
				max-width: 300px;
				padding: 10px 0 0;
				margin: 0;
				display: block
			}

			.content p.h6 {
				font-family: sanchezRegular;
				font-size: 18px;
				color: #0e4573;
				margin: 0;
				padding: 4px 0 0
			}
		</style>
		<title>Title</title>
	</head>

	<body>
		<div class="wrapper_main">
			<div class="top_section">
				<img src="<?php echo home_url(); ?>/wp-content/uploads/2020/08/1.png" alt="top image">
			</div>
			<div class="content">
				<p class="h2">Winners Certificate</p>
				<p class="strong">This is Presented to</p>
				<p class="h1">"My Name"</p>
				<p class="p">for winning 1st place in the Global Breed Shows competition "Competition Name & Date".</p>
				<p class="h3">Tonny Wonka</p>
				<p class="h6">CEO & Founder</p>
			</div>
			<div class="bottom_section">
				<img src="<?php echo home_url(); ?>/wp-content/uploads/2020/08/abc.png" alt="bottom image">
			</div>
		</div>
	</body>

	</html>

	<?php
	$html = ob_get_clean();
	$dompdf = new Dompdf();
	$dompdf->loadHtml($html);
	$dompdf->set_option('isRemoteEnabled', TRUE);
	//$dompdf->setPaper('A3', 'portrait');
	$dompdf->set_paper(array(0, 0, 200, 300));
	$dompdf->render();
	$dompdf->stream("codexworld1", array("Attachment" => 0));
	die;
}


?>
