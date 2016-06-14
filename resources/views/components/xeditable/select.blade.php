<div class="form-group">
    <label for="{{$id}}">{{$label}}</label>
    <div
        id="{{$id}}" 
        editable-ui-select="{{$model}}" 
        @if(isset($form))
            e-form="{{$form}}" 
        @endif
        e-name="{{$name}}"
        theme="bootstrap" 
        e-ng-change="{{$model}}=$data"
        @if(isset($no_reset_search_input) && $no_reset_search_input)
            e-reset-search-input="false"
        @endif
        @if(isset($search_prefill))
            e-ui-select-search-prefill="{{$search_prefill}}"
        @endif
        @if(isset($search_placeholder) && $search_placeholder)
            e-ui-select-search-placeholder
        @endif
        @if(isset($no_reset_search_input) && $no_reset_search_input)
            e-reset-search-input="false"
        @endif
        @if(isset($disabled) && $disabled)
            disabled
        @endif
        {{ $additional_attributes or '' }}
        >
        <span ng-bind="{{$displayed}}"></span>
        <editable-ui-select-match placeholder="{{ $label or ''}}">
            <span ng-bind="{{$match_displayed}}"></span>
        </editable-ui-select-match>
        @if(isset($singleProperty) && $singleProperty !== false)
            <editable-ui-select-choices repeat="item.{{$singleProperty}} as item in {{$datasource}} | myCustomFilter:$select.search{{ isset($filter_props) ? ':' . $filter_props : '' }} track by item.{{$singleProperty}}"
            @if(isset($refresh))
                refresh="{{$refresh}}"
                refresh-delay="100"
            @endif
        >
        @else
            <editable-ui-select-choices repeat="item in {{$datasource}} | myCustomFilter:$select.search{{ isset($filter_props) ? ':' . $filter_props : '' }} track by item.id"
            @if(isset($refresh))
                refresh="{{$refresh}}"
                refresh-delay="100"
            @endif
            >
        @endif
             <span ng-bind="{{$choices_displayed}}"></span>
        </editable-ui-select-choices>
    </div>
</div>
