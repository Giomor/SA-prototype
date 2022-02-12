
var rectangles=[];
function paint(rarr){
    let canvas = document.querySelector("#canvasClick");
    const ctxt = canvas.getContext('2d');
    ctxt.clearRect(0, 0, canvas.width, canvas.height);
    rarr.forEach(rect=>{
        ctxt.fillStyle = rect.color;
        if(rect.h!=undefined && rect.w!=undefined){
            ctxt.fillRect(rect.x,rect.y,rect.h,rect.w); 
        }else{
            ctxt.fillRect(rect.x,rect.y,10,10); 
        }
        if(rect.id!=undefined){
            ctxt.fillText(" "+rect.id, rect.x + rect.w , rect.y + rect.h );
        }
        console.log("x:"+rect.x+" y:"+rect.y);
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
                xmlHttp.open( "GET", "http://127.0.0.1:1337/?devid="+element+"&uid="+uid, false );
                xmlHttp.send( null );
            });
            rectangles.pop(pushed);
            paint(rectangles);
        });
        }
    }
}
//signal/22