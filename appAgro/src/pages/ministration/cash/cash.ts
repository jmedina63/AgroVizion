import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { StatusBar } from '@ionic-native/status-bar';
import { APIService } from '../../../app/provider/APIService';
import { AlertService } from '../../../app/provider/AlertService';
import { Storage } from '../../../app/provider/Storage';

@Component({
	selector: 'page-cash',
	templateUrl: 'cash.html',
	providers: [APIService, AlertService]
})
export class CashPage {
	private credits;
	private creditSelected;
	private rent;
	private rentDate;
	private preparation;
	private preparationDate;
	private sowing;
	private sowingDate;
	private labors;
	private laborsDate;
	private harvest;
	private harvestDate;
	private diverse;
	private diverseDate;
	private currentDate;
	private maxDate;

	constructor(public navCtrl: NavController, statusBar: StatusBar, private http: APIService,
		private alert: AlertService, private storage: Storage) {
		this.alert.showLoading("Cargando..."); // activa el loading screen
		this.currentDate = new Date().toISOString(); // current date for date fields
		this.maxDate = new Date(new Date().setFullYear(new Date().getFullYear() + 1)).toISOString(); // max date for date fields
		this.creditSelected = {"amount": "$0.00 MXN"};
		this.http.get('creditministry/' + this.storage.user.id + '/1', data => { // the number 1 is the ministry id of cash
			this.credits = data;
			this.alert.hideLoading();
		});
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
		var creditAmount = Number(this.creditSelected.amount.replace(/\$|MXN|,/g, ''));
		var sumItems = Number(this.rent) + Number(this.preparation) + Number(this.sowing) + Number(this.labors) + Number(this.harvest) + Number(this.diverse);
		if (sumItems > creditAmount) {
			var surplus = (sumItems - creditAmount).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		    this.alert.showMessage("Crédito insuficiente", "Crédito superado en $" + surplus + " MXN.");
		} else {
			var dialog = document.querySelector("div.success-dialog");
			dialog.classList.remove("close");
			ionForm.reset({creditSelected: {"amount": "$0.00 MXN"}});
		}
	}
}
