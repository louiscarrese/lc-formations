<div class="form-group">
    <label for="{{$id}}">{{$label or ''}}</label>
    <div 
        editable-bsdate="{{$model}}"
        e-is-open="{{$openFlag}}"
        e-ng-click="{{$openFunction}};"
        e-datepicker-popup-x-editable="dd/MM/yyyy"
        e-init-date="01/01/1970"
        e-show-button-bar="false"
        >
        <span ng-bind="{{$model}} | date:'dd/MM/yyyy'"></span>
    </div>
</div>
