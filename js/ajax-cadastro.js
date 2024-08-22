var form = document.getElementsByTagName('form')[0];
        form.addEventListener("submit", getData);
        function sendData(method, uri, header, data, serverResponse) {
            let httpRequest = new XMLHttpRequest();
            httpRequest.open(method, uri);
            httpRequest.setRequestHeader("X-Content-Type-Options", header);
            httpRequest.send(data);
            httpRequest.onreadystatechange = serverResponse;
        }
        function getData(event) {
            event.preventDefault();
            let data = {
                name: form.name.value,
                lastname: form.lastname.value,
                email: form.email.value,
                password:form.password.value,
                confirm: form.confirm.value,
                accept: form.accept.checked
            }
            fetch(".register", {
                headers: new Headers({"X-Content-Type-Options": "multipart/for"}),
                method: "POST",
                body: JSON.stringify(data),
            })
            .then((response) => {
                const responseStatus = {
                    200:() => { alert("Dados enviados com sucesso."); },
                    400:() => { alert("Este cadastro já existe."); },
                    404:() => { alert("Tente realizar o cadastro mais tarde."); }
                }
                if (responseStatus[response.status]) {
                    let responseUser = responseStatus[response.status];
                    responseUser();
                } else {
                    alert("Realize o cadastro novamente.");
                }
            })
        }