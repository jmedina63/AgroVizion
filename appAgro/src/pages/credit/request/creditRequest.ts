import { Component } from '@angular/core';
import { NavController, Platform, NavParams } from 'ionic-angular';
import { StatusBar } from '@ionic-native/status-bar';
import { CameraProvider } from '../../../app/provider/CameraProvider';
import { File } from '@ionic-native/file';
import { FileTransfer, FileUploadOptions, FileTransferObject } from '@ionic-native/file-transfer';
import { FilePath } from '@ionic-native/file-path';
import { Storage } from '../../../app/provider/Storage';
import { APIService } from '../../../app/provider/APIService';
import { AlertService } from '../../../app/provider/AlertService';

@Component({
	selector: 'page-creditRequest',
	templateUrl: 'creditRequest.html',
	providers: [CameraProvider, File, FileTransfer, APIService, AlertService]
})
export class CreditRequest {
	private documents;
	private cultivationList;
	private cultivation;
	private hectares;
	private docsLife = 0;
	private readonly fileTransfer: FileTransferObject = this.transfer.create();

	constructor(public navCtrl: NavController, private platform: Platform, private statusBar: StatusBar,
		private camera: CameraProvider, private file: File, private transfer: FileTransfer, private storage: Storage,
		private http: APIService, private alert: AlertService, private navParams: NavParams) {
		platform.ready().then(() => {
			statusBar.backgroundColorByHexString("#205d23");
		});
		this.alert.showLoading("Obteniendo datos...");
		this.documents = {
			votingLisense: {foto: null},
			addressDocument: {foto: null}
		}
		this.http.get('cultivation', data => {
			this.cultivationList = data;
			this.alert.hideLoading();
		});
	}
	/**
	 * Opens modal window
	 * @return void
	 */
	sendInfo() {
		this.alert.showLoading("Enviando solicitud de crédito...");
		let body = {
			user: this.storage.user.id,
			cultivation: this.cultivation,
			hectares: this.hectares,
			cardId: 'data:image/jpeg;base64,' + this.documents.votingLisense.foto,
			docAddress: 'data:image/jpeg;base64,' + this.documents.addressDocument.foto
		};
		this.http.post('creditrequest', body, data => {
			this.alert.hideLoading();
			var dialog = document.querySelector("div.success-dialog");
			dialog.classList.remove("close");
		});
	}
	/**
	 * Exit modal window and returns to last page
	 * @return void
	 */
	exit() {
		this.navParams.get('parent').listCredits(() => {
			var dialog = document.querySelector("div.success-dialog");
			dialog.classList.add("close");
			this.navCtrl.pop();
		});
	}

	/**
	 * Open device camera or gallery
	 * @param  file     filename [votingLisense, addressDocument]
	 * @return void
	 */
	openCamera(file) {
		this.camera.openDialog((picture, sourceType) => {
			this.documents[file].foto = picture;
		});
	}

	/**
	* Regresa a la pantalla anterior
	* @param  {pages} page [CreditPage]
	* @return {void}
	*/
	back() {
		this.navCtrl.pop();
	}
}
