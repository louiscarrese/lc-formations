<span 
    editable-checkboxlist-precision="{{$model}}" 
    e-ng-options="item.id as item.label for item in {{$datasource}}" 
    precision-model="{{$precision_model}}"
    >
    <span ng-bind="{{$displayed}}"></span>
</span>