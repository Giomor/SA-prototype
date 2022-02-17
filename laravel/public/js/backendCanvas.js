
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
function canvasDraw(uid,elems,crowdSize){
    document.onreadystatechange = function () {
        if(document.readyState=="complete"){
        var elemsP=JSON.parse(elems);
        let canvas = document.querySelector("#canvasClick");
        elemsP.forEach(element => {
            let x=Math.floor((Math.random() * (canvas.clientWidth)) );
            let y=Math.floor((Math.random() * (canvas.clientHeight)));
            rectangles.push({"x":x,"y":y,"color":"#56A7E2","w":20,"h":20,"id":element.id});
        });
        for(var i=0; i<crowdSize;i++){
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

            });
        }
    }
}
