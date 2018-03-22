
import { Component } from '@angular/core';
import { NavController, Platform } from 'ionic-angular';
import { StatusBar } from '@ionic-native/status-bar';
import { FilesPage } from '../register/files/files';
import { APIService } from '../../app/provider/APIService';
import { AlertService } from '../../app/provider/AlertService';

@Component({
	selector: 'page-register',
	templateUrl: 'register.html',
	providers: [APIService, AlertService]
})
export class RegisterPage {
	private name;
	private fathername;
	private mothername;
	private rfc;
	private email;
	private phone;

	constructor(private navCtrl: NavController, private statusBar: StatusBar, private platform: Platform,
		private http: APIService, private alert: AlertService) {
		platform.ready().then(() => {
			statusBar.backgroundColorByHexString("#1e5d24");
		});
	}

    /**
	 * Sends user info to APIService for registration.
	 * @param  {ngForm} ionForm [HTMLDOM form]
     * @return {void}
	 */
	send(ionForm) {
		this.alert.showLoading("Registrando Petición...");
		let body = {
			name: this.name,
			fathername: this.fathername,
			mothername: this.mothername,
			email: this.email,
			phone: this.phone,
			rfc: this.rfc
		};
		this.http.post('registration', body, data => {
			if (data.hasOwnProperty('error')) {
				if (data.error.hasOwnProperty('email')) {
					this.alert.showError("Error!", "El correo que desea insertar ya se encuentra registrado.");
				} else if(data.error.hasOwnProperty('rfc')) {
					this.alert.showError("Error!", "El RFC que desea insertar ya se encuentra registrado.");
				}
			} else {
				ionForm.reset();
				this.alert.hideLoading();
				var dialog = document.querySelector("div.success-dialog");
				dialog.classList.remove("close");
			}
		});
	}
	/**
	 * Exit modal window and returns to last page
	 * @return void
	 */
	exit() {
		var dialog = document.querySelector("div.success-dialog");
		dialog.classList.add("close");
		this.navCtrl.goToRoot(null);
	}

	/**
	 * Pops out the current screen (goes back to the previous screen).
	 * @return {void}
	 */
	back() {
		this.navCtrl.pop();
	}
}
