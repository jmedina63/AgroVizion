'use strict';

app.directive('yepDataTable',function ($compile) {
    return {
        restrict: 'E',
        link: function (scope, element, attrs) {

            /** default variable */
            var fields  = scope[attrs.fields];
            var rows    = scope[attrs.rows];
            var paging    = attrs.paging;
            var currentElement = element; // if it remove element.replaceWith run just one time
            scope.pagination = {};


            /** watch data change */
            scope.$watch(attrs.rows,function(newData) {
                rows = newData;
                fields  = scope[attrs.fields];
                if(rows){
                    scope.pagination = newData.metadata;
                }
                scope.render(rows,fields);
            },true);

            /** Render HTML function */
            scope.render = function(rows,fields) {
                /** begin of table */
                var html = '<div class="res-table"><table class="table table-striped table-hover table-fixed ellipsis-table" ><thead><tr>';

                /** Create table header */
                angular.forEach(fields, function (item, index) {
                    html += '<th>' + item.field + '</th>';
                });
                html +='</tr></thead><tbody>';


                /** Create column and cell */
                angular.forEach(rows, function (row, index) {
                    html +='<tr>';

                    angular.forEach(fields, function (item, index) {
                        // if hasn't dot (.)
                        if(item.field.indexOf('.') === -1 ) {
                            html += '<td>' + row[item.field] + '</td>';
                        } else {
                            // split field by dot (.)
                            var splitFieldName = item.field.split('.');
                            // check if is array
                            if(Object.prototype.toString.call(row[splitFieldName[0]]) === '[object Array]'){
                                // iteration for field is array
                                var tmp = [];
                                angular.forEach(row[splitFieldName[0]],function (value, key) {
                                    tmp.push(value[splitFieldName[1]]) ;
                                });
                                html += '<td>' + tmp + '</td>';

                                // if it's null
                            }else if(row[splitFieldName[0]]===null) {
                                html += '<td>-</td>';
                            }else{
                                html += '<td>' + row[splitFieldName[0]][splitFieldName[1]] + '</td>';
                            }
                        }
                    });
                    html +='</tr>'
                });
                html +='</tbody></table>';


                /** pagination */
                if(paging === 'true'){
                    html +='<div class="text-center"><uib-pagination total-items="pagination.total" ng-show="pagination.total" ng-model="pagination.current_page" max-size="5" class="pagination report" boundary-links="true" rotate="false" ng-change="convertQuery(report,pagination.current_page)" items-per-page="pagination.per_page"></uib-pagination></div></div>';
                } else{
                    html +='</div>';
                }


                /** Replace in html */
                var replacementElement = angular.element($compile(html)(scope));
                currentElement.replaceWith(replacementElement);
                currentElement = replacementElement;
            };

        }
    }
});