<span class="tooltip-container" 
    uib-tooltip="{{ isset($field['validationController']) ? '{'.'{'.$field['validationController'].'.errorMessage}'.'}' : ''}}" 
    tooltip-class="{{ isset($field['validationController']) ? '{'.'{'.$field['validationController'].'.tooltipClass}'.'}' : ''}}" 
>
    <label class="sr-only" for="{{$field['id']}}">{{$field['label']}}</label>
    <textarea id="{{$field['id']}}" name="{{$field['id']}}" 
        class="form-control" placeholder="{{$field['label']}}" 
        ng-model="{{$field['model']}}"
        ng-model-options="{updateOn: '{{$field['updateOn'] or 'blur'}}' }"
        {{$field['validation'] or ''}}>
    </textarea>
</span>