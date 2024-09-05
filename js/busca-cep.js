fetch('https://viacep.com.br/ws/01001000/json/')
  .then(response => response.json())
  .then(data => {
    document.getElementById('logradouro').value = data.logradouro;
    document.getElementById('bairro').value = data.bairro;
    document.getElementById('cidade').value = data.localidade;
    document.getElementById('estado').value = data.uf;
  })
  .catch(error => {
    console.error('Erro:', error);
  });
