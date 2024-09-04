document.getElementById('loginForm').addEventListener('submit', async function (event) {
    event.preventDefault();


    const formData = new FormData(this);

    try {
        const response = await fetch('../php/login.php', {
            method: 'POST',
            body: formData
        });
        
        const responseText = await response.text()

            console.log(responseText);

        if (response.ok) {
            window.location.href = "../php/index.php";
        } else {
            window.alert('Erro ao enviar o formulário. Tente Novamente.');
        }
    }
    
    catch (error) {
        console.error('Erro na atualização: ', error);
        window.alert('Erro ao enviar o formulário. Tente Novamente.');
    }
})