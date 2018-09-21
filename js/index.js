    /* Lined TextArea */
    $(function() {
	  	// Target all classed with ".lined"
	  	$(".lined").linedtextarea(
	    {selectedLine: 1}
	  	);
	  	// Target a single one
	    $("#mytextarea").linedtextarea();
	});

	/* Load your code file */
	function loadCodeFileAsText()
	{
        var fileToLoad = document.getElementById("codeFile").files[0];
 
        var fileReader = new FileReader();
        fileReader.onload = function(fileLoadedEvent) 
        {
            var textFromFileLoaded = fileLoadedEvent.target.result;
            document.getElementById("codeArea").value = textFromFileLoaded;
        };
        fileReader.readAsText(fileToLoad, "UTF-8");
	}

	/* Load your input file */
	function loadInputFileAsText()
	{
        var fileToLoad = document.getElementById("inputFile").files[0];
 
        var fileReader = new FileReader();
        fileReader.onload = function(fileLoadedEvent) 
        {
            var textFromFileLoaded = fileLoadedEvent.target.result;
            document.getElementById("inputArea").value = textFromFileLoaded;
        };
        fileReader.readAsText(fileToLoad, "UTF-8");
	}

    /* Load example language template */
    code0 = "#include <stdio.h>\n\nint main()\n{\n\t//type your code here\n\treturn 0;\n}";
    code1 = "#include <iostream>\nusing namespace std;\n\nint main()\n{\n\t//type your code here\n\treturn 0;\n}";
    code2 = "/* Do not place package name*/\nimport java.util.*;\nimport java.lang.*;\nimport java.io.*;\n\nclass CompileIt\n{\n\tpublic static void main (String[] args)\n\t{\n\t\t//type your code here\n\t}\n}";
    document.getElementById('codeArea').innerHTML = code0;
    function setLanguage(t) {
        var optionValue = t.value;
        if (optionValue == "1")
        {
            document.getElementById('codeArea').innerHTML = code0;
        } 
        else if (optionValue == "2")
            document.getElementById('codeArea').innerHTML = code1;
        else if (optionValue == "3")
            document.getElementById('codeArea').innerHTML = code1;
        else if (optionValue == "4")
            document.getElementById('codeArea').innerHTML = code2;
    }; 