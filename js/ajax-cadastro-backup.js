document.getElementById('formulario').addEventListener('submit', async function (event) {
    event.preventDefault();
    
    let nome = document.querySelector('input[name="nome-completo"]').value;
    let email = document.querySelector('input[name="email"]').value;
    let senhaA = document.querySelector('input[name="senha"]').value;
    let senhaB = document.querySelector('input[name="SenhaB"]').value;
    let cpf = document.querySelector('input[name="cpf"]').value;
    let endereco = document.querySelector('input[name="endereco"]').value;
    let tel = document.querySelector('input[name="tel"]').value;
    let cep = document.querySelector('input[name="cep"]').value;

    if (nome == '' || email == '' || senhaA == '' || senhaB == '' || cpf == '' || endereco == '' || tel == '' || cep == '') {
        window.alert('Preencha todos os campos obrigatórios')
    } else if (senhaA !== senhaB) {
        window.alert('Senhas não coincidem');
    } else {
        const formData = new FormData(this);

        try {
            const response = await fetch('../php/enviar-cadastro.php', {
                method: 'POST',
                body: formData
            });
        
            const responseText = await response.text(); // Ler a resposta como texto
            console.log(responseText); // Log da resposta
        
            if (response.ok) {
                window.location.href = "../php/login2.php";
            } else {
                window.alert('Erro ao enviar o formulário. Tente novamente.');
            }
        } catch (error) {
            console.error('Erro na requisição:', error);
            window.alert('Erro ao enviar o formulário. Tente novamente.');
        }
        
    }
});