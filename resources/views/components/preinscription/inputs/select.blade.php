<span class="tooltip-container" 
    uib-tooltip="{{ isset($field['validationController']) ? '{'.'{'.$field['validationController'].'.errorMessage}'.'}' : ''}}" 
    tooltip-class="{{ isset($field['validationController']) ? '{'.'{'.$field['validationController'].'.tooltipClass}'.'}' : ''}}" 
>
    <label class="sr-only" for="{{$field['id']}}">{{$field['label']}}</label>
    <ui-select id="{{$field['id']}}" name="{{$field['id']}}" 
        theme="bootstrap" ng-model="{{$field['model']}}" 
        ng-model-options="{updateOn: '{{$field['updateOn'] or 'blur'}}' }"
        register-custom-form-control 
        @if(isset($field['onSelect']))
            on-select="{{$field['onSelect']}}" 
        @endif
        {{$field['validation'] or ''}} >
        <ui-select-match placeholder="{{$field['label']}}">
            <span ng-bind="$select.selected.label"></span>
        </ui-select-match>
        <ui-select-choices repeat="item in ({{$field['datasource']}} | filter: $select.search) track by item.id">
            <span ng-bind="item.label"></span>
        </ui-select-choices>
    </ui-select>
</span>
