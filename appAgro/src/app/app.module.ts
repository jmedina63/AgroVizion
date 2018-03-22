import { BrowserModule } from '@angular/platform-browser';
import { ErrorHandler, NgModule } from '@angular/core';
import { IonicApp, IonicErrorHandler, IonicModule } from 'ionic-angular';
import { SplashScreen } from '@ionic-native/splash-screen';
import { StatusBar } from '@ionic-native/status-bar';
import { GoogleMaps } from '@ionic-native/google-maps';
import { Camera } from '@ionic-native/camera';
import { HttpModule } from '@angular/http';

import { MyApp } from './app.component';
import { Storage } from './provider/Storage';
import { LoginPage } from '../pages/login/login';
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

@NgModule({
  declarations: [
    MyApp,
    LoginPage,
    RegisterPage,
    FilesPage,
    MenuPage,
    CreditPage,
    CreditRequest,
    MinistrationPage,
    MinistrationMenuPage,
    MovementPage,
    NoticePage,
    NotificationPage,
    CreditAlertPage,
    MinistrationAlertPage,
    MovementAlertPage,
    SettingsPage,
    LocationPage,
    CashPage,
    SuppliesPage,
    QuimicsPage,
    WaterPage
  ],
  imports: [
    BrowserModule,
    IonicModule.forRoot(MyApp,{
        scrollAssist: true,
        autoFocusAssist: true
    }),
    HttpModule
  ],
  bootstrap: [IonicApp],
  entryComponents: [
    MyApp,
    LoginPage,
    RegisterPage,
    FilesPage,
    MenuPage,
    CreditPage,
    CreditRequest,
    MinistrationPage,
    MinistrationMenuPage,
    MovementPage,
    NoticePage,
    NotificationPage,
    CreditAlertPage,
    MinistrationAlertPage,
    MovementAlertPage,
    SettingsPage,
    LocationPage,
    CashPage,
    SuppliesPage,
    QuimicsPage,
    WaterPage
  ],
  providers: [
    StatusBar,
    SplashScreen,
    GoogleMaps,
    Camera,
    Storage,
    {provide: ErrorHandler, useClass: IonicErrorHandler}
  ]
})
export class AppModule {}
