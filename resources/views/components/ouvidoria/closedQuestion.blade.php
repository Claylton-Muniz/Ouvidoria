<head>
    <link href="{{ asset('css/forms.css') }}" rel="stylesheet">
</head>
<body>
    <div class="form_grupo">
        <span class="legenda">{{$slot}}</span>
        <div class="radio-btn">
            <input type="radio" class="form_new_input" id="sim" name="{{$name}}" value="Sim" @if($avaliacao === 'Sim') checked @endif>
            <label for="sim" class="radio_label form_label">
                <span class="radio_new_btn"></span>
                Sim
            </label>
        </div>
        <div class="radio-btn">
            <input type="radio" class="form_new_input" id="nao" name="{{$name}}" value="Nao" @if($avaliacao === 'Não') checked @endif>
            <label for="nao" class="radio_label form_label">
                <span class="radio_new_btn"></span>
                Não
            </label>
        </div>
        <div class="form_message">
            <label for="message" class="form_message_label"> Se sim, comente sobre:</label>
            <textarea name="{{$comment}}" cols="30" rows="3" class="form_input message_input">{{$commentRes}}</textarea>
        </div>
    </div>
</body>
