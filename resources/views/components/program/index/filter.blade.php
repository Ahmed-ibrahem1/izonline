<form method="GET" action="{{ route('programs.index') }}">
    <div class="row align-content-between align-items-center tas">
        <div class="col-lg-3">
            <div class="d-flex bg-light rounded-pill p-2 px-4 align-items-center">
                <span>{{ __('index-program.category') }}:</span>
                <select name="category_id" class="form-select bg-transparent border-0">
                    <option value="" default>{{ __('index-program.all-categories') }}</option>
                    @foreach ($categories as $key => $value)
                    <option value="{{ $key }}" {{ (request('category_id') == $key)?'selected':'' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="d-flex bg-light rounded-pill p-2 px-4 align-items-center">
                <span>{{ __('index-program.sort') }}:</span>
                <select name="sort" class="form-select bg-transparent border-0">
                    @foreach ($sort as $key => $value)
                    <option value="{{ $key }}" {{ (request('sort') == $key)?'selected':'' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="d-flex bg-light rounded-pill p-2 px-4 align-items-center">
                <span>{{ __('header.language') }}:</span>
                <select name="language" class="form-select bg-transparent border-0">
                    <option value="" default>{{ __('index-program.all-languages') }}</option>
                    @foreach ($languages as $key => $value)
                    <option value="{{ $key }}" {{ (request('language') == $key)?'selected':'' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="topbar-search">
                <input type="text" name="search" placeholder="{{ __('header.search') }}" class="form-control" value="{{ request('search') }}">
                <label><i class="fa fa-search lh-18"></i></label>
            </div>
        </div>
        <div class="col-lg-1">
            <input class="btn p-0 py-2 w-100 btn-primary rounded-pill" type="submit" value="{{ __('index-program.search') }}">
        </div>
    </div>
</form>