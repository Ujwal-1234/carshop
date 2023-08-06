document.getElementById('signup').style.display='none'
document.getElementById('auth').style.display='none'
document.getElementById('rgst').style.display='none'
document.getElementById('agency').style.display='none'

// localStorage.setItem('sessionid', 213)
// localStorage.removeItem('sessionid')
if(localStorage.getItem('sessionid')){
    if(localStorage.getItem('user_type')==1)
    document.getElementById('agency').style.display='block'
    // document.getElementById('auth').style.display='none';
    // document.getElementById('main').style.display='block'
    document.getElementById('lobtn').style.display='block'
    document.getElementById('lgbtn').style.display='none'
}else{
    document.getElementById('lgbtn').style.display='block';
    document.getElementById('lobtn').style.display='none';
    const loog = document.getElementsByClassName('loggedin')
    for( var i=0; i<loog.length; i++)
    {
        loog[i].style.display='none'
    }
}
// else{
    // document.getElementById('main').style.display='none'
    // document.getElementById('loggedin').style.display='none'
    
    // console.log(loog.length)
    // document.getElementById('auth').style.display='block'
// }



const auth=()=>{
    document.getElementById('auth').style.display='block'
}

const signup=()=>{
    document.getElementById('login').style.display='none'
    document.getElementById('signup').style.display='block'
}
const login=()=>{
    document.getElementById('signup').style.display='none'
    document.getElementById('login').style.display='block'
}