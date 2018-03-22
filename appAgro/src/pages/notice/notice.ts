import { Component } from '@angular/core';
import { NavController, Platform } from 'ionic-angular';
import { Storage } from '../../app/provider/Storage';
import { StatusBar } from '@ionic-native/status-bar';

@Component({
	selector: 'page-notice',
	templateUrl: 'notice.html'
})
export class NoticePage {

	constructor(public navCtrl: NavController, private statusBar: StatusBar, private platform: Platform, private storage: Storage) {
		platform.ready().then(() => {
			statusBar.backgroundColorByHexString("#ce4d08");
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

}
