<?php
function sctonum($num){
	if(false !== stripos($num, "e")) {
		$a = explode("e",strtolower($num));
		return bcmul($a[0], bcpow(10, $a[1]));
	} else {
		return ''.$num;
	}
}

function safe_convert_big_number($numstring, $frombase, $tobase)
{
	$chars = "0123456789abcdefghijklmnopqrstuvwxyz";
	$tostring = substr($chars, 0, $tobase);

	$length = strlen($numstring);
	$result = '';
	for ($i = 0; $i < $length; $i++)
	{
		$number[$i] = strpos($chars, $numstring{$i});
	}
	do
	{
		$divide = 0;
		$newlen = 0;
		for ($i = 0; $i < $length; $i++)
		{
			$divide = $divide * $frombase + $number[$i];
			if ($divide >= $tobase)
			{
				$number[$newlen++] = (int)($divide / $tobase);
				$divide = $divide % $tobase;
			} elseif ($newlen > 0)
			{
				$number[$newlen++] = 0;
			}
		}
		$length = $newlen;
		$result = $tostring{$divide} . $result;
	} while ($newlen != 0);
	return $result;
}
function safe_dechex($n) {
	$s=sctonum($n);
	return safe_convert_big_number($s, 10, 16);
}
function safe_hexdec($hex) {
	return hexdec($hex);
}
