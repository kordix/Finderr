<?php
session_start();

if (isset($_SESSION['zalogowany'])) {
    header('location:/');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zaloguj</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>


<div id="app" class="container mt-2">
<label for="">Login</label>
<input type="text" v-model="login" id="logininput" @keyup.enter="zaloguj()">
<label for="">Haslo</label>
<input type="password" v-model="password" @keyup.enter="zaloguj()">

<button @click="zaloguj">Zaloguj</button>

<p>Nie masz konta? <a href="/views/register.php">Zarejestruj się</a> - zajmie to mniej niż minuta</p>
<p><b>{{error}}</b></p>





</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>

<script>
let app = new Vue({
    el:'#app',
    data:{
        login:'',
        password:'',
        error:'',
        testdata:''
    },
    mounted(){
        document.getElementById('logininput').focus();
        document.getElementById('logininput').select();
    },
    methods:{
        zaloguj(){
            let self = this;
            try{
            axios.post('/api/zaloguj.php',{login:this.login,password:this.password}).then((res)=>{
                if(res.data.trim() == 'ZALOGOWANY'){
                    console.log('JOŁ JOŁ ZALOGOWANY');
                   location.reload();
                }else if(res.data.trim() == 'NOCONNECTION'){
                    self.error = 'BRAK POŁĄCZENIA';
                }else if(res.data.trim() == 'BADLOGIN'){
                    self.error = 'Zły login lub hasło';
                    
                }else{
                    self.error = 'Wystąpił jakiś błąd';
                }
            })

            }catch(e){
                self.error = e;
            }

        }
    }
})

</script>
</body>
</html>