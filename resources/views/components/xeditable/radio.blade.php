<div class="form-group">
    <label for="{{$id}}">{{$label or ''}}</label>
    <div
        id="{{$id}}"
        editable-radiolist="{{$model}}"
        e-ng-options="item.id as item.{{$optionLabel or 'label'}} for item in {{$datasource}}"
        @if(isset($inline) && $inline)
            inline="inline"
        @endif

    >
        <span ng-bind="{{$displayed or 'item.label'}}"></span>
    </div>
</div>
