document.getElementById('formulario').addEventListener('submit', function (event) {
    event.preventDefault();
    
    let senhaA = document.querySelector('input[name="senha"]').value;
    let senhaB = document.querySelector('input[name="SenhaB"]').value;

    const formData = new FormData(this);
    
    if (senhaA.value !== senhaB.value){
        window.alert('Senhas nao coincidem');
    } else{
    fetch('../php/enviar-cadastro.php', {
        method: 'POST',
        body: formData
    });
    }
});