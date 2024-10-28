function cadastrar() {
    const form = document.querySelector('#cadastroForm');
    form.addEventListener('submit', async function (e) {
        e.preventDefault();

        const formData = new FormData(this);

        try {
            const response = await fetch('../php/enviar-cadastro.php', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();

            // Limpa qualquer mensagem de erro anterior
            let errorDiv = document.getElementById('error-msg');
            if (errorDiv) {
                errorDiv.remove();
            }

            errorDiv = document.createElement('div');
            errorDiv.id = 'error-msg';
            document.body.prepend(errorDiv);

            if (response.ok) {
                errorDiv.classList.add('show');
                errorDiv.innerHTML = 'Cadastro bem-sucedido! Redirecionando...';
                setTimeout(() => {
                    window.location.href = "../php/index.php";
                }, 2000); // Tempo para o usuário ver a mensagem
            } else {
                errorDiv.classList.add('show');
                errorDiv.innerHTML = 'Erro: ' + result.message;
            }
        } catch (error) {
            console.error('Erro ao enviar o formulário:', error);

            // Limpa qualquer mensagem de erro anterior
            let errorDiv = document.getElementById('error-msg');
            if (errorDiv) {
                errorDiv.remove();
            }

            errorDiv = document.createElement('div');
            errorDiv.id = 'error-msg';
            errorDiv.classList.add('show');
            errorDiv.innerHTML = 'Erro ao enviar o formulário. Tente novamente.';
            document.body.prepend(errorDiv);
        }
    });
}

document.addEventListener("DOMContentLoaded", cadastrar);

document.addEventListener("DOMContentLoaded", function() {
    const cpfInput = document.getElementById("cpf");

    cpfInput.addEventListener("input", function(e) {
        let cpf = e.target.value;
        
        // Remove caracteres não numéricos
        cpf = cpf.replace(/\D/g, "");
        
        // Aplica a máscara com "." e "-"
        if (cpf.length > 3 && cpf.length <= 6) {
            cpf = cpf.replace(/(\d{3})(\d+)/, "$1.$2");
        } else if (cpf.length > 6 && cpf.length <= 9) {
            cpf = cpf.replace(/(\d{3})(\d{3})(\d+)/, "$1.$2.$3");
        } else if (cpf.length > 9) {
            cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{1,2})/, "$1.$2.$3-$4");
        }

        e.target.value = cpf;
    });

    // Remover formatação do CPF antes do envio
    const form = document.getElementById("cadastroForm");
    form.addEventListener("submit", function() {
        const cpf = cpfInput.value;
        cpfInput.value = cpf.replace(/\D/g, ""); // Remove todos os caracteres não numéricos
    });
});
