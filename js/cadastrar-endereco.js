document.getElementById("cadastrar").addEventListener("click", function (event) {
    event.preventDefault(); // Evita o redirecionamento padrão do botão
  
    // Verifica se o formulário já existe para evitar duplicação
    if (!document.getElementById("enderecoForm")) {
      // Cria o HTML do formulário como uma string
      const formHtml = `
        
      `;
  
      // Insere o formulário na div com id "informacoes"
      document.getElementById("informacoes").insertAdjacentHTML("beforeend", formHtml);
    }
  });
  