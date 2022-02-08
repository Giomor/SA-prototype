
function canvasDraw(elems){
    document.onreadystatechange = function () {
        if(document.readyState=="complete"){
        var elemsP=JSON.parse(elems);
        let canvas = document.querySelector("#canvasClick");
        elemsP.forEach(element => {        
            let x=Math.floor((Math.random() * (canvas.clientWidth/4)) );
            let y=Math.floor((Math.random() * (canvas.clientHeight/4)));
            console.log("x:"+x+" y:"+y);
            console.log(y);
            let ctxt = canvas.getContext("2d");
            ctxt.fillStyle = "#56A7E2";
            ctxt.fillRect(x,y,10,10); 
        });
        let sampleEle = document.querySelector("#canvasClick");
        sampleEle.addEventListener("mousemove", (event) => {
            var rect = event.target.getBoundingClientRect();
            var xr = event.clientX - rect.left; 
            var yr = event.clientY - rect.top; 
            console.log(event.target);
         document.querySelector("#idCoord").innerHTML = "X axis: " + (xr) + " Y axis: " + (yr);
            });
        }
    }
}