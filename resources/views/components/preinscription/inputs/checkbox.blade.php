<span class="tooltip-container" 
    uib-tooltip="{{ isset($field['validationController']) ? '{'.'{'.$field['validationController'].'.errorMessage}'.'}' : ''}}" 
    tooltip-class="{{ isset($field['validationController']) ? '{'.'{'.$field['validationController'].'.tooltipClass}'.'}' : ''}}" 
>
    <div ng-class="{'checkbox-inline' : {{$field['inline'] or 'false'}} }">
        <label>
            <input type="checkbox" id="{{$field['id']}}_@{{item.id}}" name="{{$field['id']}}" 
                ng-value="item.id" ng-model="{{$field['model']}}" 
                ng-model-options="{updateOn: '{{$field['updateOn'] or 'blur'}}' }"
                {{$field['validation'] or ''}} >
                {!! $field['label'] !!}
            </input>    
        </label>
    </div>
</span>