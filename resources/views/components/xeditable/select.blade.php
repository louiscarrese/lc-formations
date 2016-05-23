<div class="form-group">
    <label for="{{$id}}">{{$label or ''}}</label>
    <div
        id="{{$id}}" 
        editable-ui-select="{{$model}}" 
        e-form="{{$form}}" 
        e-name="{{$name}}" name="{{$name}}" 
        theme="bootstrap" 
        e-ng-change="{{$model}}=$data"
        >
        <span ng-bind="{{$displayed}}"></span>
        <editable-ui-select-match placeholder="{{$label or ''}}">
            <span ng-bind="$select.selected.label"></span>
        </editable-ui-select-match>
        @if(isset($singleProperty) && $singleProperty !== false)
            <editable-ui-select-choices repeat="item.{{$singleProperty}} as item in {{$datasource}} | filter: $select.search track by item.{{$singleProperty}}">
        @else
            <editable-ui-select-choices repeat="item in {{$datasource}} | filter: $select.search track by item.id">
        @endif
             <span ng-bind="item.label"></span>
        </editable-ui-select-choices>
    </div>
</div>