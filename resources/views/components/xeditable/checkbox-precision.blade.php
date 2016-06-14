<span 
    editable-checkboxlist-precision="{{$model}}" 
    e-ng-options="item.id as item.label for item in {{$datasource}}" 
    precision-model="{{$precision_model}}"
    @if(isset($disabled) && $disabled)
        e-disabled
    @endif
    >
    <span ng-bind="{{$model}}"></span>
</span>