{{-- Category DropDown --}}
<div class="form-group">
    <label for="category_id">{{ $label_key_name ?? '' }} Category</label>
    <select
        class="custom-select form-control form-control-lg @error('category_id') is-invalid @enderror"
        name="category_id"
        id="category_id">
        <option {{ ! isset($model) ? 'selected' : '' }} disabled value="">Choose Category</option>
        @forelse($categories as $key => $value)
            <option
            @if ( isset($model) && $model->category->id === $key && old('category_id') === null )
                {{ 'selected' }}
            @elseif( old('category_id') == $key )
                {{ 'selected' }}
            @endif
            value="{{ $key }}">{{ $value }}</option>
        @empty
        <p>NO Cateogires To Choose From</p>
        @endforelse
    </select>
        @error('category_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
</div>
