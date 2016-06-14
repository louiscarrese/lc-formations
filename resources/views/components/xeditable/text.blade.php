<div class="form-group">
    <label for="{{$id}}">{{$label or ''}}</label>
    <div editable-text="{{$model}}" ng-bind="{{$model}}"
        @if(isset($disabled) && $disabled)
            e-disabled
        @endif
    >
    </div>
</div>