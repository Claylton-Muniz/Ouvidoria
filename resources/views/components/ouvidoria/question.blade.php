<head>
    <link href="{{ asset('css/forms.css') }}" rel="stylesheet">
</head>
<body>
    <div class="form_grupo">
        <span class="legenda">{{$slot}}</span>
        <div class="radio-btn">
            <input type="radio" class="form_new_input" id="otimo" name="{{$name}}" value="Otimo">
            <label for="otimo" class="radio_label form_label">
                <span class="radio_new_btn"></span>
                Ótimo
            </label>
        </div>
        <div class="radio-btn">
            <input type="radio" class="form_new_input" id="bom" name="{{$name}}" value="Bom">
            <label for="bom" class="radio_label form_label">
                <span class="radio_new_btn"></span>
                Bom
            </label>
        </div>
        <div class="radio-btn">
            <input type="radio" class="form_new_input" id="regular" name="{{$name}}" value="Regular">
            <label for="regular" class="radio_label form_label">
                <span class="radio_new_btn"></span>
                Regular
            </label>
        </div>
        <div class="radio-btn">
            <input type="radio" class="form_new_input" id="ruim" name="{{$name}}" value="Ruim">
            <label for="ruim" class="radio_label form_label">
                <span class="radio_new_btn"></span>
                Ruim
            </label>
        </div>
        <div class="radio-btn">
            <input type="radio" class="form_new_input" id="pessimo" name="{{$name}}" value="Pessimo">
            <label for="pessimo" class="radio_label form_label">
                <span class="radio_new_btn"></span>
                Péssimo
            </label>
        </div>
    </div>
</body>
