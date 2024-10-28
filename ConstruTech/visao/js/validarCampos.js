// Adiciona um evento que é acionado quando o conteúdo do DOM foi completamente carregado
document.addEventListener('DOMContentLoaded', () => {
    // Seleciona o formulário na página
    const form = document.querySelector('form');
    // Seleciona todos os campos de entrada (input) dentro do formulário
    const inputs = form.querySelectorAll('input');

    // Adiciona um evento que é acionado quando o formulário é enviado
    form.addEventListener('submit', (event) => {
        // Inicializa a variável isValid como verdadeira, que será usada para verificar a validade dos campos
        let isValid = true;
        // Inicializa uma string para armazenar mensagens de erro
        let errorMessage = '';

        // Itera sobre cada campo de entrada
        inputs.forEach((input) => {
            // Verifica se o campo é obrigatório e se não é válido
            if (input.required && !isInputValid(input)) {
                // Se o campo não for válido, altera isValid para falso
                isValid = false;
                // Adiciona uma mensagem de erro correspondente ao campo inválido
                errorMessage += `O campo "${input.previousElementSibling.textContent}" está inválido. Preencha corretamente.\n`;
            }
        });

        // Se houver campos inválidos, previne o envio do formulário e exibe as mensagens de erro
        if (!isValid) {
            event.preventDefault(); // Impede o envio do formulário
            alert(errorMessage); // Exibe as mensagens de erro em um alerta
        }
    });

    // Função para verificar se um campo de entrada é válido
    function isInputValid(input) {
        // Obtém o valor do campo e remove espaços em branco no início e no final
        const value = input.value.trim();
        // Retorna verdadeiro se o valor não estiver vazio, caso contrário retorna falso
        return value !== '';
    }
});