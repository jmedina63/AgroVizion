import { Component } from '@angular/core';
import { NavController, Platform } from 'ionic-angular';
import {
    GoogleMaps,
    GoogleMap,
    GoogleMapsEvent,
    GoogleMapOptions,
    Marker
} from '@ionic-native/google-maps';
import { APIService } from '../../app/provider/APIService';
import { NgZone } from '@angular/core';

@Component({
    selector: 'page-location',
    templateUrl: 'location.html',
    providers: [APIService]
})
export class LocationPage {
    private map: GoogleMap;
    private mapElement: HTMLElement;
    private dictionary;
    private currentMarker;

    constructor(private navCtrl: NavController, private googleMaps: GoogleMaps,
        private platform: Platform, private http: APIService, private zone: NgZone) {
        this.dictionary = new Map();
        this.currentMarker = {
            name: '',
            address: '',
            phone: ''
        }
        this.zone = new NgZone({ enableLongStackTrace: false });
    }

    ionViewDidLoad() {
        this.loadMap();
    }

    loadMap() {
        this.mapElement = document.getElementById('map');
        let mapOptions: GoogleMapOptions = {
            camera: {
                target: {
                    lat: 32.6186848,
                    lng: -115.4685478
                },
                zoom: 12,
                tilt: 1
            }
        };

        this.map = this.googleMaps.create(this.mapElement, mapOptions);
        //this.map = new GoogleMap(this.mapElement, mapOptions);
        // Wait the MAP_READY before using any methods.
        this.map.one(GoogleMapsEvent.MAP_READY).then(() => {
            // Now you can use all methods safely.
            this.map.setMyLocationEnabled(true);
            this.http.get('branchoffice', data => {
                for (var key in data) {
                    this.map.addMarker({
                        title: data[key].name,
                        icon: 'green',
                        animation: 'DROP',
                        position: {
                            lat: data[key].latitude,
                            lng: data[key].longitude
                        }
                    }).then((marker: Marker) => {
                        this.dictionary.set(marker.getId(), data[key]);
                        marker.on(GoogleMapsEvent.MARKER_CLICK).subscribe((mark) => {
                            this.zone.run(() => {
                                this.currentMarker = this.dictionary.get(mark[1].getId());
                                var content = document.querySelector(".info-box > .modal");
                                content.classList.add("pop");
                                document.querySelector(".info-box").classList.add("display");
                            });
                        });
                    });
                }
            });
        });
    }

	/**
	* Regresa a la pantalla anterior [SettingsPage]
	* @return {void}
	*/
    back() {
        this.map.clear();
        this.navCtrl.pop();
    }

    closeModal() {
        var content = document.querySelector(".info-box > .modal");
        content.classList.remove("pop");
        document.querySelector(".info-box").classList.remove("display");
    }

}
