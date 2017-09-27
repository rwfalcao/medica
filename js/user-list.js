var user_array = [];

var user1 = new User('José','da Silva','Luis');
var user2 = new User('Carlos','Pereira','Maria');
var user3 = new User('Maria','Souza','Alan');
var user4 = new User('Julio','Peixoto','Carlos');
var user5 = new User('Alan','Queiroz','José');
var user6 = new User('Jaqueline','Moura', 'Paulo');
var user6 = new User('Karen','Leite', 'Josué');

const lista = document.querySelector('#list-usuarios ul');

user_array.forEach(function(element){
  var li = document.createElement('li');
  var nome = document.createElement('span');
  var apagar = document.createElement('span');

  apagar.textContent = '  +  ';
  nome.textContent = element.nome+' '+element.sobrenome;

  nome.className = "name";
  apagar.className = "delete";

  li.appendChild(nome);
  li.appendChild(apagar);

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
  plus.className = "name";
  apagar.className = "delete";

  //insercao dos elementos
  li.appendChild(nome);
  li.appendChild(apagar);

  lista.appendChild(li);

});


function User(nome, sobrenome, responsavel){
  this.nome = nome;
  this.sobrenome = sobrenome;
  this.responsavel = responsavel;

  user_array.push(this);
}
