<div class="form-group {{ ($errors->has($name)) ? 'has-error' : '' }}">
    <label class="control-label" for="{{ $name }}-field">{{ $label }}</label>
    <textarea class="form-control" name="{{ $name }}" id="{{ $name }}-field" placeholder="{{ $placeholder or '' }}">{{ old($name) }}</textarea>

    @if($errors->has($name))
        <span class="help-block">{{ $errors->first($name) }}</span>
    @endif
</div>
