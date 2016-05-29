angular.module('xeditable').directive('editableRadiolistPrecision', [
  'editableDirectiveFactory',
  'editableNgOptionsParser',
  function(editableDirectiveFactory, editableNgOptionsParser) {
    return editableDirectiveFactory({
      directiveName: 'editableRadiolistPrecision',
      inputTpl: '<span></span>',
      render: function() {
        this.parent.render.call(this);

        var parsed = editableNgOptionsParser(this.attrs.eNgOptions);
        var html = '<label ng-repeat="'+parsed.ngRepeat+'">';
        html += '<input type="radio" ng-disabled="' + this.attrs.eNgDisabled + '" ng-model="$parent.$data" value="{{'+parsed.locals.valueFn+'}}">';
        html += '<span ng-bind="'+parsed.locals.displayFn+'"></span>';

        html += '<input type="text" ng-if="'+ parsed.locals.valueName +'.precision" ng-model="' + this.attrs['precisionModel'] + '[' + parsed.locals.valueFn + ']" />';
        html += '</label>';


        this.inputEl.removeAttr('ng-model');
        this.inputEl.removeAttr('ng-options');
        this.inputEl.html(html);
      },
      autosubmit: function() {
        var self = this;
        self.inputEl.bind('change', function() {
          setTimeout(function() {
            self.scope.$apply(function() {
              self.scope.$form.$submit();
            });
          }, 500);
        });
      }
    });
}]);