<head>
    <link href="{{ asset('css/forms.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container_form">
        <form class="form" action="#" method="POST">
            <div class="form_grupo">
                <label for="nome" class="form_label">Nome</label>
                <input type="text" name="nome" class="form_input" id="nome" placeholder="Nome">
            </div>

            <div class="form_grupo">
                <label for="datanascimento" class="form_label">Data de Nascimento</label>
                <input type="date" name="datanascimento" class="form_input" id="datanascimento"
                    placeholder="Data de Nascimento">
            </div>

            <div class="form_grupo">
                <label for="e-mail" class="form_label">Email</label>
                <input type="email" name="email" class="form_input" id="email" placeholder="seuemail@email.com">
            </div>

            <div class="form_grupo">
                <label for="telefone" class="form_label">Telefone</label>
                <input type="tel" name="telefone" class="form_input" id="telefone" placeholder="Telefone">
            </div>

            <div class="form_grupo">
                <label for="endereco" class="form_label">Endereço</label>
                <input type="text" name="endereco" class="form_input" id="endereco" placeholder="Endereço">
            </div>

            <div class="form_grupo">
                <span class="legenda">Sexo:</span>

                <div class="radio-btn">
                    <input type="radio" class="form_new_input" id="masculino" name="sexo" value="Masculino">
                    <label for="masculino" class="radio_label form_label"> <span class="radio_new_btn"></span>
                        Masculino</label>
                </div>
                <div class="radio-btn">
                    <input type="radio" class="form_new_input" id="feminino" name="sexo" value="Feminino">
                    <label for="feminino" class="radio_label form_label"> <span class="radio_new_btn"></span>
                        Feminino</label>
                </div>
            </div>

            <div class="form_message">
                <label for="message" class="form_message_label"> Digite aqui sua sua mensagem:</label>
                <textarea name="mensagem" id="message" cols="30" rows="3" class="form_input message_input"></textarea>
            </div>

            <div class="submit">
                <input type="hidden" name="acao" value="enviar">
                <button type="submit" name="Submit" class="submit_btn">Cadastrar</button>
            </div>
        </form>
    </div>
</body>
