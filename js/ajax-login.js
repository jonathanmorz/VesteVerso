function logar(){

    const form = document.querySelector('#loginForm'); // Formulário com id 'loginForm'
    form.addEventListener('submit', async function(e) {
        e.preventDefault(); // Evita o redirecionamento padrão ao enviar o formulário

        const formData = new FormData(this); // Pega os dados do formulário

        try {
            const response = await fetch('../php/login.php', {
                method: 'POST',
                body: formData
            });

            const result = await response.json(); // Espera a resposta JSON do servidor

            if (response.ok) {
                // Se a resposta for sucesso, por exemplo, login correto
                let errorDiv = document.createElement('div');
                errorDiv.id = 'error-msg';
                document.body.appendChild(errorDiv);
                errorDiv.classList.add('show');

                setTimeout(() => {
                    errorDiv.classList.remove('hide')
                }, 100);
                errorDiv.innerHTML = 'Login bem-sucedido! Redirecionando...';
                window.location.href = "../php/index.php"; // Redirecionar apenas em caso de sucesso
            } else {
                // Se houver erro, mostra um alerta com a mensagem retornada do servidor
                let errorDiv = document.createElement('div');
                errorDiv.id = 'error-msg';
                errorDiv.classList.add('show');
                document.body.prepend(errorDiv);

                setTimeout(() => {
                    errorDiv.classList.remove('hide')
                }, 100);
                errorDiv.innerHTML = 'Erro: ' + result.message;
            }
        } catch (error) {
            // Lida com erros no envio da requisição
            console.error('Erro ao enviar o formulário:', error);
            let errorDiv = document.createElement('div');
            errorDiv.id = 'error-msg';
            errorDiv.classList.add('show');

            // Adiciona a mensagem de erro ao errorDiv
            errorDiv.innerHTML = 'Erro ao enviar o formulário. Tente novamente.';

            // Insere o errorDiv no DOM (adicione ao corpo, ou em algum outro lugar que faça sentido)
            document.body.prepend(errorDiv);

            setTimeout(() => {
                errorDiv.classList.remove('hide');
            }, 100);
        }
    });
}