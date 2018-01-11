app.directive('yepCheckbox', function() {
    var uniqueId = 1;
    return {
        restrict: 'EA',
        require: 'ngModel',
        scope: {
            bar: '=ngModel'
        },
        template: '<div class="m-switch" ><input type="checkbox" id="{{::uniqueId}}" class="switch-input" ng-model="bar"/>' +
        '<label for="{{::uniqueId}}" class="switch-label"></label></div>',
        link: function(scope, elem, attrs,ngModel) {
            scope.uniqueId = 'item' + uniqueId++;
        }
    }
});