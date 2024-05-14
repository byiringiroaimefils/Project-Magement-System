console.log("welcome to js");



let time=document.getElementById("time");
setInterval(() => {
let date=new Date();
let hour=date.getHours()
let min=date.getMinutes()
let sec=date.getSeconds()
if(hour>=12){
    time.textContent=hour + ':' + min + ':' + sec +  'P.M';
}else{
    time.textContent=hour + ':' + min + ':' + sec +  'A.M';
}
    
}, 1000);

// user

function userFunction() {
   let userTogglo=document.getElementById('user');
   userTogglo.classList.toggle("togglo")
}


function Bar(){
    let element=document.getElementById('link')
    element.classList.add('links')
}

function corss(){
    
    let element=document.getElementById('link')
    element.classList.remove('links')
}
