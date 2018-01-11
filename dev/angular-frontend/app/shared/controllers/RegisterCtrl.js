"use strict";

var app = angular.module('ng-laravel',['vcRecaptcha']);
app.controller('RegisterCtrl',function($scope,$state,$stateParams,Restangular,vcRecaptchaService){
    /*
     * Define initial value
     */
    $scope.user = {};
    $scope.isDisabled = false;
    // reCaptcha property
    $scope.response = null;
    $scope.widgetId = null;
    $scope.key =  '6LeD-gYUAAAAAJHSP8johePoD4YQ54fI4lKkQ5aK';


    /*
     * User Registration
     */
    $scope.register = function(user){
        $scope.isDisabled = true;
        Restangular.all('register').customPOST('Email','',user).then(function(data) {
            swal({ title: "Success", text: data, type: "success"});
            $scope.isDisabled = false;
            $scope.user = {};
            $state.go('login');
        }, function(response) {
            swal({ title: "Error", html: displayError(response) , type: "error"});
            $scope.isDisabled = false;
        });
    };


    /**
     * Foreach Function for show validation error
     */
    function displayError(param) {
        var str = '';
        angular.forEach(param.data.error, function (value, key) {
            angular.forEach(value, function (v, k) {
                str += v +'<br>';
            })
        });
        return str;
    }


    /**
     * reCaptcha functions 
     */
    $scope.setResponse = function (response) {
        console.info('Response available');
        $scope.response = response;
    };

    $scope.setWidgetId = function (widgetId) {
        console.info('Created widget ID: %s', widgetId);
        $scope.widgetId = widgetId;
    };

    $scope.cbExpiration = function() {
        console.info('Captcha expired. Resetting response object');
        vcRecaptchaService.reload($scope.widgetId);
        $scope.response = null;
    };

    // $scope.submit = function () {
    //     var valid;
    //
    //     /**
    //      * SERVER SIDE VALIDATION
    //      *
    //      * You need to implement your server side validation here.
    //      * Send the reCaptcha response to the server and use some of the server side APIs to validate it
    //      * See https://developers.google.com/recaptcha/docs/verify
    //      */
    //     console.log('sending the captcha response to the server', $scope.response);
    //
    //     if (valid) {
    //         console.log('Success');
    //     } else {
    //         console.log('Failed validation');
    //
    //         // In case of a failed validation you need to reload the captcha
    //         // because each response can be checked just once
    //         vcRecaptchaService.reload($scope.widgetId);
    //     }
    // };

});