document.write('<script src="https://cdn.socket.io/4.6.0/socket.io.min.js" integrity="sha384-c79GN5VsunZvi+Q/WObgk2in0CbZsHnjEqvFxC5DxHn9lTfNce2WW6h2pH6u/kF+" crossorigin="anonymous"> </script><script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script><script>;$(function(){let ipAdress="127.0.0.1";let socketPort="3000";let socket=io(ipAdress+":"+socketPort);socket.on("connection");var e=[];document.addEventListener("mousemove",function(t){var o=t.type,s=t.pageX,n=t.pageY;e.push({"type":t.type,"pageX":t.pageX,"pageY":t.pageY});setInterval(()=>{if(e.length>0){socket.emit("sendDataToServer",e);e=[]}else{e.push({"type":"stop","pageX":"","pageY":""});socket.emit("sendDataToServer",e);e=[]}},6000)});document.addEventListener("click",function(t){e.push({"type":t.type,"pageX":t.pageX,"pageY":t.pageY});socket.emit("sendDataToServer",e);e=[]});document.addEventListener("scroll",(event)=>{e.push({"type":event.type,"scrollX":window.scrollX,"scrollY":window.scrollY});socket.emit("sendDataToServer",e);e=[]});document.addEventListener("touchmove",(event)=>{e.push({"type":event.type,"scrollX":window.scrollX,"scrollY":window.scrollY});socket.emit("sendDataToServer",e);e=[]})});</script>')