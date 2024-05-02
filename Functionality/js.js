console.log("welcome to js");



let time=document.getElementById("time");
setInterval(() => {
let date=new Date();
let hour=date.getHours()
let min=date.getMinutes()
let sec=date.getSeconds()
if(hour>=12){
    time.textContent=hour + ':' + min + ':' + sec +  'p.m';
}else{
    time.textContent=hour + ':' + min + ':' + sec +  'a.m';
}
    
}, 1000);
