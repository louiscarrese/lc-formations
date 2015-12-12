{{-- Some things have to be computed beforehand ot it becomes a real mess later --}}
<?php 
    //We'll compute the filter string for the ng-repeat
    $filter = 'myCustomFilter:ctrl.filterInput';

    //Keep the identifying property
    $id = '';
    foreach($fields as $fieldId => $field) {
        if(isset($field['filterable']) && $field['filterable']) 
            $filter .= ":'" . $fieldId . "'";
        if(isset($field['isId']) && $field['isId'])
            $id = $fieldId;
    }
    $filter .= ' track by elem.' . $id;

    //And we compute the name for each tr form because nested {{}} are horrible
    $form_name = 'form_{{elem.' . $id . '}}';
?>

<h2>{{$title}}</h2>

<div ng-controller="{{$controllerName}} as ctrl" class="list-table-container">
    <input type="text" ng-model="ctrl.filterInput" placeholder="Recherche locale" class="table-filter" />
    <form name="mainForm" novalidate>
    <table>
        <thead>
            <tr>
                {{-- Configured Headers --}}
                @foreach($fields as $fieldId => $field)
                    @if($field['sortable'])
                        <td class="clickable">
                            <my-sortable-header set="ctrl.setSort('{{$fieldId}}')"
                                                get="ctrl.getSort('{{$fieldId}}')"
                            >
                            {{$field['label']}}
                        </td>
                    @else
                        <td><span>{{$field['label']}}</span></td>
                    @endif
                @endforeach
                {{-- action headers --}}
                <td><!--Edit--></td>
                <td><!--Delete--></td>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="elem in ctrl.data | {{$filter}}" ng-form="ctrl.form_@{{$index}}">
                {{-- Each field --}}
                @foreach($fields as $fieldId => $field)
                    <td class="validated {{$field['tdClass'] or ''}}">
                        @if($field['editable'])
                            @if($field['type'] == 'text')
                                <my-editable type="text" model="elem.{{$fieldId}}" editing-flag="elem.editing" {{$field['additionalAttributes'] or ''}} {{$field['validation'] or ''}} name="{{$fieldId}}"></my-editable>
                            @elseif($field['type'] == 'integer')
                                <my-editable type="integer" model="elem.{{$fieldId}}" editing-flag="elem.editing" {{$field['additionalAttributes'] or ''}} {{$field['validation'] or ''}} name="{{$fieldId}}"></my-editable>
                            @elseif($field['type'] == 'checkbox')
                                <my-editable type="checkbox" model="elem.{{$fieldId}}" editing-flag="elem.editing" {{$field['additionalAttributes'] or ''}} {{$field['validation'] or ''}} name="{{$fieldId}}"></my-editable>
                            @elseif($field['type'] == 'dropdown')
                                <my-editable type="dropdown" model="elem.{{$fieldId}}" editing-flag="elem.editing" source="ctrl.{{$field['dropdownDatasource']}}" source-id="{{$field['dropdownDataId']}}" source-label="{{$field['dropdownDataLabel']}}" model-label="elem.{{$field['dropdownLabel']}}" {{$field['additionalAttributes'] or ''}} name="{{$fieldId}}"></my-editable>
                            @endif

                            {{-- Validation messages --}}
                            <div class="tooltip" ng-messages="ctrl['form_' + $index].{{$fieldId}}.$error" ng-if="ctrl['form_'+$index].{{$fieldId}}.$invalid">
                                <p ng-message="required">Ce champ est obligatoire</p>
                                <p ng-message="minlength">Ce champ est trop court</p>
                                <p ng-message="maxlength">Ce champ est trop long</p>
                                <p ng-message="email">Ce champ n'est pas un email valide</p>
                                <p ng-message="number">Ce champ n'est pas un nombre valide</p>
                                <p ng-message="date">Ce champ n'est pas une date valide</p>
                            </div>

                        @else
                            <span {{$field['additionalAttributes'] or ''}}>@{{elem.{{$fieldId}}}}</span>
                        @endif
                    </td>
                @endforeach
                {{-- action columns --}}
                <td>
                    <span ng-hide="elem.editing" ng-click="elem.editing = true"><i class="icon clickable">edit</i></span>
                    <span ng-show="elem.editing" ng-click="ctrl.editSubmit($index, elem)"><i class="icon clickable">validate</i></span>
                </td>
                <td>
                    <span ng-hide="elem.editing" ng-click="ctrl.delete(elem)"><i class="icon clickable">delete</i></span>
                    <span ng-show="elem.editing" ng-click="ctrl.cancel(elem)"><i class="icon clickable">undo</i></span>
                </td>
            </tr>

            {{-- Add line --}}
            <tr ng-form="ctrl.form_add">
                @foreach($fields as $fieldId => $field)
                    <td class="validated {{$field['tdClass'] or ''}}">
                        @if($field['addLine'])
                            {{--  
                                There must be a better way to simulate a switch
                                We can't just copy $field['type'] because we'll have custom types and things like <select>
                             --}}
                            @if($field['type'] == 'text')
                                <input type="text" ng-model="ctrl.addObject.{{$fieldId}}" {{$field['additionalAttributes'] or ''}} {{$field['validation'] or ''}} name="{{$fieldId}}" />
                            @elseif($field['type'] == 'integer')
                                <input type="text" ng-model="ctrl.addObject.{{$fieldId}}"{{$field['additionalAttributes'] or ''}} {{$field['validation'] or ''}} name="{{$fieldId}}" my-force-integer />
                            @elseif($field['type'] == 'checkbox')
                                <input type="checkbox" ng-model="ctrl.addObject.{{$fieldId}}" {{$field['additionalAttributes'] or ''}} {{$field['validation'] or ''}} name="{{$fieldId}}" />
                            @elseif($field['type'] == 'dropdown')
                                <select ng-options="opt.id as opt.libelle for opt in ctrl.{{$field['dropdownDatasource']}}" ng-model="ctrl.addObject.{{$fieldId}}" {{$field['validation'] or ''}} name="{{$fieldId}}" />
                            @endif
                            {{-- Validation messages --}}
                            <div class="tooltip" ng-messages="ctrl.form_add.{{$fieldId}}.$error" ng-if="ctrl.form_add.{{$fieldId}}.$invalid && ctrl.form_add.{{$fieldId}}.$touched">
                                <p ng-message="required">Ce champ est obligatoire</p>
                                <p ng-message="minlength">Ce champ est trop court</p>
                                <p ng-message="maxlength">Ce champ est trop long</p>
                                <p ng-message="email">Ce champ n'est pas un email valide</p>
                                <p ng-message="number">Ce champ n'est pas un nombre valide</p>
                                <p ng-message="date">Ce champ n'est pas une date valide</p>
                            </div>                        
                        @endif
                    </td>
                @endforeach
                <td class="centered">
                    <span ng-click="ctrl.addSubmit()"><i class="icon clickable">add</i></span>
                </td>
            </tr>
        </tbody>
    </table>
    </form>
</div>