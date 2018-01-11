"use strict";

var app = angular.module('ng-laravel');
app.controller('VerifyCtrl',function($scope,$state,$stateParams,Restangular){
    /*
     * Define initial value
     */
    $scope.status = 'loading';

    /**
     * verify code
     */
    Restangular.one('register/verify/', $stateParams.code).get().then(function(response) {
        $scope.status = 'success';
        swal({ title: "Success", text: response, type: "success"});
        $state.go('login');
    },function (error) {
        $scope.status = 'error';
        swal({ title: "Error", html: error.data , type: "error"});
    })


});