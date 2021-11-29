window.onload = function (){

    let btn = document.getElementById('sbtn');
    let fname = document.getElementById('fName');
    let lname = document.getElementById('lName');
    let pwrd = document.getElementById('passwrd');
    let email = document.getElementById('email');
    let errorc; 
    


    btn.addEventListener('click',function(e){

        console.log(test);
        e.preventDefault();
        httpxmlr = new XMLHttpRequest();


        if (fname.value == "" || fname.value == null) {

            fname.classList.add("incorrect");
        }

        else if (fname.value !== "" || fname.value !== null){

            if (fname.value.match()){

                fname.classList.add("correct");

            }else{

                fname.classList.add("incorrect");
                erroc++;

            }
        }

        if(lname.value == "" || fname.value == null){


            lname.classList.add("incorrect")
        }

        else if (lname.value !== "" || lname.value !== null){

            if (lname.value.match()){

                lname.classList.add("correct");

            }else{

                lname.classList.add("incorrect");
                erroc++;

            }
        }

        if(pwrd.value == "" || pwrd.value == null){


            pwrd.classList.add("incorrect")
        }    

        else if (pwrd.value !== "" || pwrd.value !== null){

            if (pwrd.value.match()){

                pwrd.classList.add("correct");

            }else{

                pwrd.classList.add("incorrect");
                erroc++;

            }
        }

        if(email.value == "" || email.value == null){


            lname.classList.add("incorrect")
         }

        else if (email.value !== "" || email.value !== null){

            if (email.value.match()){

                email.classList.add("correct");

            }else{

                email.classList.add("incorrect");
                erroc++;

            }

        } 


        if (errorc < 1){

            httpR.onreadystatechange = function(){

                if (httpR.readyState === XMLHttpRequest.DONE && httpR.status === 200){

                    let x  = httpR.responseText;

                }
                if (httpR.readyState === XMLHttpRequest.DONE && httpR.status === 404){

                }
            }
            
            let data = 'fname='+fname.value+'&lname='+lname.value+'&pwrd='+pwrd.value+'&email='+email.value;
            httpR.open('POST', '../php/adduserphp.php', true);
            httpR.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            httpR.send(data);


        }


    });


}