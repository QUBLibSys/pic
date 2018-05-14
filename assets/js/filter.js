function filter(str){
    if(str==""){
      document.getElementById("txtHint").innerHTML="";
      return;
    }
    if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onReadyStateChange=function(){
        if(this.readyState==4 && this.status==200){
            document.getElementById("txthint").innerHTML=this.responseText;
        }
    }
    xmlhttp.open("GET", "search_view.php?q="+str, true);
    xmlhttp.send();
  }