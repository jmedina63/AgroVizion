import { Component } from '@angular/core';
import { NavController, Platform } from 'ionic-angular';
import { StatusBar } from '@ionic-native/status-bar';
import { File } from '@ionic-native/file';
import { FileTransfer, FileUploadOptions, FileTransferObject } from '@ionic-native/file-transfer';
import { FilePath } from '@ionic-native/file-path';
import { CameraProvider } from '../../../app/provider/CameraProvider';
import { APIService } from '../../../app/provider/APIService';
import { AlertService } from '../../../app/provider/AlertService';

@Component({
	selector: 'page-files',
	templateUrl: 'files.html',
	providers: [CameraProvider, File, FileTransfer, APIService, AlertService]
})
export class FilesPage {
	private document;
	private url;
	private readonly fileTransfer: FileTransferObject = this.transfer.create();

	constructor(private navCtrl: NavController, private statusBar: StatusBar, private platform: Platform, private camera: CameraProvider,
				private file: File, private transfer: FileTransfer, private alert: AlertService, private http: APIService) {
		platform.ready().then(() => {
			statusBar.backgroundColorByHexString("#1e5d24");
		});
		this.document = {
			votingLisense: {name: null},
			addressDocument: {name: null},
			birthCertificate: {name: null},
			curp: {name: null},
			rfc: {name: null},
			solidarityId: {name: null},
			irrigationPermits: {name: null},
			leaseContract: {name: null},
			curpEndorsement: {name: null},
			endorseBirthCert: {name: null}
		}
	}

    /**
     * Pops out the current screen (goes back to the previous screen).
     * @return {void}
     */
	back() {
		this.navCtrl.pop();
	}

	openCamera(document, file) {
		this.camera.openDialog((photoPath, sourceType) => {
			let correctPath = null;
			let currentName = null;
			let newName = this.createFileName();
			if (sourceType == "PHOTOLIBRARY") {
				correctPath = photoPath.substr(0, photoPath.lastIndexOf('/') + 1);
				currentName = photoPath.substring(photoPath.lastIndexOf('/') + 1, photoPath.lastIndexOf('?'));
			} else {
				correctPath = photoPath.substr(0, photoPath.lastIndexOf('/') + 1);
				currentName = photoPath.substr(photoPath.lastIndexOf('/') + 1);
			}
			this.file.copyFile(correctPath, currentName, this.file.dataDirectory, newName).then(tmp => {
				document[file] = {
					path: tmp.nativeURL,
					name: tmp.name
				};
			}).catch(err => {
				alert(err.message);
			});
		});
	}

	/**
	 * Creates an image name.
	 * @return {string}
	 */
	createFileName() {
		return Math.floor(Math.random() * 100 + 1).toString() + new Date().getTime() + ".jpg";
	}

	sendInfo() {
		if (this.document.votingLisense.name == null || this.document.addressDocument.name == null ||
			this.document.birthCertificate.name == null || this.document.curp.name == null) {
		    this.alert.showMessage("Importante!", "Algunos documentos son necesarios para el registro.");
		} else {
			this.alert.showLoading("Registrando Petición...");
			var register1 = JSON.parse(localStorage.getItem("register1"));
			var register2 = JSON.parse(localStorage.getItem("register2"));
	 		let body = {
	 			name: register1.name + ' ' + register1.fatherName + ' ' + register1.motherName,
				phone: register1.cellPhone,
				branchoffice_id:  register1.location,
				hectareas_cultivo: register2.culture,
				tamano_empresa: register2.companySize,
				hectareas_propias: register2.owned,
				hectareas_financiar: register2.finance,
				tipo_garantia: register2.guarantee,
				identificacion: this.document.votingLisense.name,
				comprobante_domicilio: this.document.addressDocument.name,
				acta_nacimiento: this.document.birthCertificate.name,
				curp: this.document.curp.name,
				acta_nacimiento_aval: this.document.endorseBirthCert.name,
				rfc: this.document.rfc.name,
				identificacion_solidarios: this.document.solidarityId.name,
				permisos_riego: this.document.irrigationPermits.name,
				contratos_arrendamiento: this.document.leaseContract.name,
				curp_aval: this.document.curpEndorsement.name
				// cultivation: register1.cultivation // falta este campo en la base de datos revisar despues
	 		};
	 		this.http.post('creditrequest', body, data => { // Sends data to creditrequest API RESTful Service.
	 			if (data.hasOwnProperty('success')) {
					this.uploadDocuments(this.document, (loaded) => {
						if(loaded > 0) {
							this.alert.hideLoading();
							var dialog = document.querySelector("div.success-dialog");
							dialog.classList.remove("close");
						} else {
							this.alert.showError("Error!", "Ocurrió un error en la carga de archivos");
						}
					});
	 			} else if (data.hasOwnProperty('error')) {
	 				if (Object.keys(data.error).length > 1 || !data.error.hasOwnProperty("error")) {
	 					var key = Object.keys(data.error)[0];
	 					this.alert.showError("Error", data.error[key]); // Shows the first API validation response error.
	 				} else {
	 					this.alert.showError("Error", data.error); // Shows the API not aceptable error.
	 				}
	 			} else {
	 				this.alert.showError("Error", "Ha ocurrido un error.");
	 			}
	 		});
		}
	}

	exit() {
		var dialog = document.querySelector("div.success-dialog");
		dialog.classList.add("close");
		this.navCtrl.goToRoot(null);
	}

	uploadDocuments(documents, callback) {
		var loaded = 0;
		var counter = 0;
		for (let doc in documents) {
			if (documents[doc].name == null) {
				counter++;
			    continue;
			} else {
				let options: FileUploadOptions = {
					fileKey: "image",
					fileName: documents[doc].name,
					chunkedMode: false,
					mimeType: "image/jpeg",
					httpMethod: 'POST'
				}
				// Use the FileTransfer to upload the image
				this.fileTransfer.upload(documents[doc].path,  APIService.URL_API+"file", options).then(data => {
					loaded++;
					counter++;
					if (counter == Object.keys(documents).length)
						return callback(loaded);
				}, err => {
					counter++;
					if (counter == Object.keys(documents).length)
						return callback(loaded);
				});
			}
		}
	}

}
