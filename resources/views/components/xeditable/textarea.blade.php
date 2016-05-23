<div class="form-group">
    <label for="{{$id}}">{{$label or ''}}</label>
    <div editable-textarea="{{$model}}">
        <pre ng-bind="{{$model}}"></pre>
    </div>
</div>