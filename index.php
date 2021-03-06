<?php
	$dir = "./projects";
	$files = scandir($dir);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">

	<head>
		<title>chewam dev zone</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link type="text/css" rel="stylesheet" href="css/chewam.css" />
		<script type="text/javascript" src="http://lib.chewam.com/ext-core/ext-core-debug.js"></script>
		<script type="text/javascript" src="js/chewam.js"></script>
	</head>

	<body>
		<div id="main">

			<div class="wrapper">
				<div id="header">
					<div id="logo" class="floated">
						<a href="http://dev.chewam.com/">
							<img src="img/logo.png" />
						</a>
					</div>
					<div id="slogan" class="floated">
						<h1>ExtJS, Sencha and other JavaScript projects.</h1>
					</div>
					<div style="clear:both"></div>
				</div>
			</div>

			<div id="menu">
				<a class="selected">Projects</a>
				&nbsp;|&nbsp;
				<a>Tutorials</a>
				&nbsp;|&nbsp;
				<a>Contact</a>
			</div>

			<div id="page-wrapper" class="wrapper">

				<div id="projects-body" class="page">

					<div id="projects" class="floated">
						<h2>ExtJS projects</h2>
						<?php
							$html = '';
							foreach($files as $file) {
								if ($file !== '.' and $file !== '..' and is_dir($dir.'/'.$file) and substr($file, 0, 1) !== '.') {
									$html .= '<div class="project">';
									$html .= '<div class="description floated">';
									$html .= '<h3><a href="#">'.$file.'</a></h3>';

									$readme = $dir.'/'.$file.'/README';
									if (is_file($readme) and filesize($readme) > 0) {
										$handle = fopen($readme, "r");
										$readme = fread($handle, filesize($readme));
										fclose($handle);
									} else $readme = '';
									$html .= '<div class="text">'.$readme.'</div>';
								
									$html .= '<a class="link" target="_blank" href="'.$dir.'/'.$file.'/example/">demo</a>';
									$html .= '<a class="link" style="margin-left:10px" target="_blank" href="http://github.com/goldledoigt/'.$file.'">GitHub</a>';
									$html .= '</div>';

									$html .= '<div class="preview floated">';								
									if (is_dir($dir.'/'.$file.'/screenshots')) {
										$screenshots = scandir($dir.'/'.$file.'/screenshots');
										foreach($screenshots as $screenshot) {
											if ($screenshot !== '.' and $screenshot !== '..') {
												$path = $dir.'/'.$file.'/screenshots/'.$screenshot;
												$html .= '<img style="display:none;" src="'.$path.'" />';
											}
										}
									}
									$html .= '</div>';

									$html .= '<div style="clear:both"></div>';
									$html .= '</div>';
								}
							}
							print $html;
						?>
					</div>
				
					<div id="spotlight"  class="floated">
						<h2></h2>
					</div>

					<div style="clear:both"></div>
				</div>

				<div id="tutorials-body" style="display:none" class="page">
					<div class="project">pof</div>
					<div class="project">pif</div>
					<div class="project">paf</div>
				</div>

				<div id="contact-body" style="display:none" class="page">
					<div>Name:<input /></div>
					<div>eMail:<input /></div>
					<div>Message:<textarea></textarea></div>
					<div><button onclick="Chewam.sendMail();">send</button></div>
				</div>

			</div>

			<div class="wrapper">
				<div id="footer">
					<a href="http://chewam.com">Chewam</a>&nbsp;|&nbsp;<a href="http://revolunet.com">Revolunet</a>&nbsp;|&nbsp;<a href="http://quickprez.com">Quickprez</a>
				</div>
			</div>

		</div>
	</body>

</html>