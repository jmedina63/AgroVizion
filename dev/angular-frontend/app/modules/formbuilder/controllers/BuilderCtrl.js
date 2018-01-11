"use strict";

var app = angular.module('ng-laravel',['dndLists','summernote','ui.select']);
app.controller('BuilderCtrl',function($scope,$templateCache,$compile,$injector,$translatePartialLoader,trans){

    /**
     * Sample data
     */
    $scope.roles =[{id:1,name:'select1'}];
    $scope.radioOptions1 =[{value:1,name:'radio1'},{value:2,name:'radio2'}];
    $scope.radioOptions2 =[{value:1,name:'radio3'},{value:2,name:'radio4'}];
    $scope.category =[{id:1,name:'cat1'},{id:2,name:'cat2'}];


    /**
     * get collection array name and return collection
     */
    $scope.getCollection = function (name) {
        console.log(name);
        return $scope[name];
    };

    /**
     * get html
     */
    $scope.getHtml = function (template) {
        var scope ;
        scope = $templateCache.get(template +'.html');
        return $compile(scope);
    };

    $scope.getHtmlString = function () {
        var template = angular.element('<div ng-repeat="item in category">{{item.name}}</div>');
        var linkFunction = $compile(template);
        return linkFunction;
        var result = linkFunction($scope);
        // $scope.$apply();


        console.log(template.html());
    };


    /**
     * Required to builder
     */
    $scope.yobject = {};
    $scope.models = {
        selected: null,
        templates: [
            {type: "item", id: 2, name:'Sample Item',class:'row'},
            {type: "container", id: 1, name:'container', class:'col-md-12', columns: [[]]},
            {type: "input", id: 3,model:'',placeholder:'',name:'Input', title:'Input'},
            {type: "textarea", id: 4,model:'',placeholder:'',name:'Textarea',title:'Textarea'},
            {type: "checkbox", id: 5,model:'',placeholder:'',name:'Checkbox',title:'checkbox',checked:true},
            {type: "switch", id: 6,model:'',placeholder:'',name:'Switch',title:'Switch',trueValue:1},
            {type: "select", id: 7,model:'',name:'Select',title:'Select',options:'role.id as role.name for role in roles'},
            {type: "radio", id: 8,model:'',name:'Radio',title:'Radio',radioOptions:'radioOptions1',optValue:'value',optLabel:'name'},
            {type: "editor", id: 9,model:'',name:'Editor',title:'Editor'},
            {type: "ui-select", id: 9,model:'',name:'UI Select',title:'UI Select', repeat:'category.id as category in categories | propertyFilter: {name: $select.search}',show:'category.name'}
        ],
         dropzones: {
             "B": []
         }
        // dropzones: {
        //     "B": [
        //         {
        //             "type": "item",
        //             "id": 7
        //         },
        //         {
        //             "type": "item",
        //             "id": "8"
        //         },
        //         {
        //             "type": "container",
        //             "id": "2",
        //             "columns": [
        //                 [
        //                     {
        //                         "type": "item",
        //                         "id": "9"
        //                     },
        //                     {
        //                         "type": "item",
        //                         "id": "10"
        //                     },
        //                     {
        //                         "type": "item",
        //                         "id": "11"
        //                     }
        //                 ],
        //                 [
        //                     {
        //                         "type": "item",
        //                         "id": "12"
        //                     },
        //                     {
        //                         "type": "container",
        //                         "id": "3",
        //                         "columns": [
        //                             [
        //                                 {
        //                                     "type": "item",
        //                                     "id": "13"
        //                                 }
        //                             ],
        //                             [
        //                                 {
        //                                     "type": "item",
        //                                     "id": "14"
        //                                 }
        //                             ]
        //                         ]
        //                     },
        //                     {
        //                         "type": "item",
        //                         "id": "15"
        //                     },
        //                     {
        //                         "type": "item",
        //                         "id": "16"
        //                     }
        //                 ]
        //             ]
        //         },
        //         {
        //             "type": "item",
        //             "id": 16
        //         }
        //     ]
        // }
    };

    $scope.$watch('task', function(task) {
        $scope.taskAsJson = angular.toJson(task, true);
    }, true);
    
    $scope.$watch('models.dropzones', function(model) {
        $scope.modelAsJson = angular.toJson(model, true);
    }, true);

    $scope.submit = function () {
        alert(JSON.stringify($scope.yobject));
    }
});



app.directive('xxAngulizer', function($compile, $rootScope,$templateCache) {
    return {
        restrict: 'A',
        template:
        '<div>TEMPLATE</div><textarea id="template" ng-model="template" ng-change="update" style="width: 100%"></textarea>' +
        '<div>MODEL</div><textarea id="model" ng-model="model" ng-change="update" style="width: 100%"></textarea>' +
        '<div>HTML OUTPUT</div><textarea id="output" ng-model="output" style="width: 100%"></textarea>' +
        '<div>HTML OUTPUT</div><pre class="prettyprint" ng-bind="output " style="width: 100%"></pre>' +
        '<div id="hidden" ng-hide="true"></div>',
        scope: true,
        link: function($scope, elem) {
            var templateElem = $(elem.find('#template'));
            var modelElem = $(elem.find('#model'));
            var outputElem = $(elem.find('#output'));
            var hiddenElem = $(elem.find('#hidden'));

            //$scope.template = '<div ng-repeat="cat in cats">{{cat.name}} the famous {{cat.breed}}</div>';
            $scope.template = $templateCache.get('input.html');
            $scope.model = '{"item" : {"fieldName":"First Name", "model":"user", "placeholder":"enter your name"}}';
            $scope.output = '';
            $scope.update = update;

            var $magicScope;

            function update() {
                var model, template;
                try {
                    model = JSON.parse($scope.model);
                } catch (err) {
                    model = null;
                    $scope.output = 'Model is not valid JSON.';
                }
                if (model) {
                    try {
                        template = $($scope.template);
                    } catch (err) {
                        console.log(err);
                        template = null;
                        $scope.output = 'Template is not valid(ish) HTML.';
                    }
                }
                if (template) {
                    if ($magicScope) { $magicScope.$destroy(); }
                    $magicScope = $rootScope.$new(true);
                    for (var p in model) {
                        $magicScope[p] = model[p];
                    }

                    //$scope.$apply(function() {
                    $compile(hiddenElem.html(template))($magicScope);
                    //});
                    //$scope.$apply(function(){
                    //  $scope.output = hiddenElem.html();
                    //});
                    setTimeout(function(){
                        $scope.output = hiddenElem.html();
                        $scope.$apply();
                    }, 500);
                }
            }

            $scope.$watch('template', update);
            $scope.$watch('model', update);
            setTimeout(update, 500);
        }
    };
});

(function(){
    $('pre').addClass('prettyprint');
    prettyPrint();
})();