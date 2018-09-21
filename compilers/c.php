<?php
$code=$_POST["code"];
$input=$_POST["input"];
$code_file="main.c";
$input_file="input.txt";
$error_file="error.txt";
$gcc="gcc";
$out="timeout 5s ./a.out";
$executable="a.out";
$cmd=$gcc." -lm ".$code_file;	
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
	echo "<div class=\"alert alert-secondary\" role=\"alert\"><center>Output</center>\n<pre>$output</pre></div>";
}
else if(!strpos($error,"error"))
{
	echo "<div class=\"alert alert-warning\" role=\"alert\"><center>Error</center>\n<pre>$error</pre></div>";
	if(trim($input)=="")
	{
		$output=shell_exec($out);
	}
	else
	{
		$out=$out." < ".$input_file;
		$output=shell_exec($out);
	}
	echo "<div class=\"alert alert-secondary\" role=\"alert\"><center>Output</center>\n<pre>$output</pre></div>";
}
else
{
	echo "<div class=\"alert alert-warning\" role=\"alert\"><center>Error</center>\n<pre>$error</pre></div>";
	$flag=1;
}
$endTime = microtime(true);
$time = $endTime - $startTime;
$time = sprintf('%0.2f', $time);
echo "<div class=\"alert alert-info\" role=\"alert\">Time taken : $time s</div>";
if($flag==1)
{
	echo "<div class=\"alert alert-danger\" role=\"alert\">Compilation Error</div>";
}
else if($flag==0 && $time>3)
{
	echo "<div class=\"alert alert-danger\" role=\"alert\">Time Limit Exceeded</div>";
}
else if(trim($output)=="")
{
	echo "<div class=\"alert alert-danger\" role=\"alert\">Wrong Answer</div>";
}
else if($flag==0)
{
	echo "<div class=\"alert alert-success\" role=\"alert\">Success</div>";
}
exec("rm $code_file");
exec("rm *.o");
exec("rm *.txt");
exec("rm $executable");
?>
