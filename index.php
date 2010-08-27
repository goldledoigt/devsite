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
		<div id="wrapper">

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

			<div id="body">

				<div id="projects" class="floated">
					<h2>ExtJS projects</h2>
					<?php
						$html = '';
						foreach($files as $file) {
							if ($file !== '.' and $file !== '..' and is_dir($dir.'/'.$file) and substr($file, 0, 1) !== '.') {
								$html .= '<div class="project">';
								$html .= '<div class="description floated">';
								$html .= '<h3><a href="#">'.$file.'</a></h3>';
								$html .= '<div>some text to describe the project, few words to make google happy</div>';
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
								
/*								
								$html .= '<img style="display:none;" src="http://application-express-blog.e-dba.com/wp-content/blog/extjs-grid-integration.png" />';
								$html .= '<img style="display:none" src="http://www.papygeek.com/wp-content/uploads/2007/10/ext-js-wordpress-theme-blog.png" />';
								$html .= '<img style="display:none" src="http://www.davidtan.org/wp-content/uploads/2007/12/extjs_desktop_screenshot.gif" />';
*/
								$html .= '</div>';
								$html .= '<div style="clear:both"></div>';
								$html .= '</div>';
							}
						}
						print $html;
					?>
				</div>
				
				<div id="spotlight"  class="floated">
					<h2>ExtJS projects</h2>
				</div>

				<div style="clear:both"></div>
			</div>

			<div id="footer"></div>
		</div>
	</body>

</html>