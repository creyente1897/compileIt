<?php 
$code=$_POST["code"];
$input=$_POST["input"];
$code_file="Main.java";
$error_file="error.txt";
$input_file="input.txt";
$runtime_file="runtime.txt";
$java="javac";
$executable="*.class";
$output= "timesout 6s java Main";
$cmd=$java." ".$code_file;
$cmderror=$cmd." 2> ".$error_file;
$cmdrunerror=$output." 2> ".$runtime_file;

$file_code=fopen($code_file,"w+");
fwrite($file_code, $code);
fclose($file_code);
$file_input=fopen($input_file,"w+");
fwrite($file_input, $input);
fclose($file_input);
exec("chmod 777 $executable");
exec("chmod 777 $error_file");
shell_exec($cmderror);
$error=file_get_contents($error_file);
$startTime=microtime(true);
if (trim($error)=="") {
	if(trim($input)==""){
		shell_exec($cmdrunerror);
		$runtime_error=file_get_contents($runtime_file);
		$out=shell_exec($output);
	}
	else{
		shell_exec($cmdrunerror);
		$runtime_error=file_get_contents($runtime_file);
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
}
$endTime=microtime(true);
$sec=$endTime-$startTime;
$sec=sprintf("%0.2f",$sec);
echo "<pre>Time taken: $sec</pre>";
/*if($check==1){
	echo "<pre>Compilation Error (CE)</pre>";
}*/
if($sec>5)
{
	echo "<pre>Time Limit Exceeded (TLE)</pre>";
}
/*else if(trim($out)=="")
{
	echo "<pre>Wrong Answer(WA)</pre>";
}*/
else
{
	echo "<pre>All Correct (AC)</pre>";
}
exec("rm $code_file");
exec("rm *.java");
exec("rm *.txt");
exec("rm $executable");
?>