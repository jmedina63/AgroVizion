import { Injectable } from '@angular/core';
import { ActionSheetController } from 'ionic-angular';
import { Camera, CameraOptions } from '@ionic-native/camera';

@Injectable()
export class CameraProvider {
	private options;

	constructor(private camera: Camera, private actionSheetCtrl: ActionSheetController) {
		this.options = {
			quality: 60,
			destinationType: this.camera.DestinationType.DATA_URL,
			sourceType: this.camera.PictureSourceType.CAMERA,
			encodingType: this.camera.EncodingType.JPEG,
			cameraDirection: this.camera.Direction.BACK,
			mediaType: this.camera.MediaType.PICTURE,
			correctOrientation: true,
			targetWidth: 500,
			targetHeight: 500
		};
	}

	openDialog(callback) {
		let actionSheet = this.actionSheetCtrl.create({
			title: 'Opciones',
			buttons: [
				{
					text: 'Cámara',
					handler: () => {
						this.options.sourceType = this.camera.PictureSourceType.CAMERA;
						this.camera.getPicture(this.options).then((picture) => {
							return callback(picture, 'CAMERA');
						});
					}
				},
				{
					text: 'Galería',
					handler: () => {
						this.options.sourceType = this.camera.PictureSourceType.PHOTOLIBRARY;
						this.camera.getPicture(this.options).then((picture) => {
							return callback(picture, 'PHOTOLIBRARY');
						});
					}
				},
				{
					text: 'Cancelar',
					role: 'cancel'
				}
			]
		});
		actionSheet.present();
	}
}
