import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { Storage } from '../../app/provider/Storage';
import { RegisterPage } from '../register/register';
import { MenuPage } from '../menu/menu';
import { APIService } from '../../app/provider/APIService';
import { AlertService } from '../../app/provider/AlertService';

@Component({
	selector: 'page-login',
	templateUrl: 'login.html',
	providers: [APIService, AlertService]
})
export class LoginPage {
    private email;
    private password;

	constructor(private navCtrl: NavController, private http: APIService, private alert: AlertService, private storage: Storage) {

	}

	/**
	  * Verifica si el usuario ingresado es correcto, sí lo es, obtiene ciertos datos y pasa al menú de la app.
	  * @param  {ngForm} ionForm [HTMLDOM form]
	  * @return {void}
	  */
	login(ionForm) {
		this.alert.showLoading("Iniciando Sesión..."); // activa el loading screen
		let body = { // datos que se enviarán al webservice
			password: this.password
		};

		this.http.post('auth', body, data => {
			if (data && !data.hasOwnProperty('incorrect') && !data.hasOwnProperty('unauthorized')) { // si el usuario es correcto
				this.storage.user = data;
				this.http.appendToken(data.token);
				this.navCtrl.setRoot(MenuPage)
			} else if (data.hasOwnProperty('incorrect')) { // si el usuario es incorrecto
				this.alert.showError("Authenticación", data.incorrect);
			} else if (data.hasOwnProperty('unauthorized')) { // si el usuario no se encuentra activo
				this.alert.showError("Authenticación", data.unauthorized);
			}
		});

	}

	forgotten() {

	}

	register() {
		this.navCtrl.push(RegisterPage);
	}

	showInfo() {
		this.alert.showMessage("Importante.", "La información presentada en este medio es de carácter informativo sin ninguna validez legal,"
		+ " si desea obtener comprobantes legales con dicha información favor de presentarse en cualquiera de nuestras sucursales.");
	}
}
