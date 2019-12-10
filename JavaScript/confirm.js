window.addEventListener("load", function(){
});
        function check(){
            var reg = /^[a-zA-Z\-]+$/,
            regem = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
            
            err = document.getElementById('error'),
            usr = document.getElementById('username'),
            fname = document.getElementById('firstname'),
            lname = document.getElementById('lastname'),
            email = document.getElementById('email'),
            passwd = document.getElementById('password');
            // Cpasswd = documnet.getElementById('Cpassword');
            var tex = '';
            if (usr.value !='' && !usr.value.match(reg))
                // alert ("hello dummy dum dum");
                tex += 'Icorrect Username format<br>';
            if (fname.value !='' && !fname.value.match(reg))
                tex += 'Incorrect Name format<br>';
            if (lname.value !='' && !lname.value.match(reg))
                tex += 'Incorrect Surname format<br>';
            if (email.value !='' && !email.value.match(regem))
                tex += 'login@domain.ext<br>';
            // if (Cpasswd != passwd)
            //     tex += 'Passwords do not match <br>'; 
            document.getElementById('error').innerHTML = tex;
            //if (tex == "")
            if (usr.value && fname.value && lname.value && email.value && passwd.value){
                document.getElementById('confirm').removeAttribute('disabled');
            }
        }