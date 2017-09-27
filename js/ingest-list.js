var ingest_array = [];

var ing1 = new Ingestao('José','Rabeprazol','10 MG', '12:00');
var ing2 = new Ingestao('Julio','Maalox','40 MG', '12:15');
var ing3 = new Ingestao('Karen','Ubenzima','35 MG', '12:30');
var ing4 = new Ingestao('Jaqueline','Pacinone','40 MG', '12:45');
var ing5 = new Ingestao('Carlos','Abavil','75 MG', '13:00');
var ing6 = new Ingestao('José','Factane','50 MG', '13:15');
var ing7 = new Ingestao('Maria','Aspirina','25 MG', '13:30');

const lista = document.querySelector('#list-ingestao ul');

ingest_array.forEach(function(element){
  var li = document.createElement('li');
  var usuario = document.createElement('span');
  var medicamento = document.createElement('span');
  var dose = document.createElement('span');
  var hora = document.createElement('span');

  usuario.textContent = element.usuario;
  medicamento.textContent = element.medicamento;
  dose.textContent = element.dosagem;
  hora.textContent = element.hora;

  usuario.className = "usuario";
  medicamento.className = "medicamento";
  dose.className = "dosagem";
  hora.className = "hora";

  li.appendChild(usuario);
  li.appendChild(medicamento);
  li.appendChild(dose);
  li.appendChild(hora);

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


function Ingestao(usuario, medicamento, dosagem, hora){
  this.usuario = usuario;
  this.medicamento = medicamento;
  this.dosagem = dosagem;
  this.hora = hora;

  ingest_array.push(this);
}
