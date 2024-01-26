<head>
    <link href="{{ asset('css/forms.css') }}" rel="stylesheet">
</head>
<body>
    <div class="form_grupo">
        <span class="legenda">{{$slot}}</span>
        <div class="radio-btn">
            <input type="radio" class="form_new_input" id="limpeza_pub" name="{{$name}}" value="Limpeza pública" @if($avaliacao === 'Limpeza Pública') checked @endif>
            <label for="limpeza_pub" class="radio_label form_label">
                <span class="radio_new_btn"></span>
                Limpeza pública
            </label>
        </div>
        <div class="radio-btn">
            <input type="radio" class="form_new_input" id="seguranca" name="{{$name}}" value="seguranca" @if($avaliacao === 'Segurança') checked @endif>
            <label for="seguranca" class="radio_label form_label">
                <span class="radio_new_btn"></span>
                Segurança
            </label>
        </div>
        <div class="radio-btn">
            <input type="radio" class="form_new_input" id="Infraestrutura" name="{{$name}}" value="Infraestrutura" @if($avaliacao === 'Infraestrutura') checked @endif>
            <label for="Infraestrutura" class="radio_label form_label">
                <span class="radio_new_btn"></span>
                Infraestrutura
            </label>
        </div>
        <div class="radio-btn">
            <input type="radio" class="form_new_input" id="Turismo" name="{{$name}}" value="Turismo" @if($avaliacao === 'Turismo') checked @endif>
            <label for="Turismo" class="radio_label form_label">
                <span class="radio_new_btn"></span>
                Turismo
            </label>
        </div>
        <div class="radio-btn">
            <input type="radio" class="form_new_input" id="saude" name="{{$name}}" value="saude" @if($avaliacao === 'Saúde') checked @endif>
            <label for="saude" class="radio_label form_label">
                <span class="radio_new_btn"></span>
                Saúde
            </label>
        </div>
        <div class="form_message">
            <label for="message" class="form_message_label"> Comentários:</label>
            <textarea name="{{$comment}}" cols="30" rows="3" class="form_input message_input">{{$commentRes}}</textarea>
        </div>
    </div>
</body>
