<div class="form-group">        
    <label for="{{$id}}">{{$label or ''}}</label>
    <div
        editable-radiolist-precision="{{$model}}" 
        e-ng-options="item.id as item.label for item in {{$datasource}}" 
        precision-model="{{$precision_model}}" 
        @if(isset($inline) && $inline)
            inline="inline"
        @endif
    >
        <span ng-bind="{{$displayed or 'item.label'}}"></span>
    </div>
</div>
