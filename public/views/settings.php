<?php
session_start();

if (!isset($_SESSION['zalogowany'])) {
    header('location:/views/login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ustawienia</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
    label{
        width:120px;
    }
</style>
</head>
<body>

<div class="container">


<p><b>Uzupełnij dane profilu</b></p>
    

<!-- id: 1,
        login: 'admin',
        name: 'Kordian',
        technologies: 'PHP JS LARAVEL VUE VANILLAJS',
        localisation: 'Wejherowo',
        description: 'Główny twórca strony',
        facebook: 'https://www.facebook.com/kordian.bober',
        email: 'kordian.bober@gmail.com',
        images: ['admin.jpg'],
        skype: 'live:.cid.6830c6d229bdb6f',
        likes: [2] -->


    <p>Twój login: <b id="login"><?php echo  $_SESSION['login'] ?></b></p>
    <div class="mb-2">
        <a href="/api/upload.php"><button class="btn btn-primary">Wrzuć zdjęcia</button></a>
    </div>
    <div class="mb-2">
            <label for="name">Nazwa / ksywka</label>
            <input type="text" id="name">
    </div>
    <div class="mb-2">
        <label for="name">Technologie</label>
        <input type="text" id="technologies">
    </div>

    <div class="mb-2">
        <label for="name">Lokalizacja</label>
        <input type="text" id="localisation">
    </div>

    <div class="mb-2">
        <label for="name">Opis</label>
        <br>
        <textarea name="" id="description" style="width:330px" rows="4"></textarea>
    </div>

    <div class="mb-2">
        <label for="name">Facebook</label>
        <input type="text" id="facebook">
    </div>

    <div class="mb-2">
        <label for="name">Email</label>
        <input type="text" id="email">
    </div>

    <div class="mb-2">
        <label for="name">Skype</label>
        <input type="text" id="skype">
    </div>

    

    <div class="mb-2">
        <button id="savebutton" class="btn btn-primary">Zapisz ustawienia</button>
        <a href="/"><button class="btn btn-primary">Przejdź do appki</button></a>
    

       

    </div>

    <p id="messages"></p>

</div>

<script>

    let userdata = {};

    async function loadData(){
       let cruddata = {login:document.querySelector('#login').innerHTML}
       await fetch('/api/readuser.php', { method: 'POST', body: JSON.stringify(cruddata) }).then(res => res.json()).then((res) => userdata = res)
    }

    function save() {
        let settings = {
            name: document.querySelector('#name').value,
            technologies: document.querySelector('#technologies').value,
            localisation: document.querySelector('#localisation').value,
            description: document.querySelector('#description').value,
            facebook: document.querySelector('#facebook').value,
            email: document.querySelector('#email').value,
            skype: document.querySelector('#skype').value
        }
        let cruddata = { tabela: 'userdata', dane: settings , login: document.querySelector('#login').innerHTML }
        fetch('/api/savesettings.php', { method: 'POST', body: JSON.stringify(cruddata) }).then((res) => console.log(res))
        // location.reload()
    }

    loadData().then((res) => {
      document.querySelector('#name').value = userdata.name;
      document.querySelector('#technologies').value = userdata.technologies;
      document.querySelector('#localisation').value = userdata.localisation;
      document.querySelector('#description').value = userdata.description;
      document.querySelector('#facebook').value = userdata.facebook;
      document.querySelector('#email').value = userdata.email;
      document.querySelector('#skype').value = userdata.skype;






    });


    document.querySelector('#savebutton').addEventListener('click', function(){
        save();

        document.querySelector('#messages').innerHTML = 'ZAPISANO USTAWIENIA';
    })


</script>

</body>
</html>