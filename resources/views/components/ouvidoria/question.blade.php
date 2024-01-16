<head>
    <link href="{{ asset('css/forms.css') }}" rel="stylesheet">
</head>
<body>
    <div class="form_grupo">
        <span class="legenda">{{$slot}}</span>
        <div class="radio-btn">
            <input type="radio" class="form_new_input" id="otimo" name="{{$name}}" value="Otimo" @if($avaliacao === 'Ótimo') checked @endif>
            <label for="otimo" class="radio_label form_label">
                <span class="radio_new_btn"></span>
                Ótimo
            </label>
        </div>
        <div class="radio-btn">
            <input type="radio" class="form_new_input" id="bom" name="{{$name}}" value="Bom" @if($avaliacao === 'Bom') checked @endif>
            <label for="bom" class="radio_label form_label">
                <span class="radio_new_btn"></span>
                Bom
            </label>
        </div>
        <div class="radio-btn">
            <input type="radio" class="form_new_input" id="regular" name="{{$name}}" value="Regular" @if($avaliacao === 'Regular') checked @endif>
            <label for="regular" class="radio_label form_label">
                <span class="radio_new_btn"></span>
                Regular
            </label>
        </div>
        <div class="radio-btn">
            <input type="radio" class="form_new_input" id="ruim" name="{{$name}}" value="Ruim" @if($avaliacao === 'Ruim') checked @endif>
            <label for="ruim" class="radio_label form_label">
                <span class="radio_new_btn"></span>
                Ruim
            </label>
        </div>
        <div class="radio-btn">
            <input type="radio" class="form_new_input" id="pessimo" name="{{$name}}" value="Pessimo" @if($avaliacao === 'Péssimo') checked @endif>
            <label for="pessimo" class="radio_label form_label">
                <span class="radio_new_btn"></span>
                Péssimo
            </label>
        </div>
        <div class="form_message">
            <label for="message" class="form_message_label"> Comentários:</label>
            <textarea name="{{$comment}}" cols="30" rows="3" class="form_input message_input">{{$commentRes}}</textarea>
        </div>
    </div>
</body>
