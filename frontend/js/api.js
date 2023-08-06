

    let xhr = new XMLHttpRequest();
    xhr.open("GET", '../../carshop/backend/getdata.php', true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                const data = xhr.response;
                const json_data = JSON.parse(data)
                console.log(data)
                if(json_data.result == 'success'){
                    for( var i=0; i<json_data.data.length; i++)
                    {
                        document.getElementById('carlist').innerHTML+='<p class=" w-3/4 bg-white justify-center m-2 p-3 flex rounded-md"><span class=" flex items-center m-2"> Model :'+json_data.data[i].vmodel+'</span><span class=" flex items-center"> Vehicle Number'+json_data.data[i].vnumber+'</span><span class=" flex items-center m-2"> Capacity :'+json_data.data[i].scapacity+'</span><a class="loggedin flex items-center m-2"><label> rate :'+json_data.data[i].rpday+'/day<select id="'+json_data.data[i].vnumber+'" class="cursor-pointer"><option>days</option><option value="5">5</option><option value="10">10</option><option value="20">20</option><option value="30">30</option><option value="45">45</option> <option value="60">60</option></select></label><label>Date to Rent From<input id="d'+json_data.data[i].vnumber+'" type="date"></label></a><input class="bg-primary text-white p-3 m-2 border-primary border-2 rounded-md hover:cursor-pointer hover:bg-white hover:text-primary cursor-pointer" type="submit" onClick=rent_car('+"'"+json_data.data[i].vnumber+"'"+','+"'"+document.getElementById(json_data.data[i].vnumber) +"'"+','+"'"+document.getElementById('d'+json_data.data[i].vnumber) +"'"+','+"'"+localStorage.getItem("sessionid")+"'"+') value="Rent Car"></p>'
                    }
                }
            }
        }
    }
 
    xhr.send();    


function rent_car( vnumber, days, dfrom, sessionid){
    console.log(vnumber, days, dfrom, sessionid)
}

const _login = ()=>{
    console.log("login clicked")
    const email = document.getElementById('email').value
    const pass =  document.getElementById('password').value
    console.log(email)
    console.log(pass)
    let xhr = new XMLHttpRequest();
    xhr.open("GET", '../../carshop/backend/login.php?email='+email+'&pass='+pass, true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                const data = xhr.response;
                const json_data = JSON.parse(data)
                console.log(json_data)
                if(json_data.result =='success')
                {
                    localStorage.setItem("sessionid", json_data.session_id)
                    localStorage.setItem("user_type", json_data.user_type)
                    window.location.reload()
                }
            }
        }
    }
    xhr.send();
}

const _signup=()=>{
    console.log("signup clicked")
    const email = document.getElementById('remail').value
    const pass =  document.getElementById('rpassword').value
    const cpass =  document.getElementById('rcpassword').value
    const username =  document.getElementById('rusername').value
    const phone =  document.getElementById('rphone').value
    const gstno = document.getElementById('rgst').value
    
    const rtype =  document.getElementById('ctype').checked?document.getElementById('ctype').value:document.getElementById('atype').value
    console.log(rtype, email, pass, cpass, phone, username, gstno)
    let xhr = new XMLHttpRequest()
    xhr.open("GET", '../../carshop/backend/register.php?email='+email+'&pass='+pass+'&cpass='+cpass+'&phone='+phone+'&type='+rtype+'&username='+username+'&gstno='+gstno, true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                const data = xhr.response;
                console.log(data)
            }
        }
    }
    xhr.send();
}


const _add_cars=()=>{
    console.log("Add cars")
    const vmodel = document.getElementById('vmodel').value
    const vnumber =  document.getElementById('vnumber').value
    const scapacity =  document.getElementById('scapacity').value
    const rpday =  document.getElementById('rpday').value
    const sessionid = localStorage.getItem('sessionid')
    console.log()
    let xhr = new XMLHttpRequest()
    xhr.open("GET", '../../carshop/backend/addcars.php?vmodel='+vmodel+'&vnumber='+vnumber+'&scapacity='+scapacity+'&rpday='+rpday+'&sessionid='+sessionid, true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                const data = xhr.response;
                console.log(data)
            }
        }
    }
    xhr.send();
}