<?php
set_time_limit(0);
	
echo sha1_rand(10, 20, true, false, true);

function sha1_rand($minlength, $maxlength, $useupper, $usespecial, $usenumbers){
	
	/**
sha1 based random string generation 
allowed characters a-Z0-9~@#$%^*()_+-={}|][
	 */
	
    $token = '';
    
    $code_alphabet	= "abcdefghijklmnopqrstuvwxyz";
	if ($useupper) $code_alphabet .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	if ($usenumbers) $code_alphabet .= "0123456789";
	if ($usespecial) $code_alphabet .= "~@#$%^*()_+-={}|][";
	
	if ($minlength > $maxlength) 
		$length = mt_rand ($maxlength, $minlength);
	else 
		$length = mt_rand ($minlength, $maxlength);
    

	$sha1_rand = '';
	
	while(strlen($sha1_rand) < $length*2){
		$date_time = date('YmdHis') + time();
		$date_time_rand = $date_time + rand(0,10000000);
		$date_time_uniq = $date_time + uniqid();
		$sha1_rand .= sha1($date_time_rand.$date_time_uniq);
	}

	$range = strlen($code_alphabet);

    for($i=0;$i<$length*2;$i+=2){
		$rnd 	= hexdec($sha1_rand[$i].$sha1_rand[$i+1]);
		$rnd 	= $rnd%$range;
		$token .= $code_alphabet[$rnd];
    }
    return $token;
}

?>
