<?php 
$code=$_POST["code"];
$input=$_POST["input"];
$code_file="main.c";
$error_file="error.txt";
$input_file="input.txt";
$gcc="gcc";
$executable="a.out";
$output= "timesout 5s ./a.out";
$cmd=$gcc." -lm ".$code_file;
$cmderror=$cmd." &> ".$error_file;
$check=0;
$file_code=fopen($code_file,"w+");
fwrite($file_code, $code);
fclose($file_code);
exec("chmod 777 $executable");
exec("chmod 777 $error_file");
shell_exec($cmderror);
$error=file_get_contents($error_file);
$startTime=microtime(true);
if (trim($error)=="") {
	if(trim($input)==""){
		$out=shell_exec($output);
	}
	else{
		$output=$output." < ".$input_file;
		$out=shell_exec($output);
	}
	echo "<pre>$out</pre>";
}
else if(!strpos($error,"error")) {
	echo "<pre>$error</pre>";
	if(trim($input)=="")
	{
		$out=shell_exec($output);
	}
	else{
		$output=$output."<".$input_file;
		$out=shell_exec($output);
	}
	echo "<pre>$out</pre>";
}
else{
	echo "<pre>$error</pre>";
	$check=1;
}
$endTime=microtime(true);
$sec=$endTime-$startTime;
$sec=sprintf("%0.2f",$sec);
echo "<pre>Time taken: $sec</pre>";
if($check==1){
	echo "<pre>Compilation Error (CE)</pre>";
}
else if($check==0 && $sec>3)
{
	echo "<pre>Time Limit Exceeded (TLE)</pre>";
}
else if(trim($out)=="")
{
	echo "<pre>Wrong Answer(WA)</pre>";
}
else if($check==0)
{
	echo "<pre>All Correct (AC)</pre>";
}
exec("rm $code_file");
exec("rm *.o");
exec("rm *.txt");
exec("rm $executable");
?>