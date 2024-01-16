@props(['name', 'cor'])

@switch($name)
    @case('plus')
        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14"
            viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
            <path fill="{{ $cor }}"
                d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
        </svg>
    @break

    @case('hat')
        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16"
            viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
            <path fill="{{ $cor }}"
                d="M341.5 285.6c33.7 0 82.3-6.9 82.3-47 .2-6.7 .9-1.8-20.9-96.2-4.6-19.2-8.7-27.8-42.3-44.7-26.1-13.3-82.9-35.4-99.7-35.4-15.7 0-20.2 20.2-38.9 20.2-18 0-31.3-15.1-48.1-15.1-16.1 0-26.7 11-34.8 33.6-27.5 77.6-26.3 74.3-26.1 78.3 0 24.8 97.6 106.1 228.5 106.1M429 254.8c4.7 22 4.7 24.4 4.7 27.3 0 37.7-42.3 58.6-98 58.6-125.7 .1-235.9-73.7-235.9-122.3a49.6 49.6 0 0 1 4.1-19.7C58.6 200.9 0 208.9 0 260.6c0 84.7 200.6 189 359.5 189 121.8 0 152.5-55.1 152.5-98.6 0-34.2-29.6-73.1-82.9-96.2" />
        </svg>
    @break

    @case('building')
        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="12"
            viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
            <path fill="{{ $cor }}"
                d="M64 48c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16h80V400c0-26.5 21.5-48 48-48s48 21.5 48 48v64h80c8.8 0 16-7.2 16-16V64c0-8.8-7.2-16-16-16H64zM0 64C0 28.7 28.7 0 64 0H320c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zm88 40c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H104c-8.8 0-16-7.2-16-16V104zM232 88h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H232c-8.8 0-16-7.2-16-16V104c0-8.8 7.2-16 16-16zM88 232c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H104c-8.8 0-16-7.2-16-16V232zm144-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H232c-8.8 0-16-7.2-16-16V232c0-8.8 7.2-16 16-16z" />
        </svg>
    @break

    @case('pencil')
        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16"
            viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
            <path fill="{{ $cor }}"
                d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
        </svg>
    @break
@endswitch
