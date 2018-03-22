import { Component } from '@angular/core';
import { Platform } from 'ionic-angular';
import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';
import { LoginPage } from '../pages/login/login';
// estas librerias se tienen que quitar cuando se pase a producción
import { RegisterPage } from '../pages/register/register';
import { FilesPage } from '../pages/register/files/files';
import { MenuPage } from '../pages/menu/menu';
import { CreditPage } from '../pages/credit/credit';
import { CreditRequest } from '../pages/credit/request/creditRequest';
import { MinistrationPage } from '../pages/ministration/ministration';
import { MinistrationMenuPage } from '../pages/ministration/menu/menu';
import { MovementPage } from '../pages/movement/movement';
import { NoticePage } from '../pages/notice/notice';
import { NotificationPage } from '../pages/notification/notification';
import { CreditAlertPage } from '../pages/notification/credit/creditAlert';
import { MinistrationAlertPage } from '../pages/notification/ministration/ministrationAlert';
import { MovementAlertPage } from '../pages/notification/movement/movementAlert';
import { SettingsPage } from '../pages/settings/settings';
import { LocationPage } from '../pages/location/location';
import { CashPage } from '../pages/ministration/cash/cash';
import { SuppliesPage } from '../pages/ministration/supplies/supplies';
import { QuimicsPage } from '../pages/ministration/quimics/quimics';
import { WaterPage } from '../pages/ministration/water/water';

@Component({
	templateUrl: 'app.html'
})
export class MyApp {
	rootPage: any = LoginPage;
	// rootPage: any = MenuPage;

	constructor(platform: Platform, statusBar: StatusBar, splashScreen: SplashScreen) {
		platform.ready().then(() => {
			// Okay, so the platform is ready and our plugins are available.
			// Here you can do any higher level native things you might need.
			statusBar.backgroundColorByHexString("#205d23");
			splashScreen.hide();
		});
	}
}
