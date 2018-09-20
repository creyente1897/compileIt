<?php
$code=$_POST["code"];
$input=$_POST["input"];
$code_file="main.c";
$input_file="input.txt";
$error_file="error.txt";
$gpp="g++";
$out="timeout 5s ./a.out";
$executable="a.out";
$cmd=$gpp." -lm ".$code_file;	
$cmd_error=$cmd." 2>".$error_file;
$flag=0;
$file_code=fopen($code_file,"w+");
fwrite($file_code,$code);
fclose($file_code);
$file_input=fopen($input_file,"w+");
fwrite($file_input,$input);
fclose($file_input);
exec("chmod 777 $executable"); 
exec("chmod 777 $error_file");	
shell_exec($cmd_error);
$error=file_get_contents($error_file);
$startTime = microtime(true);
if(trim($error)=="")
{
	if(trim($input)=="")
	{
		$output=shell_exec($out);
	}
	else
	{
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
		$out=$out." < ".$input_file;
		$output=shell_exec($out);
	}
	echo "<pre>$output</pre>";
}
else
{
	echo "<pre>$error</pre>";
	$flag=1;
}
$endTime = microtime(true);
$time = $endTime - $startTime;
$time = sprintf('%0.2f', $time);
echo "<pre>Time taken : $time s</pre>";
if($flag==1)
{
	echo "<pre>Compilation Error</pre>";
}
else if($flag==0 && $time>3)
{
	echo "<pre>Time Limit Exceeded</pre>";
}
else if(trim($output)=="")
{
	echo "<pre>Wrong Answer</pre>";
}
else if($flag==0)
{
	echo "<pre>Success</pre>";
}
exec("rm $code_file");
exec("rm *.o");
exec("rm *.txt");
exec("rm $executable");
?>
