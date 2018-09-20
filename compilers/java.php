<?php 
$code=$_POST["code"];
$input=$_POST["input"];
$code_file="Main.java";
$error_file="error.txt";
$input_file="input.txt";
$runtime_file="runtime.txt";
$java="javac";
$executable="*.class";
$out= "timesout 6s java Main";
$cmd=$java." ".$code_file;
$cmderror=$cmd." 2>".$error_file;
$cmdrunerror=$out." 2>".$runtime_file;
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
if (trim($error)=="") 
{
	if(trim($input)=="")
	{
		shell_exec($cmdrunerror);
		$runtime_error=file_get_contents($runtime_file);
		$output=shell_exec($out);
	}
	else{
		shell_exec($cmdrunerror);
		$runtime_error=file_get_contents($runtime_file);
		$out=$out." < ".$input_file;
		$output=shell_exec($out);
	}
	echo "<pre>$output</pre>";
}
else if(!strpos($error,"error"))
{
	echo "<pre>$error</pre>";
	if(trim($input)=="")
	{
		$output=shell_exec($out);
	}
	else
	{
		$out=$out."<".$input_file;
		$output=shell_exec($out);
	}
	echo "<pre>$output</pre>";
}
else
{
	echo "<pre>$error</pre>";
}
$endTime=microtime(true);
$sec=$endTime-$startTime;
$sec=sprintf("%0.2f",$sec);
echo "<pre>Time taken: $sec s</pre>";
if($sec>5)
{
	echo "<pre>Time Limit Exceeded</pre>";
}
else
{
	echo "<pre>Success</pre>";
}
exec("rm $code_file");
exec("rm *.java");
exec("rm *.txt");
exec("rm $executable");
?>
