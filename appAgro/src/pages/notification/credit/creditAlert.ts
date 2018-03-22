import { Component } from '@angular/core';
import { NavController, Platform } from 'ionic-angular';
import { Storage } from '../../../app/provider/Storage';
import { StatusBar } from '@ionic-native/status-bar';
import { NotificationPage } from '../notification';

@Component({
	selector: 'page-creditAlert',
	templateUrl: 'creditAlert.html'
})
export class CreditAlertPage {

	constructor(public navCtrl: NavController, private statusBar: StatusBar, private platform: Platform, private storage: Storage) {
		platform.ready().then(() => {
			statusBar.backgroundColorByHexString("#1e5d24");
		});
	}

	/**
	* Regresa a la pantalla anterior
	* @param  {pages} page [NotificationPage]
	* @return {void}
	*/
	back() {
		this.navCtrl.pop();
	}

}
