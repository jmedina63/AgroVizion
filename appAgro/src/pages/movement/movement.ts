import { Component } from '@angular/core';
import { NavController, Platform } from 'ionic-angular';
import { Storage } from '../../app/provider/Storage';
import { StatusBar } from '@ionic-native/status-bar';
import { AlertService } from '../../app/provider/AlertService';

@Component({
	selector: 'page-movement',
	templateUrl: 'movement.html',
	providers: [AlertService]
})
export class MovementPage {

	constructor(public navCtrl: NavController, private statusBar: StatusBar, private platform: Platform, private storage: Storage,
		private alert: AlertService) {
		platform.ready().then(() => {
			statusBar.backgroundColorByHexString("#5c1887");
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

	showInfo() {
		this.alert.showMessage("Importante.", "La información presentada en este medio es de carácter informativo sin ninguna validez legal,"
		+ " si desea obtener comprobantes legales con dicha información favor de presentarse en cualquiera de nuestras sucursales.");
	}

}
