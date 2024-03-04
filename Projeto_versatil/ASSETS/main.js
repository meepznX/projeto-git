(function () {
    'use strict'
    var iniciarValidadores = function () {
        var forms = document.querySelectorAll('.needs-validation')
        // Loop sobre os formulários que contém a classe 'needs-validation'
        // habilitando a prevenção de multiplos cliques.
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })

    }

    var iniciarMascaraTelefone = function() {
        $("#telefone").mask("(00) 00000-0000", {
            placeholder: '(__) _____-____'
        })
    }

    // executado assim que a página for carregada por completo
    $(document).ready(function () {
        iniciarValidadores();
        iniciarMascaraTelefone();
    })

})();