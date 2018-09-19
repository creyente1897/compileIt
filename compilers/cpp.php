<?php 
$code=$_POST["code"];
$input=$_POST["input"];
$code_file="main.cpp";
$error_file="error.txt";
$input_file="input.txt";
$gpp="g++";
$executable="a.out";
$output= "timesout 5s ./a.out";
$cmd=$gpp."-lm".$code_file;
$cmderror=$cmd." &> ".$error_file;
$check=0;
$file_code=fopen($code_file,"w+");
fwrite($file_code, $code);
fclose($file_code);
$file_input=fopen($input_file,"w+");
fwrite($file_input, $input);
fclose($file_input);
exec("chmod 777 $executable");
exec("chmod -R 777 $input_file");
exec("chmod -R 777 $code_file");
exec("chmod 777 $error_file");
shell_exec($cmderror);
$error=file_get_contents($error_file);
$startTime=microtime(true);
if (trim($error)=="") {
	if(trim($input)==""){
		$out=shell_exec($output);
	}
	else{
		$output=$output."< ".$input_file;
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
$sec=printf("%0.2f",$sec);
echo "<pre>Time taken: $sec</pre>";
if($check==1){
	echo "<pre>Compilation Error (CE)</pre>";
}
else if($check==0 && $seconds>3)
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