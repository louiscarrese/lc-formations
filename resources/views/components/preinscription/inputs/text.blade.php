<span class="tooltip-container" 
    uib-tooltip="{{ isset($field['validationController']) ? '{'.'{'.$field['validationController'].'.errorMessage}'.'}' : ''}}" 
    tooltip-class="{{ isset($field['validationController']) ? '{'.'{'.$field['validationController'].'.tooltipClass}'.'}' : ''}}" 
>
    <label class="sr-only" for="{{$field['id']}}">{{$field['label']}}</label>
    <input type="{{$field['type'] or 'text'}}" id="{{$field['id']}}" name="{{$field['id']}}" 
        class="form-control {{$field['additional_classes'] or ''}}" 
        ng-model="{{$field['model']}}" 
        ng-model-options="{updateOn: '{{$field['updateOn'] or 'blur'}}' }"
        placeholder="{{$field['label']}}" {{$field['validation'] or ''}} />
</span>
