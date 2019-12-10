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
            var tex = '';
            if (usr.value !='' && !usr.value.match(reg))
                tex += 'alphabets and numbers please in username filed<br>';
            if (fname.value !='' && !fname.value.match(reg))
                tex += 'alphabets and numbers please in firstname filed<br>';
            if (lname.value !='' && !lname.value.match(reg))
                tex += 'alphabets and numbers please in lastname filed<br>';
            if (email.value !='' && !email.value.match(regem))
                tex += 'email should have formart login@domain.ext<br>';
            document.getElementById('error').innerHTML = tex;
            if (usr.value && fname.value && lname.value && email.value && passwd.value){
                document.getElementById('confirm').removeAttribute('disabled');
            }
        }