<?php

	mb_internal_encoding("UTF-8");
	mb_regex_encoding("UTF-8");
	$text = file_get_contents("test_xml.xml");
	// echo $text . PHP_EOL;
	$text = explode("\n", $text);
	$isQ = 0;
	$cntAns = 0;
	$curQuestionId = -1;

	foreach ($text as $value) {
		$curPart = trim($value);
		$val = preg_match("/<question id=\"(\d{1,})\">/", $curPart, $regs);

		if($val == 1) {
			$isQ = 1;
			$curQuestionId = $regs[1];
			$cntAns = 0;
		}

		$correctHtml = strip_tags($curPart);
		$correctHtml = ucfirst($correctHtml);
		$correctHtml = preg_replace("/ {2,}/", " ", $correctHtml);
		$correctHtml = htmlspecialchars($correctHtml);

		if(empty($correctHtml))
			continue;

		if($isQ) {
			$isQ = 0;
			echo "<p>" . $curQuestionId . ". " . $correctHtml . "</p>";
		}
		else {
			$cntAns += 1;
			echo "<p>" . $curQuestionId . "." . $cntAns . " " . $correctHtml . "</p>";			
		}

	}

?>