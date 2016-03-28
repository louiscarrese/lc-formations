function elementModifier() {
    makeInvalid = function(el, errorMsg) {
        var angEl = angular.element(el);
        var controller = angEl.controller('form')[angEl.attr('name')];
        var errors = controller != undefined ? controller.$error : undefined;

        var formGroup = getParentFormGroup(angEl);

        if(errors) {
            if(errors.recommended) {
                formGroup.addClass("has-warning");
                controller.tooltipClass="tooltip-warning";
            } else {
                formGroup.addClass("has-error");
                controller.tooltipClass="tooltip-error";
            }
            controller.errorMessage = errorMsg;
        }
    }

    makeDefault = function(el) {
        var angEl = angular.element(el);
        var controller = angEl.controller('form')[angEl.attr('name')];
        var formGroup = getParentFormGroup(angEl);

        formGroup.removeClass("has-warning");
        formGroup.removeClass("has-error");
        if(controller) {
            controller.errorMessage = '';
            controller.tooltipClass = '';
        }
    }

    getParentFormGroup = function(el) {
        var localEl = el;
        //TODO: add a check to avoid infinite loop
        while(!localEl.hasClass('tooltip-container')) {
            localEl = localEl.parent();
        }
        return (localEl.hasClass('tooltip-container') ? localEl : el);
    }

    return {
        makeValid: makeDefault,
        makeInvalid: makeInvalid,
        makeDefault: makeDefault,
        key: 'elementModifier'
    };
}
