<span class="tooltip-container" 
    uib-tooltip="{{ isset($field['validationController']) ? '{'.'{'.$field['validationController'].'.errorMessage}'.'}' : ''}}" 
    tooltip-class="{{ isset($field['validationController']) ? '{'.'{'.$field['validationController'].'.tooltipClass}'.'}' : ''}}" 
>
    <label class="sr-only" for="{{$field['id']}}">{{$field['label']}}</label>
    <span class="input-group">
        <input type="text" id="{{$field['id']}}" name="{{$field['id']}}" 
            class="form-control" placeholder="{{$field['label']}}"
            ng-model="{{$field['model']}}" 
            ng-model-options="{updateOn: '{{$field['updateOn'] or 'blur'}}' }"
            uib-datepicker-popup="dd/MM/yyyy" show-button-bar="false" 
            is-open="ctrl.datepickerstatus.{{$field['id']}}.open" 
            datepicker-mode="ctrl.datepicker_options.{{$field['id']}}.datepickerMode" 
            datepicker-localdate
            {{$field['validation'] or ''}} >
        </input>
        <span class="input-group-btn">
            <button type="button" class="btn btn-default" ng-click="ctrl.datepickerstatus.{{$field['id']}}.open=true">
                <i class="glyphicon glyphicon-calendar"></i>
            </button>
        </span>
    </span>
</span>