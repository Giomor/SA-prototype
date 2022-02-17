var rectangles=[];
var circles=[];
function paint(rarr){
    let canvas = document.querySelector("#canvasClick");
    const ctxt = canvas.getContext('2d');
    canvas.getContext("2d").clearRect(0, 0, canvas.width, canvas.height);
    rarr.forEach(rect=>{
        ctxt.fillStyle = rect.color;
        if(rect.circle!=undefined){
            const centerX = rect.x;
            const centerY = rect.y;
            const radius = 10;
            ctxt.beginPath();
            ctxt.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
            ctxt.fillStyle = 'green';
            ctxt.fill();
            ctxt.lineWidth = 5;
            ctxt.strokeStyle = '#003300';
            ctxt.stroke();
        }else if(rect.h!=undefined && rect.w!=undefined){
            ctxt.fillRect(rect.x,rect.y,rect.h,rect.w);
        }else{
            ctxt.fillRect(rect.x,rect.y,10,10);
        }
        if(rect.id!=undefined){
            ctxt.fillText(" "+rect.id, rect.x + rect.w , rect.y + rect.h );
        }

    });
}
function canvasDraw(uid,elems){
    document.onreadystatechange = function () {
        if(document.readyState=="complete"){
            var elemsP=JSON.parse(elems);
            let canvas = document.querySelector("#canvasClick");
            elemsP.forEach(element => {
                let x=Math.floor((Math.random() * (canvas.clientWidth)) );
                let y=Math.floor((Math.random() * (canvas.clientHeight)));
                rectangles.push({"x":x,"y":y,"color":"#56A7E2","w":20,"h":20,"id":element.id});
            });
            for(var i=0; i<10;i++){
                let x=Math.floor((Math.random() * (canvas.clientWidth)) );
                let y=Math.floor((Math.random() * (canvas.clientHeight)));
                circles.push({"x":x,"y":y,"color":"#56AFE2","w":20,"h":20,"circle":1});
            }

            paint(rectangles.concat(circles));

            let sampleEle = document.querySelector("#canvasClick");
            sampleEle.addEventListener("mousemove", (event) => {
                var rect = event.target.getBoundingClientRect();
                var xr = event.clientX - rect.left;
                var yr = event.clientY - rect.top;
                //console.log(event.target);
                document.querySelector("#idCoord").innerHTML = "X axis: " + (xr) + " Y axis: " + (yr);
            });

            let pushed=null;
            sampleEle.addEventListener("mousedown", (event) => {
                var rect = event.target.getBoundingClientRect();
                var xr = event.clientX - rect.left;
                var yr = event.clientY - rect.top;
                pushed={"x":xr,"y":yr,"color":"#000000","w":70,"h":70};
                rectangles.push(pushed);
                console.log(rectangles);
                paint(rectangles.concat(circles));
            });
            sampleEle.addEventListener("mouseup", (event) => {
                let sidex=pushed.x+pushed.w;
                let sidey=pushed.y+pushed.h;
                let ids=[];
                rectangles.forEach(element=>{
                    let sideelx=element.x+element.w;
                    let sideely=element.y+element.h;
                    if(element!=pushed){
                        if(pushed.x < element.x + element.w  && pushed.x + pushed.w  > element.x && pushed.y < element.y + element.h && pushed.y + pushed.h > element.y){
                            ids.push(element.id);
                        }
                    }
                });
                ids.forEach(element => {
                    var xmlHttp = new XMLHttpRequest();
                    xmlHttp.open( "GET", "http://127.0.0.1:1337/iotrequest?devid="+element+"&uid="+uid, false );
                    xmlHttp.send( null );
                });
                rectangles.pop(pushed);
                paint(rectangles.concat(circles));
            });
        }
    }
}

function canvasDraw2(uid,elems){
    document.onreadystatechange = function () {
        if(document.readyState=="complete"){
            var elemsP=JSON.parse(elems);
            let canvas = document.querySelector("#canvasClick");
            elemsP.forEach(element => {
                let x=Math.floor((Math.random() * (canvas.clientWidth)) );
                let y=Math.floor((Math.random() * (canvas.clientHeight)));
                rectangles.push({"x":x,"y":y,"color":"#56A7E2","w":20,"h":20,"id":element.id});
            });
            paint(rectangles);

            let sampleEle = document.querySelector("#canvasClick");
            sampleEle.addEventListener("mousemove", (event) => {
                var rect = event.target.getBoundingClientRect();
                var xr = event.clientX - rect.left;
                var yr = event.clientY - rect.top;
                //console.log(event.target);
                document.querySelector("#idCoord").innerHTML = "X axis: " + (xr) + " Y axis: " + (yr);
            });

            let pushed=null;
            sampleEle.addEventListener("mousedown", (event) => {
                var rect = event.target.getBoundingClientRect();
                var xr = event.clientX - rect.left;
                var yr = event.clientY - rect.top;
                pushed={"x":xr,"y":yr,"color":"#000000","w":70,"h":70};
                rectangles.push(pushed);
                console.log(rectangles);
                paint(rectangles);
            });
            sampleEle.addEventListener("mouseup", (event) => {
                let sidex=pushed.x+pushed.w;
                let sidey=pushed.y+pushed.h;
                let ids=[];
                rectangles.forEach(element=>{
                    let sideelx=element.x+element.w;
                    let sideely=element.y+element.h;
                    if(element!=pushed){
                        if(pushed.x < element.x + element.w  && pushed.x + pushed.w  > element.x && pushed.y < element.y + element.h && pushed.y + pushed.h > element.y){
                            ids.push(element.id);
                        }
                    }
                });
                ids.forEach(element => {
                    var xmlHttp = new XMLHttpRequest();
                    xmlHttp.open( "GET", "http://127.0.0.1:1337/iotrequest?devid="+element+"&uid="+uid, false );
                    xmlHttp.send( null );
                });
                rectangles.pop(pushed);
                paint(rectangles);
            });
        }
    }
}
//signal/22
function clientWSListener(clientid,token){
    const url="ws://127.0.0.1:9001"
    const client = mqtt.connect(url);
    const topic="signal/aggregator/"+clientid;
    client.subscribe(topic, function (err) {
        if (!err) {
            console.log(err);
        }
    });
    var usermap=new Map();
    var endcheck=new Map();

    client.on('message', function (topic, message) {
        endcheck.clear();
        const d=new Date();
        var http = new XMLHttpRequest();
        var url = 'http://127.0.0.1:8000/iot/aggregator';
        var token=document.getElementsByName("_token")[0].getAttribute("value");
        //console.log(message);
        var p=JSON.parse(message).map;
        //console.log(p);
        //controllare se tra arrivati c'è usemap se non c'è endcheck e delete se c'è lo rimuovo
        for (const [key, value] of usermap.entries()) {
            if( p.find(element=>key==element)===undefined){
                endcheck.set(key,(Math.floor((d.getTime()-value)/1000)));
            }else{
                var index = p.indexOf(key);
                if (index !== -1) {
                    p.splice(index, 1);
                }
            }
        }
        for (const [key, value] of endcheck.entries()) {
            usermap.delete(key);
        }
        p.forEach(element => {
            if(!(usermap.has(element)))usermap.set(element,d.getTime());
        });
        var params = '_token='+token+'&mapofid='+p;
        http.open('POST', url, true);
        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        http.onreadystatechange = function() {
            var body = JSON.parse(http.response).rm;
            console.log(body);
            if(body){document.getElementById("mqttUserOut").innerHTML="";

                body.forEach(element => {
                    document.getElementById("mqttUserOut").innerHTML+=
                        "<div class='container-fluid'>"+
                        "Name "+element.name+" +Description "+element.description+
                        "</div>"
                    "<br>";
                });
            }
        }
        http.send(params);
        console.log(usermap);
        console.log(endcheck);

        var paramsEC = '_token='+token+'&pec='+JSON.stringify({"check":Object.fromEntries(endcheck)});
        var url = 'http://127.0.0.1:8000/iot/endcheck';
        var http2 = new XMLHttpRequest();
        http2.open('POST', url, true);
        http2.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        http2.send(paramsEC);
        document.getElementById("wtime").innerHTML="";
        for (const [key, value] of endcheck.entries()) {


            document.getElementById("wtime").innerHTML+="id "+key+" wtime "+value+"</br>";
        }
    });
}
