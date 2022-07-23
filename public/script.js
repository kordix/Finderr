let cruddata = [
    {
        id: 1,
        login: 'admin',
        name: 'Kordian',
        technologies: 'PHP JS LARAVEL VUE VANILLAJS',
        localisation: 'Wejherowo',
        description: 'Główny twórca strony',
        facebook: 'https://www.facebook.com/kordian.bober',
        email: 'kordian.bober@gmail.com',
        images: ['admin.jpg'],
        skype: 'live:.cid.6830c6d229bdb6f',
        likes: [2]

    },
    {
        id: 2,
        login: 'zdzichu92',
        name: 'Zdzisiek',
        localisation: 'Władysławowo',
        technologies: 'PHP JS LARAVEL',
        description: 'Laravel to gówno ale używam',
        images: ['Zdzichu92.jpeg'],
        likes: [1]
    },
    {
        id: 3,
        login: 'waclaw80',
        name: 'Wacław',
        technologies: 'C++ algorytmy Assembler',
        localisation: 'Wypizdowo',
        description: 'Jestem nolifem lubie korzystać z archaicznych języków i robić sobie pod górę',
        images: ['Waclaw80.jpg'],
        likes: []
    }
]

let currentindex = -1;

let currentitem = {}

let login = '';
let imagenum = 1;

async function loadData() {
    login = document.querySelector('#login').innerHTML;
    if (!login) {
        document.querySelector('#authzone').innerHTML = `<a href="/views/login.php"> <button class="btn btn-primary">Zaloguj się</button></a>  <a href="/views/register.php"><button class="btn btn-primary">Załóż konto</button></a>`;
    } else {
        document.querySelector('#authzone').innerHTML = `<span style="display:none"><b>${login}</b></span>     <a href="/views/settings.php"><button class="btn btn-secondary">Ustawienia</button></a>  <a href="/api/logout.php"><button class="btn btn-secondary">Wyloguj</button></a> `;
    }
    let self = this;
    await fetch('/api/read.php', { method: 'POST', body: JSON.stringify({ tabela: 'userdata' }) }).then(res => res.json()).then((res) => cruddata = res)

}



loadData().then((res) => {
    next();
});

function next() {
    console.log(currentindex);
    currentindex++;
    if (currentindex >= cruddata.length) {
        currentindex = 0;
    }
    currentitem = cruddata[currentindex];
    document.querySelector('#name').innerHTML = currentitem.name;
    document.querySelector('#description').innerHTML = currentitem.description;
    document.querySelector('#localisation').innerHTML = currentitem.localisation;
    document.querySelector('#technologies').innerHTML = currentitem.technologies;
    document.querySelector('#profileimage').src = `images/${currentitem.login}/1.jpg`;

    document.querySelector('#kontakt').innerHTML = '';

    if (currentitem.localisation) {
        document.querySelector('#localisation').innerHTML = `<a href="https://www.google.com/maps/place/Wejherowo"><i class="bi bi-geo-alt"></i><span>Wejherowo</span></a> `
    }

    if (currentitem.facebook) {
        document.querySelector('#kontakt').innerHTML += `<a href="${currentitem.facebook}" target="_blank"><i class="bi bi-facebook" style="font-size:50px"></i></a>`;
    }

    if (currentitem.email) {
        document.querySelector('#kontakt').innerHTML += `<i class="bi bi-envelope" data-bs-toggle="popover" title="E-mail" data-bs-content="${currentitem.email}" alt="${currentitem.email}" style="font-size:50px;cursor:pointer"></i>`;
    }
    if (currentitem.skype) {
        document.querySelector('#kontakt').innerHTML += `<i class="bi bi-skype" data-bs-toggle="popover" title="Skype" data-bs-content="${currentitem.skype}" alt="${currentitem.skype}" style="font-size:50px;cursor:pointer"></i>`;
    }

    if (document.querySelector('#kontakt').innerHTML == '') {
        document.querySelector('#kontakt').innerHTML = '<p style="font-size:10px">  Użytkownik nie podał danych do kontaktu </p>';
    }




}




document.querySelector('#next').addEventListener('click', () => { next() });



document.querySelector('#profileimage').addEventListener('click', async function () {
    imagenum++;
    const res = await fetch(`/images/${currentitem.login}/${imagenum}.jpg`, { method: "HEAD" });
    if (res.ok) {
        console.log("Image exists.");
    } else {
        imagenum = 1;
    }

    document.querySelector('#profileimage').src = `/images/${currentitem.login}/${imagenum}.jpg`;
})

