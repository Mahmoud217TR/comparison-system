<div class="row">
    <div class="col">
        <label for="title" class="fw-bold">Title</label>
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-8">
        <input type="text" name="title" id="title" class="form-control" required value='{{ old('title')??$comparison->title }}'>
        @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="row">
    <div class="col">
        <label for="description" class="fw-bold">Description</label>
    </div>
</div>
<div class="row mb-3">
    <div class="col-10">
        <textarea class="form-control" name="description" id="description" cols="30" rows="10" required style="resize: none">{{ old('description')??$comparison->description }}</textarea>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="row">
    <div class="col">
        <label for="state" class="fw-bold">State</label>
    </div>
</div>
<div class="row mb-3">
    <div class="col-sm-4">
        <select name="state" id="state" class="form-select">
            @foreach ($comparison->states() as $state)
                <option value="{{ $state }}" @selected($state == $comparison->state)> {{ str()->ucfirst($state) }} </option>
            @endforeach
        </select>
        @error('state')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
