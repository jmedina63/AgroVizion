"use strict";

var app = angular.module('ng-laravel',['dropzone']);
app.controller('ProfileCtrl',function($scope, $http, $uibModalInstance, resolveItem, languages,UserService,Notification) {
    /**
     * Set default variable
     */
    $scope.isDisabled = false;
    $scope.languages = angular.copy(languages);
    $scope.tmpProfile = angular.copy(resolveItem); // it's necessary to prevent overwrite tmpProfile & profile
    $scope.tmpProfile.changePasswordStatus = false; // user want to change password or no
    $scope.tmpProfile.currentPassword = '';
    $scope.tmpProfile.newPassword = '';
    $scope.tmpProfile.newPassword_confirmation = '';
    /**
     * save update profile
     */
    $scope.saveProfile = function (user) {
        // you don't need to send permissions
        user.permissions = [];
        // progressbar enabled
        $scope.isDisabled = true;
        // profile update /user/{id}/profile
        // if user change your password, your password submitted to server
        UserService.editProfile(user);
        // waiting for listener to close modal
        // $uibModalInstance.close($scope.tmpProfile);
    };

    /**
     * Cancel update profile
     */
    $scope.cancelModal = function () {
        $uibModalInstance.dismiss('cancel');
    };

    /**
     * Dropzone
     */
    $scope.dropzoneConfig = {
        options: { // passed into the Dropzone constructor
            url: '../laravel-backend/public/api/uploadimage',
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: .5, // MB
            acceptedFiles: 'image/jpeg,image/png,image/gif',
            maxFiles: 1,
            maxfilesexceeded: function (file) {
                this.removeAllFiles();
                this.addFile(file);
            },
            addRemoveLinks: true,
            dictDefaultMessage: '<i class="upload-icon fa fa-cloud-upload blue fa-3x"></i>',
            dictResponseError: 'Error while uploading file!'
        },
        'eventHandlers': {
            'removedfile': function (file,response) {
                $http({
                    method : "POST",
                    url : "../laravel-backend/public/api/deleteimage/"+ $scope.tmpProfile.avatar_url
                }).then(function mySucces(response) {
                    $scope.deleteMessage = response.data;
                    $scope.tmpProfile.avatar_url='';
                });
            },
            'success': function (file, response) {
                $scope.tmpProfile.avatar_url = response.filename;
            }
        }
    };


    /************************************************
     * Event listener
     ************************************************/
    // Update user event listener
    $scope.$on('user.updateProfile', function() {
        Notification({message: 'app.shared.common.profileUpdate' ,templateUrl:'app/vendors/angular-ui-notification/tpl/success.tpl.html'},'success');
        $uibModalInstance.close($scope.tmpProfile);
        $scope.isDisabled = false;
    });

    // user form validation event listener
    $scope.$on('user.validationError', function(event,errorData) {
        $scope.isDisabled = false;
        Notification({message: errorData ,templateUrl:'app/vendors/angular-ui-notification/tpl/validation.tpl.html'},'warning');
    });

});
