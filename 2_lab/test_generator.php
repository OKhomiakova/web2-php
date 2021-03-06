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
		$correctHtml = mb_strtolower($correctHtml, 'UTF-8');
		$correctHtml = mb_strtoupper(mb_substr($correctHtml, 0, 1, 'UTF-8'), 'UTF-8') . mb_substr($correctHtml, 1, null,'UTF-8');
		$correctHtml = preg_replace("/ {2,}/", " ", $correctHtml);
		$correctHtml = trim($correctHtml);
		$correctHtml = htmlspecialchars($correctHtml);
		if(empty($correctHtml))
			continue;
		if($isQ) {
			$isQ = 0;
			echo "<p>" . $curQuestionId . ". " . $correctHtml . "</p>";
		}
		else {
			$cntAns += 1;
			echo "<p style='padding-left:2em'>" . $curQuestionId . "." . $cntAns . " " . $correctHtml . "</p>";			
		}
	}
?>