<span class="tooltip-container" 
    uib-tooltip="{{ isset($field['validationController']) ? '{'.'{'.$field['validationController'].'.errorMessage}'.'}' : ''}}" 
    tooltip-class="{{ isset($field['validationController']) ? '{'.'{'.$field['validationController'].'.tooltipClass}'.'}' : ''}}" 
>
    <div ng-class="{
        'radio-inline': {{$field['inline'] or 'false'}}, 
        'radio': !{{$field['inline'] or 'false'}} && !item.freeText, 
        'radio-inline form-group form-inline': item.freeText}" 
        ng-repeat="item in {{$field['datasource']}}">
        <label>
            <input type="radio" id="{{$field['id']}}_@{{item.id}}" name="{{$field['id']}}" 
                ng-value="item.id" ng-model="{{$field['model']}}" 
                ng-model-options="{updateOn: '{{$field['updateOn'] or 'blur'}}' }"
                {{$field['validation'] or ''}} >
                @{{item.label}}
            </input>    
        </label>
        <input type="text" ng-if="item.freeText" class="form-control" id="{{$field['id']}}_@{{item.id}}_text" name="{{$field['id']}}_@{{item.id}}_text" ng-model="{{$field['model']}}_text" placeholder="Précisez"></input>
    </div>
</span>
