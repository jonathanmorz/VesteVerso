document.addEventListener('DOMContentLoaded', () => {
    var form = document.getElementById('formulario');
    form.addEventListener("submit", getData);

    function getData(event) {
        event.preventDefault();

        let formData = new FormData(form);

        fetch("cadastro.php", {
            method: "POST",
            body: formData,
        })
        .then(response => response.text())
        .then(responseText => {
            const responseStatus = {
                "success": () => { alert("Dados enviados com sucesso."); },
                "Este e-mail já está cadastrado.": () => { alert("Este cadastro já existe."); },
                "As senhas não conferem.": () => { alert("As senhas não conferem."); },
                "Erro ao cadastrar:": () => { alert("Tente realizar o cadastro mais tarde."); }
            };

            if (responseStatus[responseText]) {
                responseStatus[responseText]();
            } else {
                alert("Erro desconhecido. Por favor, tente novamente.");
            }
        })
        .catch(() => {
            alert("Erro ao enviar dados. Tente novamente mais tarde.");
        });
    }
});