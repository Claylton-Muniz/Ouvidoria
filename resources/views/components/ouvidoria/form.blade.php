<head>
    <link href="{{ asset('css/forms.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container_form">
        <div class="form_grupo">
            <label for="servidor" class="form_label">Servidor responsável</label>
            <input type="text" name="servidor" class="form_input" id="servidor"
            placeholder="Servidor" required>
        </div>

        <div class="form_grupo">
            <label for="nome" class="form_label">Nome</label>
            <label for="datanascimento" class="form_label" id="label_sec">Data de Nascimento</label>
            <input type="text" name="entrevistado" class="form_pri" id="entrevistado" placeholder="Nome">
            <input type="date" name="datanascimento" class="form_sec" id="datanascimento"
            placeholder="DD/MM/YYYY" pattern="\d{2}/\d{2}/\d{4}" >
        </div>


        <div class="form_grupo">
            <label for="e-mail" class="form_label">Email</label>
            <label for="telefone" class="form_label" id="label_sec">Telefone</label>
            <input type="email" name="email" class="form_pri" id="email" placeholder="seuemail@email.com">
            <input type="tel" name="telefone" class="form_sec" id="telefone" placeholder="Telefone">
        </div>

        <div class="form_grupo">
            <label for="endereco" class="form_label">Endereço</label>
            <input type="text" name="endereco" class="form_input" id="endereco" placeholder="Endereço">
        </div>

        <div class="form_grupo">
            <span class="legenda">Sexo:</span>
            <div class="radio-form">
                <input type="radio" class="form_new_input" id="masculino" name="sexo" value="Masculino">
                <label for="masculino" class="radio_label form_label">
                    <span class="radio_new_btn"></span>
                    Masculino
                </label>
            </div>
            <div class="radio-form">
                <input type="radio" class="form_new_input" id="feminino" name="sexo" value="Feminino">
                <label for="feminino" class="radio_label form_label">
                    <span class="radio_new_btn"></span>
                    Feminino
                </label>
            </div>
        </div>

        {!! $slot !!}

        <div class="form_message">
            <label for="message" class="form_message_label"> Digite aqui seu comentário:</label>
            <textarea name="mensagem" id="message" cols="30" rows="3" class="form_input message_input"></textarea>
        </div>

        <div class="submit">
            <button type="submit" name="Submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>
</body>
