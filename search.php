<html>
<head>
<script>
function showResult(str) {
  if (str.length<=3) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    xmlhttp=new XMLHttpRequest();
  } else {
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  console.log(str);
  if(xmlhttp.readyState == 0 || xmlhttp.readyState == 4)
  {
    str = encodeURIComponent(str)
    xmlhttp.open("GET","livesearch.php?search="+str,true);
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("livesearch").innerHTML=this.responseText;
        document.getElementById("livesearch").style.border="1px solid #A5ACB2";
      }
    }
    xmlhttp.send();
  }
}
</script>
</head>
<body>

<form action="livesearch.php">
<input type="text" size="30" l>
<div id="livesearch"></div>
</form>

</body>
</html>