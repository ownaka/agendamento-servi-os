var carTicke = document.querySelector('#carTickets');
var carMTickets = document.querySelector('#carMeusTickets');
var carCTickets = document.querySelector('#carCTicket');
var carEditPer = document.querySelector('#carEditPerfil');
var carConfig = document.querySelector('#carConfiguracao');


var divMensPadrao = document.querySelector('.mensagem-padrao');
var divTickets = document.querySelector('.ge-Tickets-menu');
var divMTickets = document.querySelector('.meusTickets-menu');
var divCTickets = document.querySelector('.criar-tickets');
var divEdperfil = document.querySelector('.editar-perfil-menu');
var divConf = document.querySelector('.configuracoes-menu');

carTicke.addEventListener('click', function(){
    if(divTickets.style.display === 'none'){
        divMensPadrao.style.display = 'none';
        divTickets.style.display = 'block';
        divMTickets.style.display = 'none';
        divCTickets.style.display = 'none';
        divEdperfil.style.display = 'none';
        divConf.style.display = 'none';
    } else {
        divTickets.style.display = 'none';
    }
});

carMTickets.addEventListener('click', function(){
    if(divMTickets.style.display === 'none'){
        divMensPadrao.style.display = 'none';
        divTickets.style.display = 'none';
        divMTickets.style.display = 'block';
        divCTickets.style.display = 'none';
        divEdperfil.style.display = 'none';
        divConf.style.display = 'none';
    } else {
        divMTickets.style.display = 'none';
    }
});

carCTickets.addEventListener('click', function(){
    if(divCTickets.style.display === 'none'){
        divMensPadrao.style.display = 'none';
        divTickets.style.display = 'none';
        divMTickets.style.display = 'none';
        divCTickets.style.display = 'block';
        divEdperfil.style.display = 'none';
        divConf.style.display = 'none';
    } else {
        divCTickets.style.display = 'none';
    }
});

carEditPer.addEventListener('click', function(){
    if(divEdperfil.style.display === 'none'){
        divMensPadrao.style.display = 'none';
        divTickets.style.display = 'none';
        divMTickets.style.display = 'none';
        divCTickets.style.display = 'none';
        divEdperfil.style.display = 'block';
        divConf.style.display = 'none';
    } else {
        divEdperfil.style.display = 'none';
    }
});

carConfig.addEventListener('click', function(){
    if(divConf.style.display === 'none'){
        divMensPadrao.style.display = 'none';
        divTickets.style.display = 'none';
        divMTickets.style.display = 'none';
        divCTickets.style.display = 'none';
        divEdperfil.style.display = 'none';
        divConf.style.display = 'block';
    } else {
        divConf.style.display = 'none';
    }
});