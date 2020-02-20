var intervalo ='';
localStorage.removeItem('dataset');
function grabarData() {
    if (typeof(Storage) !== "undefined") {
        var data = $('#data').val();
        var dataset = [];
        dataset = data.split(",");
        localStorage.setItem("dataset", JSON.stringify(dataset));
        var storedData = JSON.parse(localStorage.getItem("dataset"));
        titulos = storedData;
        console.log(dataset);
        console.log(storedData);
    } else {
        alert("Tu navegador no acepta ciertas funcionalidades en esta web \n Traté de actualizarlo");
    }
}

function soportaStorage () {
    if (typeof(Storage) == "undefined") {
        alert("Tu navegador no acepta ciertas funcionalidades en esta web \n Traté de actualizarlo");
    }
}

function play() {
    var arr = document.getElementsByClassName('alazar');
    for (i = 0; i < arr.length; i++) {
        var sustantivo = titulos[Math.floor(Math.random() * titulos.length)];
        var adjetivo = titulos[Math.floor(Math.random() * titulos.length)];
        arr[i].innerHTML = sustantivo;
    }
}

function dalePlay () {
   clearInterval(intervalo);
   intervalo = setInterval('play()', 1000);
}

function stop () {
    clearInterval(intervalo);
}
function aplicar(objeto) {
    if (objeto) {
        $('#sinfonia').append("<span class='clast'>"+objeto.innerHTML+"</span>");
    } else {
        $('#sinfonia').append("<span class='clast'>"+$('#primer').html()+"</span>");
        $('#sinfonia').append("<span class='clast'>"+$('#segundo').html()+"</span>");
    }
}
$(document).ready(function() {
  $("[data-toggle]").click(function() {
    var toggle_el = $(this).data("toggle");
    $(toggle_el).toggleClass("open-sidebar");
  });
  changecolors();
});

var x;
function changecolors() {
    x = 1;
    setInterval(change, 300);
}

function randomColor() {
    var color = Math.floor(Math.random() * 16777216).toString(16);
    return '#000000'.slice(0, -color.length) + color;
}

function randomSize(){
    return size = Math.floor(Math.floor((Math.random() * 500) + 1));
}
function change() {
    if (x === 1) {
        color = randomColor();
        size = randomSize();
        x = 2;
    } else {
        color = randomColor();
        size = randomSize();
        x = 1;
    }
    var item = shuffle($(".sinfo")).slice(0, 1);
    $(item).css({color: color, fontSize: size+'%'})
}
                
function shuffle(array) {
    var m = array.length, t, i;
    while (m) {
      i = Math.floor(Math.random() * m--);
      t = array[m];
      array[m] = array[i];
      array[i] = t;
    }
    return array;
}


function mostrarStorage () {
    
    if (!localStorage.getItem("dataset")) {        
        $('#myModal').modal('show');       
    } else {
        titulos = localStorage.getItem("dataset");
    }
}

function mostrarDefault () {
    titulos = dataorigen;
}

function mostrarSoftware () {
    titulos = software;
}