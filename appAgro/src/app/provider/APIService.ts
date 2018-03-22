import { Injectable } from '@angular/core';
import { Http, Headers } from '@angular/http';
import { HttpErrorResponse } from '@angular/common/http';
import 'rxjs/add/operator/map';

@Injectable()
export class APIService {
	public static readonly URL_API = "http://52.53.166.144/dev/laravel-backend/public/api/";
	private static HEADERS = new Headers();
	private static TOKEN;

	constructor(private http: Http) { }

	/**
	 * HTTP post request method
	 * @param  {string}   rest     API HTTP REST
	 * @param  {Function} callback
	 * @return {json}
	 */
	post(rest, body, callback) {
		this.http.post(APIService.URL_API + rest, body, { headers: APIService.HEADERS }).map(res => res.json()).subscribe(data => {
			return callback(data);
		}, (httpError: HttpErrorResponse) => {
			this.refreshToken(httpError, rest, 'post', response => {
				callback(response);
			}, body);
		});
	}

	/**
	 * HTTP put request method
	 * @param  {string}   rest     API HTTP REST
	 * @param  {Function} callback
	 * @return {json}
	 */
	put(rest, body, callback) {
		this.http.put(APIService.URL_API + rest, body, { headers: APIService.HEADERS }).map(res => res.json()).subscribe(data => {
			return callback(data);
		}, (error: HttpErrorResponse) => { return callback(error.error) });
	}

	/**
	 * HTTP delete request method
	 * @param  {string}   rest     API HTTP REST
	 * @param  {Function} callback
	 * @return {json}
	 */
	delete(rest, body, callback) {
		this.http.delete(APIService.URL_API + rest, { headers: APIService.HEADERS, body: body }).map(res => res.json()).subscribe(data => {
			return callback(data);
		});
	}
	/**
	 * HTTP get request method
	 * @param  {string}   rest     API HTTP REST
	 * @param  {Function} callback
	 * @return {json}
	 */
	get(rest, callback) {
		this.http.get(APIService.URL_API + rest, { headers: APIService.HEADERS }).map(res => res.json()).subscribe(data => {
			return callback(data);
		}, (httpError: HttpErrorResponse) => {
			this.refreshToken(httpError, rest, 'get', response => {
				callback(response);
			});
		});
	}

	/**
	 * Refresh token on token expired.
	 * @param  {HttpErrorResponse}   httpError
	 * @param  {string}   url        url API Service
	 * @param  {string}   restMethod HTTP method (get, post, put, delete)
	 * @param  {Function} callback
	 * @param  {json}   body=null  HTTP data body
	 * @return {json}
	 */
	refreshToken(httpError, url, restMethod, callback, body = null) {
		if (httpError.status == 401 && httpError.hasOwnProperty('_body') && JSON.parse(httpError['_body']).error == "token_expired") {
			this.http.get(APIService.URL_API + "token", { headers: APIService.HEADERS }).map(res => res.json()).subscribe(data => {
				APIService.TOKEN = data.token;
				this.appendToken(APIService.TOKEN);
				this.redoRequest(url, restMethod, request => {
    				callback(request);
				}, body);
			}, (httpError: HttpErrorResponse) => { return callback(JSON.parse(httpError['_body'])) });
		} else {
			return callback(JSON.parse(httpError['_body'])); // returns the response error
		}
	}

	/**
	 * Redo the client request when token had expired.
	 * @param  {string}   url        url API Service
	 * @param  {string}   restMethod HTTP method (get, post, put, delete)
	 * @param  {Function} callback
	 * @param  {json}   body=null  HTTP data body
	 * @return {json}
	 */
	redoRequest(url, restMethod, callback, body = null) {
		switch (restMethod) {
			case 'get': this.http.get(APIService.URL_API + url, { headers: APIService.HEADERS }).map(res => res.json()).subscribe(data => { return callback(data); });
				break;
			case 'post': this.http.post(APIService.URL_API + url, body, { headers: APIService.HEADERS }).map(res => res.json()).subscribe(data => { return callback(data); });
				break;
			case 'put': this.http.put(APIService.URL_API + url, body, { headers: APIService.HEADERS }).map(res => res.json()).subscribe(data => { return callback(data); });
				break;
			default: return callback({ 'error': 'Error en la re-petición del cliente' });
		}
	}

	/**
	 * Appends Authorization header if missing else refresh header with the new token.
	 * @param  {string} token
	 * @return {void}
	 */
	appendToken(token) {
		APIService.TOKEN = token;
		if (! APIService.HEADERS.has("Authorization")) {
			APIService.HEADERS.append("Authorization", "Bearer " + APIService.TOKEN);
		} else {
			APIService.HEADERS.set("Authorization", "Bearer " + APIService.TOKEN);
		}
	}
}
