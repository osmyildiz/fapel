<div class="mb-4 row">
    <label for="title_{{ $lang }}" class="col-md-3 col-form-label">Başlık ({{ strtoupper($lang) }})</label>
    <div class="col-sm-9">
        <input class="form-control" type="text" value="{{ $seo['title_'.$lang] }}" id="title_{{ $lang }}" name="title_{{ $lang }}">
        <span class="error" style="color:red" role="alert">
            <strong>{!! $errors->first('title_'.$lang) !!}</strong>
        </span>
    </div>
</div>

<div class="mb-4 row">
    <label for="description_{{ $lang }}" class="col-md-3 col-form-label">Açıklama ({{ strtoupper($lang) }})</label>
    <div class="col-sm-9">
        <textarea id="description_{{ $lang }}" class="form-control" rows="4" name="description_{{ $lang }}">{{ $seo['description_'.$lang] }}</textarea>
        <span class="error" style="color:red" role="alert">
            <strong>{!! $errors->first('description_'.$lang) !!}</strong>
        </span>
    </div>
</div>

<div class="mb-4 row">
    <label for="keywords_{{ $lang }}" class="col-md-3 col-form-label">Anahtar Kelimeler ({{ strtoupper($lang) }})</label>
    <div class="col-sm-9">
        <textarea id="keywords_{{ $lang }}" class="form-control" rows="4" name="keywords_{{ $lang }}">{{ $seo['keywords_'.$lang] }}</textarea>
        <span class="error" style="color:red" role="alert">
            <strong>{!! $errors->first('keywords_'.$lang) !!}</strong>
        </span>
    </div>
</div>

<div class="mb-4 row">
    <label for="canonical_{{ $lang }}" class="col-md-3 col-form-label">Canonical ({{ strtoupper($lang) }})</label>
    <div class="col-sm-9">
        <input class="form-control" type="text" value="{{ $seo['canonical_'.$lang] }}" id="canonical_{{ $lang }}" name="canonical_{{ $lang }}">
        <span class="error" style="color:red" role="alert">
            <strong>{!! $errors->first('canonical_'.$lang) !!}</strong>
        </span>
    </div>
</div>
