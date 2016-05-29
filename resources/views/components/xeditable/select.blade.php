<div class="form-group">
    <label for="{{$id}}">{{$label}}</label>
    <div
        id="{{$id}}" 
        editable-ui-select="{{$model}}" 
        @if(isset($form))
            e-form="{{$form}}" 
        @endif
        e-name="{{$name}}"
        theme="bootstrap" 
        e-ng-change="{{$model}}=$data"
        >
        <span ng-bind="{{$displayed}}"></span>
        <editable-ui-select-match placeholder="{{$label or ''}}">
            <span ng-bind="{{$match_displayed}}"></span>
        </editable-ui-select-match>
        @if(isset($singleProperty) && $singleProperty !== false)
            <editable-ui-select-choices repeat="item.{{$singleProperty}} as item in {{$datasource}} | filter: $select.search track by item.{{$singleProperty}}"
            @if(isset($refresh))
                refresh="{{$refresh}}"
                refresh-delay="0"
            @endif
        >
        @else
            <editable-ui-select-choices repeat="item in {{$datasource}} | filter: $select.search track by item.id"
            @if(isset($refresh))
                refresh="{{$refresh}}"
                refresh-delay="0"
            @endif
            >
        @endif
             <span ng-bind="{{$choices_displayed}}"></span>
        </editable-ui-select-choices>
    </div>
</div>
