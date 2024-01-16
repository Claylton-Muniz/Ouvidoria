<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-{{ $color }} shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-3">
                    <div class="row">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-{{ $color }} text-uppercase mb-1"> {{-- Título do card --}}
                                {{ $title }}
                            </div>
                        </div>
                        @if(isset($progress)) {{-- Valor do progresso --}}
                            <div class="col">
                                <span class="float-right">{{ $progress }}%</span>
                            </div>
                        @endif
                    </div>
                    <div class="row no-gutters align-items-center"> {{-- Valor do card --}}
                        <div class="col-auto">
                            @if(isset($route))
                                <a href="{{ $route }}"><div id="{{ $valueId }}" class="h5 mb-0 mr-3 font-weight-bold">{{ $value }}</div></a>
                            @else
                                <div id="{{ $valueId }}" class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $value }}</div>
                            @endif
                        </div>
                        @if(isset($progress))
                        <div class="col">
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-{{ $color }}" role="progressbar" style="width: {{ $progress }}%"
                                aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                @if(isset($icon)) {{-- Ícone do card --}}
                    <div class="col-auto">
                        <i class="{{ $icon }}"></i>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>