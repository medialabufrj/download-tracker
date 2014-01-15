<?php
	
	$site_name = "YOUR SITE NAME";
	$analytics_id = "UA-XXXXXXXX-X";
	$file_exist = isset($_GET["file"]) && file_exists('arquivos/'.$_GET["file"]);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title><?php echo $site_name; ?> downloads</title>
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Titillium+Web:400,400italic,700,700italic">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
	<style type="text/css">
		body {
			font-family: 'Titillium Web', sans-serif;
		}
		a {
			color: #00aeef;
		}
		h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
			font-family: 'Titillium Web', sans-serif;
		}
	</style>
</head>
<body>

<?php if($file_exist): ?>

	<div class="container">

		<h1><a href="/"><?php echo $site_name; ?></a></h1>
		<h3>Baixando <?php echo $_GET["file"]; ?></h3>

		<iframe id="frame" style="display:none"></iframe>

		<div id="contador_texto">
			Aguarde, download em <span id="contador">  </span> segundos.
		</div>

		<div id="link" style="display:none">
			Caso o download não comece automaticamente, <a href="javascript:download('file.ext')" id="link">clique aqui</a>.
		</div>
	</div>

	<script type="text/javascript">

		var time = 5;
		var file = "<?php echo $_GET["file"]; ?>";
		var timer = setInterval(count,1000);

		document.getElementById("contador").innerHTML = time;

		function download() {
			clearInterval(timer);
			var ifrm = document.getElementById('frame');
			ifrm.src = "download.php?path=arquivos/"+file+"&name="+file;
		}	

		function count() {
			if(time == 1) {
				$('#link').fadeIn(300);
				document.getElementById("contador_texto").style.display="none";
				download();
			} else {
				time--;
				document.getElementById("contador").innerHTML = time;
			}
		}

		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', '<?php echo $analytics_id; ?>']);
		_gaq.push(['_trackPageview']);
		(function () {
			var ga = document.createElement('script');
			ga.type = 'text/javascript';
			ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';

			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(ga, s);
		})();

	</script>

<?php else: ?>

	<div class="container">

		<h1><a href="/"><?php echo $site_name; ?></a></h1>
		<h3>Arquivo não encontrado.</h3>

	</div>

<?php endif; ?>

</body>
</html>