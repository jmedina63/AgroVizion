import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { StatusBar } from '@ionic-native/status-bar';
import { APIService } from '../../../app/provider/APIService';
import { AlertService } from '../../../app/provider/AlertService';
import { Storage } from '../../../app/provider/Storage';

@Component({
	selector: 'page-water',
	templateUrl: 'water.html',
	providers: [APIService, AlertService]
})
export class WaterPage {
    private currentDate;
	private maxDate;

	constructor(public navCtrl: NavController, statusBar: StatusBar, private http: APIService,
		private alert: AlertService, private storage: Storage) {
		// this.alert.showLoading("Cargando..."); // activa el loading screen
        this.currentDate = new Date().toISOString(); // current date for date fields
		this.maxDate = new Date(new Date().setFullYear(new Date().getFullYear() + 1)).toISOString(); // max date for date fields
	}

	/**
	* Regresa a la pantalla anterior
	* @param  {pages} page [MenuPage]
	* @return {void}
	*/
	back() {
		this.navCtrl.pop();
	}

	/**
	 * Opens modal window and sends data to the webservice
	 * @param  {ngForm} ionForm [HTMLDOM form]
	 * @return void
	 */
	sendInfo(ionForm) {
		var dialog = document.querySelector("div.success-dialog");
		dialog.classList.remove("close");
	}
}
