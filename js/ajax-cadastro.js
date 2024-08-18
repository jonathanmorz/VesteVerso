document.getElementById('enviar').addEventListener('click', function(event) {
   event.preventDefault();
   
   var formData = new FormData(document.querySelector('form'));

   var xhr = new XMLHttpRequest();
   xhr.open('POST', 'cadastro.php', true);

   var nome = document.getElementsByName('nome-completo')[0];
   var username = document.getElementsByName('username')[0];
   var email = document.getElementsByName('email')[0];
   var senha = document.getElementsByName('senha')[0];
   var senhab = document.getElementsByName('SenhaB')[0];
   var cpf = document.getElementsByName('cpf')[0];
   var enfereco = document.getElementsByName('endereco')[0];
   var tel = document.getElementsByName('tel')[0];
   var cep = document.getElementsByName('cep')[0];

   if (senha.value !== senhab.value) {
        erroSenha.textContent = 'As senhas não coincidem';
        return;
   }

   xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText.trim();
            
            if(response === 'success') {
                window.location.href = '../php/login.php';
            } else {
                alert(response);
            }
        }
   }

   xhr.send(formData);
})