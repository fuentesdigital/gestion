function abrir_ventanita(url)
{window_ver=window.open(url,"ventanita","toolbar=no,location=no,directories=no,status=no,menuBar=no,scrollBars=yes,resizable=yes,left=1,top=1,width=700,height=380");window_ver.focus();}
function toggle(){var ele=document.getElementById("toggleText");var text=document.getElementById("displayText");if(ele.style.display=="block"){ele.style.display="none";text.innerHTML="CMS - DEMO";}
else{ele.style.display="block";text.innerHTML="CMS - DEMO";}}