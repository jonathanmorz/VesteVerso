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
                window.alert('Login bem-sucedido! Redirecionando...');
                window.location.href = "../php/index.php"; // Redirecionar apenas em caso de sucesso
            } else {
                // Se houver erro, mostra um alerta com a mensagem retornada do servidor
                window.alert('Erro: ' + result.message);
            }
        } catch (error) {
            // Lida com erros no envio da requisição
            console.error('Erro ao enviar o formulário:', error);
            window.alert('Erro ao enviar o formulário. Tente novamente.');
        }
    });
    }