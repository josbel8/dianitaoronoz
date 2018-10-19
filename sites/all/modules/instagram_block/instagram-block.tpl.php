<?php
/**
 * @file
 * Instagram block content.
 *
 * Available variables:
 *  content:   The Instagram images.
 *  response:  Instagram API response.
 */

echo "<a href='https://www.instagram.com/dianitaoronoz'>
		<div class='cursive_title ig'>S&iacute;gueme en&nbsp;&nbsp;</div>
		<div class='title_two ig'>Instagram</div>
		<div class='orange_bar ig'></div>
	 </a>
	 <br>
	 <div class='images-ig'>";
print render($content);
echo "</div>";
