<div class="form-group">
    <label for="{{$id}}">{{$label or ''}}</label>
    <div editable-textarea="{{$model}}"
        @if(isset($disabled) && $disabled)
            e-disabled
        @endif
    >
        <pre ng-bind="{{$model}}"></pre>
    </div>
</div>