const form = document.querySelector('.form form'),
submitbtn=form.querySelector('.sumbit input'),
errortxt=form.querySelector('.error-text');

form.onsubmit =(e) =>{
    e.preventDefault();
}

submitbtn.onclick= click () =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","./php/signup.php",true);
    xhr.onload=() => {
        if(xhr.readystate === XMLHttpRequest.DONE){
            if (xhr.status == 200){
                let data = xhr.response;
                if( data == "Success"){
                    location.href="./welcome.php"

                }
                else{
                    errortxt.textcontent = data;
                    errortxt.style.display = "block";
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}