const loginContent = document.getElementById('login-content');
const cadastroContent = document.getElementById('cadastro-content');
const logo = document.getElementById('logo');

function mostrarLogin() {
    
    loginContent.classList.add('show');
    cadastroContent.classList.remove('show');
    cadastroContent.classList.add('hide');
    logo.classList.add('show');
    
    setTimeout(() => {
        loginContent.classList.remove('hide');
        logo.classList.remove('hide');
    }, 100);
}

function mostrarCadastro() {
    
    loginContent.classList.remove('show');
    cadastroContent.classList.add('show');
    cadastroContent.classList.remove('hide');
    logo.classList.remove('show');
    
    setTimeout(() => {
        loginContent.classList.add('hide');
        logo.classList.add('hide');
    }, 100);
}

function errorMsg() {
    let errorDiv = document.createElement('div');
    errorDiv.id = 'error-msg';
    errorDiv.classList.add('show');

    setTimeout(() => {
        errorDiv.classList.remove('hide')
    }, 100);
}