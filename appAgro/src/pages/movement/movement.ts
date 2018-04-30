import { Component } from '@angular/core';
import { NavController, Platform } from 'ionic-angular';
import { Storage } from '../../app/provider/Storage';
import { StatusBar } from '@ionic-native/status-bar';
import { AlertService } from '../../app/provider/AlertService';
import { APIService } from '../../app/provider/APIService';

@Component({
	selector: 'page-movement',
	templateUrl: 'movement.html',
	providers: [AlertService, APIService]
})
export class MovementPage {
	private balance;
	private transactions;
	private currentDate;

	constructor(public navCtrl: NavController, private statusBar: StatusBar, private platform: Platform, private storage: Storage,
		private alert: AlertService, private http: APIService) {
		this.alert.showLoading("Cargando..."); // activa el loading screen
		platform.ready().then(() => {
			statusBar.backgroundColorByHexString("#5c1887");
		});
		var d = new Date();
		var months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
		this.currentDate = d.getDay() +' de ' + months[d.getMonth()] + ' ' + d.getFullYear(); // current date for date fields
		this.http.get('balance/' + this.storage.user.id, data => {
			this.balance = data[0].balanceHTML;
			this.http.get('transaction/' + this.storage.user.id, data => {
				this.transactions = data;
				this.alert.hideLoading();
			});
		});
	}

    /**
	* Regresa a la pantalla anterior
	* @param  {pages} page [MenuPage]
	* @return {void}
	*/
	back() {
		this.statusBar.backgroundColorByHexString("#205d23");
		this.navCtrl.pop();
	}

	showInfo() {
		this.alert.showMessage("Importante.", "La información presentada en este medio es de carácter informativo sin ninguna validez legal,"
		+ " si desea obtener comprobantes legales con dicha información favor de presentarse en cualquiera de nuestras sucursales.");
	}

}
