<html>
<head>
<script>
function showUser(str) {
   //var str=document.getElementById('userid').val();
   if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","validation.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
</head>
<body>

<form>
<input type="text"  placeholder="userid----"onchange="showUser(this.value)">
<br><input type="text" >
</form>
<br>
<div id="txtHint"><b>Person info will be listed here...</b></div>

</body>
</html>
