<?php

	$url = "https://issuetracker.google.com/action/issues/236298588/attachments/37716633?download.mp4";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
$result = curl_exec($ch);
preg_match("!\r\n(?:Location|URI): *(.*?) *\r\n!", $result, $matches);
$url = $matches[1];
echo $url;
?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Google Drive Player Script</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
	<!-- Plyr.io Player -->
	<link rel="stylesheet" href="https://cdn.plyr.io/3.3.12/plyr.css">
</head>
<body>

	<main role="main" class="container">
		<h1 class="mt-5 text-center">Google Drive Player Script</h1>
		<br />
		<video poster="<?php echo $url;?" id="player" playsinline controls>
			<source src="<?php echo $url;?>" type="<?php echo $url;?">
		</video>

		<br />
		<strong>Embed: </strong>
		<?php if($results['embed_id']){ echo '<textarea class="form-control">&lt;iframe src="'.base_url.'embed.php?id='.$results['embed_id'].'" width="640" height="360" frameborder="0" scrolling="no" allowfullscreen&gt;&lt;/iframe&gt;</textarea>';}?>

		<br />
		<strong>JSON: </strong><a href="<?php echo base_url.'json.php?id='.$id;?>"><?php echo base_url.'json.php?id='.$id;?></a>
		<div style="background-color: #e9ecef;">
			<pre><code> <?php echo json_encode($results, JSON_PRETTY_PRINT);?>  </code></pre>
		</div>

		<br /><br />
  </main>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<!-- Plyr JS -->
	<script src="https://cdn.plyr.io/3.3.12/plyr.js"></script>
	<script>const player = new Plyr('#player');</script>

</body>
</html>
