{{-- Portfolio DropDown --}}
<div class="form-group">
    <label for="portfolio_id">{{ $label_key_name ?? '' }} Portfolio</label>
    <select
        class="custom-select form-control form-control-lg @error('portfolio_id') is-invalid @enderror"
        name="portfolio_id"
        id="portfolio_id">
        <option {{ ! isset($model) ? 'selected' : '' }} disabled value="">Choose Portfolio</option>
        @forelse($portfolios as $key => $value)
            <option
            @if ( isset($model) && $model->portfolio->id === $key && old('portfolio_id') === null )
                {{ 'selected' }}
            @elseif( old('portfolio_id') == $key )
                {{ 'selected' }}
            @endif
            value="{{ $key }}">{{ $value }}</option>
        @empty
        <p>NO Portfolios To Choose From</p>
        @endforelse
    </select>
        @error('portfolio_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
</div>
