var meds_array = [];

var med1 = new Medicamento('Factane','500 MG');
var med2 = new Medicamento('Abavil','75 MG');
var med3 = new Medicamento('Maalox','400 MG');
var med4 = new Medicamento('Ubenzima','35 MG');
var med5 = new Medicamento('Rabeprazol','10 MG');
var med6 = new Medicamento('Pacinone','40 MG');


const lista = document.querySelector('#list-meds ul');

meds_array.forEach(function(element){
  var li = document.createElement('li');
  var nome = document.createElement('span');
  var dosagem = document.createElement('span');

  nome.textContent = element.nome;
  dosagem.textContent = element.dosagem;

  nome.className = "nome";
  dosagem.className = "dosagem";

  li.appendChild(nome);
  li.appendChild(dosagem);

  lista.appendChild(li);


})

//adicionar na lista
const adicionarForm = document.forms['adicionar'];

adicionarForm.addEventListener('submit', function(e){
  e.preventDefault();
  var valor = adicionarForm.querySelector('input[type="text"]').value;
  console.log(valor);

  //criacao dos elemetnos
  var li = document.createElement('li');
  var nome = document.createElement('span');
  var plus = document.createElement('span');

  //conteudo dos elementos
  plus.textContent = '  +  ';
  nome.textContent = valor;

  //classes dos elementos
  nome.className = "name";
  plus.className = "delete";

  //insercao dos elementos
  li.appendChild(nome);
  li.appendChild(apagar);

  lista.appendChild(li);

});


function Medicamento(nome, dosagem){
  this.nome = nome;
  this.dosagem = dosagem;

  meds_array.push(this);
}
