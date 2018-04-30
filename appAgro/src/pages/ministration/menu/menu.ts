import { Component } from '@angular/core';
import { NavController, NavParams } from 'ionic-angular';
import { StatusBar } from '@ionic-native/status-bar';
import { Storage } from '../../../app/provider/Storage';
import { APIService } from '../../../app/provider/APIService';
import { AlertService } from '../../../app/provider/AlertService';
import { CashPage } from  '../cash/cash';
import { SuppliesPage } from  '../supplies/supplies';
import { QuimicsPage } from  '../quimics/quimics';
import { WaterPage } from  '../water/water';

@Component({
	selector: 'page-menuMinistration',
	templateUrl: 'menu.html',
	providers: [APIService, AlertService]
})
export class MinistrationMenuPage {
    private pages;
	private balance;

	constructor(public navCtrl: NavController, statusBar: StatusBar, private http: APIService,
		private alert: AlertService, private storage: Storage, private navParams: NavParams) {
		this.alert.showLoading("Cargando..."); // activa el loading screen
		this.pages = {
			cash: CashPage,
			supplies: SuppliesPage,
			quimics: QuimicsPage,
			water: WaterPage
		}
		this.http.get('balance/' + this.storage.user.id, data => {
			this.balance = data[0].balance;
			this.alert.hideLoading();
		});
	}

    /**
    * Cambia de vista(pantallas)
    * @param  {pages} page [SettingsPage]
    * @return {void}
    */
    goTo(page) {
        this.navCtrl.push(page);
    }

	/**
	* Regresa a la pantalla anterior
	* @param  {pages} page [MenuPage]
	* @return {void}
	*/
	back() {
		this.navParams.get('parent').listOrders(() => {
			this.navCtrl.pop();
		});
	}
}
