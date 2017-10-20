<?php
class QuestionParser {
	
	private $COMMA_SEPARATOR = "cs~";
	private $OPTION_SEPARATOR = "os~";
	private $OPTION_ANSWER_SEPARATOR = "oas~";
	
	function parse($question){
		$question = str_replace("{", "cbs~",$question);
		$question = str_replace("}", "cbe~",$question);
		$question = str_replace("(", "ibs~",$question);
		$question = str_replace(")", "ibe~",$question);
		$question = str_replace("'", "sp~",$question);
		$question = str_replace(",", $COMMA_SEPARATOR,$question);
		$question = str_replace("\"", "dp~",$question);
		return $question;
	}
	function format($question){
		$question = str_replace("cbs~","{",$question);
		$question = str_replace("cbe~","}",$question);
		$question = str_replace("ibs~","(",$question);
		$question = str_replace("ibe~",")",$question);
		$question = str_replace("sp~","'",$question);
		$question = str_replace($COMMA_SEPARATOR,",",$question);
		$question = str_replace("dp~","\"",$question);
		return $question;
	}
	
}
?>