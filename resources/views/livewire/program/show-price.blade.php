<div>
    <div class="price-header justify-content-start">
        @if ($alertStatus=='success' && $disabled)
        <h2 class="course-price">{{ config('app.currency').$discountPrice }}</h2>
        <h4 class="align-self-end text-decoration-line-through text-danger mx-1">{{ config('app.currency').$program->price }}</h4>
        @else
        <h2 class="course-price">{{ config('app.currency').$program->price }}</h2>
        @endif
    </div>
    <ul class="course-sidebar-list">
        <li>
            <div class="d-flex justify-content-between align-items-center">
                <span><i class="far fa-sliders-h"></i>{{ __('show-program.level') }}</span>
                {{ $program->level->title }}
            </div>
        </li>

        <li>
            <div class="d-flex justify-content-between align-items-center">
                <span><i class="fas fa-play-circle"></i>{{ __('show-program.modules') }}</span>
                @if ($program->modules)
                {{ count($program->modules) }}
                @endif
            </div>
        </li>
        <li>
            <div class="d-flex justify-content-between align-items-center">
                <span><i class="far fa-clock"></i>{{ __('show-program.duration') }}</span>
                {{ $program->duration.' '.__('show-program.months') }}
            </div>
        </li>
        <li>
            <div class="d-flex justify-content-between align-items-center">
                <span><i class="far fa-globe"></i>{{ __('show-program.language') }}</span>
                {{ $program->getLanguage() }}
            </div>
        </li>
    </ul>

    <div class="buy-btn">
        <form action="{{ route('cart.store') }}" method="POST">
            @csrf
            <input type="hidden" name="program_id" value="{{ $program->id }}">
            <button class="button button-enroll-course btn btn-main rounded">
                <i class="far fa-shopping-cart me-2"></i> {{ __('show-program.enroll') }}
            </button>
            <div class="accordion accordion-flush">
                <div class="accordion-item">
                    <p class="accordion-header">
                        <a wire:click.prevent="$toggle('show')" class="accordion-button {{ $show?'':'collapsed' }} text-sm" type="button" data-bs-toggle="collapse" data-bs-target="#promocode">
                            {{ __('show-program.got-promo') }}
                        </a>
                    </p>
                    <div id="promocode" class="accordion-collapse collapse {{ $show?'show':'' }}">
                        <div class="accordion-body text-sm-start tas">
                            <label>{{ __('show-program.enter-promo') }}</label>
                            <div class="input-group">
                                <input {{ $disabled?'disabled':'' }} wire:model.defer="couponCode" wire:keydown.prevent.enter="checkCoupon" wire:loading.attr="disabled" type="text" name="promocode" class="form-control rounded-end-0 rounded-start {{ $alertStatus=='success'?'border-success':'' }}">
                                <input {{ $disabled?'disabled':'' }} wire:click="checkCoupon" wire:target="couponCode" wire:loading.attr="disabled" type="button" value="{{ __('show-program.apply') }}" class="btn text-white rounded-end px-2 border-0 {{ $alertStatus=='success'?'bg-success':'bg-dark' }}">
                                @if ($alertStatus=='success' && $disabled)
                                <input type="hidden" name="promocode" value="{{ $couponCode }}">
                                @endif
                            </div>
                            <h5 class="text-{{ $alertStatus }} text-sm font-weight-light mt-2">{{ $alert }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>