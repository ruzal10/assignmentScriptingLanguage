<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Module</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div>
        <input type="text" placeholder="Search Users" id="search" name="search" autocomplete="off" onkeyup="searchfun(this.value)">
        <div id="result">
        </div>
    </div>
    <script>
        function searchfun(inp){
            if(inp=='')
            {
                document.getElementById("result").innerText="";
                return;
            }
            else{
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200 ){
                        document.getElementById("result").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","getsearch.php?input="+inp,true);
                xmlhttp.send();
            }
        }
    </script>
</body>
</html>